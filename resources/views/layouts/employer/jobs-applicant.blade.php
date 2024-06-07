@extends('layouts.backend-layout')

@section('sidebar')
    @include('components.employer.sidebar')
@endsection

@section('topbar')
    @include('components.employer.topbar')
@endsection

@section('main-section')
    @include('components.employer.emp-applicant')
@endsection
