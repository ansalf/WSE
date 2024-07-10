@extends('Admin.Layouts.master')

@section('title', 'Dashboard')

@section('content-header')
    <h1>Dashboard</h1>
@endsection

@section('content-body')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-primary">
          <i class="far fa-user"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Total Admin</h4>
          </div>
          <div class="card-body">
            {{$users}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-danger">
          <i class="far fa-newspaper"></i>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>News</h4>
          </div>
          <div class="card-body">
            {{$news}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-warning">
          <h4 class="fa fa-user-secret text-white"></h4>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Demisioners</h4>
          </div>
          <div class="card-body">
            {{$demis}}
          </div>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
      <div class="card card-statistic-1">
        <div class="card-icon bg-success">
          <h4 class="fa fa-database text-white"></h4>
        </div>
        <div class="card-wrap">
          <div class="card-header">
            <h4>Used Storage</h4>
          </div>
          <div class="card-body">
            {{$storage}}
          </div>
        </div>
      </div>
    </div>                  
  </div>
@endsection