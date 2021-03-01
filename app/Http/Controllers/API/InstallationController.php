<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Installation;
use App\Models\User;
use Hash;

class InstallationController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:installation-list|installation-create|installation-edit|installation-delete', ['only' => ['index','store']]);
         $this->middleware('permission:installation-create', ['only' => ['create','store']]);
         $this->middleware('permission:installation-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:installation-delete', ['only' => ['destroy']]);
    }

    public function installationList()
    {
    	$data = Installation::orderBy('id','DESC')->with('user')->paginate(15);

    	return response()->json(['success' => $data]);
    }
    // ------------------------------------------------------------------------

    public function installationStore(Request $request)
    {
    	$this->validate($request, [
            'name'  => 'required',
            'email' => 'required|email|unique:users,email',
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
        $installations->save();

        return response()->json(['success' => 'Record saved!']);
    }
    // ------------------------------------------------------------------------
    public function installationEdit($id)
    {
        $installations = Installation::with('user')->find($id);
        return response()->json(['success' => $installations]);
    }
    // ------------------------------------------------------------------------

    public function installationUpdate(Request $request, $id)
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
        $installations->save();

        return response()->json(['success' => $installations]);
    }
    // ------------------------------------------------------------------------

    public function installationDestroy($id)
    {
        Installation::find($id)->delete();
        return response()->json(['success' => 'Record deleted!']);
    }
    // ------------------------------------------------------------------------
}
