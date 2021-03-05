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
                                <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Issue Details</span>
                            </a>
                        </li>                        
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">                            
                            <!-- users account form start -->
                            <form action="{{ route('issues.show') }}" method="GET" enctype="multipart/form-data" novalidate>
                                @csrf
                                <div class="row px-5">
                                    <div class="col-12 col-sm-6">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th width="40%">Issue ID</th>
                                                    <td>{{ $issues->id }}</td>
                                                </tr>                                            
                                                <tr>
                                                    <th>Issue Date</th>
                                                    <td>{{ $issues->issue_date }}</td>
                                                </tr> 
                                                <tr>
                                                    <th>Issue Description</th>
                                                    <td>{{ $issues->issue_description }}</td>
                                                </tr>                                         
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <table class="table table-borderless">
                                            <tbody>
                                                <tr>
                                                    <th width="40%">Current Status</th>
                                                    <td>{{ $issues->currentStatus->name }}</td>
                                                </tr>
                                                <tr>
                                                    <th>Ownership</th>
                                                    <td>{{ $issues->owner->name }}</td>
                                                </tr> 
                                                <tr>
                                                    <th>Assigned Technician</th>
                                                    <td>{{ $issues->assignTo->name }}</td>
                                                </tr>                                 
                                            </tbody>
                                        </table>
                                    </div>                                    

                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-center mt-1">       
                                        <a href="{{ route('issues.index') }}" class="btn btn-info">Back</a>
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