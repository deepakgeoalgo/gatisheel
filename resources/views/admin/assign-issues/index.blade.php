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
                        <span class="text-primary text-bold-700">Assigned Issue List</span>
                        <a href="{{ route('assign-issues.create') }}" class="btn btn-primary"><i class="fas fa-plus pr-1"></i>Assign Issue</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Issue ID</th>
                                            <th>Assigned To</th>
                                            <th>Remark</th>
                                            <th>Ownership</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                   @foreach($data as $key => $assign)                                 
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $assign->issue }}</td>
                                            <td>{{ $assign->assigned_to }}</td>    
                                            <td>{{ $assign->comment }}</td>
                                            <td>{{ $assign->createIssue->ownership }}</td>
                                            <td>
                                                <!-- <a href="{{ route('assign-issues.edit',$assign->id) }}" class="mr-1"><i class="fas fa-user-edit"></i></a> -->
                                                <a href="{{ route('assign-issues.destroy',$assign->id) }}" class="text-danger"><i class="fas fa-user-times"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Issue Date</th>
                                            <th>Issue Description</th>
                                            <th>Current Status</th>
                                            <th>Ownership</th>
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