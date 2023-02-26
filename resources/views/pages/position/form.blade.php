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
  <div class="col-xl-6">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Form {{ $page_title }}</h4>
        <br>
        <form action="{{ isset($data) ? route('position.update', $data->id) : route('position.store') }}" method="POST">
          @csrf

          @if (isset($data))
              @method('PUT')
          @endif
          <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required placeholder="Leader" value="{{isset($data) ? $data->name : old('name')}}" />
          </div>

          <div class="mb-0" style="float: right">
            <div>
              <button type="submit" class="btn btn-primary waves-effect waves-light me-1">
                Submit
              </button>
              <button type="reset" class="btn btn-secondary waves-effect">
                Cancel
              </button>
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
</script>
@endpush