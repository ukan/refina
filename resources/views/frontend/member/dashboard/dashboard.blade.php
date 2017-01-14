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

	<h2 class="">Summary Reports</h2>
	<div class="row">
		<div class="col-md-12">
			<form class="form-horizontal form-bordered" action="#">
				<div class="form-group">
					<label class="col-md-10 control-label">filter by:</label>
					<div class="col-md-2">
						<select data-plugin-selectTwo class="form-control" onchange="location = this.value;">												
								<option value="{{ route('admin-dashboard-filter-member', ['filter' => "year"]) }}" @if($filter == "year") selected @endif>Year</option>
								<option value="{{ route('admin-dashboard-filter-member', ['filter' => "month"]) }}" @if($filter == "month") selected @endif>Month</option>
								<option value="{{ route('admin-dashboard-filter-member', ['filter' => "day"]) }}" @if($filter == "day") selected @endif>Day</option>													
						</select>
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading bg-primary">
					My Funnels Report 
				</div>
				<div class="panel-body">
					<h4>Best Seller</h4>
					<div class="row">
						<div class="col-md-6">	
					<div class="chart chart-md" id="flotDashBasic"></div>
					<script>
	
						var flotDashBasicData = {!! $funnelReport !!};			
	
						// See: assets/javascripts/dashboard/examples.dashboard.js for more settings.
	
					</script>
						</div>
						<div class="col-md-6">	
						<br>						
							<section class="panel panel-featured-left panel-featured-tertiary">
								<div class="panel-body">
									<div class="widget-summary">
										<div class="widget-summary-col widget-summary-col-icon">
											<div class="summary-icon bg-tertiary">
												<i class="fa fa-shopping-cart"></i>
											</div>
										</div>
										<div class="widget-summary-col">
											<div class="summary">
												<h4 class="title">Today's Orders</h4>
												<div class="info">
													<strong class="amount">{{ $todayOrders }}</strong>
												</div>
											</div>
											<div class="summary-footer">
												<a class="text-muted text-uppercase" id="to-order-summary">(statement)</a>
											</div>
										</div>
									</div>
								</div>
							</section>
							<section class="panel panel-featured-left panel-featured-quartenary">
								<div class="panel-body">
									<div class="widget-summary">
										<div class="widget-summary-col widget-summary-col-icon">
											<div class="summary-icon bg-quartenary">
												<i class="fa fa-user"></i>
											</div>
										</div>
										<div class="widget-summary-col">
											<div class="summary">
												<h4 class="title">Today's Visitors</h4>
												<div class="info">
													<strong class="amount">{{ $todayVisitors }}</strong>
												</div>
											</div>
											<div class="summary-footer">
												<a class="text-muted text-uppercase" id="to-affiliate-report">(report)</a>
											</div>
										</div>
									</div>
								</div>
							</section>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row" id="order-summary">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading bg-primary">
					Order Summary
				</div>
				<div class="panel-body">	
		            Legend : <br>
		            <span class="label" style="color:rgb(23,23,23);background-color:rgba(51,182,121,.5)">Transaction : Success</span>
		            <span class="label" style="color:rgb(23,23,23);background-color:rgba(155,184,153,.5)">Transaction : Pending</span>
		            <span class="label" style="color:rgb(23,23,23);background-color:rgba(218,56,56,.5)">Transaction : Failed</span>
		            <span class="label" style="color:rgb(23,23,23);background-color:rgba(251,203,67,.5)">Shipping : Already Sent</span>
		            <span class="label" style="color:rgb(23,23,23);background-color:rgba(66,133,244,.5)">Payment : Success</span>
		            <br><br>					
		            <table id="funnel-orders-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
		                <thead>
		                    <tr>
		                        <th class="center-align">Funnel Name</th>
		                        <th class="center-align">Code</th>
		                        <th class="center-align">Create At</th>
		                        <th class="center-align">Pay</th>
		                        <th class="center-align">Ship</th>
		                        <th class="center-align">Tran</th>
		                        <th class="center-align">Total</th>
		                        <th class="center-align">Admin Fee</th>
		                        <th class="center-align">Status Details</th>
		                        <th class="center-align">Date Details</th>                        
		                        <th class="center-align">Actions</th>
		                    </tr>
		                </thead>
		            </table>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading bg-primary">
					Funnel Usage
				</div>
				<div class="panel-body">
					<div class="col-lg-3 text-center">
						<h2 class="panel-title mt-md">Funnels</h2>
						<div class="liquid-meter-wrapper liquid-meter-sm mt-lg">
							<div class="liquid-meter">
								<meter min="0" max="100" value="{{ $funnel_limit_percent }}" id="meterFunnels"></meter>
							</div>
						</div>
						{{ get_funnel_status('funnel_limit') }}
					</div>							
					<div class="col-lg-3 text-center">
						<h2 class="panel-title mt-md">Pages</h2>
						<div class="liquid-meter-wrapper liquid-meter-sm mt-lg">
							<div class="liquid-meter">
								<meter min="0" max="100" value="{{ $page_limit_percent }}" id="meterPages"></meter>
							</div>
						</div>
						{{ get_funnel_status('page_limit') }}
					</div>							
					<div class="col-lg-3 text-center">
						<h2 class="panel-title mt-md">Subscribers</h2>
						<div class="liquid-meter-wrapper liquid-meter-sm mt-lg">
							<div class="liquid-meter">
								<meter min="0" max="100" value="{{ $subscriber_limit_percent }}" id="meterSubscribers"></meter>
							</div>
						</div>
						{{ get_funnel_status('subscriber_limit') }}
					</div>							
					<div class="col-lg-3 text-center">
						<h2 class="panel-title mt-md">Emails</h2>
						<div class="liquid-meter-wrapper liquid-meter-sm mt-lg">
							<div class="liquid-meter">
								<meter min="0" max="100" value="{{ $email_limit_percent }}" id="meterVisitors"></meter>
							</div>
						</div>
						{{ get_funnel_status('email_limit') }}
					</div>							
				</div>
			</div>
		</div>
	</div>
	
	<div class="row" id="affiliate-report">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading bg-primary">
					My Affiliate Report 
				</div>
				<div class="panel-body">
									<div class="panel-body">
										<span class='pull-right'>
											<span class='label' style='background-color:#734ba9'>Visitor</span>
											<span class='label' style='background-color:#0088cc'>Ghost (Leads)</span>
											<span class='label' style='background-color:#2baab1'>Customer</span>
										</span>									
										<!-- Morris: Line -->
										<div class="chart chart-md" id="visitor_statistics"></div>
										<script type="text/javascript">						
											var visitorStatistics = {!! $visitorReport !!};			
											// See: assets/javascripts/ui-elements/examples.charts.js for more settings.						
										</script>						
									</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading bg-primary">
					My Affiliate Commission (Summary)
				</div>
				<div class="panel-body">
					<section class="panel panel-featured-left panel-featured-secondary">
						<div class="panel-body">
							<div class="widget-summary">
								<div class="widget-summary-col widget-summary-col-icon">
									<div style="background-color:#FFD700 " class="summary-icon bg-secondary">
									<i style="color:#fff" class="fa fa-dot-circle-o"></i>
									</div>
								</div>
								<div class="widget-summary-col">
									<div class="summary">
										<h4 class="title">AVG Commission Per Month :</h4>
										<div class="info">
											<strong class="amount">{{ idr_format($commission,'null')}} Coin</strong> 
										</div>
									</div>
									<div class="summary-footer">
										<a href="coin/my-coin" class="text-muted text-uppercase">(withdraw)</a>
									</div>
								</div>
							</div>
						</div>
					</section>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading bg-primary">
					Bulletin Board
				</div>
				<div class="panel-body">										
					<div class="timeline timeline-simple mt-xlg mb-md" id="bulletin-boards-list">
						<div id="ajaxContent">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  <div class="modal fade modal-getstart" id="modalFormFunnelOrderDetails" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="" role="document" style="max-width:1027px;margin:10px auto">
      <div class="modal-content">
        <div class="modal-header bg-primary">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title FormFunnelOrderDetails-title" id="myModalLabel">Add</h4>
        </div>
        <div class="modal-body">
			<div class="order-details-area">
			</div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script type="text/javascript">
