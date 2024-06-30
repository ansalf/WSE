@extends('Admin.Layouts.master')

@section('title', 'Master Users')

@section('content-header')
    <h1>Master Users</h1>
@endsection

@section('content-body')
  @include('Admin.Pages.Masters.Users.datatable')
@endsection
