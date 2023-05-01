@extends('layouts.app')

@section('title')
{{$page_title}}
@endsection

@section('content')

<!-- Notifikasi menggunakan flash session data -->
@if ($errors->any())
<div class="alert alert-danger">
  <ul style="margin-bottom:0px;">
    @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
    @endforeach
  </ul>
</div>
@endif
@if (session()->has('success'))
<div class="alert alert-success">
  {{ session()->get('success') }}
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger">
  {{ session()->get('error') }}
</div>
@endif

<div class="row">
  <div class="col-xl-12">
    <form action="{{ isset($data) ? route('cagar-budaya.update', $data->id) : route('cagar-budaya.store') }}"
      method="POST" enctype="multipart/form-data" id="app">
      @csrf

      @if (isset($data))
      @method('PUT')
      @endif

      <div class="card">
        <div class="card-body">
          <h4 class="card-title">Form {{ $page_title }}</h4>
          <br>
          <div class="mb-3">
            <label><span style="color: red">*</span> Nama</label>
            <input type="text" name="name" class="form-control" required placeholder="Pura Kebo Edan"
              value="{{isset($data) ? $data->name : old('name')}}" />
          </div>
  
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label>Link Sound</label>
                <input type="text" name="sound" class="form-control" placeholder=""
                  value="{{isset($data) ? $data->sound : old('sound')}}" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="mb-3">
                <label>Link Video</label>
                <input type="text" name="video" class="form-control" placeholder=""
                  value="{{isset($data) ? $data->video : old('video')}}" />
              </div>
            </div>
          </div>
  
          <div class="mb-3">
            <label><span style="color: red">*</span> Deskripsi</label>
            <textarea class="form-control" id="ckeditor" name="description" cols="30"
              rows="3">{{ isset($data) ? $data->description : old('description') }}</textarea>
            @if ($errors->any())
            @foreach ($errors->getMessages() as $key => $val)
            @if($key == "description")
            <div style="color: red;"> {{ $errors->first('description') }}</div>
            @endif
            @endforeach
            @endif
          </div>
  
          {{-- <div class="mb-3">
            <label><span style="color: red">*</span> Foto</label>
            <input type="file" name="photo" class="dropify" data-height="180" data-max-file-size="3M"
              data-allowed-file-extensions="jpg png gif jpeg" {!!isset($data->photo) ?
            "data-default-file='{$data->photo_url}'" : ''!!} accept="image/*"/>
            @if ($errors->any())
            @foreach ($errors->getMessages() as $key => $val)
            @if($key == "photo")
            <div style="color: red;"> {{ $errors->first('photo') }}</div>
            @endif
            @endforeach
            @endif
          </div> --}}
  
          <div class="row">
            <div class="col-lg-6">
              <div class="mb-3">
                <label><span style="color: red">*</span> Pilih Lokasi</label>
                <div class="container" id="mapid"></div>
                <div class="row mt-2">
                  <div class="col-6">
                    <input type="text" name="latitude" id="latitude" readonly
                  class="form-control @error ('latitude') is-invalid @enderror" placeholder="latitude" value="{{isset($data) ? $data->lat : old('latitude')}}">
                  </div>
                  <div class="col-6"><input type="text" name="longitude" id="longitude" readonly
                    class="form-control @error ('longitude') is-invalid @enderror" placeholder="longitude" value="{{isset($data) ? $data->long : old('longitude')}}"></div>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
            </div>
          </div>
          
  
        </div>
      </div>
  
      <div class="card">
        <div class="card-body">
            <h4 class="card-title">Gambar Cagar Budaya</h4>
  
            <div class="d-flex mb-3">
                <div v-for="(item, index) in list_cagarbudaya_images" v-if="item.photo_url" style="margin-right: 10px !important">
                    <img :src="item.photo_url ?? `/storage/upload/cagar-budaya/` + item" height="100px" width="100px">
                    <div class="mt-3 d-flex align-items-center justify-content-center">
                        <button class="btn btn-danger" type="button" @click="deleteImage(index)">Delete</button>
                    </div>
                </div>
            </div>
  
            <div class="row">
                <div id="my-dropzone" class="dropzone fallback">
                </div>
            </div>
  
            <br>
  
            <div class="col-md-12">
                <div class="form-group" style="float: right">
                    <a href="#" class="btn btn-light"><i class="ri-arrow-left-line"></i>  Kembali</a>
                    <button type="submit" class="btn btn-danger mr-2"><i class="ri-save-line"></i> Simpan</button>
                </div>
            </div>
        </div>
      </div>

      <div v-for="(item, index) in list_cagarbudaya_images">
        <input type="hidden" :name="`list_cagarbudaya_images[${index}][url]`" v-model="item.image" v-if="item.photo_url">
        <input type="hidden" :name="`list_cagarbudaya_images[${index}][url]`" v-model="item" v-else>
    </div>
    </form>
    
  </div> <!-- end col -->
</div> <!-- end row -->
@endsection

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
  integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
<script>
  Dropzone.autoDiscover = false
  $(document).ready(function () {
    
    CKEDITOR.replace(
        'ckeditor',
        {
            toolbar: [
                ['Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', '-', 'Undo', 'Redo','FontSize', 'Bold', 'Italic','Underline','Center','Link', 'Unlink']
            ],
            height: 200
        },
    );

    $('.dropify').dropify({
        messages: {
            'default': 'Upload',
            'replace': 'Click to replace',
            'remove':  'Remove',
            'error':   'Ooops, something wrong happended.'
        }
    });

    function onlyNumberKey(evt) {
        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }

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

    var app = new Vue({
        el: '#app',
        data(){
            return{
                is_edit_product: false,
                index_product: 0,
                list_cagarbudaya_images: {!! $listImage ?? '[]' !!},
                deleted_products: [],
            }
        },
        methods: {
            deleteImage(index){
                this.list_cagarbudaya_images.splice(index, 1);
            },
        },
        mounted(){    
            let _this = this;

            let myDropzone = new Dropzone("div#my-dropzone", {
                url: "{{ route('upload') }}",
                init: function () {
                    this.on('success', function(file, response){
                        console.log('dropzone on success');
                        console.log(response);

                        _this.list_cagarbudaya_images.push(response.data);
                    });
                },
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
        }
    })

</script>
@endpush