@extends('layout.master')
@section('nav_index', 'active')

@section('content')
      <div class="hero-wrap ftco-degree-bg" style="background-image: url({{ asset('main/bg-halutama.jpg') }});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text justify-content-start align-items-center justify-content-center">
          <div class="col-lg-8 ftco-animate">
          	<div class="text w-100 text-center mb-md-5 pb-md-5">
	            <h1 class="mb-4">Workshop Elektro</h1>
				<h1 class="mb-4">Universitas Negeri Malang</h1>
	            <p style="font-size: 18px;">GO KIPROK (Kreatif, Inovatif, Produktif, dan Konstruktif)</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <section class="ftco-section ftco-about">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(main/logo.png);background-size: 105%;">
					</div>
					<div class="col-md-6 wrap-about ftco-animate">
	          <div class="heading-section heading-section-white pl-md-5">
	          	<span class="subheading">Workshop Elektro</span>
	            <h2 class="mb-4">Sejarah</h2>

	            <p>Workshop Elektro atau WSE pada mulanya didirikan atas pengajuan 4 orang Mahasiswa yang mempunyai bakat dan minat yang tinggi dalam bidang Robot. Pengajuan tersebut menjadikan Workshop Elektro sebuah LSO atau Lembaga Semi Otonom yang berada dalam Jurusan Teknik Elektro Universitas Negeri Malang namun anggotanya dapat berasal dari jurusan lain namun masih dalah lingkup Fakultas Teknik Universitas Negeri Malang.</p>
	            <p>Berdasarkan Keputusan Rektor yang dikeluarkan pada tahun 2012, Workshop Elektro, sebagai LSO, menyatu dengan Himpunan Mahasiswa Elektro yang merupakan OPM atau Organisasi Pemerintahan Mahasiswa. Pada tahun kepengurusan 2015-2016, Workshop Elektro masuk ke dalam Bidang Bakat dan Minat dalam struktur organisasi Himpunan Mahasiswa Elektro.</p>
				<p>Workshop Elektro berjalan atas landasan “Kekeluargaan” yang telah menjadi semboyan sejak berdirinya organisasi.Workshop Elektro memiliki jargon “GO KIPROK”, singkatan dari Kreatif, Inovatif, Produktif, dan Konstruktif.</p>
	          </div>
					</div>
				</div>
			</div>
		</section>

		<section class="ftco-section">
			<div class="container">
				<div class="row justify-content-center mb-5">
          <div class="col-md-10 text-center heading-section ftco-animate">
            <h2 class="mb-3">Divisi</h2>
			<p>
				Workshop Elektro merupakan wadah pengembangan softskill untuk para anggotanya melalui program kerja dan seluruh kegiatan didalamnya. Namun, peran utama Workshop Elektro adalah sebagai wadah untuk mendukung, mengembangkan, dan meningkatkan kualitas anggota serta mahasiswa Jurusan Teknik Elektro dalam menerapkan ilmu-ilmu (hardskill), pengembangan aplikasi, dan berbagai penelitian di Jurusan Teknik Elektro Universitas Negeri Malang. Ranah pengembangan hardskill yang diwadahi oleh Workshop Elektro meliputi bidang elektro, elektroika, informatika dan wirausaha. Workshop Elektro mewadahi bidang-bidang tersebut dalam 4 Divisi yaitu:
			  </p>
			  
          </div>
        </div>
				<div class="row">
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center">
                <img src="{{ asset('main/it1.png') }}"></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Informasi Teknologi (IT)</h3>
                <p>Divisi IT adalah Divisi yang mengembangkan minat dan bakat siswa khususnya Programing, Desain, dan Multimedia.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center">
                <img src="{{ asset('main/projas1.png') }}">
              </div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Produk dan Jasa (PROJAS)</h3>
                <p>DIvisi Projas merupakan Divisi yang mengembangkan minat dan bakat siswa di bidang jasa seperti Servis Komputer, Instalasi, dll.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center">
                <img src="{{ asset('main/pc1.png') }}"></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">Power and Control (PC)</h3>
                <p>DIvisi Power and Control (PC) merupakan divisi yang mengembangkan minat dan bakat siswa di bidang PLC, Elektronika, Power and Control.</p>
              </div>
            </div>
					</div>
					<div class="col-md-3">
						<div class="services services-2 w-100 text-center">
            	<div class="icon d-flex align-items-center justify-content-center">
                <img src="{{ asset('main/robotik1.png') }}"></div>
            	<div class="text w-100">
                <h3 class="heading mb-2">ROBOTIK</h3>
                <p>Divisi ROBOTIK adalah Divisi yang mengembangkan minat dan bakat siswa khususnya di bidang ROBOTIK.</p>
              </div>
            </div>
					</div>
				</div>
			</div>
		</section>
    
		<section class="ftco-section">
			<div class="container">
			  <div class="row justify-content-center mb-5">
				<div class="col-md-7 heading-section text-center ftco-animate">
				  <h2>Coming Soon!</h2>
				</div>
			  </div>
			  <div class="row d-flex">
				<div class="col-md-4 d-flex ftco-animate">
					<div class="blog-entry justify-content-end">
					<a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
					</a>
					<div class="text pt-4">
						<div class="meta mb-3">
						<div>Agustus 2023</div>
					  </div>
					  <h3 class="heading mt-2"><a href="#">Workshop At School (WATS) 2023</a></h3>
					</div>
				  </div>
				</div>
				<div class="col-md-4 d-flex ftco-animate">
					<div class="blog-entry justify-content-end">
					<a href="blog-single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
					</a>
					<div class="text pt-4">
						<div class="meta mb-3">
						<div>September 2023</div>
					  </div>
					  <h3 class="heading mt-2"><a href="#">Line Tracer Design and Contest (LTDC) 2023</a></h3>
					  <p><a href="#" class="btn btn-primary">Kunjungi</a></p>
					</div>
				  </div>
				</div>
				<div class="col-md-4 d-flex ftco-animate">
					<div class="blog-entry justify-content-end">
					<a href="blog-single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
					</a>
					<div class="text pt-4">
						<div class="meta mb-3">
						<div>Januari 2024</div>
					  </div>
					  <h3 class="heading mt-2"><a href="#">Open Recruitment WSE 2023</a></h3>
					  <p><a href="#" class="btn btn-primary">Daftar</a></p>
					</div>
				  </div>
				</div>
			  </div>
			</div>
		  </section>
		
@endsection
