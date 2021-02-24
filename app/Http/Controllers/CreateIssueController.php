<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateIssue;

class CreateIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = CreateIssue::orderBy('id','DESC')->paginate(15);
        return view('admin.create-issues.index',compact('data'))
            ->with('i', ($request->input('page', 1) - 1) * 15);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create-issues.create');
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
            'issue_date'  => 'required',
            'issue_description'  => 'required',
            'current_status' => 'required',
            'ownership'    => 'required',
        ]);

        $installations = CreateIssue::create([
            'issue_date'  =>  $request->issue_date,
            'issue_description'  =>  $request->issue_description,
            'current_status'  =>  $request->current_status,
            'ownership'  =>  $request->ownership,
        ]);

        return redirect()->route('issues.index')
                    ->with('success','Record saved successfully !!');

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
        $issues = CreateIssue::find($id);

        return view('admin.create-issues.edit',compact('issues'));
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
        $issues = CreateIssue::find($id);

        $issues->issue_date = $request->input('issue_date');
        $issues->issue_description = $request->input('issue_description');
        $issues->current_status = $request->input('current_status');
        $issues->ownership = $request->input('ownership');

        $issues->save();

        return redirect()->route('issues.index')
                    ->with('success','Record updated successfully !!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CreateIssue::find($id)->delete();
        return redirect()->route('issues.index')
                        ->with('success','Record deleted successfully !!');
    }
}
