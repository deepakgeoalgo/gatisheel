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
                        <span class="text-primary text-bold-700">Customer List</span>
                        <a href="{{ route('installations.create') }}" class="btn btn-primary"><i class="fas fa-plus pr-1"></i>Customer</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Customer Name</th>
                                            <th>Phone</th>
                                            <th>Village</th>                            
                                            <th>Type of Model</th>
                                            <th>Machine Number</th>
                                            <th>Invoice Value</th>
                                            <th>Images</th>
                                            <th width="12%">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 

                                   @foreach($data as $key => $install)                                 
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $install->user->name }}</td>
                                            <td>{{ $install->user->phone }}</td>
                                            <td>{{ $install->village_name }}</td>
                                            <td>{{ $install->model_type }}</td>
                                            <td>{{ $install->installtion_machine_number }}</td>                                      
                                            <td>{{ $install->invoice_value }}</td>
                                            <td><img src="{{ asset('product_images')}}/{{ $install->installtion_image }}" width="100"></td>
                                            <td>
                                                <a href="{{ route('installations.show',$install->id) }}" class="mr-1"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('installations.edit',$install->id) }}" class="mr-1"><i class="fas fa-user-edit"></i></a>
                                                <a href="{{ route('installations.destroy',$install->id) }}" class="text-danger"><i class="fas fa-user-times"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Customer Name</th>
                                            <th>Phone</th>
                                            <th>Village</th>                            
                                            <th>Type of Model</th>
                                            <th>Machine Number</th>
                                            <th>Invoice Value</th>
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