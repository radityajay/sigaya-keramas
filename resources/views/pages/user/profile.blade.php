@extends('layouts.app')

@section('title')
{{$page_title}}
@endsection

@section('content')
<div class="col-6">
  <div class="card">
    <div class="card-body">
      <div class="row align-items-center">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-3">
              <div class="mb-3">
                <div>
                  <label style="color: #AEAEAE">Name</label>
                  <div>
                    <span>{{$data->name}}</span>
                  </div>
                </div>
              </div>
              <div class="mb-3">
                <div>
                  <label style="color: #AEAEAE">Username</label>
                </div>
                <div>
                  <span>{{$data->username}}</span>
                </div>
              </div>

              <div class="mb-3">
                <div>
                  <label style="color: #AEAEAE">Email</label>
                </div>
                <div>
                  <span>{{$data->email}}</span>
                </div>
              </div>

              <div class="mb-3">
                <div>
                  <label style="color: #AEAEAE">Position</label>
                </div>
                <div>
                  <span>{{$data->position->name}}</span>
                </div>
              </div>

            </div>
            <div class="col-sm-8">
              <div class="mb-5">
                <div>
                  <label style="color: #AEAEAE">Status</label>
                </div>
                <div>
                  @if ($data->status != false)
                    <span>Active</span>
                  @else
                    <span>Not Active</span>
                  @endif
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
</script>
@endpush