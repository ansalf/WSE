@extends('layout.master2')
@section('judul', 'IT - WORKSHOP ELEKTRO')
@section('nav_it', 'active')
@section('header', 'Divisi IT')
@section('bg-divisi', asset('main/bg-it.jpg'))

@section('content')

    <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset('main/bg-it2.jpg') }});">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
              <span class="subheading"># IT SWAG</span>
	            <h2 class="mb-4">Divisi IT</h2>
              
	            <p>Divisi IT Mengembangkan minat dan bakat mahasiswa Elektro dalam bidang IT yaitu Programing, Desain, Multimedia. Pelatihan-pelatihan augmented reality, Android application package file (APK) dan membantu divisi Robotik dalam mengembangkan Robot-robotnya. </p>
	            <p>Divisi IT juga memiliki kegiatan lain seperti Sharing, lomba, workshop IT, dan Gemastk.</p>
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
        <div class="row">
          <div class="col-md-6">
            <div class="card-container">
              <div class="card mb-4">
                <img src="{{ asset('main/gemastik.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title name"><b>GEMASTIK</b></h5>
                  <p class="card-text">Gemastik adalah singkatan dari Pagelaran Mahasiswa Nasional Bidang Teknologi Informasi dan Komunikasi, merupakan program Pusat Prestasi Nasional, Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi.</p>
                  <a href="https://www.instagram.com/gemastikum/" class="btn btn-primary">Kunjungi</a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="card-container">
              <div class="card mb-4">
                <img src="{{ asset('main/lidm.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title name"><b>LIDM</b></h5>
                  <p class="card-text">LIDM adalah singkatan dari Lomba Inovasi Digital Mahasiswa, merupakan program Pusat Prestasi Nasional, Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi.</p>
                  <a href="https://linktr.ee/lidmum2023" class="btn btn-primary">Kunjungi</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection