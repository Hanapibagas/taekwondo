<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header">
      <div class="d-flex justify-content-between">
        <div class="logo">
          <a href="index.html"><img src="{{ asset('portal') }}/assets/img/logo/logoo.png" alt="Logo" style="height: 50px;"></a>
        </div>
        <div class="toggler">
          <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
        </div>
      </div>
    </div>

    {{-- sidebar Admin --}}
    @php

    $id = Auth::user()->id;

    $roles = \App\Models\RolesRelation::where('user_id', $id)->first();
    @endphp
    @if ($roles->role_id == '1')

    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-title">Dashboard</li>
        <li class="sidebar-item  ">
          <a href="{{ route('dashboard') }}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="sidebar-item  ">
          <a href="{{ route('tingkat.index') }} " class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Pengajuan Kenaikan Tingkat</span>
          </a>
        </li>

        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-collection-fill"></i>
            <span>Data Master</span>
          </a>
          <ul class="submenu ">
            <li class="submenu-item  ">
              <a href="{{ route('sabuk.index') }}">Master Sabuk</a>
            </li>
            <li class="submenu-item  ">
              <a href="{{ route('dojeng.index') }}">Master Dojeng</a>
            </li>
            <li class="submenu-item  ">
              <a href="{{ route('jabatan.index') }}">Master Jabatan</a>
            </li>
          </ul>
        </li>

        <li class="sidebar-item  has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-collection-fill"></i>
            <span>Keanggotaan</span>
          </a>
          <ul class="submenu ">
            <li class="submenu-item ">
              <a href="{{ route('anggota.index') }}">Data Anggota</a>
            </li>
            <li class="submenu-item  ">
              <a href="{{ route('pengurus.index') }}">Data Pengurus</a>
            </li>
            <li class="submenu-item ">
              <a href="{{ route('wasit.index') }} ">Data Wasit</a>
            </li>
            <li class="submenu-item ">
              <a href="{{ route('pelatih.index') }} ">Data Pelatih</a>
            </li>

          </ul>
        </li>

        {{-- Portal sidebar --}}
        <li class="sidebar-title">Portal</li>
        <li class="sidebar-item has-sub">
          <a href="#" class='sidebar-link'>
            <i class="bi bi-stack"></i>
            <span>Tentang</span>
          </a>
          <ul class="submenu">
            <li class="submenu-item">
              <a href="{{ route('sambutan-ketua') }} ">Sambutan Ketua Umum</a>
            </li>
            <li class="submenu-item ">
              <a href="{{ route('sejarah-perkembangan') }}">Sejarah dan Perkembangan</a>
            </li>
            <li class="submenu-item ">
              <a href="{{ route('struktur-kepengurusan') }}">Struktur dan Kepengurusan</a>
            </li>
            {{-- <li class="submenu-item ">
              <a href="{{ route('pencab') }}">Pencab Kab/Kota</a>
        </li> --}}
        <li class="submenu-item ">
          <a href="{{ route('program-kerja') }} ">Program Kerja</a>
        </li>
        <li class="submenu-item ">
          <a href="{{ route('ad-art') }} ">AD/ART</a>
        </li>
      </ul>
      </li>

      <li class="sidebar-item  ">
        <a href="{{ route('berita.index') }}" class='sidebar-link'>
          <i class="bi bi-grid-fill"></i>
          <span>Berita</span>
        </a>
      </li>

      <li class="sidebar-item  ">
        <a href="{{ route('peraturan') }}" class='sidebar-link'>
          <i class="bi bi-grid-fill"></i>
          <span>Peraturan</span>
        </a>
      </li>

      <li class="sidebar-item  ">
        <a href="{{ route('pengumuman.index') }}" class='sidebar-link'>
          <i class="bi bi-grid-fill"></i>
          <span>Pengumuman</span>
        </a>
      </li>

      <li class="sidebar-item  ">
        <a href="{{ route('materi') }}" class='sidebar-link'>
          <i class="bi bi-grid-fill"></i>
          <span>Materi</span>
        </a>
      </li>

      <li class="sidebar-item  ">
        <a href="{{ route('agenda.index') }}" class='sidebar-link'>
          <i class="bi bi-grid-fill"></i>
          <span>Agenda</span>
        </a>
      </li>

      <li class="sidebar-item  has-sub">
        <a href="#" class='sidebar-link'>
          <i class="bi bi-collection-fill"></i>
          <span>Gallery</span>
        </a>
        <ul class="submenu ">
          <li class="submenu-item ">
            <a href="{{ route('photo.index') }}">Photo</a>
          </li>
          <li class="submenu-item ">
            <a href="{{ route('video.index') }} ">Video</a>
          </li>
        </ul>
      </li>

      <li class="sidebar-item  ">
        <a href="{{ route('slider') }}" class='sidebar-link'>
          <i class="bi bi-grid-fill"></i>
          <span>Slider</span>
        </a>
      </li>

      <li class="sidebar-item  ">
        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" class='sidebar-link'>
          <i class="bi bi-grid-fill"></i>
          <span>{{ __('Logout') }}</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </li>
      </ul>
    </div>
    {{-- sidebar Provinsi --}}

    {{-- sidebar Kabupaten --}}
    @elseif ($roles->role_id == '2')
    <div class="sidebar-menu">
      <ul class="menu">

        <li class="sidebar-item  ">
          <a href="{{ route('kab.pengurus.index') }} " class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Master Pengurus</span>
          </a>
        </li>

        <li class="sidebar-item  ">
          <a href="{{ route('kab.anggota.index') }} " class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Master Anggota</span>
          </a>
        </li>

        <li class="sidebar-item  ">
          <a href="{{ route('kab.dojeng.index') }}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Master Dojeng</span>
          </a>
        </li>
        <li class="sidebar-item  ">
          <a href="{{ route('kab.tingkat.index') }} " class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Pengajuan Kenaikan Tingkat</span>
          </a>
        </li>

        <li class="sidebar-item  ">
          <a href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>{{ __('Logout') }}</span>
          </a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
          </form>
        </li>
      </ul>
    </div>
    @endif

    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>
