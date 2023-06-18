@extends('pages.partial.app')

@section('title')
{{$page_title}}
@endsection

@section('content')
<main class="no-banner">
    <section class="visual visual-sub visual-no-bg">
        <div class="visual-inner no-overlay bg-gray-light">
            <div class="centered">
                <div class="container">
                    <div class="visual-text visual-center">
                        {{-- <h1 class="visual-title visual-sub-title">Header V3</h1> --}}
                        <div class="breadcrumb-block">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ url('/') }}"> Beranda </a></li>
                                <li class="breadcrumb-item active"> {{ $page_title }} </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content-block portfolio-block mt-3" style="padding-top: 0px !important" id="container">
        <div class="container mb-5">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-md-4">
                        <input class="form-control" type="text" placeholder="Nama Cagar Budaya">
                    </div>
                    <div class="col-md-4">
                        <select class="form-control">
                            <option>Pilih Kategori</option>
                            @foreach ($category as $item)
                                @if (isset($data))
                                    <option value="{{$item->id}}" {{$data->postion_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                @else
                                    <option value="{{$item->id}}" {{old('category_id') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
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
</main>
@endsection

@push('scripts')
<script type="text/javascript">
    var app = new Vue({
        el: '#app',
        data(){
            return{
                
            }
        },
        methods: {
        },
        mounted(){    
        }
    })
</script>
@endpush