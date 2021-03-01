@extends('admin.layouts.app')

@section('title', 'User Create')

@section('main_content')

    <!-- users create start -->    
    <section class="users-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Customer Details</span>
                            </a>
                        </li>                        
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">                            
                            <!-- users account form start -->
                            <form action="{{ route('installations.show') }}" method="GET" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="row px-5">
                                    <div class="col-12 col-sm-6">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th width="40%">Customer Name</th>
                                                    <td>{{ $customer->user->name }}</td>
                                                </tr>                                            
                                                <tr>
                                                    <th>Email</th>
                                                    <td>{{ $customer->user->email }}</td>
                                                </tr> 
                                                <tr>
                                                    <th>Phone</th>
                                                    <td>{{ $customer->user->phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Village</th>
                                                    <td>{{ $customer->village_name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>District</th>
                                                    <td>{{ $customer->district }}</td>
                                                </tr>
                                                <tr>
                                                    <th>State</th>
                                                    <td>{{ $customer->state }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Pincode</th>
                                                    <td>{{ $customer->pincode }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Year of Installation</th>
                                                    <td>{{ $customer->year }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Type of Model</th>
                                                    <td>{{ $customer->model_type }}</td>
                                                </tr> 
                                                <tr>
                                                    <th>Machine Installation Address</th>
                                                    <td>{{ $customer->installtion_address }}</td>
                                                </tr>                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th width="40%">Installation Machine Number</th>
                                                    <td>{{ $customer->installtion_machine_number }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Installation Mobile Number</th>
                                                    <td>{{ $customer->installtion_phone }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Installation Date</th>
                                                    <td>{{ $customer->installtion_date }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Responsible Service Person</th>
                                                    <td>{{ $customer->responsible_service_person }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Warranty Date</th>
                                                    <td>{{ $customer->warranty }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Invoice Value</th>
                                                    <td>{{ $customer->invoice_value }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Photograph</th>
                                                    <td><img src="{{ asset('product_images')}}/{{ $customer->installtion_image }}" width="120" height="120"></td>
                                                </tr>                                       
                                            </tbody>
                                        </table>
                                    </div>
                                    

                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-center mt-1">                                        
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
    
    </script>
@endsection