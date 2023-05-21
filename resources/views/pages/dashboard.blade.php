@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="row">
  <div class="col-xl-12">
      <div class="row">
          <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex">
                          <div class="flex-1 overflow-hidden">
                              <p class="text-truncate font-size-14 mb-2">Category</p>
                              <h4 class="mb-0">{{ $users }}</h4>
                          </div>
                          <div class="text-primary ms-auto">
                              <i class="ri-account-circle-line font-size-24"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
          <div class="col-md-4">
              <div class="card">
                  <div class="card-body">
                      <div class="d-flex">
                          <div class="flex-1 overflow-hidden">
                              <p class="text-truncate font-size-14 mb-2">Cagar Budaya</p>
                              <h4 class="mb-0">{{ $positions }}</h4>
                          </div>
                          <div class="text-primary ms-auto">
                              <i class="ri-contacts-book-line font-size-24"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- end row -->
  </div>
</div>
<!-- end row -->
@endsection

@push('scripts')
    
@endpush