@extends('admin.layouts.app')

@section('title', 'User List Page')

@section('main_content')

@if($message = Session::get('success'))
<div class="alert alert-success" role="alert"> 
  <small>{{ $message }}</small>
</div>
@endif

    <!-- users list start -->   
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('customers.create') }}" class="btn btn-primary"><i class="fas fa-plus pr-1"></i>New Customer</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Customer Name</th>
                                            <th>Village</th>
                                            <th>Type of Model</th>
                                            <th>Responsible Service Person</th>
                                            <th>Warranty</th>
                                            <th>Refer New Customer</th>
                                            <th>Warranty Renewal</th>
                                            <th>Images</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                   @foreach($data as $key => $customer)                                 
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $customer->customer_name }}</td>    
                                            <td>{{ $customer->village_name }}</td>
                                            <td>{{ $customer->model_type }}</td>          
                                            <td>{{ $customer->responsible_service_person }}</td>
                                            <td>{{ $customer->warranty }}</td>
                                            <td>{{ $customer->refer_new_customer }}</td>
                                            <td>{{ $customer->warranty_renewal }}</td>
                                            <td><img src="{{ asset('customer_images')}}/{{ $customer->image }}" width="100"></td>
                                            <td>
                                                <a href="{{ route('customers.edit',$customer->id) }}" class="mr-1"><i class="fas fa-user-edit"></i></a>
                                                <a href="{{ route('customers.destroy',$customer->id) }}" class="text-danger"><i class="fas fa-user-times"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Customer Name</th>
                                            <th>Village</th>
                                            <th>Type of Model</th>
                                            <th>Responsible Service Person</th>
                                            <th>Warranty</th>
                                            <th>Refer New Customer</th>
                                            <th>Warranty Renewal</th>
                                            <th>Images</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>   
    <!-- users list ends -->

@endsection