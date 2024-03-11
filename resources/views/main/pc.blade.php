@extends('layout.master2')
@section('judul', 'PC - WORKSHOP ELEKTRO')
@section('nav_pc', 'active')
@section('header', 'Divisi PC')
@section('bg-divisi', asset('main/bg-pc.jpg'))

@section('content')

    <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset('main/bg-pc2.jpg') }});">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	<span class="subheading"># PC Penuh Cinta</span>
	            <h2 class="mb-4">Divisi PC</h2>

	            <p>Divisi PC Mengembangkan minat dan bakat mahasiswa Elektro dalam bidang Elektro yaitu PLC, Elektronika, Power and Control. Divisi Power and Control juga memiliki kegiatan antara lain Sharing, LTKIN, dan Workshop PLC.</p>
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
                <img src="{{ asset('main/lktin.png') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title name"><b>LKTIN PESC</b></h5>
                  <p class="card-text">LKTIN PESC (Power and Energy System Competition)/Lomba Karya Tulis Ilmiah adalah kegiatan mengenai lomba karya tulis ilmiah dan seminar mengenai ide, gagasan inovatif, dan solusi mengenai teknologi Power and Energy System yang berskala nasional.</p>
                  <a href="https://www.instagram.com/pesc_um/" class="btn btn-primary">Kunjungi</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection