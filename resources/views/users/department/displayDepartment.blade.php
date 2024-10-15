@extends('layouts.app')


@section('content')
    <!-- Team Section Begin -->
    <section class="team-section spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="team-title">
                        <div class="section-title">
                            <span>{{ __('Our Team') }}</span>
                            <h2>{{ __('Online coaching service') }}</h2>
                            <h2>{{ __('Train with experts') }}</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                @forelse ($trainers as $trainer )

                    <div class="col-lg-4">
                        <div class="ts-item set-bg" data-setbg="{{ asset('images/employees_images/'.$trainer->image) }}">
                            <div class="ts_text">
                                <h4>{{ $trainer->name }}</h4>
                                <a href="{{ route('aboutTrainer',$trainer->id) }}" class="primary-btn pricing-btn">{{ __('About trainer') }}</a>
                            </div>
                        </div>
                    </div>
                @empty
                    <div><h1 class="text-center">{{ __('We have no trainers for online coaching now') }}</h1></div>
                @endforelse



            </div>
        </div>
    </section>
    <!-- Team Section End -->


        <!-- Pricing Section Begin -->
        <x-alert name="paymentError" class="text-center"/>
        <x-pricing-component :categories="$categories" :department="$department" title="Our Plan" alert='We have no memberships now'  />

        {{-- <section class="pricing-section spad">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title">
                            <span>{{__("Our Plan") }}</span>
                            <h2>{{__("Choose your pricing plan") }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row justify-content-center">
                    @forelse ($categories as $category )
                    <div class="col-lg-4 col-md-8">
                        <div class="ps-item">
                            <h3>{{__("$category->category") }}</h3>
                            <div class="pi-price">
                                <h2>{{ $category->price }}</h2>
                                <span>{{ __('Single class') }}</span>
                            </div>
                            <ul>
                                <li>{{ __('Unlimited equipments') }}</li>
                                <li>{{ __('Weight losing classes') }}</li>
                                <li>{{ __('Month to mouth') }}</li>
                                <li>{{ __('No time restriction') }}</li>
                            </ul>
                            <a href="#" class="primary-btn pricing-btn">{{ __('Enroll now') }}</a>
                        </div>
                        </div>
                    @empty
                    <div><h1 class="text-center" >{{ __('We have no memberships now') }}</h1></div>

                    @endforelse
                    </div>
                </div>
            </div>
        </section> --}}
        <!-- Pricing Section End -->

@endsection
