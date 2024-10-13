<div id="preloder">
    <div class="loader"></div>
   </div>
   <!-- Hero Section Begin -->
   <section class="hero-section">
       <div class="hs-slider owl-carousel">
           <div class="hs-item set-bg" data-setbg="{{ asset('img/hero/hero-1.jpg') }}">
               <div class="container">
                   <div class="row">
                       <div class="col-lg-6 offset-lg-6">
                           <div class="hi-text">
                               <span>{{ __('Shape your body') }}</span>
                               <h1> {{ __('Be') }} <strong> {{ __('strong') }}</strong> {{ __('traning hard') }}</h1>

                           </div>
                       </div>
                   </div>
               </div>
           </div>
           <div class="hs-item set-bg" data-setbg="{{ asset('img/hero/hero-2.jpg') }}">
               <div class="container">
                   <div class="row">
                       <div class="col-lg-6 offset-lg-6">
                           <div class="hi-text">
                            <span>{{ __('Shape your body') }}</span>
                            <h1> {{ __('Be') }} <strong> {{ __('strong') }}</strong> {{ __('traning hard') }}</h1>{{--  --}}
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- Hero Section End -->

   <!-- ChoseUs Section Begin -->
   <section class="choseus-section spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="section-title">
                       <span>{{ __('Why chose us?') }}</span>
                       <h2>{{ __('Push your limits forward') }}</h2>
                   </div>
               </div>
           </div>
           <div class="row">
               <div class="col-lg-3 col-sm-6">
                   <div class="cs-item">
                       <span class="flaticon-034-stationary-bike"></span>
                       <h4>{{ __('Modern equipment') }}</h4>

                   </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                   <div class="cs-item">
                       <span class="flaticon-033-juice"></span>
                       <h4>{{ __('Healthy nutrition plan') }}</h4>

                   </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                   <div class="cs-item">
                       <span class="flaticon-002-dumbell"></span>
                       <h4>{{ __('Proffesponal training plan') }}</h4>

                   </div>
               </div>
               <div class="col-lg-3 col-sm-6">
                   <div class="cs-item">
                       <span class="flaticon-014-heart-beat"></span>
                       <h4>{{ __('Unique to your needs') }}</h4>

                   </div>
               </div>
           </div>
       </div>
   </section>
   <!-- ChoseUs Section End -->

   <!-- Classes Section Begin -->
   <section class="classes-section spad">
       <div class="container">
           <div class="row">
               <div class="col-lg-12">
                   <div class="section-title">
                       <span>{{ __('Our Departments') }}</span>
                       <h2>{{ __('What we can offer') }}</h2>
                   </div>
               </div>
           </div>
           <div class="row">
            @foreach ($departments as $department )

            <div class="col-lg-4 col-md-6">
                <div class="class-item">
                    <div class="ci-pic">
                        <img src="{{ asset('images/departments/'.$department->image) }}" alt="">
                    </div>
                    <div class="ci-text">
                        <span>{{ $department->period }}</span>
                        <h5>{{ $department->name }}</h5>
                        <a href="{{ route('displayDepartment',$department->id) }}"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach

           </div>
       </div>
   </section>
   <!-- ChoseUs Section End -->


   <!-- Gallery Section Begin -->
   <div class="gallery-section">
        <div class="section-title">
            <span>{{ __('Our Equipment') }}</span>
        </div>
       <div class="gallery">
           <div class="grid-sizer"></div>
           @foreach ($equipment as $equip)
           <div class="gs-item grid-wide set-bg" data-setbg="{{ asset('images/departments/equipment/'.$equip->image) }}">
            <a href="{{ asset('images/departments/equipment/'.$equip->image) }}" class="thumb-icon image-popup"><i class="fa fa-picture-o"></i></a>
            </div>
        @endforeach
        </div>
   
   </div>
   <!-- Gallery Section End -->
