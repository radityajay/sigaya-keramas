@extends('pages.partial.app')

@section('title')
{{$page_title}}
@endsection

@section('content')
<style>
    .box-category {
        position: relative;
        background: #5db85b;
        padding-left: 15px;
        padding-right: 15px;
        border-radius: 10px;
    }

    .box-title {
        padding: 5px;
        color: #f2f2f2
    }
</style>
<main class="no-banner" id="app">
    {{-- <section class="visual visual-sub visual-no-bg">
        <div class="visual-inner no-overlay bg-gray-light">
            <div class="centered">
                <div class="container">
                    <div class="visual-text visual-center">
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
    </section> --}}
    <section class="content-block portfolio-block mt-3" style="padding-top: 0px !important" id="container">
        <div class="container mb-5 mt-3">
            <div class="col-lg-12">
                <div class="d-lg-block d-none">
                    <div class="row">
                        <div class="col-md-10">
                            <input class="form-control" type="text" v-model="form.search" placeholder="Cari Cagar Budaya">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-success" @click="dataFilter" style="padding: 0.6375rem !important; border-radius: 20px; border: 1px solid #5db85b !important">Cari</button>
                        </div>
                    </div>
                </div>
                <div class="row d-lg-none d-block">
                    <input class="form-control" type="text" @keyup="dataFilter" v-model="form.search" placeholder="Cari Cagar Budaya">
                </div>
                <div class="row mb-5 d-lg-block d-none">
                    <div class="col-md-12">
                        <div class="mt-3 d-flex justify-content-center">
                            <div class="box-category text-center mr-2" @click="dataFilter()"
                                style="cursor: pointer;">
                                <div class="box-title">
                                    Semua
                                </div>
                            </div>
                            <div v-for="cat in dataCategory" :key="cat.id"
                                class="box-category text-center mr-2" @click="handleCategory(cat.id)"
                                style="cursor: pointer;">
                                <div class="box-title">
                                    @{{ cat.name }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 justify-content-center d-lg-none">
                    <div class="col-6 mb-4">
                        <div class="box-category text-center mr-2" @click="dataFilter()"
                        style="cursor: pointer;">
                            <div class="box-title">
                                Semua
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-4" v-for="cat in dataCategory" :key="cat.id">
                        <div class="box-category text-center mr-2" @click="handleCategory(cat.id)"
                        style="cursor: pointer;">
                            <div class="box-title">
                                @{{ cat.name }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row multiple-row v-align-row" v-if="dataCagbud.length != 0">
                    <div class="col-md-6 col-lg-4" v-for="(item, index) in dataCagbud" :key="'cagarBudaya'+index">
                        <div class="col-wrap" v-if="item.photo_url != null">
                            <div class="post-grid">
                                <div class="img-block post-img">
                                    <img :src="item.photo_url" alt="images">
                                </div>
                                <div class="post-text-block bg-gray-light">
                                    <h3 class="content-title mb-0"><b>@{{ item.name }}</b></h3>
                                    <span class="content-sub-title" v-html="item.description.slice(0,90)">

                                    </span>
                                    <div class="post-meta clearfix">
                                        <div class="post-link-holder">
                                            <a :href="'/cagar-budaya/'+item.id+'/detail'">See More <span
                                                    class="fa fa-arrow-right"><span
                                                        class="sr-only">&nbsp;</span></span></a>
                                        </div>
                                        {{-- <div class="post-social text-right" v-if="item.videos != null">
                                            <ul class="social-network social-small">
                                                <li><a :href="item.videos"><i class="fa-brands fa-youtube"></i></a></li>
                                            </ul>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else>
                    <div class="row multiple-row v-align-row">
                        <div class="col-lg-12 col-md-12">
                            <div class="col-wrap">
                                <div class="ico-box bg-gray-light has-radius-medium">
                                    {{-- <div class="icon">
                                        <span class="custom-icon-pen-tool"><span class="sr-only">&amp;</span></span>
                                    </div> --}}
                                    <h4 class="content-title">Tidak ada Cagar Budaya</h4>
                                    {{-- <div class="des">
                                        <p>Cagar budaya adalah tempat untuk melestarikan berbagai kebudayaan. Contohnya adalah bangunan lama yang memiliki nilai sejarah dan kerap menjadi obyek wisata, dan sering menjadi latar foto bagi para wisatawan.</p>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
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
                dataCagbud: {!! isset($list_cagbud) ? $list_cagbud : '[]' !!},
                dataCategory: {!! isset($category) ? $category : '[]' !!},
                form:{
                    category:"{!! old('category') ? old('category') : (isset($data) ? $data->category_id : '') !!}",
                    search: null
                }
            }
        },
        methods: {
            dataFilter(){
                $.ajax({
                    type: "GET",
                    url: '/api/cagar-budaya',
                    data: { 
                        "_token": "{{ csrf_token() }}",
                        category_id: this.form.category,
                        search: this.form.search
                    },
                    async: false,
                    success: (response) => {
                        console.log(response);
                        this.dataCagbud = response
                    }
                });
            },
            handleCategory(value){
                $.ajax({
                    type: "GET",
                    url: '/api/cagar-budaya',
                    data: { 
                        "_token": "{{ csrf_token() }}",
                        category_id: value,
                        search: this.form.search
                    },
                    async: false,
                    success: (response) => {
                        console.log(response);
                        this.dataCagbud = response
                    }
                });
            }
        },
        mounted(){    
            console.log(this.dataCagbud);
        }
    })
</script>
@endpush