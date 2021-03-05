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

    <!-- Form create start -->    
    <section class="users-edit">
        <div class="card">
            <div class="card-content">
                <div class="card-body">
                    <ul class="nav nav-tabs mb-3" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                <i class="feather icon-info mr-25"></i><span class="d-none d-sm-block">Ticket Assign</span>
                            </a>
                        </li>                        
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">                            
                            <!-- Form start -->
                            <form action="{{ route('assign.update', $assigned->id) }}" method="POST" novalidate>
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Issue Date</label>
                                                <input type="date" class="form-control" placeholder="Issue Date" name="issue_date" value="{{ $assigned->issue_date }}" required data-validation-required-message="This issue date field is required" disabled>
                                            </div>
                                        </div>                                        
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Issue Description</label>
                                                <textarea class="form-control" name="issue_description" id="issue_description" placeholder="Issue Description" disabled>{{ $assigned->issue_description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Assign To</label>
                                            <select class="form-control" id="assign_to" name="assign_to">
                                                <option value="">Select Technician</option>  
                                                @foreach (\App\Models\Technician::with('user')->get() as $key => $technician)  
                                                <option  value="{{ $technician->user->id }}">{{ $technician->user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="form-group" id="techAddressDetaild">
                                            <div class="controls">
                                                <label>Technician Address</label>
                                                <textarea class="form-control" id="technician_address" rows="4" readonly></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Current Status</label>
                                                <input type="text" class="form-control" placeholder="Current Status" name="current_status" value="{{ $assigned->currentStatus->name }}" required data-validation-required-message="This current status field is required" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Ownership</label>
                                                <input type="text" class="form-control" placeholder="Ownership" name="ownership" value="{{ $assigned->owner->name }}" required data-validation-required-message="This ownership field is required" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Owner Location</label>
                                                <input type="text" class="form-control" value="{{ $assigned->CustomerDetails ? $assigned->CustomerDetails->district : '' }}" disabled>
                                                <span></span>
                                            </div>
                                        </div>                   
                                    </div>                                  

                                    <div class="col-12 d-flex flex-sm-row flex-column justify-content-end mt-1">
                                        <button type="submit" class="btn btn-primary glow mb-1 mb-sm-0 mr-1">Assign</button>
                                        <a href="{{ route('issues.index') }}" class="btn btn-info">Back</a>
                                    </div>
                                </div>
                            </form>
                            <!-- Form ends -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Forn create ends -->

@endsection

@section('page-script')
    <script>
        $(document).ready(function(){
            $('#techAddressDetaild').hide();
            $('#assign_to').change(function(){

                let id =  $('#assign_to').val();
                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
                });

            $.ajax({
                url: "{{ route('tech.get_address') }}",
                method: "POST",            
                data: { tech_id: id, _token: '{{ csrf_token() }}'},
                datatype: 'html',
                success: function(data){
                    $('#techAddressDetaild').show();
                    $('#technician_address').html('Address : '+data.address + '\r\nDistrict : ' + data.district + '\r\nState : ' + data.state  + '\r\nPincode : ' + data.pincode );
                        console.log(data);
                },  
                error: function(data){
                        console.log(data);
                
                },       
            });
                
            }) 
        });    
    </script>

@endsection