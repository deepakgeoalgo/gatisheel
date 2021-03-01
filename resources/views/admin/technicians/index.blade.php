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
                        <span class="text-primary text-bold-700">Technician/Dealer List</span>
                        <a href="{{ route('technicians.create') }}" class="btn btn-primary"><i class="fas fa-plus pr-1"></i>Technician</a>
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
                                            <th>Address</th>
                                            <th>Photograph</th>                         
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody> 

                                   @foreach($data as $key => $tech)                                 
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            <td>{{ $tech->user->name }}</td>
                                            <td>{{ $tech->user->phone }}</td>
                                            <td>{{ $tech->address }}</td>
                                            <td><img src="{{ asset('tech_photos')}}/{{ $tech->photo }}" width="60"></td>
                                            <td>
                                                <a href="{{ route('technicians.show',$tech->id) }}" class="mr-1"><i class="fas fa-eye"></i></a>
                                                <a href="{{ route('technicians.edit',$tech->id) }}" class="mr-1"><i class="fas fa-user-edit"></i></a>
                                                <a href="{{ route('technicians.destroy',$tech->id) }}" class="text-danger"><i class="fas fa-user-times"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Sl No</th>
                                            <th>Name</th>                            
                                            <th>Phone</th>                           
                                            <th>Address</th>
                                            <th>Photograph</th>                         
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

    <section class="technician-details">       
        <!-- Modal -->
        <div class="modal fade" id="technicianDetails" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi, nihil placeat! Ad, quasi. Quia temporibus quibusdam accusamus voluptatum alias minima iste, a asperiores quae esse vero eos corrupti impedit amet.
                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nisi, nihil placeat! Ad, quasi. Quia temporibus quibusdam accusamus voluptatum alias minima iste, a asperiores quae esse vero eos corrupti impedit amet.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection