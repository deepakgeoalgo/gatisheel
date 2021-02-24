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
                        <a href="{{ route('issues.create') }}" class="btn btn-primary"><i class="fas fa-plus pr-1"></i>Issue Generate</a>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Issue Date</th>
                                            <th>Issue Description</th>
                                            <th>Current Status</th>
                                            <th>Ownership</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 
                                   @foreach($data as $key => $issue)                                 
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $issue->issue_date }}</td>
                                            <td>{{ $issue->issue_description }}</td>    
                                            <td>{{ $issue->current_status }}</td>
                                            <td>{{ $issue->ownership }}</td>
                                            <td>
                                                <a href="{{ route('issues.edit',$issue->id) }}" class="mr-1"><i class="fas fa-user-edit"></i></a>
                                                <a href="{{ route('issues.destroy',$issue->id) }}" class="text-danger"><i class="fas fa-user-times"></i></a>
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