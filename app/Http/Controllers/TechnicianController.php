<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Technician;
use App\Models\User;
use Hash;
use DB;

class TechnicianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Technician::orderBy('id','DESC')->with('user')->paginate(15);
        return view('admin.technicians.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.technicians.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'      => 'required',
            'email'     => 'required',
            'phone'     =>  'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'password'  => 'required',
            'pan'       => 'required',
            'gstn'      => 'required',
            'address'   => 'required',
            'district'  => 'required',
            'state'     => 'required',
            'pincode'   => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:6',
            'photo'     => 'required'
        ]);

        if ($request->hasFile('photo') && $request->photo->isValid()) {
            $extension = $request->photo->extension();
            $filename = "product_".time().".".$extension;
            $request->photo->move(public_path('tech_photos'), $filename);
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

        $technicians = new Technician();
        $technicians->user_id = $user->id;
        $technicians->pan  = $request->pan;
        $technicians->gstn  =  $request->gstn;
        $technicians->address  =  $request->address;
        $technicians->district  =  $request->district;
        $technicians->state  =  $request->state;
        $technicians->pincode  =  $request->pincode;
        $technicians->photo =  $filename;
        $technicians->save();

        if ($technicians) {
            return redirect()->route('technicians.index')
                        ->with('success','Technicians created successfully !!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $technicians = Technician::with('user')->find($id);

        return view('admin.technicians.show', compact('technicians'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $technicians = Technician::with('user')->find($id);
        return view('admin.technicians.edit',compact('technicians'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $user = User::find($id);
        $user->name  =  $request->name;
        $user->email  =  $request->email;
        $user->phone  =  $request->phone;
        $user->password  =  Hash::make($request->password);
        $user->save();

        $technicians = Technician::find($id);

        if ($request->hasFile('photo') && $request->photo->isValid()) {
            $extension = $request->photo->extension();
            $filename = "product_".time().".".$extension;
            $request->photo->move(public_path('tech_photos'), $filename);
            $technicians->photo =  $filename;
        }else {
            echo "Image Not Uploaded!";
        } 

        $technicians->user_id = $user->id;
        $technicians->pan  = $request->pan;
        $technicians->gstn  =  $request->gstn;
        $technicians->address  =  $request->address;
        $technicians->district  =  $request->district;
        $technicians->state  =  $request->state;
        $technicians->pincode  =  $request->pincode;        
        $technicians->save();

        if ($technicians) {
            return redirect()->route('technicians.index')
                        ->with('success','Technicians created successfully !!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Technician::find($id)->delete();
        return redirect()->route('technicians.index')
                        ->with('success','Record deleted successfully !!');
    }
}
