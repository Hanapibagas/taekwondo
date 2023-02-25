<div class="row align-items-center">
  <div class="col-lg-6 col-md-12">
    <div class="about-image">
      <img src="{{ asset('portal/ketua.png') }}" alt="image"  class="img-responsive">
    </div>
  </div>
  <div class="col-lg-6 col-md-12">
    <div class="about-content mb-3">
      {{-- <span>About Us</span> --}}
      <h2 class="mb-3">Sambutan Ketua Umum</h2>
      <h4><b>{{ $sambutan->pengurus->nama }}</b></h4>
      <p>{!! $sambutan->body !!}</p>
      
       <h3 class="mt-4"><b>Kalfin Alloto'dang, S.Kom., MT <b/> </h3>
      <p style="font-size:14px;"> <b> Ketua Umum Taekwondo Sulawesi Selatan </b> </p>
      
    </div>
    <a href="{{ route('portal.sambutan') }} " class="btn btn-primary mt-3" id="viewSambutan">View
      More</a>
  </div>
</div>
