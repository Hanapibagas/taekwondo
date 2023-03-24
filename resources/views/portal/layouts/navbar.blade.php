<div class="navbar-area is-sticky">
  <!--{{-- <div class="navbar-area"> --}}-->
  <div class="evolta-responsive-nav">
    <div class="container">
      <div class="evolta-responsive-menu">
        <div class="">
          <a href="/">
            <img src="{{ asset('portal') }}/assets/img/logo/logoo.png" alt="logo" class="m-2" style="width: 120px;">
          </a>
        </div>
      </div>
    </div>
  </div>
  <div class="evolta-nav">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-md navbar-light">
        <a class="navbar-brand" href="/">
          <img src="{{ asset('portal') }}/assets/img/logo/logoo.png" alt="logo" style="width: 175px;">
        </a>
        <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
          <ul class="navbar-nav">

            <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
            

            <li class="nav-item"><a href="#" class="nav-link active">Tentang<i class="fas fa-chevron-down"></i></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="{{ route('portal.sambutan') }}" class="nav-link">Sambutan Ketua Umum</a></li>
                <li class="nav-item"><a href="{{ route('portal.sejarah') }}" class="nav-link">Sejarah & Perkembangan</a></li>
                <li class="nav-item"><a href="{{ route('portal.struktur') }} " class="nav-link">Struktur & Kepengurusan</a></li>
                <li class="nav-item"><a href="{{ route('portal.pencab') }}" class="nav-link">Pencab Kabupaten/Kota</a></li>
                <li class="nav-item"><a href="{{ route('portal.program') }} " class="nav-link">Program Kerja</a></li>
                <li class="nav-item"><a href="{{ route('portal.ad') }}" class="nav-link">AD/ART</a>
                  <li class="nav-item"><a href="{{ route('portal.struktur1') }}"
                                            class="nav-link">Saran/Keritik</a>
                                    </li>
                </li>
              </ul>
            </li>

            <li class="nav-item"><a href=" {{ route('portal.berita') }} " class="nav-link">Berita</a></li>

            <li class="nav-item"><a href=" {{ route('portal.pengumuman') }} " class="nav-link">Pengumuman</a></li>
            <li class="nav-item"><a href=" {{ route('portal.agenda') }} " class="nav-link">Agenda</a></li>
            <li class="nav-item"><a href=" {{ route('portal.peraturan') }} " class="nav-link">Peraturan</a></li>


            <li class="nav-item"><a href=" {{ route('portal.materi') }} " class="nav-link">Materi</a></li>


            <li class="nav-item"><a href="#" class="nav-link">Galery <i class="fas fa-chevron-down"></i></a>
              <ul class="dropdown-menu">
                <li class="nav-item"><a href="{{ route('portal.photo') }}" class="nav-link">Photo</a>
                </li>
                <li class="nav-item"><a href="{{ route('portal.video') }}" class="nav-link">Video</a></li>
              </ul>
            </li>

            <!--<li class="nav-item"><a href="{{ route('portal.member') }}" class="nav-link">Pendaftaran</a></li>-->
             <li class="nav-item"><a href="#" class="nav-link">Pendaftaran<i class="fas fa-chevron-down"></i></a>
              <ul class="dropdown-menu">
                <!--<li class="nav-item"><a href="{{ route('portal.anggota') }} " class="nav-link">Data Anggota</a>-->
                </li>
                <li class="nav-item"><a href="{{ route('portal.member') }}" class="nav-link">Pendaftaran Anggota</a></li>
                <li class="nav-item"><a href="{{ route('portal.pendaftaran.pelatih') }}" class="nav-link">Pendaftaran Pelatih</a>
                <li class="nav-item"><a href="{{ route('portal.pendaftaran.dojang') }}" class="nav-link">Pendaftaran Dojang</a>
                </li>
                <!--<li class="nav-item"><a href="{{ route('portal.member') }}" class="nav-link">Daftar-->
                <!--                            Calon Murid</a>-->
                <!--                    </li>-->
              </ul>
            </li>
            <li class="nav-item"><a href="{{route('portal.dojang')}}" class="nav-link">Dojang</a></li>

            <li class="nav-item"><a href="#" class="nav-link">Keanggotaan <i class="fas fa-chevron-down"></i></a>
              <ul class="dropdown-menu">
                <!--<li class="nav-item"><a href="{{ route('portal.anggota') }} " class="nav-link">Data Anggota</a>-->
                </li>
                <li class="nav-item"><a href="{{ route('portal.wasit') }}" class="nav-link">Data
                    Wasit</a></li>
                <li class="nav-item"><a href="{{ route('portal.pelatih') }}" class="nav-link">Data
                    Pelatih</a>
                </li>
                <!--<li class="nav-item"><a href="{{ route('portal.member') }}" class="nav-link">Daftar-->
                <!--                            Calon Murid</a>-->
                <!--                    </li>-->
              </ul>
            </li>
          </ul>
          <!--<div class="others-options">-->
          <!--  <a href="{{ route('login') }} " class="btn btn-primary">Login</a>-->
          <!--</div>-->
        </div>
      </nav>
    </div>
  </div>
</div>
