@extends('pages.partial.app')

@section('title', 'HOME')

@section('content')
<style>
    #mapid { height: 380px; }
</style>
<div>
    <div>
        <div class="d-lg-none">
            <div class="swiper mySwiper mySwiperSlider mb-3">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @foreach ($slider as $item)
                    <div class="swiper-slide" style="height: auto !important;">
                        <img src="{{ $item->photo_url ?? 'https://www.dkc-llp.com/wp-content/uploads/2016/09/image-placeholder.jpg' }}"
                            alt="" class="w-100">
                    </div>
                    @endforeach
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
    
                <!-- If we need navigation buttons -->
                {{-- <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div> --}}
    
                <!-- If we need scrollbar -->
                {{-- <div class="swiper-scrollbar"></div> --}}
            </div>
        </div>
        <div class="d-none d-lg-block mb-3">
            <div class="swiper mySwiper mySwiperSlider" style="max-height: 560px !important">
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                    <!-- Slides -->
    
                    @foreach ($slider as $item)
                    <div class="swiper-slide">
                        <img src="{{$item->photo_url}}" alt="" class="w-100">
                    </div>
                    @endforeach
    
                </div>
                <!-- If we need pagination -->
                <div class="swiper-pagination"></div>
    
                <!-- If we need navigation buttons -->
                {{-- <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div> --}}
    
                <!-- If we need scrollbar -->
                {{-- <div class="swiper-scrollbar"></div> --}}
            </div>
        </div>
    
        <div class="container my-5">
            <div class="row">
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="block-heading text-center">
                        <h2 class="block-main-heading" style="text-transform: uppercase; font-size: 2rem;">{{ $data->name }}</h2>
                        <div class="divider"><img src="{{ asset('assets/front/img/divider.png') }}"
                                alt="images description"></div>
                    </div>
                    <div class="col-wrap">
                        <div class="ico-box bg-gray-light has-radius-medium" style="text-align: justify !important;">
                            <div class="des">
                                <?= $data->description ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="block-heading text-center">
                        <h2 class="block-main-heading" style="text-transform: uppercase;  font-size: 2rem;">GALLERIES</h2>
                        <div class="divider"><img src="{{ asset('assets/front/img/divider.png') }}"
                                alt="images description"></div>
                    </div>
                    <div class="row masonary-block default-gallery">
                        @foreach ($slider as $item)
                        <div class="col-sm-2 col-md-2 col-lg-6">
                            <figure class="caption-hover-full">
                                <a data-thumbnail="{{ $item->photo_url }}" class="fancybox-thumb fancy-pop"
                                    title="Portfolio 12" href="{{ $item->photo_url }}"></a>
                                <div class="image-wrapper"><img src="{{ $item->photo_url }}" alt="images description"></div>
                            </figure>
                        </div>
                        @endforeach
                    </div>

                    
                </div>
            </div>
            <div class="block-heading d-lg-block d-none">
                <h2 class="block-main-heading" style="text-transform: uppercase;  font-size: 2rem;">Map</h2>
                <div class="divider"><img src="{{ asset('assets/front/img/divider.png') }}"
                        alt="images description"></div>
            </div>
            <div class="block-heading d-lg-none d-block text-center">
                <h2 class="block-main-heading" style="text-transform: uppercase; font-size: 2rem;">Map</h2>
                <div class="divider"><img src="{{ asset('assets/front/img/divider.png') }}"
                        alt="images description"></div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div id="mapid"></div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script type="text/javascript">
    $(document).ready(function () {
    var map = L.map('mapid').setView([{{ $data->lat ?? -8.5723687 }}, {{ $data->long ?? 115.3260955 }}], 18);
    L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);

    var marker = L.marker([{{ $data->lat ?? -8.5723687 }}, {{ $data->long ?? 115.3260955 }}]).addTo(map);

    function updateMarker(lat,lng){
        marker
        .setLatLng([lat,lng])
        .openPopup();
        return false;
    };

    map.on('click',function(e) {
        let latitude  = e.latlng.lat.toString().substring(0,15);
        let longitude = e.latlng.lng.toString().substring(0,15);
        $('#latitude').val(latitude);
        $('#longitude').val(longitude);
        updateMarker(latitude,longitude);
    });

    var updateMarkerByInputs = function () {
        return updateMarker( $('#latitude').val(), $('#longitude').val());
    }
    $('#latitude').on('input',updateMarkerByInputs);
    $('#longitude').on('input',updateMarkerByInputs);

  });

    var swiper = new Swiper('.mySwiper', {
        loop: true,
        spaceBetween: 30,
        slidesPerView: 1,

        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },

        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },

        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
    });

    

</script>
@endpush