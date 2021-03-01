<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Machine;

class MachineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Machine::orderBy('id','DESC')->paginate(15);
        return view('admin.machines.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.machines.create');
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
            'machine_model'     => 'required|unique:machines',
            'machine_number'    => 'required|unique:machines',
            'machine_details'   =>  'required'
        ]);

        $machine = new Machine();
        $machine->machine_model = $request->machine_model;
        $machine->machine_number = $request->machine_number;
        $machine->machine_details = $request->machine_details;
        $machine->machine_warranty = $request->machine_warranty;
        $machine->save();

        return redirect()->route('machines.index')
            ->with('success', 'Record saved successfully');
    }

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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $machines = Machine::find($id);

        return view('admin.machines.edit',compact('machines'));
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
        $machine = Machine::find($id);

        $machine->machine_model = $request->machine_model;
        $machine->machine_number = $request->machine_number;
        $machine->machine_details = $request->machine_details;
        $machine->machine_warranty = $request->machine_warranty;
        $machine->save();

        return redirect()->route('machines.index')
            ->with('success', 'Record updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Machine::find($id)->delete();
        return redirect()->route('machines.index')
                        ->with('success','Record deleted successfully !!');
    }
}
