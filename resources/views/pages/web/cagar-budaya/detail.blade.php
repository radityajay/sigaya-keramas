@extends('pages.partial.app')

@section('title', 'HOME')

@section('content')
<style>
    #mapid { height: 380px; }

    button {
        padding-top: 3px;
        padding-bottom: 3px;
        padding-right: 10px;
        padding-left: 10px;
        background-color: #A4C639;
        border: 1px solid white;
    }
    button:active{
        border: 1px solid white !important;
    }
</style>
<div id="app">
    @if ($data->sound)
    <audio
    ref="audio"
    src="{{ $data->sound }}">
    </audio>
    @endif
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
                        <div>
                            <div class="d-flex align-items-center" style="cursor: pointer" @click="handlePlay()" v-if="states == false">
                                <i class="ri-play-circle-line" style="font-size: 24px; color: #5db85b"></i>
                                <span>Dengarkan</span>
                            </div>
                            <div class="d-flex align-items-center" style="cursor: pointer" @click="handleStop()" v-else>
                                <i class="ri-stop-circle-line" style="font-size: 24px; color: #5db85b"></i>
                                <span>Berhenti</span>
                            </div>
                        </div>
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
                                    title="{{ $data->name }}" href="{{ $item->photo_url }}"></a>
                                <div class="image-wrapper"><img src="{{ $item->photo_url }}" alt="images description"></div>
                            </figure>
                        </div>
                        @endforeach
                    </div>

                    @if ($data->videos != null)
                    <div class="mt-3 text-center">
                        <div class="block-heading text-center">
                            <h2 class="block-main-heading" style="text-transform: uppercase;  font-size: 2rem;">Video</h2>
                            <div class="divider"><img src="{{ asset('assets/front/img/divider.png') }}"
                                    alt="images description"></div>
                        </div>
                        <iframe src="{{ $data->videos }}">
                        </iframe>
                    </div>
                    @endif
                </div>
            </div>
            <div class="block-heading d-lg-block d-none">
                <h2 class="block-main-heading" style="text-transform: uppercase;  font-size: 2rem;">Maps</h2>
                <div class="divider"><img src="{{ asset('assets/front/img/divider.png') }}"
                        alt="images description"></div>
            </div>
            <div class="block-heading d-lg-none d-block text-center">
                <h2 class="block-main-heading" style="text-transform: uppercase; font-size: 2rem;">Maps</h2>
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
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
    integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script type="text/javascript">
    $(document).ready(function () {
    var map = L.map('mapid').setView([{{ $data->lat ?? -8.5723687 }}, {{ $data->long ?? 115.3260955 }}], 18);
    L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}',{
        maxZoom: 20,
        subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);
    // const test
    async function gets() {
        let url = '{{ url("/") }}/api/cagar-budaya';
        try {
            let res = await fetch(url);
            const test =  await res.json();
        } catch (error) {
            console.log(error);
        }
    }

    var greenIcon = L.icon({
        iconUrl: '{{ asset("assets/front/icons/temple.png") }}',

        iconSize:     [70, 70], // size of the icon
    });

    $.ajax({
        type: "GET",
        url: "/api/cagar-budaya/maps",
        data: {
            "_token": "{{ csrf_token() }}"
        },
        success: function(t) {
            const cagbud = t;
            cagbud.map(myFunction);
            function myFunction(item) {
                var content = "Lokasi yang Anda klik " + item.name + "<br><hr>" + "<a href='https://www.google.com/maps/dir/?api=1&destination=" + item.lat + "," + item.long + "' target='_blank' title='Klik untuk menuju lokasi'><button>Rute menuju lokasi</button></a>";
                return L.marker([item.lat, item.long], {icon: greenIcon}).bindPopup(content).addTo(map);
            }

            // function myFunction(item) {
            //     var content = "Lokasi yang Anda klik " + item.lat + ", " + item.long + "<br><hr>" +
            //     "<a href='https://www.google.com/maps/dir/?api=1&destination=" + item.lat + "," + item.long + "' target='_blank' title='Klik untuk menuju lokasi'><button>Rute menuju lokasi</button></a>";
            //     popup
            //     .setLatLng(item.lat, item.long)
            //     .setContent(content)
            //     .openOn(map);
            // }

            // map.on('click', myFunction);
        }
    })

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

    var app = new Vue({
        el: '#app',
        data(){
            return{
                states: false
            }
        },
        methods: {
            handlePlay(){
                this.states = true
                this.$refs.audio.play()
            },
            handleStop(){
                this.states = false
                this.$refs.audio.pause()
            },
            // refreshData() {
            //     this.$refs.audio.play()
            // }
        },
        mounted(){    
            // this.refreshData()
            // setInterval(this.refreshData, 500)
        }
    })

</script>
@endpush