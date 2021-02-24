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
                            <form action="{{ route('customers.update', $customer->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Customer Name</label>
                                                <input type="text" class="form-control" placeholder="Customer Name" name="customer_name" value="{{ $customer->customer_name }}" required data-validation-required-message="This username field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Village</label>
                                                <input type="text" class="form-control" placeholder="Village" name="village_name" value="{{ $customer->village_name }}" required data-validation-required-message="This village field is required">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Type of Model</label>
                                            <select class="form-control" id="model_type" name="model_type">
                                                <option value="{{ $customer->model_type }}">{{ $customer->model_type }}</option>    
                                                <option value="MP4">MP4</option>
                                                <option value="GSM Dryrun">GSM dryrun</option>
                                                <option value="M4+Battery">M4+battery</option>
                                            </select>
                                        </div>  
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Responsible Service Person</label>
                                                <input type="text" class="form-control" placeholder="Responsible Service Person" name="responsible_service_person" value="{{ $customer->responsible_service_person }}" required data-validation-required-message="This responsible service person field is required">
                                            </div>
                                        </div>                               
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Warranty Timing</label>
                                                <input type="date" class="form-control" placeholder="Warranty Timing" name="warranty" value="{{ $customer->warranty }}" required data-validation-required-message="This warranty timing field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Refer New Customer</label>
                                                <input type="text" class="form-control" placeholder="Refer New Customer" name="refer_new_customer" value="{{ $customer->refer_new_customer }}" required data-validation-required-message="This Refer New Customer field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Warranty Renewal</label>
                                                <input type="date" class="form-control" placeholder="Warranty Renewal" name="warranty_renewal" value="{{ $customer->warranty_renewal }}" required data-validation-required-message="This warranty renewal field is required">
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Images</label>
                                                <input type="file" class="form-control" placeholder="Installation Date" name="image" value="{{ $customer->image }}" >
                                            </div>
                                        </div>                             
                                    </div>                               

                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-1">Update</button>
                                        <a href="{{ route('customers.index') }}" class="btn btn-info">Back</a>
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