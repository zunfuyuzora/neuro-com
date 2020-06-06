@extends('extends.template')
@push('script')
    <script src="{{ asset('vendor/headroom/headroom.min.js')}}"></script>
@endpush
@section('screen')
    
<nav class="navbar navbar-landing navbar-overlay navbar-dark headroom bg-transparent">
        <div class="container">
            <a class="navbar-brand h3" href="{{route('home')}}">
                {{-- <img src="{{ asset('images/sample-logo.png')}}" alt=""> --}}
                Neuro
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-primary" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbar-primary">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-primary" aria-controls="navbar-default" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
    
                <ul class="navbar-nav ml-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="#">
                            <span class="nav-link-inner-text">Home</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="#">
                            <span class="nav-link-inner-text">About</span></a>
                    </li>
                </ul>
    
            </div>
        </div>
    </nav>

<div class="hero-section py-5 ">
    <div class="container">
        <div class="row">
            <div class="py-5 mt-5 text-white col-12 col-md-8">
                    <div class="display-4">Get Collaborate with your team now by Neuro</div>
                    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Culpa libero, explicabo accusantium cupiditate, aliquid tempora incidunt asperiores ipsum.</p>
                    <a href="{{route('signup')}}" class="btn btn-primary">Sign Up Now</a>
                    <a href="{{route('login')}}" class="ml-3 text-white text-underline">Login</a>
                </div>
        </div>
    </div>
</div>

<div id="section-1" class=" bg-blue">
    <div class="container text-center text-white p-md-5 p-3">
        <div class="display-2">What is Neuro all about ?</div>
    </div>
</div>

<div id="section-2">
    <div class="container bg-white">
    <div class="row py-5">
            <div class="row align-items-center">
            <div class="col-12 col-md-6 order-0">
                <div class="illust">
                    <img src="{{asset('images/illust-1.png')}}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-12 col-md-6 order-1 p-3 text-md-left text-center">
                <h4>Kolaborasi</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum amet quasi aperiam eaque tempore modi, laudantium quae, nobis beatae porro accusamus saepe neque quo sunt iusto ex fugit blanditiis! Cumque!</p>
            </div>
            <div class="col-12 col-md-6 order-md-3 order-2">
                <div class="illust">
                    <img src="{{asset('images/illust-2.png')}}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-3 p-3 text-md-left text-center">
                <h4>Berbagi File</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores officia ducimus minus porro explicabo pariatur quisquam iusto error hic tempore voluptatibus perspiciatis, ad assumenda aliquid magni facere reprehenderit, sit consectetur.</p>
            </div>
            <div class="col-12 col-md-6 order-4">
                <div class="illust">
                    <img src="{{asset('images/illust-3.png')}}" alt="" class="img-fluid">
                </div>
            </div>
            <div class="col-12 col-md-6 order-5 p-3 text-md-left text-center">
                <h4>Komunikasi</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat ad a accusantium reiciendis fugit itaque aliquid, minima similique, laudantium, consequatur sunt illum. Iusto rem dolores voluptas qui recusandae dolore delectus!</p>
            </div>
        </div>
    </div>
    </div>
</div>

<div id="section-3" class="section-3">
    <div class="container text-center text-white p-5">
        <div class="display-2 m-md-5 m-2">Always connect with Neuro
        </div>
    </div>
</div>

<div id="section-4">
    <div class="container p-md-5 p-2 my-5 text-center">
    <h4 class="font-weight-bold display-3">Daftar Gratis Sekarang</h4>
    <p style="color:gray" class="w-md-25 px-3 w-100">
        Sed labore assumenda rem? Voluptates velit nesciunt quaerat consequatur asperiores.
    </p>
    <form action="{{route('signup')}}" autocomplete="off" class="form-group d-flex justify-content-center">
        <div class="input-group col-12 col-md-6">
            <input type="text" name="email" placeholder="Masukkan email" class="form-control">
            <div class="input-group-append">
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </div>
        </div>
    </form>
</div>
</div>

<footer class="bg-primary">
    <div class="container p-md-5 py-5 p-2">
        <div class="row text-white justify-content-around">
            <div class="col-md-3 col-2">
                <img src="{{asset('images/sample-logo.png')}}" alt="[Logo]" class="img-fluid">
            </div>
            <div class="col-3">
                <a href="#" class="text-white">About us</a><br>
                <a href="#" class="text-white">Help</a>
            </div>
            <div class="col-3">
                <a href="{{route('login')}}" class="text-white">Login</a><br>
                <a href="{{route('signup')}}" class="text-white">Signup</a>
            </div>
        </div>
    </div>
    <div class="text-center pb-2 text-white text-small">
        copyright@2020
    </div>
</footer>
@endsection
