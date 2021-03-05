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
                                <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Ticket details</span>
                            </a>
                        </li>                        
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">                            
                            <!-- users account form start -->
                            <form action="{{ route('issues.store') }}" method="POST" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Issue Date</label>
                                                <input type="date" class="form-control" placeholder="Issue Date" name="issue_date" value="{{ old('issue_date') }}" required data-validation-required-message="This issue date field is required">                        
                                            </div>
                                        </div>                                        
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Issue Description</label>
                                                <textarea class="form-control" name="issue_description" id="issue_description" placeholder="Issue Description">{{ old('issue_description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Current Status</label>
                                                <select class="form-control" id="current_status" name="current_status">
                                                <option value="">Select Status</option>
                                                @foreach($statuses as $status)    
                                                <option value="{{ $status->id }}">{{ $status->name }}</option>
                                                @endforeach
                                                </select>
<!-- 
                                                <input type="text" class="form-control" placeholder="Current Status" name="current_status" value="{{ old('current_status') }}" required data-validation-required-message="This current status field is required"> -->
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Ownership</label>
                                                <select class="form-control" id="ownership" name="ownership">
                                                <option value="">Select Ownership</option>
                                                @foreach($installations as $owner)    
                                                <option value="{{ $owner->user->id }}">{{ $owner->user->phone }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>  

                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Select Machine</label>
                                                <select class="form-control" id="installation_id" name="installation_id">
                                                <option value="">Select Machin</option>
                                                @foreach($installations as $owner)    
                                                <option value="{{ $owner->id }}">{{ $owner->installtion_machine_number }}</option>
                                                @endforeach
                                                </select>
                                            </div>
                                        </div>                 
                                    </div>                                 

                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-1">Save</button>
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
        $(document).ready(function(){
            var today = new Date().toISOString().split('T')[0];
            document.getElementsByName("issue_date")[0].setAttribute('max', today);  

            // Current ststus
            const statusOldValue = '{{ old('current_status') }}';

            if(statusOldValue !== '') {
              $('#current_status').val(statusOldValue);
            } 
        });    
    </script>
@endsection