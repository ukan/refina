@extends('layout.backend.admin.master.master')

@section('title')
    {{trans('general.manage_page')}} - {{ trans('general.faq') }}
@endsection


@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ trans('general.faq') }} {{ trans('general.page') }}</h3>
                </div>
                {!! Form::open(array('url' => route('admin-post-update-faq'),'method'=>'POST','id'=>'form-faq')) !!}
                    <div class="panel-body">
                        <div class="error"></div>
                            <div class="form-group{{ Form::hasError('description') }} description">
                                {!! Form::textarea('description', old('description'), ['class' => 'form-control tinymce','rows'=>'15']) !!}
                                {!! Form::errorMsg('description') !!}
                            </div>
                    </div>
                    <div class="panel-footer">
                        <a href="{{ route('admin-index-event') }}" class="btn btn-default">{{ trans('general.button_cancel') }}</a>
                        <input class="btn btn-primary" title="{{ trans('general.button_publish') }}" type="button" value="{{ trans('general.button_publish') }}" id="button_submit">
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@include('backend.admin.manage_page.script.form_script')