<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link href="{{asset('img/favicon.144x144.png')}}" rel="apple-touch-icon" type="image/png" sizes="144x144">
    <link href="{{asset('img/favicon.114x114.png')}}" rel="apple-touch-icon" type="image/png" sizes="114x114">
    <link href="{{asset('img/favicon.72x72.png')}}" rel="apple-touch-icon" type="image/png" sizes="72x72">
    <link href="{{asset('img/favicon.57x57.png')}}" rel="apple-touch-icon" type="image/png">
    <link href="{{asset('img/favicon.png')}}" rel="icon" type="image/png">
    <link href="{{asset('img/favicon.ico')}}" rel="shortcut icon">
    <link rel="stylesheet" href="{{asset('css/lib/lobipanel/lobipanel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/separate/vendor/lobipanel.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/lib/jqueryui/jquery-ui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/separate/pages/widgets.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/lib/font-awesome/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/separate/vendor/tags_editor.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/separate/vendor/bootstrap-select/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/separate/vendor/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/lib/bootstrap/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <link rel="stylesheet" href="{{asset('js/lib/datatables/media/css/dataTables.bootstrap4.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/lib/sweet-alert/sweetalert.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/lib/summernote/summernote.css')}}"/>
    <link rel="stylesheet" href="{{asset('css/separate/pages/editor.min.css')}}">
</head>
<body class="with-side-menu control-panel control-panel-compact">

@include('dashboard.layouts.header')
<div class="mobile-menu-left-overlay"></div>
@include('dashboard.layouts.sidebar')
<div class="page-content">
    @yield('content')
</div>

<script src="{{asset('js/lib/jquery/jquery.min.js')}}"></script>
<script src="{{asset('js/lib/tether/tether.min.js')}}"></script>
<script src="{{asset('js/lib/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins.js')}}"></script>

<script type="text/javascript" src="{{asset('js/lib/jqueryui/jquery-ui.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/lib/lobipanel/lobipanel.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/lib/match-height/jquery.matchHeight.min.js')}}"></script>
<script type="text/javascript" src="{{asset('https://www.gstatic.com/charts/loader.js')}}"></script>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.4.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="{{asset('js/lib/datatables/media/js/dataTables.bootstrap4.js')}}"></script>

<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.flash.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.4.2/js/buttons.html5.min.js"></script>

<script src="{{asset('js/lib/sweet-alert/sweetalert.min.js')}}"></script>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="{{asset('js/lib/jquery-tag-editor/jquery.caret.min.js')}}"></script>
<script src="{{asset('js/lib/jquery-tag-editor/jquery.tag-editor.min.js')}}"></script>
<script src="{{asset('js/lib/bootstrap-select/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/lib/select2/select2.full.min.js')}}"></script>
<script src="{{asset('js/lib/summernote/summernote.min.js')}}"></script>
	<script>
		$(document).ready(function() {
			$('.summernote').summernote();
		});
	</script>


<script type="application/javascript">
    var APP_URL = {!! json_encode(url('/')) !!}
    function deleteThisItem(e) {
        var link = $(e).data('link');
        swal({
                title: "Are you sure?",
                text: "You will not be able to recover this Item Again!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, do it!",
                closeOnConfirm: false
            },
            function () {
                window.location = link;
            });
    }
</script>
<script>
    $(document).ready(function () {
        $('.panel').lobiPanel({
            sortable: true
        });
        $('.panel').on('dragged.lobiPanel', function (ev, lobiPanel) {
            $('.dahsboard-column').matchHeight();
        });

        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var dataTable = new google.visualization.DataTable();
            dataTable.addColumn('string', 'Day');
            dataTable.addColumn('number', 'Values');
            // A column for custom tooltip content
            dataTable.addColumn({type: 'string', role: 'tooltip', 'p': {'html': true}});
            dataTable.addRows([
                ['MON', 130, ' '],
                ['TUE', 130, '130'],
                ['WED', 180, '180'],
                ['THU', 175, '175'],
                ['FRI', 200, '200'],
                ['SAT', 170, '170'],
                ['SUN', 250, '250'],
                ['MON', 220, '220'],
                ['TUE', 220, ' ']
            ]);

            var options = {
                height: 314,
                legend: 'none',
                areaOpacity: 0.18,
                axisTitlesPosition: 'out',
                hAxis: {
                    title: '',
                    textStyle: {
                        color: '#fff',
                        fontName: 'Proxima Nova',
                        fontSize: 11,
                        bold: true,
                        italic: false
                    },
                    textPosition: 'out'
                },
                vAxis: {
                    minValue: 0,
                    textPosition: 'out',
                    textStyle: {
                        color: '#fff',
                        fontName: 'Proxima Nova',
                        fontSize: 11,
                        bold: true,
                        italic: false
                    },
                    baselineColor: '#16b4fc',
                    ticks: [0, 25, 50, 75, 100, 125, 150, 175, 200, 225, 250, 275, 300, 325, 350],
                    gridlines: {
                        color: '#1ba0fc',
                        count: 15
                    },
                },
                lineWidth: 2,
                colors: ['#fff'],
                curveType: 'function',
                pointSize: 5,
                pointShapeType: 'circle',
                pointFillColor: '#f00',
                backgroundColor: {
                    fill: '#008ffb',
                    strokeWidth: 0,
                },
                chartArea: {
                    left: 0,
                    top: 0,
                    width: '100%',
                    height: '100%'
                },
                fontSize: 11,
                fontName: 'Proxima Nova',
                tooltip: {
                    trigger: 'selection',
                    isHtml: true
                }
            };

            var chart = new google.visualization.AreaChart(document.getElementById('chart_div'));
            chart.draw(dataTable, options);
        }

        $(window).resize(function () {
            drawChart();
            setTimeout(function () {
            }, 1000);
        });
        $('#dTable').DataTable();

        $('.addImage').on('click', function () {
            if ($('.newImage').length < 16) {
                $('.files').append('<br><input type="file" name="files[]" id="image"  class="form-control newImage" accept="image/*">');
            } else {
                alert('You Can not Add More then 16 Images');
            }
        });
    });
</script>

@yield('scripts')
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>
