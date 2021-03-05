<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Customer::orderBy('id','DESC')->paginate(15);
        return view('admin.customers.index',compact('data'))
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
        return view('admin.customers.create');
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
            'customer_name' => 'required',
            'village_name'  => 'required',            
            'model_type'    => 'required',            
            'responsible_service_person'  => 'required',
            'warranty'  => 'required',
            'refer_new_customer'  => 'required',            
            'warranty_renewal' => 'required',
            'image' => 'required',
        ]);

        if ($request->hasFile('image') && $request->image->isValid()) {
            $extension = $request->image->extension();
            $filename = "customer_img".time().".".$extension;
            $request->image->move(public_path('customer_images'), $filename);
        }else {
            echo "Image Not Uploaded!";
        }

        $customers = Customer::create([         
            'customer_name'  =>  $request->customer_name,   
            'village_name'  =>  $request->village_name,            
            'model_type'  =>  $request->model_type,
            'responsible_service_person'  =>  $request->responsible_service_person,
            'warranty'  =>  $request->warranty,
            'refer_new_customer'  =>  $request->refer_new_customer,
            'warranty_renewal'  =>  $request->warranty_renewal,
            'image' =>  $filename
        ]);

        if ($customers) {
            return redirect()->route('customers.index')
                        ->with('success','Record created successfully !!');
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
        $customer = Customer::find($id);
        return view('admin.customers.edit',compact('customer'));
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
        $this->validate($request, [
            'customer_name' => 'required',
            'village_name'  => 'required',            
            'model_type'    => 'required',            
            'responsible_service_person'  => 'required',
            'warranty'  => 'required',
            'refer_new_customer'  => 'required',            
            'warranty_renewal' => 'required',
        ]);
          
        $customer = Customer::find($id);

        if ($request->hasFile('image') && $request->image->isValid()) {
            $extension = $request->image->extension();
            $filename = "customer_img".time().".".$extension;
            $request->image->move(public_path('customer_images'), $filename);
            $customer->image = $filename;
        }else {
            echo "Image Not Uploaded!";
        }

        $customer->customer_name = $request->input('customer_name');
        $customer->village_name = $request->input('village_name');
        $customer->model_type = $request->input('model_type');
        $customer->responsible_service_person = $request->input('responsible_service_person');

        $customer->warranty = $request->input('warranty');
        $customer->refer_new_customer = $request->input('refer_new_customer');
        $customer->warranty_renewal = $request->input('warranty_renewal');

        $customer->save();

        return redirect()->route('customers.index')
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
        Customer::find($id)->delete();
        return redirect()->route('customers.index')
                        ->with('success','Record deleted successfully !!');
    }
    // ------------------------------------------------------------------------
}
