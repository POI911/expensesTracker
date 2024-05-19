@extends('layout')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>My Records</title>
</head>

@section('content')
    @include('navbar')


    <div class="container justify-content-center">

        <div class="page d-flex flex-row flex-column-fluid">


            <div class="m-10 d-flex flex-column flex-row-fluid" id="kt_wrapper">
                <div id="kt_content_container" class="d-flex gap-12 flex-wrap justify-content-evenly">

                    <div id="chart_div1">
                    </div>

                    <div id="chart_div2"></div>

                    <div id="chart_div3"></div>

                    <div id="chart_div4"></div>

                    <div id="chart_div5"></div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['corechart']
        });

        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                @foreach ($top_records as $record)
                    ['{{ $record->description }}', {{ $record->amount }}],
                @endforeach
            ]);

            // Set chart options
            var options1 = {
                'title': "Top Records",
                'width': 350,
                'height': 350
            };
            var chart1 = new google.visualization.PieChart(document.getElementById('chart_div1'));
            chart1.draw(data, options1);

            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                @foreach ($top_categories as $category)
                    ['{{ $category->category_name }}',
                        {{ $category->total_amount }}
                    ],
                @endforeach
            ]);

            // Set chart options
            var options2 = {
                'title': 'Top Categories',
                'width': 350,
                'height': 350
            };
            var chart2 = new google.visualization.PieChart(document.getElementById('chart_div2'));
            chart2.draw(data, options2);

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn('number', 'Slices');
            data.addRows([
                @foreach ($most_active_categories as $category)
                    ['{{ $category->category_name }}',
                        {{ $category->record_count }}
                    ],
                @endforeach
            ]);

            // Set chart options
            var options3 = {
                'title': "Most Active Categories",
                'width': 350,
                'height': 350
            };
            var chart3 = new google.visualization.PieChart(document.getElementById('chart_div3'));
            chart3.draw(data,
                options3);

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn(
                'number', 'Slices');
            data.addRows([
                @foreach ($top_records_this_month as $record)
                    ['{{ $record->description }}', {{ $record->amount }}],
                @endforeach
            ]);

            // Set chart options
            var options5 = {
                'title': "Top Records This Month",
                'width': 350,
                'height': 350
            };
            var chart4 = new google.visualization.PieChart(document.getElementById('chart_div4'));
            chart4.draw(data,
                options5);

            // Create the data table.
            var data = new google.visualization.DataTable();
            data.addColumn('string', 'Topping');
            data.addColumn(
                'number', 'Slices');
            data.addRows([
                @foreach ($highest_spending_days as $day)
                    ['{{ $day->date }}', {{ $day->total_amount }}],
                @endforeach
            ]);

            // Set chart options
            var options5 = {
                'title': "Highest Spending Days",
                'width': 350,
                'height': 350
            };
            var chart5 = new google.visualization.PieChart(document.getElementById('chart_div5'));
            chart5.draw(data,
                options5);
        }
    </script>

    <!--end::Root-->
    <!--begin::Drawers-->
    <!--end::Drawers-->
    <!--end::Main-->
@endsection
