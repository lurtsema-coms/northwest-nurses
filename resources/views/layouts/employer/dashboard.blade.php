@extends('layouts.backend-layout')

@section('sidebar')
    @include('components.employer.sidebar')
@endsection

@section('topbar')
    @include('components.employer.topbar')
@endsection

@section('module-section')
Patrick
@endsection

@section('main-section')
    @include('components.employer.dashboard')
@endsection
