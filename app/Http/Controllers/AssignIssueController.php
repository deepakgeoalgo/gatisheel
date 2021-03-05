<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AssignIssue;
use App\Models\CreateIssue;
use App\Models\Technician;

class AssignIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = AssignIssue::orderBy('id','DESC')->with('createIssue')->paginate(15);
        return view('admin.assign-issues.index',compact('data'))
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
        $issues = CreateIssue::get();
        $technicianes = Technician::with('user')->get();
        return view('admin.assign-issues.create', compact('issues', 'technicianes'));
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
            'issue'  => 'required',
            'assigned_to'  => 'required',
        ]);

        $assign = new AssignIssue();
        $assign->issue_id  =  $request->get('issue');
        $assign->issue  =  $request->issue;
        $assign->assigned_to  =  $request->assigned_to;
        $assign->comment  =  $request->comment;
        $assign->save();

        return redirect()->route('assign-issues.create')
                    ->with('success','Record saved successfully !!');
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
        $assign = AssignIssue::find($id);
        $issues = CreateIssue::get();
        $technicianes = Technician::with('user')->get();

        return view('admin.assign-issues.edit',compact('assign','issues','technicianes'));
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
        // $issues = AssignIssue::find($id);
        // $assign->issue_id  =  $request->get('issue');
        // $assign->issue  =  $request->issue;
        // $assign->assigned_to  =  $request->assigned_to;
        // $assign->comment  =  $request->comment;
        // $assign->save();

        // return redirect()->route('assign-issues.create')
        //             ->with('success','Record update successfully !!');
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
         AssignIssue::find($id)->delete();
        return redirect()->route('assign-issues.index')
                        ->with('success','Record deleted successfully !!');
    }
}
