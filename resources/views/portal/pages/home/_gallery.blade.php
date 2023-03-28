<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>Photo</h2>
            <ul>
                <li><a href="index.html">Home</a></li>
                <li>Galery</li>
                <li>Photo</li>
            </ul>
        </div>
    </div>
    <div class="dot-shape1"><img src="{{ asset('portal') }}/assets/img/shape/dot1.png" alt="image"></div>
    <div class="dot-shape2"><img src="{{ asset('portal') }}/assets/img/shape/dot2.png" alt="image"></div>
    <div class="dot-shape3"><img src="{{ asset('portal') }}/assets/img/shape/dot3.png" alt="image"></div>
    <div class="dot-shape4"><img src="{{ asset('portal') }}/assets/img/shape/dot4.png" alt="image"></div>
    <div class="dot-shape5"><img src="{{ asset('portal') }}/assets/img/shape/dot5.png" alt="image"></div>
    <div class="dot-shape6"><img src="{{ asset('portal') }}/assets/img/shape/dot6.png" alt="image"></div>
    <div class="dot-shape7"><img src="{{ asset('portal') }}/assets/img/shape/dot1.png" alt="image"></div>
    <div class="shape16"><img src="{{ asset('portal') }}/assets/img/shape/13.svg" alt="image"></div>
    <div class="shape17"><img src="{{ asset('portal') }}/assets/img/shape/14.svg" alt="image"></div>
    <div class="shape18"><img src="{{ asset('portal') }}/assets/img/shape/15.png" alt="image"></div>
    <div class="shape19"><img src="{{ asset('portal') }}/assets/img/shape/16.png" alt="image"></div>
    <div class="shape20"><img src="{{ asset('portal') }}/assets/img/shape/14.svg" alt="image"></div>
</div>


<section class="projects-area ">
    <div class="container">
        <div class="row">
            @foreach ($photo as $img)
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="single-projects-box">
                    <a class="example-image-link" href="{{ asset('storage/gallery/images/' . $img->images) }}"
                        data-lightbox="example-set" data-title="Click the right half of the image to move forward.">
                        <img class="example-image" src="{{ asset('storage/gallery/images/' . $img->images) }}"
                            alt="image" style="width: 356px; height: 286px;" />
                    </a>
                </div>
            </div>
            @endforeach
        </div>


        <div class="shape13"><img src="{{ asset('portal') }}/assets/img/shape/13.svg" alt="image"></div>
        <div class="shape15"><img src="{{ asset('portal') }}/assets/img/shape/13.svg" alt="image"></div>

    </div>
</section>