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
                        <span class="text-primary text-bold-700">Machine List</span>
                        <a href="{{ route('machines.create') }}" class="btn btn-primary"><i class="fas fa-plus pr-1"></i>Machine</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Model</th>
                                            <th>Machine Number</th>
                                            <th>Details</th>
                                            <th>Warranty</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                   @foreach($data as $key => $machine)                                 
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $machine->machine_model }}</td>
                                            <td>{{ $machine->machine_number }}</td>    
                                            <td>{{ $machine->machine_details }}</td>
                                            <td>{{ $machine->machine_warranty }}</td>
                                            <td>
                                                <a href="{{ route('machines.edit',$machine->id) }}" class="mr-1"><i class="fas fa-user-edit"></i></a>
                                                <a href="{{ route('machines.destroy',$machine->id) }}" class="text-danger"><i class="fas fa-user-times"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Model</th>
                                            <th>Machine Number</th>
                                            <th>Details</th>
                                            <th>Warranty</th>
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