@extends('layout.master2')
@section('judul', $data->judul)
@section('nav_index', 'active')
@section('header', $data->judul)
@section('bg-divisi', $data->thumbnail->url)

@section('content')

<section class="ftco-section ftco-about">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
        style="background-image: url({{ $data->thumbnail->url }});">
      </div>
      <div class="col-md-6 wrap-about ftco-animate">
        <div class="heading-section heading-section-white pl-md-5">
          <span class="subheading">News</span>
          <h2 class="mb-4">{{$data->judul}}</h2>

          {{$data->isi_berita}}
        </div>
      </div>
    </div>
  </div>
</section>

@endsection