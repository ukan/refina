@extends('layout.backend.admin.master.master')

@section('title', 'Dashboard')

@section('page-header', 'Dashboard')

@section('breadcrumb')
	<ol class="breadcrumbs">
	  <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
	  <li><span>Dashboard</span></li>
	</ol>
@endsection

@section('content')
	<div class="panel panel-default">
		<div class="panel-heading bg-primary">
			<h5> Ticket Statistic Report</h5>
		</div>
		<div class="panel-body">
			<div class="row">
				<div class="col-md-12">
					<div class="chart chart-md" id="FlotTicketStatistic"></div>
					<script>
						var FlotTicketStatisticData = {!! $JsonChartTicketStatistic !!};
					</script>
				</div>
				<div class="col-md-12">
				{!! $ContentDataTicketStatistic !!}
				</div>
			</div>
		</div>
	</div>
@endsection

@section('header')

@endsection
@section('scripts')

    <!-- <script type="text/javascript">
		$( document ).ready(function() {
		var Url = '/admin/admin_dashboard_ajax_bulletin_pagination';
		$('#BulletinBoardsListContent').load(Url);
		});
	</script> -->
    {!! Html::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.bootstrap.min.js') !!}
    {!! Html::script('assets/plugins/bootstrap-validator/bootstrap-validator.js') !!}
    {!! Html::script('assets/general/library/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') !!}
    {!! Html::script('assets/general/library/tableExport.jquery.plugin/tableExport.js') !!}
    {!! Html::script('assets/general/library/tableExport.jquery.plugin/jquery.base64.js') !!}

    <script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>

    {!! Html::script('assets/backend/porto-admin/vendor/flot/jquery.flot.js') !!}
    {!! Html::script('assets/backend/porto-admin/vendor/flot.tooltip/flot.tooltip.js') !!}
    {!! Html::script('assets/backend/porto-admin/vendor/flot/jquery.flot.pie.js') !!}
    {!! Html::script('assets/backend/porto-admin/vendor/flot/jquery.flot.categories.js') !!}
    {!! Html::script('assets/backend/porto-admin/vendor/flot/jquery.flot.resize.js') !!}
    <script type="text/javascript">
		/*
		Flot: Basic
		*/
		var FlotTicketStatistic = $.plot('#FlotTicketStatistic', FlotTicketStatisticData, {
			series: {
				lines: {
					show: true,
					fill: true,
					lineWidth: 1,
					fillColor: {
						colors: [{
							opacity: 0.45
						}, {
							opacity: 0.45
						}]
					}
				},
				points: {
					show: true
				},
				shadowSize: 0
			},
			grid: {
				hoverable: true,
				clickable: true,
				borderColor: 'rgba(0,0,0,0.1)',
				borderWidth: 1,
				labelMargin: 15,
				backgroundColor: 'transparent'
			},
			yaxis: {
				min: 0,
				color: 'rgba(0,0,0,0.1)'
			},
			xaxis: {
				color: 'rgba(0,0,0,0)'
			},
			tooltip: true,
			tooltipOpts: {
				content: '%s: Value of %x is %y',
				shifts: {
					x: -60,
					y: 25
				},
				defaultTheme: false
			}
		});

	    $(".yearmonth").datepicker( {
	        format: "mm-yyyy",
	        viewMode: "months",
	        minViewMode: "months"
	    });
    </script>
@endsection