@extends('layout.backend.admin.master.master')

@section('title', 'Craete Bulletin Board')

@section('breadcrumb')
    <ol class="breadcrumbs">
        <li><a href="{!! action('Backend\Admin\DashboardController@index') !!}"><i class="fa fa-home"></i> Home</a></li>
        <li><a href="{!! route('admin-index-bulletin-board') !!}"><span> Manage Bulletin Board</span></a></li>
        <li><span>Create</span></li>
    </ol>
@endsection

@section('page-header', 'Create Bulletin Board')

@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h5>Create Bulletin Board</h5>
			</div>
			<div class="panel-body">
				{!! Form::open(['route'=>'admin-post-bulletin-board', 'files'=>true, 'class' => 'form-horizontal']) !!}
				<div class="form-group">
					{!! Form::label('img_url', 'Choose an image', array('class' => 'col-lg-3 control-label')) !!}
					<div class="col-lg-9">
						{!! Form::file('img_url', array('class' => '')) !!}
						<p class="has-error text-danger">{!! $errors->first('img_url') !!}</p>
					</div>
				</div>
				<div class="form-group">
                    <label class="col-md-3 control-label">Title <b class="text-danger">*</b></label>
					<div class="col-lg-9">
						{!! Form::text('title', null, array('class' => 'form-control col-lg-8', 'autofocus' => 'true')) !!}
						<p class="has-error text-danger">{!! $errors->first('title') !!}</p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="form-group">
                    <label class="col-md-3 control-label">Description <b class="text-danger">*</b></label>
					<div class="col-lg-9">
						{!! Form::textarea('description', null, array('class' => 'ckeditor')) !!}
						<p class="has-error text-danger">{!! $errors->first('description') !!}</p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="form-group">
					{!! Form::label('author', 'Plan', array('class' => 'col-lg-3 control-label')) !!}
					<div class="col-lg-9">
						{{ Form::radio('plan_id', '0', true) }} All<br>
						  	@foreach($plan as $row)
								{{ Form::radio('plan_id', $row['id']) }} {{ $row['name'] }}<br>
                        	@endforeach
						<p class="has-error text-danger">{!! $errors->first('plan_id') !!}</p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="form-group">
					{!! Form::label('author', 'Contributor', array('class' => 'col-lg-3 control-label')) !!}
					<div class="col-lg-9">
						{!! Form::text('contributor', null, array('class' => 'form-control')) !!}
						<p class="has-error text-danger">{!! $errors->first('contributor') !!}</p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="form-group">
					{!! Form::label('link_url', 'Link Url', array('class' => 'col-lg-3 control-label')) !!}
					<div class="col-lg-9">
						{!! Form::text('link_url', null, array('class' => 'form-control')) !!}
						<p class="has-error text-danger">{!! $errors->first('link_url') !!}</p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="form-group">
					{!! Form::label('publish_status', 'Publish', array('class' => 'col-lg-3 control-label')) !!}
					<div class="col-lg-9">
						<div class="switch switch-lg switch-primary">
							<input type="checkbox" name="publish_status" data-plugin-ios-switch checked="checked" />
						</div>						
						<p class="has-error text-danger">{!! $errors->first('publish_status') !!}</p>
					</div>
					<div class="clear"></div>
				</div>
				<div class="form-group">
					<div class="col-lg-3"></div>
					<div class="col-lg-9">
						{!! Form::submit('Save', array('class' => 'btn btn-primary btn-raised')) !!}
					</div>
					<div class="clear"></div>
				</div>
				{!! Form::close() !!}
			</div>
		</div>
	</div>
</div>
@endsection


@section('scripts')

<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script src="/vendor/unisharp/laravel-ckeditor/adapters/jquery.js"></script>
{!! Html::script('assets/general/library/ckeditor/ckeditor.init.js') !!}


@endsection