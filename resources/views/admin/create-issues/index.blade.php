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
                     <span class="text-primary text-bold-700">Issue List</span>
                    <a href="{{ route('issues.create') }}" class="btn btn-primary"><i class="fas fa-plus pr-1"></i>Create Issue Ticket</a>
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
                                        <th>Location</th>
                                        <th>Assign To</th>
                                        <th class="text-right" width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody> 
                                @foreach($data as $key => $issue)    

                                    <tr>
                                        <td>{{ ++$i }}</td>
                                        <td>{{ $issue->issue_date }}</td>
                                        <td>{{ $issue->issue_description }}</td>    
                                        <td>
                                            @if($issue->currentStatus->id == 1)
                                            <span class="badge badge-pill badge-success mr-1">{{ $issue->currentStatus->name }}</span>
                                            @elseif($issue->currentStatus->id == 2)
                                            <span class="badge badge-pill badge-warning mr-1">{{ $issue->currentStatus->name }}</span>
                                            @elseif($issue->currentStatus->id == 3)
                                            <span class="badge badge-pill badge-danger mr-1">{{ $issue->currentStatus->name }}</span>
                                            @else
                                            {{ $issue->currentStatus->name }}
                                            @endif
                                            
                                        </td>
                                        <td>{{ $issue->owner->name }}</td>
                    <td>{{ $issue->CustomerDetails ? $issue->CustomerDetails->district : ''}}</td>
                                        <td>                                     
                                            {{ $issue->assignTo ? $issue->assignTo->name : ' ' }}
                                        </td>
                                        <td class="float-right">
                                            @if($issue->assign_to > 0)
                                            <span class="badge badge-pill badge-success mr-1">Assigned</span>
                                            @else
                                            <a href="{{ route('assign.edit',$issue->id) }}" class="mr-1 badge badge-pill badge-warning text-bold-700">Assign</a>
                                            @endif

                                            <a href="{{ route('issues.show',$issue->id) }}" class="mr-1 text-info"><i class="fas fa-eye"></i></a>
                                            <a href="{{ route('issues.edit',$issue->id) }}" class="mr-1"><i class="fas fa-user-edit"></i></a>
                                            <!-- <a href="{{ route('issues.destroy',$issue->id) }}" class="text-danger"><i class="fas fa-user-times"></i></a> -->
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
                                        <th>Location</th>
                                        <th>Assign To</th>                       
                                        <th class="float-right">Action</th>
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