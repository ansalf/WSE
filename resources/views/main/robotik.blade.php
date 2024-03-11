@extends('layout.master2')
@section('judul', 'ROBOTIK - WORKSHOP ELEKTRO')
@section('nav_robotik', 'active')
@section('header', 'Divisi Robotik')
@section('bg-divisi', asset('main/bg-robotik.jpg'))

@section('content')

    <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset('main/bg-robotik2.jpg') }});">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	<span class="subheading"># ROBOTIK Juara</span>
	            <h2 class="mb-4">Divisi ROBOTIK</h2>

	            <p>Divisi Robotik Mengembangkan minat dan bakat mahasiswa Elektro dalam bidang Robotika di antara Robot yang di kembangkan.Robot Line Follower yang di ikutkan pada ajang Perlombaan Tingkat Regional maupun Nasional, selain itu juga mengembangkan Robot yang di konteskan dan di selenggarakan Oleh DIKTI yaitu robot KRPAI (Kontes Robot Pemadam Api Indonesia) Berkaki, KRPAI Beroda, KRAI (Kontes Robot Abu Robocon ) dan KRSI (Kontes Robot Seni Indonesia). Pada divisi ini sharing wajib dilakukan dalam seminggu sekali. </p>
	            <p>Divisi Robotik memiliki kegiatan Workshop Robotika yang diselenggarakan pada setiap tahunnya, selain itu ada kegiatan lainnya yaitu Lomba dan Sharing.</p>
	          </div>
					</div>
				</div>
			</div>
		</section>

    <section class="ftco-section testimony-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5">
          <div class="col-md-7 text-center heading-section ftco-animate">
            <span class="subheading">PROKER</span>
            <h2 class="mb-3">Program Kerja</h2>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-9">
            <div class="card-container">
              <div class="card mb-4">
                <img src="{{ asset('main/ltdc.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title name"><b>LTDC</b></h5>
                  <p class="card-text">LTDC (Line Tracer Design and Contest) adalah lomba di bidang robotika yang diikuti oleh berbagai peserta baik tingkat SD sampai mahasiswa yang datang dari penjuru Nusantara untuk berlomba mengadu skill robot dan desainnya.</p>
                  <a href="https://www.instagram.com/ltdc_wseum/" class="btn btn-primary">Kunjungi</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection