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
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form {{ $page_title }}</h4>
        <br>
        <form action="{{ isset($data) ? route('category.update', $data->id) : route('category.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          @if (isset($data))
              @method('PUT')
          @endif
          <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required placeholder="Situs" value="{{isset($data) ? $data->name : old('name')}}" />
          </div>

          <div class="mb-3">
            <label>Icon</label>
            <input type="file" name="photo" class="dropify" data-height="180" data-max-file-size="3M" data-allowed-file-extensions="jpg png gif jpeg" {!!isset($data->icons) ? "data-default-file='{$data->icons_url}'" : ''!!} accept="image/*"/>
            @if ($errors->any())
                @foreach ($errors->getMessages() as $key => $val)
                    @if($key == "icons")
                        <div style="color: red;"> {{ $errors->first('icons') }}</div>
                    @endif
                @endforeach
            @endif
            @if (!isset($data))
                <small><i>*Icon maksimal menggunakan ukuran 100x100</i></small>
            @endif
          </div>

          <div class="col-md-12">
            <div class="form-group" style="float: right">
                <a href="{{ route('category.index') }}" class="btn btn-light"><i class="ri-arrow-left-line"></i>  Kembali</a>
                <button type="submit" class="btn btn-success mr-2"><i class="ri-save-line"></i> Simpan</button>
            </div>
        </div>
        </form>

      </div>
    </div>
  </div> <!-- end col -->
</div> <!-- end row -->
@endsection

@push('scripts')
<script type="text/javascript">
  $(document).ready(function () {
        $('.dropify').dropify({
            messages: {
                'default': 'Drop a file here or click',
                'replace': 'Drop or click to replace',
                'remove': 'Remove',
                'error': 'Ooops, something wrong happended.'
            }
        });
    });
</script>
@endpush