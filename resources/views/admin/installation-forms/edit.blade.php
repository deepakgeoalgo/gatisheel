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
                            <form action="{{ route('installations.update', $installations->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Customer Name</label>
                                                <input type="text" class="form-control" placeholder="Customer Name" name="name" value="{{ $installations->user->name }}" required data-validation-required-message="This username field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $installations->user->email }}" required data-validation-required-message="This year field is required">
                                            </div>
                                        </div>                           

                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Year</label>
                                                <input type="text" class="form-control" placeholder="Year" name="year" value="{{ $installations->year }}" required data-validation-required-message="This year field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Village</label>
                                                <input type="text" class="form-control" placeholder="Village" name="village_name" value="{{ $installations->village_name }}" required data-validation-required-message="This village field is required">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Type of Model</label>
                                            <select class="form-control" id="model_type" name="model_type">
                                                <option value="{{ $installations->model_type }}">{{ $installations->model_type }}</option>    
                                                <option value="MP4">MP4</option>
                                                <option value="GSM Dryrun">GSM dryrun</option>
                                                <option value="M4+Battery">M4+battery</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Customer Mobile</label>
                                                <input type="number" class="form-control" placeholder="Customer Mobile" name="phone" value="{{ $installations->user->phone }}" required data-validation-required-message="This phone field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Installation Address</label>
                                                <textarea class="form-control" name="installtion_address" id="installtion_address" placeholder="Installation Address">{{ $installations->installtion_address }}</textarea>
                                            </div>
                                        </div>   
                                        <a class="btn btn-warning" id="findAddress" onclick="getLocation()" style="color: #fefefe;">Find Address</a>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Installation Machine Number</label>
                                                <input type="text" class="form-control" placeholder="Installation Machine Number" name="installtion_machine_number" value="{{ $installations->installtion_machine_number }}" required data-validation-required-message="This Installation Machine Number field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Installation Mobile Number</label>
                                                <input type="text" class="form-control" placeholder="Installation Mobile Number" name="installtion_phone" value="{{ $installations->installtion_phone }}" required data-validation-required-message="This Installation mobile number field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Installation Date</label>
                                                <input type="date" class="form-control" placeholder="Installation Date" name="installtion_date" value="{{ $installations->installtion_date }}" required data-validation-required-message="This installation date field is required">
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Images</label>
                                                <input type="file" class="form-control" placeholder="Installation Date" name="image" value="{{ $installations->image }}" required data-validation-required-message="This installation image field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Invoice Value</label>
                                                <input type="text" class="form-control" placeholder="Invoice Value Date" name="invoice_value" value="{{ $installations->invoice_value }}" required data-validation-required-message="This invoice value field is required">
                                            </div>
                                        </div>   
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Password</label>
                                                <input type="password" class="form-control" placeholder="Password" name="password" required data-validation-required-message="This password field is required">
                                            </div>
                                        </div>                                    
                                    </div>                                 

                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-1">Save</button>
                                        <a href="{{ route('installations.index') }}" class="btn btn-info">Back</a>
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