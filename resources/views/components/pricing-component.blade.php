@props([
    'categories',
    'title',
    'alert'

])


<section class="pricing-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>{{__($title) }}</span>
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
                        <h2>{{ $category->pivot->price}}</h2>
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
            <div><h1 class="text-center" >{{ __($alert) }}</h1></div>
            @endforelse
            </div>
        </div>
    </div>
</section>
