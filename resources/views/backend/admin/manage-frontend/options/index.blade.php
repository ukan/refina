@extends('layout.backend.admin.master.master')

@section('title', 'Options')

@section('breadcrumb')
    <ol class="breadcrumbs">
        <li><a href="{!! action('Backend\Admin\DashboardController@index') !!}"><i class="fa fa-home"></i> Home</a></li>
        <li><span>Options</span></li>
    </ol>
@endsection

@section('header')
    {!! Html::style('assets/plugins/datatables/dataTables.bootstrap.css') !!}

    <style>
        .center-align {
            text-align: center;
        }
    </style>
@endsection

@section('page-header', 'Manage Option')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Manage Option</h3>
        </div>
        <div class="panel-body">
            @include('flash::message')
            <br><br>
            <table id="options-table" class="table table-hover table-bordered table-condensed table-responsive" data-tables="true">
                <thead>
                    <tr>
                        <th class="center-align">Name</th>
                        <th class="center-align">Value</th>
                        <th width="12%">&nbsp;</th>
                    </tr>
                </thead>
            </table>
        </div>
    </div>
    <div id="getFormEditModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Edit Option</h4>
      </div>
      <div class="modal-body" id="getContentFormEditModal">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
@endsection

@section('scripts')
    {!! Html::script('assets/plugins/datatables/jquery.dataTables.min.js') !!}
    {!! Html::script('assets/plugins/datatables/dataTables.bootstrap.min.js') !!}

    <script>
        $(document).ready(function() {
            $('#options-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{!! route('datatables-options') !!}",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'value', name: 'value'},
                    {data: 'action', name: 'action', class: 'center-align', searchable: false, orderable: false}
                ]
            });

        });
        function show_form_edit_options(id){
            $.ajax({
                type: "POST",
                url: "{{ route('admin-show-form-edit-options') }}",
                data: {
                    'id': id
                },
                success: function(msg)
                {
                    $("#getFormEditModal").modal("show");
                    $("#getContentFormEditModal").html(msg);
                }
            });
        }
    </script>
    @include('backend.delete-modal-datatables')
@endsection