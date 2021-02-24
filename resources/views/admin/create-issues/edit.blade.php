@extends('admin.layouts.app')

@section('title', 'User Create')

@section('main_content')

@if (count($errors) > 0)
<div class="alert alert-danger alert-dismissible fade show" role="alert">    
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @break
        @endforeach
    </ul>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

    <!-- Form create start -->    
    <section class="users-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Installation Details</span>
                            </a>
                        </li>                        
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">                            
                            <!-- Form start -->
                            <form action="{{ route('issues.update', $issues->id) }}" method="POST" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Issue Date</label>
                                                <input type="date" class="form-control" placeholder="Issue Date" name="issue_date" value="{{ $issues->issue_date }}" required data-validation-required-message="This issue date field is required">
                                            </div>
                                        </div>                                        
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Issue Description</label>
                                                <textarea class="form-control" name="issue_description" id="issue_description" placeholder="Issue Description">{{ $issues->issue_description }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Current Status</label>
                                                <input type="text" class="form-control" placeholder="Current Status" name="current_status" value="{{ $issues->current_status }}" required data-validation-required-message="This current status field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Ownership</label>
                                                <input type="text" class="form-control" placeholder="Ownership" name="ownership" value="{{ $issues->ownership }}" required data-validation-required-message="This ownership field is required">
                                            </div>
                                        </div>                   
                                    </div>                                  

                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-1">Update</button>
                                        <a href="{{ route('issues.index') }}" class="btn btn-info">Back</a>
                                    </div>
                                </div>
                            </form>
                            <!-- Form ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Forn create ends -->

@endsection

@section('page-script')
    <script>
    var x = document.getElementById("installtion_address");

    function getLocation() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
      } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
      }
    }

    function showPosition(position) {
      x.innerHTML = "Latitude: " + position.coords.latitude + 
      "\nLongitude: " + position.coords.longitude;
    }
</script>
@endsection