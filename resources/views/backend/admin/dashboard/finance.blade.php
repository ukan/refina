@extends('layout.backend.admin.master.master')

@section('title', 'Dashboard')

@section('page-header', 'Dashboard')

@section('breadcrumb')
	<ol class="breadcrumbs">
	  <li>
	      <a href="#">
	          <i class="fa fa-home"></i> Home
	      </a>
	  </li>
	  <li><span>Dashboard</span></li>
	</ol>
@endsection

@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			Transaction Member
		</div>
		<div class="panel-body">
			<div class="chart chart-md" id="flotPie"></div>
            <script type="text/javascript">

                var flotPieData = {!! $TransactionChartPie !!};

                // See: assets/javascripts/ui-elements/examples.charts.js for more settings.

            </script>
            <br>
            <table id="transaction-historys-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                <thead>
                    <tr>
                        <th class="center-align">Member Id</th>
                        <th class="center-align">No Transaction</th>
                        <th class="center-align">Transaction</th>
                        <th class="center-align">Value</th>
                        <th class="center-align">Admin Fee</th>
                        <th class="center-align">Date</th>
                        <th class="center-align">Payment</th>
                        <th class="center-align">Status</th>
                    </tr>
                </thead>
            </table>
		</div>
	</div>
@endsection

@section('header')

    {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}
    <link media="all" type="text/css" rel="stylesheet" href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
    <style type="text/css">
        tfoot input {
        width: 100%;
        padding: 3px;
        box-sizing: border-box;
    }
    </style>
@endsection
@section('scripts')
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

<script type="text/javascript">
   var transaction_history_table = $('#transaction-historys-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
            url : "{!! route('datatables-finance-dashboard-transaction') !!}",
            data: function ( d ) {
               d.filter_start = $( 'input[name=filter_start]').val();
               d.filter_end = $( 'input[name=filter_end]' ).val();
            }
        },
        order: [[ 5, "desc" ]],
        columns: [
            {data: 'member_id', name: 'member_id'},
            {data: 'order_id', name: 'order_id'},
            {data: 'code', name: 'code'},
            {data: 'value', name: 'value'},
            {data: 'admin_fee', name: 'admin_fee'},
            {data: 'created_at', name: 'created_at'},
            {data: 'payment_method', name: 'payment_method'},
            {data: 'status', name: 'status'},

        ],
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print',{
            text: 'Text',
            action: function ( e, dt, node, config ) {
                $('#transaction-historys-table').tableExport({type:'txt',escape:'false',tableName:'Transaction-History'});
            }
        }
        ]
    });
   $("#transaction-historys-table").append('<tfoot></tfoot>');
    $('#transaction-historys-table tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );
       transaction_history_table.columns().every( function () {
        var that = this;

        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );
    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
    $('.datepicker').on('change',function(){
        filter_start = $( 'input[name=filter_start]').val();
        filter_end = $( 'input[name=filter_end]' ).val();
        $("[name='link_top_up_coin_transaction_history_export_to_text']").val("{{ URL::to('coin/export') }}/txt/top_up_coin_transaction_history/"+filter_start+"/"+filter_end);
        if(filter_start != '' && filter_end != ''){
            transaction_history_table.draw();
        }
    });
</script>

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
        {!! Html::script('assets/backend/porto-admin/vendor/flot/jquery.flot.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/flot.tooltip/flot.tooltip.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/flot/jquery.flot.pie.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/flot/jquery.flot.categories.js') !!}
        {!! Html::script('assets/backend/porto-admin/vendor/flot/jquery.flot.resize.js') !!}
<script type="text/javascript">


    /*
    Flot: Pie
    */
    (function() {
        var plot = $.plot('#flotPie', flotPieData, {
            series: {
                pie: {
                    show: true,
                    combine: {
                        color: '#999',
                        threshold: 0.1
                    }
                }
            },
            legend: {
                show: false
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });
    })();


</script>
@endsection
