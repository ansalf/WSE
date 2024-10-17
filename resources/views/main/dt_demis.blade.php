@extends('layout.master2')
@section('judul', $data->nama)
@section('nav_demis', 'active')
@section('header', $data->nama)
@section('bg-divisi', $data->photo[0]->url)

@section('content')

<section class="ftco-section ftco-about">
  <div class="container">
    <div class="row no-gutters">

      <div id="carouselExampleControls"
        class="carousel slide col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
        data-bs-ride="carousel">
        <div class="carousel-inner">
          @foreach ($data->photo as $item)
          <div class="carousel-item active">
            <img src="{{$item->url}}" class="d-block w-100" alt="...">
          </div>
          @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>



      <div class="col-md-6 wrap-about ftco-animate">
        <div class="heading-section heading-section-white pl-md-5">
          <span class="subheading">Prestasi</span>
          <h2 class="mb-4">{{$data->nama}}</h2>

          @foreach ($data->prestasi as $item)
          <p>{{$item->title}} - {{$item->tahun}}</p>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</section>

@endsection