@extends('layout.master2')
@section('judul', 'Demisioners - WORKSHOP ELEKTRO')
@section('nav_demis', 'active')
@section('header', 'Demisioners')
@section('bg-divisi', asset('main/bg-it.jpg'))

@section('content')

<section class="ftco-section ftco-about">
  <div class="container">
    <div class="row no-gutters">
      <div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center"
        style="background-image: url({{ asset('main/bg-it2.jpg') }});">
      </div>
      <div class="col-md-6 wrap-about ftco-animate">
        <div class="heading-section heading-section-white pl-md-5">
          <span class="subheading">#Demisioners</span>
          <h2 class="mb-4">Demisioners</h2>

          <p>Demisioners adalah istilah yang digunakan untuk merujuk kepada seseorang atau sekelompok orang yang telah
            menyelesaikan masa jabatannya dalam suatu organisasi atau kepengurusan. Setelah masa jabatan mereka
            berakhir, mereka tidak lagi aktif sebagai pengurus atau anggota dalam struktur organisasi tersebut, tetapi
            mereka tetap memiliki pengalaman dan pengetahuan yang bisa dibagikan kepada generasi penerus.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section testimony-section bg-light">
  <div class="container">
    <div class="row justify-content-center mb-5">
      <div class="col-md-7 text-center heading-section ftco-animate">
        <span class="subheading">Demisioners</span>
        <h2 class="mb-3">Beliau - Beliau</h2>
      </div>
    </div>
    <div class="row">
      @foreach ($demis as $dm)
      <div class="col-md-3">
        <div class="card-container">
          <div class="card mb-4">
            <img src="{{ $dm->photo[0]->url }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title name"><b>{{$dm->nama}}</b></h5>
              @foreach ($dm->prestasi as $pr)
                  <p>{{$pr->title}} - {{$pr->tahun}}</p>
              @endforeach
              <a href="{{ route('read-demis', ['id' => encrypt($dm->id)]) }}" class="btn btn-primary">Kunjungi</a>
            </div>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

@endsection