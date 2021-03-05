@extends('admin.layouts.app')

@section('title', 'User List Page')

@section('main_content')

    <!-- users list start -->   
    <section id="basic-datatable">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span class="text-primary text-bold-700">Referred List</span>
                    </div>
                    <div class="card-content">
                        <div class="card-body card-dashboard">
                            <div class="table-responsive">
                                <table class="table zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Village</th>
                                            <th>District</th>
                                            <th>State</th>
                                            <th>Pincode</th>
                                            <th>Referred By</th>                       
                                        </tr>
                                    </thead>
                                    <tbody> 
                                   @foreach($data as $key => $referred)                                 
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $referred->name }}</td>
                                            <td>{{ $referred->phone }}</td>    
                                            <td>{{ $referred->village }}</td>
                                            <td>{{ $referred->district }}</td>
                                            <td>{{ $referred->state }}</td>
                                            <td>{{ $referred->pincode }}</td>
                                            <td>{{ $referred->refered_phone }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Name</th>
                                            <th>Phone</th>
                                            <th>Village</th>
                                            <th>District</th>
                                            <th>State</th>
                                            <th>Pincode</th>
                                            <th>Referred By</th>
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