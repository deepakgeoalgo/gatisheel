@extends('admin.layouts.app')

@section('title', 'User Create')

@section('page-style')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

@endsection

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
                                                <input type="number" class="form-control" placeholder="Type your registred mobile number" id="ownership" name="ownership">
                                                <div id="ownerNumber"></div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="controls">
                                                <label>Select Machine</label>
                                                <select class="form-control" id="installation_id" name="installation_id">
                                                <option value="">Select Machin</option>

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
        $('#ownership').keyup(function(){
            let number =  $('#ownership').val();

            console.log(number);
            $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

        $.ajax({
            url: "{{ route('owner.get_number') }}",
            method: "POST",            
            data: { number : number, _token: '{{ csrf_token() }}'},
            datatype: 'html',
            success: function(data){                
               // console.log(data);
                $('#ownerNumber').show();
                var number = [];
                for (var i = 0; i < data.length; i++) {
                    number[i]='<a href="#"><p style="margin:1px" onclick="selectPhone('+data[i].phone+')">'+data[i].phone+'</p></a>';
                 //  console.log('<p>'+data[i].id+'</p>');
                }
               $('#ownerNumber').html(number);
            
            },
            error: function(data){
               // console.log(data);            
            },       
        });
            
        }) 

        function selectPhone(value){
          //  console.log(value);
            $('#ownership').val(value);
            $('#ownerNumber').hide();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
            url: "{{ route('owner.get_machine') }}",
            method: "POST",            
            data: { machine : value, _token: '{{ csrf_token() }}'},
            datatype: 'html',
            success: function(data){                
              console.log(data);
                var machin=[];
                for (var i = 0; i < data.length; i++) {
                    machin[i]='<option value='+ data[i].id+'>'+ data[i].installtion_machine_number+'</option>';
                }

                // console.log(machin);

                $('#installation_id').html(machin);
                            
            },  
            error: function(data){
               // console.log(data);            
            },       
        });



        }
</script>



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