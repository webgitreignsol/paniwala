<?php

namespace App;
use App\Classes\Helper;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Validator;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Traits\LogsActivity;
use App\Http\Resources\Frontend\User\GetProfile as GetUserProfile;
use App\Http\Resources\Frontend\User\GetDriverProfile as GetDriverProfile;
use File;

class User extends Authenticatable
{
    use Notifiable;
    use HasRoles;
    use HasApiTokens;
    use LogsActivity;


    protected $guard = 'api';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'added_by', 'updated_by', 'name', 'image', 'latitude', 'longitude','address','country_code', 'phone', 'date_of_birth', 'gender', 'email', 'type', 'password', 'otp', 'device_type', 'device_token', 'verified_by', 'social_provider', 'social_token', 'social_id', 'isFirstTime', 'email_verified_at', 'status', 'mode'];

    protected $appends = ['ratings'];

    protected static $logAttributes = ['added_by', 'updated_by', 'name', 'image', 'latitude', 'longitude','address','country_code', 'phone', 'date_of_birth', 'gender', 'email', 'type', 'password', 'otp', 'device_type', 'device_token', 'verified_by', 'social_provider', 'social_token', 'social_id', 'isFirstTime', 'email_verified_at', 'status', 'mode'];
    protected static $logName = 'User';
    protected static $logOnlyDirty = true;

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getImageAttribute($value)
    {
        if (!$value) {
            return '/uploads/default.jpg';
        }

        return $value;
    }


    public function getRatingsAttribute($val) {
        $count = Rating::where('get_review', $this->id)
                 ->avg('rating');
                 return $count ?? 0;
    }

    
    // Auth Section Start Created By MYTECH
    public static function verifyOtp($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'nullable|email',
            'otp' => 'required|numeric|digits:4'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $user = User::where('email', $request->email)->first();

        if($user) {
            if($request->otp == $user->otp) {
                if ($user->verified_by == 'email' && $user->email_verified_at == '' || $request->email) {
                    $user->email_verified_at = date('Y-m-d H:i:s');
                    $user->otp = null;
                    if ($request->email) {
                        $user->email = $request->email;
                    }
                    $user->save();

                    if (!Auth::guard('frontend')->loginUsingId($user->id)) 
                    {
                        return 'Something wen\'t wrong';
                    }

                    if (Auth::guard('frontend')->user()) 
                    {
                        $user = Auth::guard('frontend')->user();
                    }

                    $tokenResult = $user->createToken('Personal Access Token');

                    $token = $tokenResult->token;

                    if ($request->remember_me)
                    {
                        $token->expires_at = Carbon::now()->addWeeks(1);
                    }

                    $token->save();

                    $device_type = $request->has('device_type') ? $request->device_type : '';
                    $device_token = $request->has('device_token') ? $request->device_token : '';

                    if ($device_token && $device_type) 
                    {
                        $user->device_type   = $device_type;
                        $user->device_token  = $device_token;

                        $user->save();
                    }

                    $user->token = 'Bearer ' . $tokenResult->accessToken;
                    // $user->roles = $user->roles ?? [];
                    
                    return $user;
                    
                } else {
                    return ['error' => 'User is already verified'];
                }
            } else {
                return 'Please enter valid otp';
            }
        } else {
            return 'User is invalid';
        }
    }

    public function resendOtp($request)
    {
        $record = $this::whereNotNull('otp');
        
        $record = $this::query();
        
        if ($request->email)
        {
            $record->where('email', $request->email);
        }

        $record = $record->first();

        if (!$record) 
        {
            return 'Invalid User';
        }

        if($record->verified_by == 'email') {
            $data = [
                'email' => $record->email,
                'name' => $record->name,
                'subject' => 'Resend Account verification code',
            ];

            Helper::sendEmail('accountVerification', ['data' => $record], $data);
        }

        return $record;
    }

    public function login($request)
    {
        if($request->has('email')) {
            $validationRules['email'] = 'required|string|email';
        }
        $validationRules['password'] = 'required|string|min:6|max:16';
        $validationRules['device_type'] = 'in:android,ios';
        $validationRules['device_token'] = 'string|max:255';

        $validator = Validator::make($request->all(), $validationRules);

        if($validator->fails()) {
            return $validator;
        }

        $attempt_by_email = $user = User::where('email', $request->email)->first();

        if($attempt_by_email) {
            $credentials = ['email' => $request->email, 'password' => $request->password];
        }

        if(!$user) {
            return "Invalid Credentials";
        }

        if(!Auth::guard('frontend')->attempt($credentials))
            return 'Invalid Credentials';

        if($attempt_by_email && Auth::guard('frontend')->user()->email_verified_at == '') {

            $user->otp = mt_rand(1000, 9999);
            $user->save();

            $data = [
                'email' => $user->email,
                'name' => $user->name,
                'subject' => 'Account verification code',
            ];

            Helper::sendEmail('accountVerification', ['data' => $user], $data);

            return ['error' => 'User is not verified', 'user' => $user];

        }

        $user = Auth::guard('frontend')->user();

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;

        if($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();

        $device_type = $request->has('device_type') ? $request->device_type : '';
        $device_token = $request->has('device_token') ? $request->device_token : '';

        if($device_token && $device_type) {

            $user->device_type  = $device_type;
            $user->device_token = $device_token;

            $user->save();
            try {

            } catch(\Exception $eex) {

            }
        }

        $user->token = 'Bearer ' . $tokenResult->accessToken;
        // $user->roles = $user->roles ?? [];
        return $user;
    }

    public function signup($request)
    {
        $validationRules['name'] = 'required|string|min:3|max:55';
        $validationRules['password'] = 'required|string|min:6|max:16|confirmed';
        $validationRules['verified_by'] = 'required|in:email';
        $validationRules['email'] = 'required|string|email|min:5|max:155|unique:users';
        $validationRules['phone'] = 'required|numeric|digits_between:9,14';

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            return $validator;
        }

        if($request->verified_by == 'email') {
            $type = 'email';
            $token = mt_rand(1000, 9999);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_code' => $request->country_code,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'password' => bcrypt($request->password),
            'verified_by' => $type,
            'otp' => $token,
            $this->assignRole(2)
        ];

        $this->fill($data);
        $this->save();

        if($this->verified_by == 'email') {
            $data = [
                'email' => $this->email,
                'name' => $this->name,
                'subject' => 'Account verification code',
            ];

            Helper::sendEmail('accountVerification', ['data' => $this], $data);
        }

        return $this;
        
    }


    public function signupDriver($request)
    {
        $validationRules['name'] = 'required|string|min:3|max:55';
        $validationRules['password'] = 'required|string|min:6|max:16|confirmed';
        $validationRules['verified_by'] = 'required|in:email';
        $validationRules['email'] = 'required|string|email|min:5|max:155|unique:users';
        $validationRules['phone'] = 'required|numeric|digits_between:9,14';

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            return $validator;
        }

        if($request->verified_by == 'email') {
            $type = 'email';
            $token = mt_rand(1000, 9999);
        }

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'country_code' => $request->country_code,
            'address' => $request->address,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'password' => bcrypt($request->password),
            'verified_by' => $type,
            'otp' => $token,
            $this->assignRole(5)
        ];

        $this->fill($data);
        $this->save();

        $driver_photo = $request->file('driver_photo');
        $cnic_front_photo = $request->file('cnic_front_side');
        $cnic_back_photo = $request->file('cnic_back_side');
        $cnic_license_photo = $request->file('driving_license');
        $registration_photo = $request->file('car_registration_book');

        $fileNameDriver = null;
        if ($driver_photo) {
            $file = request()->file('driver_photo');
            $fileNameDriver = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/driver_images'), $fileNameDriver);
        }

        $fileNameCnicFront = null;
        if ($cnic_front_photo) {
            $file = request()->file('cnic_front_side');
            $fileNameCnicFront = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/driver_cnic'), $fileNameDriver);
        }


        $fileNameCnicBack = null;
        if ($cnic_back_photo) {
            $file = request()->file('cnic_back_side');
            $fileNameCnicBack = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/driver_cnic'), $fileNameDriver);
        }

        $fileNameLicense = null;
        if ($cnic_license_photo) {
            $file = request()->file('driving_license');
            $fileNameLicense = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/driver_license'), $fileNameDriver);
        }

        $fileNameRegistration = null;
        if ($registration_photo) {
            $file = request()->file('car_registration_book');
            $fileNameRegistration = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/driver_registration'), $fileNameRegistration);
        }

        $driverDetail = new DriverDetail();
        $driverDetail->driver_id = $this->id;
        $driverDetail->driver_photo = '/public/uploads/driver_images/'.$fileNameDriver;
        $driverDetail->cnic_front_side = '/public/uploads/driver_cnic/'.$fileNameCnicFront;
        $driverDetail->cnic_back_side = '/public/uploads/driver_cnic/'.$fileNameCnicBack;
        $driverDetail->driving_license = '/public/uploads/driver_license/'.$fileNameLicense;
        $driverDetail->car_registration_book = '/public/uploads/driver_registration/'.$fileNameRegistration;
        $driverDetail->save();

        if($this->verified_by == 'email') {
            $data = [
                'email' => $this->email,
                'name' => $this->name,
                'subject' => 'Account verification code',
            ];

            Helper::sendEmail('accountVerification', ['data' => $this], $data);
        }

        return $this;

    }

    public function forgetPassword($request)
    {
        $record = $this::where('email', $request->email)->first();

        $requestFor = 'email';

        if (!$record) 
        {
            return 'Email Not Found!';
        }

        $record->otp = mt_rand(1111, 9999);
        $record->verified_by = $requestFor;
        $record->save();

        if ($requestFor = 'email') 
        {
            $data = [
                'email' => $record->email,
                'name' => $record->name,
                'subject' => 'Account recovery code',
            ];

            Helper::sendEmail('accountVerification', ['data' => $record], $data);
        }

        return $record;
    }

    public function verifyForgetCode($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'nullable|email',
            'otp' => 'required|numeric|digits:4'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $record = $this::where('email', $request->email)->first();

        if (!$record) 
        {
            return 'Invalid user';
        }

        if ($record->otp == null) 
        {
            return ['error' => 'User is already verified'];
        }

        if ($record->otp != $request->otp) 
        {
            return 'Please enter valid otp';
        }

        $record->otp = null;
        $record->save();

        if ($record->verified_by = 'email') 
        {
            $data = [
                'email' => $record->email,
                'name' => $record->name,
                'subject' => 'Account recovery code',
            ];

            Helper::sendEmail('accountVerification', ['data' => $record], $data);
        } 

        return $record;
    }

    public function changePassword($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|string|min:6|max:16|confirmed'
        ]);

        if ($validator->fails()) 
        {
            return $validator;
        }

        $record = $this::find($id);
        if (Hash::check($request->old_password, $record->password)) {
            $record->password = bcrypt($request->password);
            $record->save();
        } else {
            return 'Current password doesn,t match';
        }

        return $record;
    }

    public function resetPassword($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:16|confirmed'
        ]);

        if ($validator->fails()) 
        {
            return $validator;
        }

        $record = $this::query();

        if($request->email)
        {
            $record->where('email', $request->email);
        }

        $record = $record->first();
        
        if (!$record) 
        {
            return 'Invalid user';
        }

        $record->password = bcrypt($request->password);
        $record->save();

        return $record;
    }

    public function updateProfile($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|between:3,55',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric|digits_between:9,14',
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $checkUser = $this::where('id', $id)->first();

        $currentName = $checkUser->name;
        $currentEmail = $checkUser->email;
        $currentPhone = $checkUser->phone;
        $currentAddress = $checkUser->address;
        $currentImage = $checkUser->image;
        $currentLatitude = $checkUser->latitude;
        $currentLongitude = $checkUser->longitude;

        $image = $request->file('image');

        $fileName = null;
        if ($image) {
            $file = request()->file('image');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/user', $fileName);
        }

        $record = $this::find($id);
        $record->name  = $request->name ? $request->name : $currentName;
        $record->email = $request->email ? $request->email : $currentEmail;
        $record->phone = $request->phone ? $request->phone : $currentPhone;
        $record->address = $request->address ? $request->address : $currentAddress;
        $record->image = ($fileName) ? '/uploads/user/'.$fileName : $currentImage;
        $record->latitude = $request->latitude ? $request->latitude : $currentLatitude;
        $record->longitude = $request->longitude ? $request->longitude : $currentLongitude;
        $record->save();

        return $record;
    }

    public function getProfile($request, $id)
    {
        $record = $this->find($id);

        if (!$record) {
            return 'Unauthorized';
        }

        return (new GetUserProfile($record))->resolve();
    }

    public function userGoogleAuth($request)
    {
        $validationRules['name'] = 'required|string|min:3|max:55';
        $validationRules['email'] = 'required|string|email|min:5|max:155';
        $validationRules['social_token'] = 'required|string';

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            return $validator;
        }

        $record = $this::where('social_token', $request->social_token)
        ->first();

        if (!$record) 
        {
            $record = $this;

            $record->name = $request->name;
            $record->email = $request->email;
            $record->verified_by = 'google';
            $record->social_id = $request->social_token;
            $record->password = bcrypt('googlePassword');
            $record->social_provider = 'google';
            $record->social_token = $request->social_token;
            $record->email_verified_at = date('Y-m-d H:i:s');
            $record->isFirstTime = 1;
            $record->assignRole(2);
            $record->save();
        } else {
            $record->isFirstTime = 0;
            $record->save();
        }

        if (!Auth::guard('frontend')->loginUsingId($record->id)) 
        {
            return 'Something wen\'t wrong';
        }

        if (Auth::guard('frontend')->user()) 
        {
            $user = Auth::guard('frontend')->user();
        }

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;

        if ($request->remember_me) 
        {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        $device_type = $request->has('device_type') ? $request->device_type : '';
        $device_token = $request->has('device_token') ? $request->device_token : '';

        if ($device_token && $device_type) 
        {
            $user->device_type = $device_type;
            $user->device_token = $device_token;

            $user->save();
        }

        $user->token = 'Bearer ' . $tokenResult->accessToken;
        // $user->roles = $user->roles ?? [];

        return $user;
    }

    public function userFacebookAuth($request)
    {
        $validationRules['name'] = 'required|string|min:3|max:55';
        $validationRules['email'] = 'required|string|email|min:5|max:155';
        $validationRules['social_token'] = 'required|string';

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            return $validator;
        }

        $record = $this::where('social_token', $request->social_token)
        ->first();

        if (!$record) 
        {
            $record = $this;
            
            $record->name = $request->name;
            $record->email = $request->email;
            $record->verified_by  = 'facebook';
            $record->social_id = $request->social_token;
            $record->password = bcrypt('facebookPassword');
            $record->social_provider = 'facebook';
            $record->social_token = $request->social_token;
            $record->email_verified_at = date('Y-m-d H:i:s');
            $record->isFirstTime = 1;
            $record->assignRole(2);
            $record->save();
        } else {
            $record->isFirstTime = 0;
            $record->save();
        }

        if (!Auth::guard('frontend')->loginUsingId($record->id)) 
        {
            return 'Something wen\'t wrong';
        }

        if (Auth::guard('frontend')->user()) 
        {
            $user = Auth::guard('frontend')->user();
        }

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;

        if ($request->remember_me)
        {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        $device_type = $request->has('device_type') ? $request->device_type : '';
        $device_token = $request->has('device_token') ? $request->device_token : '';

        if ($device_token && $device_type) 
        {
            $user->device_type   = $device_type;
            $user->device_token  = $device_token;

            $user->save();
        }

        $user->token = 'Bearer ' . $tokenResult->accessToken;
        // $user->roles = $user->roles ?? [];
        
        return $user;
    }

    public function userAppleAuth($request)
    {
        $validationRules['name'] = 'required|string|min:3|max:55';
        $validationRules['email'] = 'required|string|email|min:5|max:155';
        $validationRules['social_token'] = 'required|string';

        $validator = Validator::make($request->all(), $validationRules);

        if ($validator->fails()) {
            return $validator;
        }

        $record = $this::where('social_token', $request->social_token)
        ->first();

        if (!$record) 
        {
            $record = $this;

            $record->name = $request->name;
            $record->email = $request->email;
            $record->verified_by = 'apple';
            $record->social_id = $request->social_token;
            $record->password = bcrypt('applePassword');
            $record->social_provider = 'apple';
            $record->social_token = $request->social_token;
            $record->email_verified_at = date('Y-m-d H:i:s');
            $record->isFirstTime = 1;
            $record->assignRole(2);
            $record->save();
        } else {
            $record->isFirstTime = 0;
            $record->save();
        }

        if (!Auth::guard('frontend')->loginUsingId($record->id)) 
        {
            return 'Something wen\'t wrong';
        }

        if (Auth::guard('frontend')->user()) 
        {
            $user = Auth::guard('frontend')->user();
        }

        $tokenResult = $user->createToken('Personal Access Token');

        $token = $tokenResult->token;

        if ($request->remember_me) 
        {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();

        $device_type = $request->has('device_type') ? $request->device_type : '';
        $device_token = $request->has('device_token') ? $request->device_token : '';

        if ($device_token && $device_type) 
        {
            $user->device_type = $device_type;
            $user->device_token = $device_token;

            $user->save();
        }

        $user->token = 'Bearer ' . $tokenResult->accessToken;
        // $user->roles = $user->roles ?? [];
        
        return $user;
    }

    public function signOut($request)
    {
        try 
        {
            $user = $request->user();
            $user->device_token = null;
            $user->device_type = null;
            $user->save();
            $request->user()->token()->revoke();
        } 
        catch (\Exception $exception) 
        {
            if ($exception instanceof \Illuminate\Auth\AuthenticationException)
            {
                return 'The session is already logged out';
            }
        }

        return $user;
    }
    // Auth Section End Created By MYTECH

    // Driver Auth Section Start Created by MYTECH
    public static function driverVerifyOtp($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'nullable|email',
            'otp' => 'required|numeric|digits:4'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $driver = User::role('driver')->where('email', $request->email)->first();

        if($driver) {
            if($request->otp == $driver->otp) {
                if ($driver->verified_by == 'email' && $driver->email_verified_at == '' || $request->email) {
                    $driver->email_verified_at = date('Y-m-d H:i:s');
                    $driver->otp = null;
                    if ($request->email) {
                        $driver->email = $request->email;
                    }
                    $driver->save();

                    if (!Auth::guard('frontend')->loginUsingId($driver->id)) 
                    {
                        return 'Something wen\'t wrong';
                    }

                    if (Auth::guard('frontend')->user()) 
                    {
                        $driver = Auth::guard('frontend')->user();
                    }

                    $tokenResult = $driver->createToken('Personal Access Token');

                    $token = $tokenResult->token;

                    if ($request->remember_me)
                    {
                        $token->expires_at = Carbon::now()->addWeeks(1);
                    }

                    $token->save();

                    $device_type = $request->has('device_type') ? $request->device_type : '';
                    $device_token = $request->has('device_token') ? $request->device_token : '';

                    if ($device_token && $device_type) 
                    {
                        $driver->device_type   = $device_type;
                        $driver->device_token  = $device_token;

                        $driver->save();
                    }

                    $driver->token = 'Bearer ' . $tokenResult->accessToken;
                    // $driver->roles = $driver->roles ?? [];
                    
                    return $driver;
                    
                } else {
                    return ['error' => 'Driver is already verified'];
                }
            } else {
                return 'Please enter valid otp';
            }
        } else {
            return 'Driver is invalid';
        }
    }

    public function driverLogin($request)
    {
        if($request->has('email')) {
            $validationRules['email'] = 'required|string|email';
        }
        $validationRules['password'] = 'required|string|min:6|max:16';
        $validationRules['device_type'] = 'in:android,ios';
        $validationRules['device_token'] = 'string|max:255';

        $validator = Validator::make($request->all(), $validationRules);

        if($validator->fails()) {
            return $validator;
        }

        $attempt_by_email = $driver = User::role('driver')->where('email', $request->email)->first();

        if($attempt_by_email) {
            $credentials = ['email' => $request->email, 'password' => $request->password];
        }

        if(!$driver) {
            return "Invalid Credentials";
        }

        if(!Auth::guard('frontend')->attempt($credentials))
            return 'Invalid Credentials';

        if($attempt_by_email && Auth::guard('frontend')->user()->email_verified_at == '') {

            $driver->otp = mt_rand(1000, 9999);
            $driver->save();

            $data = [
                'email' => $driver->email,
                'name' => $driver->name,
                'subject' => 'Account verification code',
            ];

            Helper::sendEmail('accountVerification', ['data' => $driver], $data);

            return ['error' => 'Driver is not verified', 'driver' => $driver];

        }

        $driver = Auth::guard('frontend')->user();

        $tokenResult = $driver->createToken('Personal Access Token');

        $token = $tokenResult->token;

        if($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();

        $device_type = $request->has('device_type') ? $request->device_type : '';
        $device_token = $request->has('device_token') ? $request->device_token : '';

        if($device_token && $device_type) {

            $driver->device_type  = $device_type;
            $driver->device_token = $device_token;

            $driver->save();
            try {

            } catch(\Exception $eex) {

            }
        }

        $driver->token = 'Bearer ' . $tokenResult->accessToken;
        // $driver->roles = $driver->roles ?? [];
        return $driver;
    }

    public function driverResendOtp($request)
    {
        $record = $this::whereNotNull('otp');
        
        $record = $this::query();
        
        if ($request->email)
        {
            $record->where('email', $request->email);
        }

        $record = $record->role('driver')->first();

        if (!$record) 
        {
            return 'Invalid Driver';
        }

        if($record->verified_by == 'email') {
            $data = [
                'email' => $record->email,
                'name' => $record->name,
                'subject' => 'Resend Account verification code',
            ];

            Helper::sendEmail('accountVerification', ['data' => $record], $data);
        }

        return $record;
    }

    public function driverForgetPassword($request)
    {
        $record = $this::role('driver')->where('email', $request->email)->first();

        $requestFor = 'email';

        if (!$record) 
        {
            return 'Email Not Found!';
        }

        $record->otp = mt_rand(1111, 9999);
        $record->verified_by = $requestFor;
        $record->save();

        if ($requestFor = 'email') 
        {
            $data = [
                'email' => $record->email,
                'name' => $record->name,
                'subject' => 'Account recovery code',
            ];

            Helper::sendEmail('accountVerification', ['data' => $record], $data);
        }

        return $record;
    }

    public function driverVerifyForgetCode($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'nullable|email',
            'otp' => 'required|numeric|digits:4'
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $record = $this::role('driver')->where('email', $request->email)->first();

        if (!$record) 
        {
            return 'Invalid driver';
        }

        if ($record->otp == null) 
        {
            return ['error' => 'Driver is already verified'];
        }

        if ($record->otp != $request->otp) 
        {
            return 'Please enter valid otp';
        }

        $record->otp = null;
        $record->save();

        if ($record->verified_by = 'email') 
        {
            $data = [
                'email' => $record->email,
                'name' => $record->name,
                'subject' => 'Account recovery code',
            ];

            Helper::sendEmail('accountVerification', ['data' => $record], $data);
        } 

        return $record;
    }

    public function driverResetPassword($request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:16|confirmed'
        ]);

        if ($validator->fails()) 
        {
            return $validator;
        }

        $record = $this::query();

        if($request->email)
        {
            $record->where('email', $request->email);
        }

        $record = $record->role('driver')->first();
        
        if (!$record) 
        {
            return 'Invalid driver';
        }

        $record->password = bcrypt($request->password);
        $record->save();

        return $record;
    }

    public function driverChangePassword($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required|string|min:6|max:16|confirmed'
        ]);

        if ($validator->fails()) 
        {
            return $validator;
        }

        $record = $this::role('driver')->find($id);

        if (!$record) 
        {
            return 'Invalid driver';
        }

        if (Hash::check($request->old_password, $record->password)) {
            $record->password = bcrypt($request->password);
            $record->save();
        } else {
            return 'Current password doesn,t match';
        }

        return $record;
    }

    public function driverGetProfile($request, $id)
    {
        $record = $this->role('driver')->find($id);

        if (!$record) {
            return 'Unauthorized';
        }

        return (new GetDriverProfile($record))->resolve();
    }

    public function driverUpdateProfile($request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable|string|between:3,55',
            'email' => 'nullable|email',
            'phone' => 'nullable|numeric|digits_between:9,14',
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $checkDriver = $this::role('driver')->where('id', $id)->first();

        $currentName = $checkDriver->name;
        $currentEmail = $checkDriver->email;
        $currentPhone = $checkDriver->phone;
        $currentAddress = $checkDriver->address;
        $currentImage = $checkDriver->image;
        $currentLatitude = $checkDriver->latitude;
        $currentLongitude = $checkDriver->longitude;

        $image = $request->file('image');

        $fileName = null;
        if ($image) {
            $file = request()->file('image');
            $fileName = md5($file->getClientOriginalName()) . time() . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/driver', $fileName);
        }

        $record = $this::find($id);
        $record->name = $request->name ? $request->name : $currentName;
        $record->email = $request->email ? $request->email : $currentEmail;
        $record->phone = $request->phone ? $request->phone : $currentPhone;
        $record->address = $request->address ? $request->address : $currentAddress;
        $record->image = ($fileName) ? '/uploads/driver/'.$fileName : $currentImage;
        $record->latitude = $request->latitude ? $request->latitude : $currentLatitude;
        $record->longitude = $request->longitude ? $request->longitude : $currentLongitude;
        $record->save();

        return $record;
    }

    public function driverSignOut($request)
    {
        try 
        {
            $driver = $request->user();
            $driver->device_token = null;
            $driver->device_type = null;
            $driver->save();
            $request->user()->token()->revoke();
        } 
        catch (\Exception $exception) 
        {
            if ($exception instanceof \Illuminate\Auth\AuthenticationException)
            {
                return 'The session is already logged out';
            }
        }

        return $driver;
    }

    public function DriverUpdateStatus($request, $id)
    {
        $validator = Validator::make($request->all(), [
          'status' => 'nullable|in:0,1',
        ]);

        if ($validator->fails()) {
            return $validator;
        }

        $record = $this::find($id);

        $status = $request->status;

        if ($status == '0') {
            $record->status = $status;
        } elseif ($status == '1') {
            $record->status = $status;
        }
        $record->save();

        return $record;
    }
    // Driver Auth Section End Created by MYTECH


    public function services()
    {
        return $this->belongsToMany(Service::class, 'user_has_services', 'user_id', 'service_id');
    }

    public function jobs(){

        return $this->hasMany('App\Job', 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Rating::class, 'get_review');
    }

    // public function ratings()
    // {
    //     return $this->hasMany('App\Rating', 'driver_id');
    // }
}
