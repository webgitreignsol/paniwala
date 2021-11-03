
"use strict";

$(function () {
    chart1();
    chart3();


    // select all on checkbox click
    $("[data-checkboxes]").each(function () {
        var me = $(this),
            group = me.data('checkboxes'),
            role = me.data('checkbox-role');

        me.change(function () {
            var all = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"])'),
                checked = $('[data-checkboxes="' + group + '"]:not([data-checkbox-role="dad"]):checked'),
                dad = $('[data-checkboxes="' + group + '"][data-checkbox-role="dad"]'),
                total = all.length,
                checked_length = checked.length;

            if (role == 'dad') {
                if (me.is(':checked')) {
                    all.prop('checked', true);
                } else {
                    all.prop('checked', false);
                }
            } else {
                if (checked_length >= total) {
                    dad.prop('checked', true);
                } else {
                    dad.prop('checked', false);
                }
            }
        });
    });



});



function chart1() {
    var options = {
        chart: {
            height: 210,
            type: "line",
            shadow: {
                enabled: true,
                color: "#000",
                top: 18,
                left: 7,
                blur: 10,
                opacity: 1
            },
            toolbar: {
                show: false
            }
        },
        colors: ["#786BED", "#999b9c"],
        dataLabels: {
            enabled: true
        },
        stroke: {
            curve: "smooth"
        },
        series: [{
            name: "High - 2021",
            data: [5, 15, 14, 36, 32, 32]
        }],
        grid: {
            borderColor: "#e7e7e7",
            row: {
                colors: ["#f3f3f3", "transparent"], 
                opacity: 0.0
            }
        },
        markers: {
            size: 8
        },
        xaxis: {
            categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun"],

            labels: {
                style: {
                    colors: "#9aa0ac"
                }
            }
        },
        yaxis: {
            labels: {
                style: {
                    color: "#9aa0ac"
                }
            },
            min: 5,
            max: 40
        },
        legend: {
            position: "top",
            horizontalAlign: "right",
            floating: true,
            offsetY: -25,
            offsetX: -5
        }
    };

    var chart = new ApexCharts(document.querySelector("#chart1"), options);

    chart.render();
}


function chart3() {
    var options = {
        chart: {
            height: 280,
            type: 'line',
            shadow: {
                enabled: true,
                color: '#000',
                top: 18,
                left: 7,
                blur: 10,
                opacity: 1
            },
            toolbar: {
                show: false
            }
        },
        colors: ['#77B6EA', '#1c426f'],
        dataLabels: {
            enabled: true,
        },
        stroke: {
            curve: 'smooth'
        },
        series: [{
            name: "High - 2021",
            data: [28, 29, 33, 36, 32, 32, 33]
        },
        {
            name: "Low - 2021",
            data: [12, 11, 14, 18, 17, 13, 13]
        }
        ],
        title: {
            text: 'Average High & Low Sales',
            align: 'left'
        },
        grid: {
            borderColor: '#e7e7e7',
            
        },
        markers: {

            size: 6
        },
        xaxis: {
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul'],
            
            labels: {
                style: {
                    colors: '#9aa0ac',
                }
            }
        },
        yaxis: {
           
            labels: {
                style: {
                    color: '#9aa0ac',
                }
            },
            min: 5,
            max: 40
        },
        legend: {
            position: 'top',
            horizontalAlign: 'right',
            floating: true,
            offsetY: -25,
            offsetX: -5
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#chart3"),
        options
    );

    chart.render();
}


// Start Total Sale This Week Chart Script
am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartdiv2", am4charts.XYChart);

    // Add data
    chart.data = [{
      "country": "15-09-21",
      "visits": 26025
    }, {
      "country": "16-09-21",
      "visits": 19280
    }, {
      "country": "17-09-21",
      "visits": 17810
    }, {
      "country": "18-09-21",
      "visits": 24120
    }, {
      "country": "19-09-21",
      "visits": 14900
    }, {
      "country": "20-09-21",
      "visits": 17500
    }, {
      "country": "21-09-21",
      "visits": 18950
    }];

    // Create axes

    var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
    categoryAxis.dataFields.category = "country";
    categoryAxis.renderer.grid.template.location = 0;
    categoryAxis.renderer.minGridDistance = 30;

    categoryAxis.renderer.labels.template.adapter.add("dy", function(dy, target) {
      if (target.dataItem && target.dataItem.index & 2 == 2) {
        return dy + 25;
      }
      return dy;
    });

    var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

    // Create series
    var series = chart.series.push(new am4charts.ColumnSeries());
    series.dataFields.valueY = "visits";
    series.dataFields.categoryX = "country";
    series.name = "Visits";
    series.columns.template.tooltipText = "{categoryX}: [bold]{valueY}[/]";
    series.columns.template.fillOpacity = .8;

    var columnTemplate = series.columns.template;
    columnTemplate.strokeWidth = 2;
    columnTemplate.strokeOpacity = 1;

});

// End Total Sale This Week Chart Script



// Start Total Order This Week Chart Script
am4core.ready(function() {

    // Themes begin
    am4core.useTheme(am4themes_animated);
    // Themes end

    // Create chart instance
    var chart = am4core.create("chartdiv", am4charts.PieChart);

    // Add data
    chart.data = [ {
      "oderWeek": "15-09-21",
      "orderWeekPer": 7
    }, {
      "oderWeek": "16-09-21",
      "orderWeekPer": 9
    }, {
      "oderWeek": "17-09-21",
      "orderWeekPer": 13
    }, {
      "oderWeek": "18-09-21",
      "orderWeekPer": 15
    }, {
      "oderWeek": "19-09-21",
      "orderWeekPer": 12
    }, {
      "oderWeek": "20-09-21",
      "orderWeekPer": 21
    }, {
      "oderWeek": "21-09-21",
      "orderWeekPer": 24
    }];

    // Add and configure Series
    var pieSeries = chart.series.push(new am4charts.PieSeries());
    pieSeries.dataFields.value = "orderWeekPer";
    pieSeries.dataFields.category = "oderWeek";
    pieSeries.labels.template.disabled = true;
        pieSeries.ticks.template.disabled = true;

    pieSeries.slices.template.stroke = am4core.color("#fff");
    pieSeries.slices.template.strokeWidth = 2;
    pieSeries.slices.template.strokeOpacity = 1;
    pieSeries.labels.template.fill = am4core.color("#9aa0ac");

    // This creates initial animation
    pieSeries.hiddenState.properties.opacity = 1;
    pieSeries.hiddenState.properties.endAngle = -90;
    pieSeries.hiddenState.properties.startAngle = -90;

    chart.legend = new am4charts.Legend();
    chart.legend.itemContainers.template.paddingTop = 2;
    chart.legend.itemContainers.template.paddingBottom = 2;
    chart.legend.position = "left";
    chart.legend.width = "80";
    let markerTemplate = chart.legend.markers.template;
    markerTemplate.width = 15;
    markerTemplate.height = 15;

});

// End Total Sales This Week Chart Script 