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
        <form action="{{ isset($data) ? route('users.update', $data->id) : route('users.store') }}" method="POST">
          @csrf

          @if (isset($data))
              @method('PUT')
          @endif
          <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required placeholder="Super Admin" value="{{isset($data) ? $data->name : old('name')}}" />
          </div>

          <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required placeholder="admin" value="{{isset($data) ? $data->username : old('username')}}" />
          </div>

          <div class="mb-3">
            <label>E-Mail</label>
            <div>
              <input type="email" name="email" class="form-control" required parsley-type="email"
                placeholder="Enter a valid e-mail" value="{{isset($data) ? $data->email : old('email')}}" />
            </div>
          </div>
          
          <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required placeholder="Password" />
            @if (isset($data))
                <small><i>*Leave blank if you don't want to change password</i></small>
            @endif
          </div>

          <div class="mb-3">
            <label>Position</label>
            <select name="position_id" required class="form-control">
              <option value="null" disabled>Select Position</option>
              @foreach ($position as $item)
                  @if (isset($data))
                      <option value="{{$item->id}}" {{$data->postion_id == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                  @else
                      <option value="{{$item->id}}" {{old('position_id') == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
                  @endif
              @endforeach
            </select>
          </div>

          <div class="mb-3">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" class="custom-control-input ind-checkbox"
                  id="is_active"
                  name="is_active"
                  @if (isset($data))
                      @if ($data->is_active == true)
                          checked
                      @endif
                  @endif
                  value="true">
              <label class="custom-control-label align-middle" for="is_active">Active</label>
            </div>
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