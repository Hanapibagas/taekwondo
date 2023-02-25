<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    @forelse ($sliders as $slider)
    <div class="carousel-item {{ $loop->iteration == 1 ? 'active' : '' }} ">
      <img src="{{ asset('storage/images/slider/' . $slider->images) }}" class="d-block w-100 slider" alt="tak muncul">
    </div>
    @empty
    <div class="carousel-item active">
      <img src="{{ asset('portal') }}/assets/img/slider/Taekwondo-Sulsel.jpg" class="d-block w-100 slider" alt="tak muncul">
    </div>
    @endforelse
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
