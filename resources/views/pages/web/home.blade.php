@extends('pages.partial.app')

@section('title')
{{$page_title}}
@endsection

@section('content')
<main>
    <!-- visual/banner of the page -->
    <div class="banner banner-home">
        <!-- revolution slider starts -->
        <div id="rev_slider_279_1_wrapper" class="rev_slider_wrapper fullscreen-container"
            data-alias="restaurant-header"
            style="margin:0px auto;background-color:#fff;padding:0px;margin-top:0px;margin-bottom:0px;">
            <div id="rev_slider_70_1" class="rev_slider fullscreenabanner" style="display:none;" data-version="5.1.4">
                <ul>
                    <li class="slider-color-schema-dark" data-index="rs-2" data-transition="fade" data-slotamount="7"
                        data-easein="default" data-easeout="default" data-masterspeed="1000" data-rotate="0"
                        data-saveperformance="off" data-title="Slide" data-description="">
                        <!-- main image for revolution slider -->
                        <img src="assets/front/img/5.png" alt="image description" data-bgposition="center center"
                            data-kenburns="on" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100"
                            data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0"
                            data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-bgfit="cover"
                            data-no-retina>
                        <div class="tp-caption tp-shape tp-shapewrapper" id="slide-1699-layer-10"
                            data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['0','0','0','0']"
                            data-width="full" data-height="full" data-whitespace="nowrap" data-type="shape"
                            data-basealign="slide" data-responsive_offset="on" data-responsive="off"
                            data-frames='[{"from":"y:0;sX:1;sY:1;opacity:0;","speed":2500,"to":"o:1;","delay":500,"ease":"Power4.easeOut"},{"delay":"wait","speed":300,"to":"opacity:0;","ease":"nothing"}]'
                            data-textAlign="['left','left','left','left']" data-paddingtop="[0,0,0,0]"
                            data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]"
                            style="background-color:rgba(0, 0, 0, 0.57);"> </div>
                        <div class="slider-sub-title text-white tp-caption tp-resizeme rs-parallaxlevel-0"
                            data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
                            data-y="['top','top','middle','middle']" data-voffset="['145','100','10','20']"
                            data-width="['1200','960','720','540']" data-textalign="left"
                            data-fontsize="['30','28','24','20']" data-lineheight="['72','62','50','50']"
                            data-letterspacing="5" data-height="none" data-whitespace="normal"
                            data-transform_idle="o:1;"
                            data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:1.5;sY:1.5;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                            data-mask_in="x:0px;y:0px;" data-mask_out="x:inherit;y:inherit;" data-start="1000"
                            data-splitin="none" data-splitout="none" data-responsive_offset="on"
                            data-paddingright="[25,25,25,25]" data-paddingleft="[25,25,25,25]">
                            {{-- GRAPHICS. WEB. DIGITAL. --}}
                        </div>
                        <div class="slider-main-title text-white tp-caption tp-resizeme rs-parallaxlevel-1"
                            data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
                            data-y="['top','top','middle','middle']" data-voffset="['250','150','50','50']"
                            data-width="['1200','960','720','540']" data-textalign="left"
                            data-fontsize="['160','88','64','48']" data-fontweight="900"
                            data-letterspacing="['25','10','5','0']" data-lineheight="['184','100','72','60']"
                            data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                            data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:1.5;sY:1.5;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                            data-mask_in="x:0px;y:0px;" data-mask_out="x:inherit;y:inherit;" data-start="1000"
                            data-splitin="none" data-splitout="none" data-responsive_offset="on"
                            data-paddingright="[25,25,25,25]" data-paddingleft="[25,25,25,25]">
                            SIGAYA
                        </div>
                        <div class="slider-text text-white tp-caption tp-resizeme rs-parallaxlevel-2"
                            data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
                            data-y="['top','top','middle','middle']" data-voffset="['450','230','110','110']"
                            data-width="['600','555','555','480']" data-textalign="left"
                            data-fontsize="['16','14','14','14']" data-lineheight="['30','30','22','22']"
                            data-fontweight="400" data-height="none" data-whitespace="normal" data-transform_idle="o:1;"
                            data-transform_in="z:0;rX:0deg;rY:0;rZ:0;sX:1.5;sY:1.5;skX:0;skY:0;opacity:0;s:1500;e:Power3.easeInOut;"
                            data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                            data-mask_in="x:0px;y:0px;" data-mask_out="x:inherit;y:inherit;" data-start="1000"
                            data-splitin="none" data-splitout="none" data-responsive_offset="on"
                            data-paddingright="[25,25,25,25]" data-paddingleft="[25,25,25,25]">
                            Ini merupakan Sistem Informasi Cagar Budaya yang ada di <b>Desa Keramas</b>
                        </div>
                        <div class="tp-caption rev-btn  rs-parallaxlevel-10" id="slide-163-layer-1"
                            data-x="['left','left','left','left']" data-hoffset="['0','0','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['320','60','240','220']"
                            data-width="none" data-height="none" data-whitespace="nowrap" data-transform_idle="o:1;"
                            data-transform_hover="o:1;rX:0;rY:0;rZ:0;z:0;s:300;e:Power3.easeOut;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                            data-transform_out="y:[175%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                            data-mask_out="x:inherit;y:inherit;" data-start="1250" data-splitin="none"
                            data-splitout="none"
                            data-actions='[{"event":"click","action":"jumptoslide","slide":"rs-164","delay":""}]'
                            data-responsive_offset="on" data-paddingtop="[0,0,0,0]" data-paddingright="[25,25,25,25]"
                            data-paddingbottom="[0,0,0,0]" data-paddingleft="[25,25,25,25]">
                            {{-- <a class="btn btn-primary has-radius-small" href="#">EXPLORE WORK</a> --}}
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/visual/banner of the page -->
    <!-- main content wrapper -->
    <div class="content-wrapper">
        <section class="content-block">
            <div class="container">
                <div class="row multiple-row v-align-row">
                    <div class="col-lg-6 col-md-6">
                        <div class="col-wrap">
                            <div class="block-heading d-lg-block d-none">
                                <h3 class="block-top-heading">APA ITU</h3>
                                <h2 class="block-main-heading">CAGAR BUDAYA?</h2>
                                <span class="block-sub-heading">Berikut penjelannya</span>
                                <div class="divider"><img src="assets/front/img/divider.png" alt="images description"></div>
                            </div>

                            {{-- Mobile --}}
                            <div class="block-heading d-lg-none d-block text-center">
                                <h3 class="block-top-heading">APA ITU</h3>
                                <h2 class="block-main-heading">CAGAR BUDAYA?</h2>
                                <span class="block-sub-heading">Berikut penjelannya</span>
                                <div class="divider"><img src="assets/front/img/divider.png" alt="images description"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="col-wrap">
                            <div class="ico-box bg-gray-light has-radius-medium">
                                {{-- <div class="icon">
                                    <span class="custom-icon-pen-tool"><span class="sr-only">&amp;</span></span>
                                </div> --}}
                                <h4 class="content-title"><a href="#"><b>CAGAR BUDAYA</b></a></h4>
                                <div class="des">
                                    <p>Cagar budaya adalah tempat untuk melestarikan berbagai kebudayaan. Contohnya adalah bangunan lama yang memiliki nilai sejarah dan kerap menjadi obyek wisata, dan sering menjadi latar foto bagi para wisatawan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="content-block count-block text-center p-0 parallax" data-stellar-background-ratio="0.55">
            <div class="container-fluid">
                <div class="row no-gutters">
                    @foreach ($category as $item)
                    <div class="col-sm-12 col-lg-2">
                        <div class="col-wrap">
                            <div class="icon">
                                <img src="{{ $item->icons_url }}" style="max-height: 100px" class="image-responsive" alt="">
                            </div>
                            
                            <h3 class="number">{{ $item->total }}</h3>
                            <div class="text text-uppercase">TOTAL {{ $item->name }}</div>
                        </div>
                    </div>
                    @endforeach
                    {{-- <div class="col-sm-6 col-lg-3">
                        <div class="col-wrap">
                            <div class="icon">
                                <span class="custom-icon-smile"></span>
                            </div>
                            <h3 class="number">220</h3>
                            <div class="text text-uppercase">SATISFIED CLIENTS</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="col-wrap">
                            <div class="icon">
                                <span class="custom-icon-award"></span>
                            </div>
                            <h3 class="number">720</h3>
                            <div class="text text-uppercase">AWARDS WON</div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-lg-3">
                        <div class="col-wrap">
                            <div class="icon">
                                <span class="custom-icon-celebrate"></span>
                            </div>
                            <h3 class="number">707</h3>
                            <div class="text text-uppercase">MILESTONES MET</div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </section>
        <section class="content-block portfolio-block" id="container">
            <div class="bottom-space text-center text-uppercase">
                <h2>Cagar Budaya</h2>
                <div class="block-heading bottom-space">
                    <span class="block-sub-heading">BERIKUT CAGAR BUDAYA YANG BERADA DI DESA KERAMAS</span>
                    <div class="divider"><img src="assets/front/img/divider.png" alt="images description"></div>
                </div>
            </div>
            {{-- <ul class="filter-nav text-center button-group filter-button-group">
                <li>
                    <button data-filter="*">ALL</button>
                </li>
                <li>
                    <button data-filter=".ui">UI/UX DESIGN</button>
                </li>
                <li>
                    <button data-filter=".programming">PROGRAMMING</button>
                </li>
                <li>
                    <button data-filter=".photography">PHOTOGRAPHY</button>
                </li>
                <li>
                    <button data-filter=".ecommerce">ECOMMERCE</button>
                </li>
            </ul> --}}
            <div class="container">
                <div class="row multiple-row v-align-row">
                    @foreach ($list_cagbud as $item)
                    @if ($item->photo_url != null)
                    <div class="col-md-6 col-lg-4">
                        <div class="col-wrap">
                            <div class="post-grid">
                                <div class="img-block post-img">
                                    <img src="{{ $item->photo_url }}" alt="images">
                                </div>
                                <div class="post-text-block bg-gray-light">
                                    <h3 class="content-title mb-0"><b>{{ $item->name }}</b></h3>
                                    <span class="content-sub-title">
                                        <?= strlen($item->description) > 100 ? substr($item->description, 0, 100) . '...' : $item->description ?>
                                    </span>
                                    <div class="post-meta clearfix">
                                        <div class="post-link-holder">
                                            <a href="{{ route('detail.cagarbudaya', $item->id) }}">See More <span class="fa fa-arrow-right"><span class="sr-only">&nbsp;</span></span></a>
                                        </div>
                                        @if ($item->videos != null)
                                        <div class="post-social text-right">
                                            <ul class="social-network social-small">
                                                <li><a href="{{ $item->videos }}"><i class="fa-brands fa-youtube"></i></a></li>
                                            </ul>
                                        </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
        </section>
        {{-- <aside class="content-block">
            <div class="container">
                <div class="logo-container">
                    <div class="owl-carousel logo-slide" id="waituk-owl-slide-4">
                        <div class="slide-item">
                            <img src="assets/front/img/logo-01.png" alt="images description">
                        </div>
                        <div class="slide-item">
                            <img src="assets/front/img/logo-02.png" alt="images description">
                        </div>
                        <div class="slide-item">
                            <img src="assets/front/img/logo-03.png" alt="images description">
                        </div>
                        <div class="slide-item">
                            <img src="assets/front/img/logo-04.png" alt="images description">
                        </div>
                        <div class="slide-item">
                            <img src="assets/front/img/logo-03.png" alt="images description">
                        </div>
                    </div>
                </div>
            </div>
        </aside> --}}
    </div>
    <!--/main content wrapper -->
</main>
@endsection

@push('scripts')
<script type="text/javascript">
</script>
@endpush