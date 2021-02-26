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
                                <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Technician Details</span>
                            </a>
                        </li>                        
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">                            
                            <!-- users account form start -->
                            <form action="{{ route('technicians.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="row px-5">
                                    <div class="col-12 col-sm-6">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th width="40%">Technician Name</th>
                                                    <td>{{ $technicians->user->name }}</td>
                                                </tr>                                            
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ $technicians->user->email }}</td>
                                                </tr> 
                                                <tr>
                                                    <th>Phone</th>
                                                    <td>{{ $technicians->user->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th>PAN</th>
                                                    <td>{{ $technicians->pan }}</td>
                                                </tr>
                                                <tr>
                                                    <th>GSTN</th>
                                                    <td>{{ $technicians->gstn }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Adderss</th>
                                                    <td>{{ $technicians->address }}</td>
                                                </tr>                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th width="40%">District</th>
                                                    <td>{{ $technicians->district }}</td>
                                                </tr>
                                                <tr>
                                                    <th>State</th>
                                                    <td>{{ $technicians->state }}</td>
                                                </tr>
                                                <tr>
                                                    <th>PIN Code</th>
                                                    <td>{{ $technicians->pincode }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Photograph</th>
                                                    <td><img src="{{ asset('tech_photos')}}/{{ $technicians->photo }}" width="120" height="120"></td>
                                                </tr>                                       
                                            </tbody>
                                        </table>
                                    </div>
                                    

                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-center mt-1">                                        
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