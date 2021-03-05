<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Installation;
use App\Models\User;
use App\Models\Machine;
use Hash;
use DB;

class InstallationController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:installation-list|installation-create|installation-edit|installation-delete', ['only' => ['index','store']]);
         $this->middleware('permission:installation-create', ['only' => ['create','store']]);
         $this->middleware('permission:installation-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:installation-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Installation::orderBy('id','DESC')->with('user')->paginate(15);
        return view('admin.installation-forms.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 15);
    }
    // ------------------------------------------------------------------------

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $machines = Machine::get();
        return view('admin.installation-forms.create',compact('machines'));
    }
    // ------------------------------------------------------------------------

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'  => 'required',
            'email' => 'required|email',
            'phone' =>  'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users',            
            'village_name'  => 'required',
            'district'  => 'required',
            'state'  => 'required',
            'pincode'  => 'required',
            'installtion_address'   => 'required',
            'year'  => 'required',
            'model_type'    => 'required',            
            'installtion_machine_number'    => 'required',
            'installtion_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'installtion_date'  => 'required',
            'installtion_image' => 'required',
            'responsible_service_person' => 'required',
            'warranty' => 'required',
            'password'  => 'required'
        ]);

        if ($request->hasFile('installtion_image') && $request->installtion_image->isValid()) {
            $extension = $request->installtion_image->extension();
            $filename = "product_".time().".".$extension;
            $request->installtion_image->move(public_path('product_images'), $filename);
        }else {
            echo "Image Not Uploaded!";
        }

        $user = new User();
        $user->name  =  $request->name;
        $user->email  =  $request->email;
        $user->phone  =  $request->phone;
        $user->password  =  Hash::make($request->password);
        $user->assignRole('Customer');
        $user->save();        

        $installations = new Installation();
        $installations->user_id = $user->id;
        $installations->village_name  =  $request->village_name;
        $installations->district  =  $request->district;
        $installations->state  =  $request->state;
        $installations->pincode  =  $request->pincode;
        $installations->installtion_address  =  $request->installtion_address;
        $installations->year  = $request->year;        
        $installations->model_type  =  $request->model_type;        
        $installations->installtion_machine_number  =  $request->installtion_machine_number;
        $installations->installtion_phone  =  $request->installtion_phone;
        $installations->installtion_date  =  $request->installtion_date;
        $installations->installtion_image =  $filename;         
        $installations->responsible_service_person  =  $request->responsible_service_person;
        $installations->warranty  =  $request->warranty;
        $installations->invoice_value  =  $request->invoice_value;
        $installations->created_by  =  Auth()->user()->id;
        $installations->save();

        // $user->assignRole('Customer');

        if ($installations) {
            return redirect()->route('installations.index')
                        ->with('success','Installations created successfully !!');
        } 
    }
    // ------------------------------------------------------------------------

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Installation::with('user')->find($id);
        return view('admin.installation-forms.show', compact('customer'));
    }
    // ------------------------------------------------------------------------

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $installations = Installation::with('user')->find($id);
        return view('admin.installation-forms.edit',compact('installations'));
    }
    // ------------------------------------------------------------------------

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $installations = Installation::find($id);
        if ($request->hasFile('installtion_image') && $request->installtion_image->isValid()) {
            $extension = $request->installtion_image->extension();
            $filename = "product_".time().".".$extension;
            $request->installtion_image->move(public_path('product_images'), $filename);
            $installations->installtion_image = $filename;
        }

        $user = User::find($installations->user_id);
        $user->name  =  $request->name;
        $user->email  =  $request->email;
        $user->phone  =  $request->phone;
        $user->password  =  Hash::make($request->password);
        $user->save();        

        $installations->user_id = $user->id;
        $installations->village_name  =  $request->village_name;
        $installations->district  =  $request->district;
        $installations->state  =  $request->state;
        $installations->pincode  =  $request->pincode;
        $installations->installtion_address  =  $request->installtion_address;
        $installations->year  = $request->year;        
        $installations->model_type  =  $request->model_type;        
        $installations->installtion_machine_number  =  $request->installtion_machine_number;        
        $installations->installtion_phone  =  $request->installtion_phone;
        $installations->installtion_date  =  $request->installtion_date;       
        $installations->responsible_service_person  =  $request->responsible_service_person;
        $installations->warranty  =  $request->warranty;
        $installations->invoice_value  =  $request->invoice_value;
        $installations->updated_by  =  Auth()->user()->id;
        $installations->save();

        return redirect()->route('installations.index')
                    ->with('success','Record updated successfully !!');


    }
    // ------------------------------------------------------------------------

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Installation::find($id)->delete();
        return redirect()->route('installations.index')
                        ->with('success','Record deleted successfully !!');
    }
    // ------------------------------------------------------------------------
}
