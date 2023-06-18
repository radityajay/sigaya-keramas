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

<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0">{{ $page_title }}</h4>

      <div class="page-title-right">
        <button id="btn-print" class="btn btn-primary btn-icon-text">
          <div>
            <i style="font-size: 18px;float: left;margin-right: 5px;" class="ri-printer-fill"></i> <span
              style="position: relative;top: 4px;">Print </span>
          </div>
        </button>
      </div>

    </div>
  </div>
</div>
<!-- end page title -->

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 containerqrpage">
            <div class="title-qrcode">
              <h1 class="py-3">{{ $data->name }}</h1>
            </div>
            <div class="mt-3">
              <div class="qrcodecont">
                <div class="qrcodecont-border">
                  {!! QrCode::size(200)->generate(route('cagarbudaya.show', $data->id)) !!}
                </div>
              </div>
              <div class="title-qrcode">
                <h1 class="py-3">SCAN ME</h1>
              </div>
              <div class="qrlink">
                <a href="{{ route('detail.cagarbudaya', $data->id) }}" style="text-decoration: none" target="_blank">{{
                  route('detail.cagarbudaya', $data->id) }}</a>
              </div>
            </div>

          </div>
        </div>
      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<!-- end row-->
@endsection

@push('scripts')
<script type="text/javascript">
  $('#btn-print').on('click', function(){
        window.print()
    })
</script>
@endpush