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
                                <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Technician Account</span>
                            </a>
                        </li>                        
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">                            
                            <!-- users account form start -->
                            <form action="{{ route('technicians.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Name</label>
                                                <input type="text" class="form-control" placeholder="Technician Name" name="name" value="{{ old('name') }}" required data-validation-required-message="This username field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email') }}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Phone</label>
                                                <input type="number" class="form-control" placeholder="Phone" name="phone" value="{{ old('phone') }}" required data-validation-required-message="This phone field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>PAN</label>
                                                <input type="text" class="form-control" placeholder="PAN" name="pan" value="{{ old('pan') }}" required data-validation-required-message="This pan number field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>GSTN</label>
                                                <input type="text" class="form-control" placeholder="GSTN" name="gstn" value="{{ old('gstn') }}" required data-validation-required-message="This gstn field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Address</label>
                                                <textarea class="form-control" name="address" id="address" placeholder="Address">{{ old('address') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>District</label>
                                                <input type="text" class="form-control" placeholder="District" name="district" value="{{ old('district') }}" required data-validation-required-message="This district field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>State</label>
                                                <input type="text" class="form-control" placeholder="Village" name="state" value="{{ old('state') }}" required data-validation-required-message="This state field is required">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Pincode</label>
                                                <input type="number" class="form-control" placeholder="Pincode" name="pincode" value="{{ old('pincode') }}" required data-validation-required-message="This pincode field is required">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Photograph</label>
                                                <input type="file" class="form-control" placeholder="Photograph" name="photo" value="{{ old('photo') }}" required data-validation-required-message="This installation photo field is required">
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
                                        <a href="{{ route('technicians.index') }}" class="btn btn-info">Back</a>
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
    
    </script>
@endsection