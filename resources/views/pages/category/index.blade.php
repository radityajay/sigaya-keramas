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
      <h4 class="mb-sm-0">List {{ $page_title }}</h4>

      <div class="page-title-right">
        <a href="{{ route('category.create') }}" class="btn btn-primary btn-icon-text">
          <div>
            <i style="font-size: 18px;float: left;margin-right: 5px;" class="ri ri-add-circle-line"></i> <span
              style="position: relative;top: 4px;">Add {{ $page_title }}</span>
          </div>
        </a>
      </div>

    </div>
  </div>
</div>
<!-- end page title -->

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-body">
        <table id="datatable" class="table dt-responsive nowrap w-100">
          <thead>
            <tr>
              <th>Name</th>
              <th>Action</th>
            </tr>
          </thead>

          <tbody>

          </tbody>
        </table>

      </div> <!-- end card body-->
    </div> <!-- end card -->
  </div><!-- end col-->
</div>
<!-- end row-->
@endsection

@push('scripts')
<script type="text/javascript">
  $(document).ready(function(){
        dataTable = $("#datatable").DataTable({
            ajax: "{{route('category.index')}}?type=datatable",
            processing: true,
            orderable: true,
            autoWidth: false,
            order: [[ 1, "asc" ]],
            columns: [
                { data: "name", name: "name", orderable: true },
                { data: "action", name: "action", orderable: true },
            ]
        });
    });
</script>
@endpush