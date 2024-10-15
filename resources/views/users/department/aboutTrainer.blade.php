@extends('layouts.app')

@section('css')
   <!-- Include Owl Carousel CSS and other assets -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
   <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

   <style>
       .owl-carousel .item img {
           width: 100%;
           height: auto;
       }
   </style>

@endsection

@section('content')

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="{{ asset('img/breadcrumb-bg.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb-text">
                        <h2>{{ __('Our Trainer') }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->
    <div id="carouselExample" class="carousel slide ">
        <div class="col-lg-12 text-center">
            <div class="breadcrumb-text">
                <h2 class="text-black">{{ __('Trainer certifications') }}</h2>
            </div>
        </div>

        <div class="carousel-inner">
            @foreach ($trainer->qualifications as $qualification )
            <div class="carousel-item active">
                <img src="{{ asset('images/qualifications/'.$qualification->image) }}" class="d-block w-100" alt="...">
            </div>

            @endforeach

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>


      <div class="col-lg-12 text-center">
        <div class="breadcrumb-text">
            <h2 class="text-black">{{ __('Trainer transformtions') }}</h2>
        </div>
    </div>

      <div class="owl-carousel owl-theme">
        @forelse($trainer->transformations as $transformation)

        <div class="item">
            <img src="{{ asset('images/transformation/before_images/'.$transformation->image_before) }}" alt="Image 2">
            <div class="image-title"><h1>{{ __('Before') }}</h1> </div>

        </div>
        <div class="item">
            <img src="{{ asset('images/transformation/after_images/'.$transformation->image_after) }}" alt="Image 1">
            <div class="image-title"><h1>{{ __('After') }} {{ $transformation->period}}</h1> </div>
        </div>

        @empty


        @endforelse
     </div>

    <x-alert name="paymentError" class="text-center"/>
    <x-pricing-component :categories="$nutration_categories" :department="$department" :trainer="$trainer->id" title="Nutration Plan" alert='We have no nutration Plan now'/>
    <x-pricing-component :categories="$workout_categories" :department="$department" :trainer="$trainer->id" title="Workout Plan" alert="We have no Workout Plan now" />




    <!-- Contact Section Begin -->
    <section class="contact-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-title contact-title">
                        <span>{{ __('Contact with trainer') }}</span>
                    </div>
                    <div class="contact-widget">
                        <div class="cw-text">
                            <i class="fa fa-mobile"></i>
                            <ul>
                                <li>{{ $trainer->phone1 }}</li>
                                <li>{{ $trainer->phone2 }}</li>
                            </ul>
                        </div>
                        <div class="cw-text email">
                            <i class="fa fa-envelope"></i>
                            <p>{{ $trainer->email }}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- Contact Section End -->

@endsection

@section('js')

<script>
    $(document).ready(function(){
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            responsive: {
                0: {
                    items: 1 // Show 1 item on small screens
                },
                600: {
                    items: 2 // Show 2 items on medium and larger screens
                }
            }
        });
    });
</script>
@endsection
