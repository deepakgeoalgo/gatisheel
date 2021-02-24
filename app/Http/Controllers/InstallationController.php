<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Installation;
use App\Models\User;
use Hash;

class InstallationController extends Controller
{
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
        return view('admin.installation-forms.create');
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
            'email' => 'required',
            'phone' =>  'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'year'  => 'required',
            'village_name'  => 'required',
            'model_type'    => 'required',
            'installtion_address'   => 'required',
            'installtion_machine_number'    => 'required',
            'installtion_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'installtion_date'  => 'required',
            'image' => 'required',
            'invoice_value' => 'required',
            'password'  => 'required'
        ]);

        if ($request->hasFile('image') && $request->image->isValid()) {
            $extension = $request->image->extension();
            $filename = "product_".time().".".$extension;
            $request->image->move(public_path('product_images'), $filename);
        }else {
            echo "Image Not Uploaded!";
        }

        $user = new User();
        $user->name  =  $request->name;
        $user->email  =  $request->email;
        $user->phone  =  $request->phone;
        $user->password  =  Hash::make($request->password);
        $user->save();        

        $installations = new Installation();
        $installations->user_id = $user->id;
        $installations->year  = $request->year;
        $installations->village_name  =  $request->village_name;
        $installations->model_type  =  $request->model_type;
        $installations->installtion_address  =  $request->installtion_address;
        $installations->installtion_machine_number  =  $request->installtion_machine_number;
        $installations->installtion_phone  =  $request->installtion_phone;
        $installations->installtion_date  =  $request->installtion_date;
        $installations->image =  $filename;         
        $installations->invoice_value  =  $request->invoice_value;
        $installations->save();

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
        //
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

        if ($request->hasFile('image') && $request->image->isValid()) {
            $extension = $request->image->extension();
            $filename = "product_".time().".".$extension;
            $request->image->move(public_path('product_images'), $filename);
            $installations->image = $filename;
        }else {
            echo "Image Not Uploaded!";
        }

        $user = new User();
        $user->name  =  $request->name;
        $user->email  =  $request->email;
        $user->phone  =  $request->phone;
        $user->password  =  Hash::make($request->password);
        $user->save();

        $installations->user_id = $user->id;
        $installations->year = $request->input('year');
        $installations->village_name = $request->input('village_name');
        $installations->model_type = $request->input('model_type');
        $installations->installtion_address = $request->input('installtion_address');
        $installations->installtion_machine_number = $request->input('installtion_machine_number');
        $installations->installtion_phone = $request->input('installtion_phone');
        $installations->installtion_date = $request->input('installtion_date');        
        $installations->invoice_value = $request->input('invoice_value');

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
