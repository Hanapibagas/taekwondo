<div class="section-title">
  <div class="content">
    {{-- <span>Recent projects</span> --}}
    <h2>Berita</h2>
    <p>Berita-berita seputar Taekwondo Sulawesi Selatan</p>
  </div>
  <div class="image">
    {{-- <img src="{{ asset('portal') }}/assets/img/section-title/3.png" alt="image"> --}}
  </div>
</div>
<div class="row">
  <div class="projects-slides owl-carousel owl-theme">
    @foreach ($berita as $data)
    <div class="col-lg-12 col-md-12">
      <div class="single-projects-box">
        <a href="{{ url('berita/detail/'.$data->id) }}"><img src="{{ asset('storage') }}/images/berita/{{ $data->image }}" alt="image"></a>
        <div class="projects-content">
          {{-- <span>Design/Idea</span> --}}
          <h3><a href="{{  url('berita/detail/'.$data->id)  }}">{{ $data->title }}</a></h3>
          {{-- <p>{{ $k->deskripsi }}</p> --}}
          <a href="{{  url('berita/detail/'.$data->id)  }}" class="read-more-btn">Read More <i class="flaticon-add-1"></i></a>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</div>
<div class="shape13"><img src="{{ asset('portal') }}/assets/img/shape/13.svg" alt="image"></div>
<div class="shape15"><img src="{{ asset('portal') }}/assets/img/shape/13.svg" alt="image"></div>
