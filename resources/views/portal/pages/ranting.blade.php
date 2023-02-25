@extends('portal.layouts.master')

@section('title', 'Ranting')

@section('content')
    <div class="page-title-area">
        <div class="container">
            <div class="page-title-content">
                <h2>Ranting</h2>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li>Ranting</li>
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


    <section class="projects-details-area ptb-110">
        <div class="container">
            <div class="projects-details">
                {{-- <div class="">
                    <div class="single-image">
                        <img src="{{ asset('portal')}}/assets/img/projects/1.jpg" alt="image">
                    </div>
                </div> --}}
                <div class="projects-details-desc">
                    <h3>Ranting<h3>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod voluptatibus consequuntur illo!
                            </p>

                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu1">Menu 1</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu2">Menu 2</a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="home" class="tab-pane fade in active">
                                    <h3>HOME</h3>
                                    <p>www.malasngoding.com</p>
                                </div>
                                <div id="menu1" class="tab-pane fade">
                                    <h3>Menu 1</h3>
                                    <p>Tutorial pemrograman web, mobile dan design</p>
                                </div>
                                <div id="menu2" class="tab-pane fade">
                                    <h3>Menu 2</h3>
                                    <p>Membuat navigasi tabs dan pills bootstrap.</p>
                                </div>
                            </div>
                </div>
            </div>
        </div>
    </section>
@endsection
