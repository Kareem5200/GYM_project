
   <!-- Get In Touch Section Begin -->
   <div class="gettouch-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="gt-text">
                    <i class="fa fa-map-marker"></i>
                    <p>{{ $aboutUs->address }}</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gt-text">
                    <i class="fa fa-mobile"></i>
                    <ul>
                        <li>{{ $aboutUs->phone1 }}</li>
                        <li>{{ $aboutUs->phone2}}</li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="gt-text email">
                    <a href="{{ $aboutUs->facebook }}"><i class="fa fa-facebook"></i></a>
                    <a href="{{ $aboutUs->X }}"><i class="fa fa-twitter"></i></a>
                    <a href="{{ $aboutUs->youtube }}"><i class="fa fa-youtube-play"></i></a>
                    <a href="{{ $aboutUs->instgram }}"><i class="fa fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Get In Touch Section End -->
