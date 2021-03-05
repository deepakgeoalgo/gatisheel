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

    <!-- users create start -->    
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
                            <!-- users account form start -->
                            <form action="{{ route('installations.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Customer Name</label>
                                                <input type="text" class="form-control" placeholder="Customer Name" name="name" value="{{ old('name') }}" required data-validation-required-message="This username field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}" required data-validation-required-message="This year field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Phone</label>
                                                <input type="number" class="form-control" placeholder="Customer Phone" name="phone" value="{{ old('phone') }}" required data-validation-required-message="This phone field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Village</label>
                                                <input type="text" class="form-control" placeholder="Village" name="village_name" value="{{ old('village_name') }}" required data-validation-required-message="This village field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>District</label>
                                                <input type="text" class="form-control" placeholder="District" name="district" value="{{ old('district') }}" required data-validation-required-message="This district field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>State</label>
                                                <input type="text" class="form-control" placeholder="State" name="state" value="{{ old('state') }}" required data-validation-required-message="This state field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Pincode</label>
                                                <input type="text" class="form-control" placeholder="Pincode" name="pincode" value="{{ old('pincode') }}" required data-validation-required-message="This pincode field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Year of Installation</label>
                                                <input type="text" class="form-control" placeholder="Year" name="year" value="{{ old('year') }}" required data-validation-required-message="This year field is required">
                                            </div>
                                        </div>                                        
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Machine Installation Address</label>
                                                <textarea class="form-control" name="installtion_address" id="installtion_address" placeholder="Installation Address">{{ old('installtion_address') }}</textarea>
                                            </div>
                                        </div>   
                                        <a class="btn btn-warning" id="findAddress" onclick="getLocation()" style="color: #fefefe;">Find Address</a>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        
                                        <div class="form-group">
                                            <label>Type of Model</label>
                                            <select class="form-control" id="model_type" name="model_type">
                                                <option value="">Select Model</option>
                                                @foreach($machines as $machine)    
                                                <option value="{{ $machine->id }}">{{ $machine->machine_model }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Installation Machine Number</label>
                                                <input type="text" class="form-control" placeholder="Installation Machine Number" name="installtion_machine_number" value="{{ old('installtion_machine_number') }}" required data-validation-required-message="This Installation Machine Number field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Installation Mobile Number</label>
                                                <input type="text" class="form-control" placeholder="Installation Mobile Number" name="installtion_phone" value="{{ old('installtion_phone') }}" required data-validation-required-message="This Installation mobile number field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Installation Date</label>
                                                <input type="date" class="form-control" placeholder="Installation Date" name="installtion_date" value="{{ old('installtion_date') }}" required data-validation-required-message="This installation date field is required">
                                            </div>
                                        </div> 
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Installation Image</label>
                                                <input type="file" class="form-control" placeholder="Installation Date" name="installtion_image" value="{{ old('installtion_image') }}" required data-validation-required-message="This installation image field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Responsible Service Person</label>
                                                <input type="text" class="form-control" placeholder="Responsible Service Person" name="responsible_service_person" value="{{ old('responsible_service_person') }}" required data-validation-required-message="This responsible service person field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Warranty Date</label>
                                                <input type="date" class="form-control" placeholder="Warranty Date" name="warranty" value="{{ old('warranty') }}" required data-validation-required-message="This warranty field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Invoice Value</label>
                                                <input type="text" class="form-control" placeholder="Invoice Value" name="invoice_value" value="{{ old('invoice_value') }}" required data-validation-required-message="This invoice value field is required">
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
                            <!-- users account form ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- users create ends -->

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

    // Option selected
    $(document).ready(function() {
        const modelTypeOldValue = '{{ old('model_type') }}';

        if(modelTypeOldValue !== '') {
          $('#model_type').val(modelTypeOldValue);
        }
    });

</script>
@endsection