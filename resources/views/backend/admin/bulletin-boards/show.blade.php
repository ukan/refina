@section('content')
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h5>Edit Bulletin Board</h5>
			</div>
			<div class="panel-body">
				{!! Form::model($bulletin_board, ['route' => array('admin-update-bulletin-board', $bulletin_board->id), 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form', 'files'=>'true']) !!}
				@if ($bulletin_board->img_url != "")
						<div class="form-group">
							<div class="col-lg-3"></div>
							<div class="col-lg-9">
								{!! Html::image(URL::asset('storage/'.$bulletin_board->img_url), '',['class' => 'img-responsive','style' => 'max-width:100px']) !!}
							</div>
						</div>
				@endif
				<div class="form-group">
					{!! Form::label('img_url', 'Choose an image', array('class' => 'col-lg-3 control-label')) !!}
					<div class="col-lg-9">
						{!! Form::file('img_url', array('class' => 'form-control')) !!}
						{!! $errors->first('img_url') !!}
					</div>
				</div>
				<div class="form-group">
					{!! Form::label('title', 'Title', array('class' => 'col-lg-3 control-label')) !!}
					<div class="col-lg-9">
						{!! Form::text('title', null, array('class' => 'form-control col-lg-8', 'autofocus' => 'true')) !!}
						{!! $errors->first('title') !!}
					</div>
					<div class="clear"></div>
				</div>
				<div class="form-group">
					{!! Form::label('description', 'Description', array('class' => 'col-lg-3 control-label')) !!}
					<div class="col-lg-9">
						{!! Form::textarea('description', null, array('class' => 'form-control')) !!}
						{!! $errors->first('description') !!}
					</div>
					<div class="clear"></div>
				</div>
				<div class="form-group">
					{!! Form::label('author', 'Member Level', array('class' => 'col-lg-3 control-label')) !!}
					<div class="col-lg-9">
						@if($bulletin_board->plan_id == '0')
							{{ Form::radio('plan_id', '0',true) }} All<br>
						@else
							{{ Form::radio('plan_id', '0') }} All<br>
						@endif
						@if($bulletin_board->plan_id == '1')
							{{ Form::radio('plan_id', '1',true) }} Ghost<br>
						@else
							{{ Form::radio('plan_id', '1') }} Ghost<br>
						@endif
						@if($bulletin_board->plan_id == '2')
							{{ Form::radio('plan_id', '2',true) }} Pro<br>
						@else
							{{ Form::radio('plan_id', '2') }} pro<br>
						@endif
						@if($bulletin_board->plan_id == '3')
							{{ Form::radio('plan_id', '3',true) }} Master<br>
						@else
							{{ Form::radio('plan_id', '3') }} master<br>
						@endif
						@if($bulletin_board->plan_id == '4')
							{{ Form::radio('plan_id', '4',true) }} Guru
						@else
							{{ Form::radio('plan_id', '4') }} Guru
						@endif
						{!! $errors->first('plan_id') !!}
					</div>
					<div class="clear"></div>
				</div>
				<div class="form-group">
					{!! Form::label('author', 'Contributor', array('class' => 'col-lg-3 control-label')) !!}
					<div class="col-lg-9">
						{!! Form::text('contributor', null, array('class' => 'form-control')) !!}
						{!! $errors->first('contributor') !!}
					</div>
					<div class="clear"></div>
				</div>
				<div class="form-group">
					{!! Form::label('link_url', 'Link Url', array('class' => 'col-lg-3 control-label')) !!}
					<div class="col-lg-9">
						{!! Form::text('link_url', null, array('class' => 'form-control')) !!}
						{!! $errors->first('link_url') !!}
					</div>
					<div class="clear"></div>
				</div>
				<div class="form-group">
					{!! Form::label('publish_status', 'Publish', array('class' => 'col-lg-3 control-label')) !!}
					<div class="col-lg-9">
						<div class="switch switch-lg switch-primary">
							@if($bulletin_board->publish_status == 'on')
							<input type="checkbox" name="publish_status" data-plugin-ios-switch checked="checked" />
							@else
							<input type="checkbox" name="publish_status" data-plugin-ios-switch />
							@endif
						</div>						
						{!! $errors->first('publish_status') !!}
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