$( document ).ready(function() {
var Url = '/dashboard_ajax_bulletin_pagination';
$('#ajaxContent').load(Url);
});
</script>
    	{!! Html::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
    	{!! Html::script('assets/plugins/datatables/dataTables.bootstrap.min.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/jquery-appear/jquery-appear.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/bootstrap-multiselect/bootstrap-multiselect.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/flot/jquery.flot.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/flot.tooltip/flot.tooltip.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/flot/jquery.flot.pie.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/flot/jquery.flot.categories.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/flot/jquery.flot.resize.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/jquery-sparkline/jquery-sparkline.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/raphael/raphael.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/morris.js/morris.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/gauge/gauge.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/snap.svg/snap.svg.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/liquid-meter/liquid.meter.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/chartist/chartist.js') !!}
		<!-- Examples -->
		<style>
			#ChartistCSSAnimation .ct-series.ct-series-a .ct-line {
				fill: none;
				stroke-width: 4px;
				stroke-dasharray: 5px;
				-webkit-animation: dashoffset 1s linear infinite;
				-moz-animation: dashoffset 1s linear infinite;
				animation: dashoffset 1s linear infinite;
			}

			#ChartistCSSAnimation .ct-series.ct-series-b .ct-point {
				-webkit-animation: bouncing-stroke 0.5s ease infinite;
				-moz-animation: bouncing-stroke 0.5s ease infinite;
				animation: bouncing-stroke 0.5s ease infinite;
			}

			#ChartistCSSAnimation .ct-series.ct-series-b .ct-line {
				fill: none;
				stroke-width: 3px;
			}

			#ChartistCSSAnimation .ct-series.ct-series-c .ct-point {
				-webkit-animation: exploding-stroke 1s ease-out infinite;
				-moz-animation: exploding-stroke 1s ease-out infinite;
				animation: exploding-stroke 1s ease-out infinite;
			}

			#ChartistCSSAnimation .ct-series.ct-series-c .ct-line {
				fill: none;
				stroke-width: 2px;
				stroke-dasharray: 40px 3px;
			}

			@-webkit-keyframes dashoffset {
				0% {
					stroke-dashoffset: 0px;
				}

				100% {
					stroke-dashoffset: -20px;
				};
			}

			@-moz-keyframes dashoffset {
				0% {
					stroke-dashoffset: 0px;
				}

				100% {
					stroke-dashoffset: -20px;
				};
			}

			@keyframes dashoffset {
				0% {
					stroke-dashoffset: 0px;
				}

				100% {
					stroke-dashoffset: -20px;
				};
			}

			@-webkit-keyframes bouncing-stroke {
				0% {
					stroke-width: 5px;
				}

				50% {
					stroke-width: 10px;
				}

				100% {
					stroke-width: 5px;
				};
			}

			@-moz-keyframes bouncing-stroke {
				0% {
					stroke-width: 5px;
				}

				50% {
					stroke-width: 10px;
				}

				100% {
					stroke-width: 5px;
				};
			}

			@keyframes bouncing-stroke {
				0% {
					stroke-width: 5px;
				}

				50% {
					stroke-width: 10px;
				}

				100% {
					stroke-width: 5px;
				};
			}

			@-webkit-keyframes exploding-stroke {
				0% {
					stroke-width: 2px;
					opacity: 1;
				}

				100% {
					stroke-width: 20px;
					opacity: 0;
				};
			}

			@-moz-keyframes exploding-stroke {
				0% {
					stroke-width: 2px;
					opacity: 1;
				}

				100% {
					stroke-width: 20px;
					opacity: 0;
				};
			}

			@keyframes exploding-stroke {
				0% {
					stroke-width: 2px;
					opacity: 1;
				}

				100% {
					stroke-width: 20px;
					opacity: 0;
				};
			}
		</style>
		<script type="text/javascript">

	/*
	Liquid Meter
	*/
	$('#meterFunnels').liquidMeter({
		shape: 'circle',
		color: '#5BABE6',
		background: '#F9F9F9',
		fontSize: '24px',
		fontWeight: '600',
		stroke: '#F2F2F2',
		textColor: '#333',
		liquidOpacity: 0.9,
		liquidPalette: ['#333'],
		speed: 3000,
		animate: !$.browser.mobile
	});
	$('#meterPages').liquidMeter({
		shape: 'circle',
		color: '#1FCF6D',
		background: '#F9F9F9',
		fontSize: '24px',
		fontWeight: '600',
		stroke: '#F2F2F2',
		textColor: '#333',
		liquidOpacity: 0.9,
		liquidPalette: ['#333'],
		speed: 3000,
		animate: !$.browser.mobile
	});
	$('#meterSubscribers').liquidMeter({
		shape: 'circle',
		color: '#E87E04',
		background: '#F9F9F9',
		fontSize: '24px',
		fontWeight: '600',
		stroke: '#F2F2F2',
		textColor: '#333',
		liquidOpacity: 0.9,
		liquidPalette: ['#333'],
		speed: 3000,
		animate: !$.browser.mobile
	});
	$('#meterVisitors').liquidMeter({
		shape: 'circle',
		color: '#EA4B36',
		background: '#F9F9F9',
		fontSize: '24px',
		fontWeight: '600',
		stroke: '#F2F2F2',
		textColor: '#333',
		liquidOpacity: 0.9,
		liquidPalette: ['#333'],
		speed: 3000,
		animate: !$.browser.mobile
	});

	/*
	Flot: Basic
	*/
	var flotDashBasic = $.plot('#flotDashBasic', flotDashBasicData, {
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

	Morris.Line({
		resize: true,
		element: 'visitor_statistics',
		data: visitorStatistics,
		xkey: 'y',
		parseTime:false,
		ykeys: ['a','b','c'],
		labels: ['Visitor','Ghost (Leads)','Customer'],
		hideHover: true,
		lineColors: ['#734ba9','#0088cc','#2baab1']
		});

	</script>
       
    <script type="text/javascript">
        $(document).ready(function() {

        });
            var table = $('#funnel-orders-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{!! route('datatables-dashboard-funnel-orders') !!}",
                columns: [
                    {data: 'funnel_name', name: 'funnel_name'},
	                {data: 'id', name: 'id'},
	                {data: 'created_at', name: 'created_at',visible:false},
	                {data: 'payment_status', name: 'payment_status',visible:false},
	                {data: 'shipping_status', name: 'shipping_status',visible:false},
	                {data: 'transaction_status', name: 'transaction_status',visible:false},
	                {data: 'funnel_id', name: 'funnel_id'},
	                {data: 'admin_fee', name: 'admin_fee'},
	                {data: 'status_details', name: 'status_details'},           
	                {data: 'date_details', name: 'date_details'},
                    {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false}
                ],
	            order: [[ 2, "desc" ]],          
	            rowCallback: function( nRow, aData, iDisplayIndex, iDisplayIndexFull ) {
	                if(aData['transaction_status'] == 'Success' || aData['transaction_status'] == 'Success (accepted)'){
	                    $(nRow).css('background-color', 'rgba(51,182,121,.5)')
	                    $(nRow).css('color', 'rgb(23,23,23)')
	                }else if(aData['shipping_status'] == 'Already Sent'){
	                    $(nRow).css('background-color', 'rgba(251,203,67,.5)')
	                    $(nRow).css('color', 'rgb(23,23,23)')
	                }else if(aData['payment_status'] == 'Success Payment'){
	                    $(nRow).css('background-color', 'rgba(66,133,244,.5)')
	                    $(nRow).css('color', 'rgb(23,23,23)')
	                }else if(aData['transaction_status'] == 'Failed' || aData['transaction_status'] == 'Pending (rejected)'){
	                    $(nRow).css('background-color', 'rgba(218,56,56,.5)')
	                    $(nRow).css('color', 'rgb(23,23,23)')
	                }else if(aData['transaction_status'] == 'Pending'){
	                    $(nRow).css('background-color', 'rgba(155,184,153,.5)')
	                    $(nRow).css('color', 'rgb(23,23,23)')
	                }                
	            },
            });

        function show_order_details(id){
            $.ajax({
                type: "POST",
                url: "{{ route('member-funnel-orders-post') }}",
                data: {
                    'id': id,
                    'action' : 'show_order_details'
                },
                dataType : 'json',
                success: function(response)
                {
                    $("#modalFormFunnelOrderDetails").modal("show");
                    $(".FormFunnelOrderDetails-title").html(response.order_details_title);
                    $(".order-details-area").html(response.order_details_area);
                    $(".btn-print").attr("onclick",response.script_action_print);
                }
            });
        }
        $("#to-order-summary").click(function() {
		    $('html, body').animate({
		        scrollTop: $("#order-summary").offset().top
		    }, 2000);
		});
		$("#to-affiliate-report").click(function() {
		    $('html, body').animate({
		        scrollTop: $("#affiliate-report").offset().top
		    }, 2000);
		});
	</script>
@endsection

@section('header')
		{!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
		{!! Html::style('assets/backend/porto-admin/vendor/morris.js/morris.css') !!}
		{!! Html::style('assets/backend/porto-admin/vendor/chartist/chartist.min.css') !!}

@endsection