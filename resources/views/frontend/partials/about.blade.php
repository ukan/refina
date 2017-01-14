@extends('layout.frontend.master.master')

@section('title', 'About')

@section('page-header', '')

@section('breadcrumb')
    <ol class="breadcrumbs">
        <li><a href="{!! route('admin-dashboard') !!}"><i class="fa fa-home"></i></a></li>
        <li><a href="">Menu Management</a></li>
        
    </ol>
@endsection

@section('content')

{{ $upline_id }}

@endsection