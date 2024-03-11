@extends('layout.master2')
@section('judul', 'PROJAS - WORKSHOP ELEKTRO')
@section('nav_projas', 'active')
@section('header', 'Divisi Projas')
@section('bg-divisi', asset('main/bg-projas.jpg'))

@section('content')

    <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url({{ asset('main/bg-projas2.jpg') }});">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	<span class="subheading"># PROJAS Kreatifitas Tanpa Batas</span>
	            <h2 class="mb-4">Divisi PROJAS</h2>

	            <p>Divisi Projas (Produk dan Jasa) Mengembangkan minat dan bakat mahasiswa Elektro yang mempunyai keahlian dalam bidang Usaha Produk dan jasa, Ruang Lingkup dari Divisi Projas yaitu Membuat Produk-produk yang di jual kepada Mahasiswa dan masyarakat pada umumnya salah di antaranya jasa pembuatan Bel cerdas Cermat, Robot Line Follower analog, Jasa Pembuatan Adaptor, Jasa pembuatan Minsis (Minimum Sistem). media pembelajaran trainer maupun Flash, Trainer Pengembangan Sensor. Sedangkan Jasa berupa Servis Center seperti Servis Laptop, Printer, Instalasi Penerangan pada Rumah tangga. Pada divisi ini sharing wajib dilakukan dalam seminggu sekali. </p>
	            <p>Divisi Projas memiliki kegiatan lain yaitu Sharing, Lomba, Service Center, dan WATS ..</p>
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
                <img src="{{ asset('main/wats.jpg') }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title name"><b>WATS</b></h5>
                  <p class="card-text">Workshop At School (WATS) adalah kegiatan pengabdian dan sharing ilmu pada salah satu sekolah di daerah Malang yang dirasa masih mendapati ketertinggalan teknologi dalam proses pembelajaran yang dilakukan. Pada tahun ini WATS diadakan pada tanggal 20 Agustus 2022, bertemakan "Smart Garden Innovation using loT Smart System Bertujuan menumbuhkan generasi baru di SMK Taruna Bangsa untuk belajar teknologi yang berguna dalam kehidupan terutama membantu otomatisasi kehidupan sehari-hari.</p>
                  <a href="https://www.instagram.com/p/Ch3fQlqpT_v/?utm_source=ig_web_copy_link&igshid=MzRlODBiNWFlZA==" class="btn btn-primary">Kunjungi</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

@endsection