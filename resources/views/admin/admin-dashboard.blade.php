@extends('layouts.backend-layout')

@section('sidebar')
    @include('admin.components.admin-sidebar')
@endsection

@section('topbar')
    @include('components.employer.topbar')
@endsection

@section('main-section')
    @include('admin.main-page.dashboard')
@endsection


