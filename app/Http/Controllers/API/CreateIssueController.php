<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CreateIssue;

class CreateIssueController extends Controller
{
    public function issueList(Request $request)
    {
        $data = CreateIssue::orderBy('id','DESC')->paginate(15);
        return response()->json(['success' => $data]);
    }
    // ------------------------------------------------------------------------

    public function issueStore(Request $request)
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
    // ------------------------------------------------------------------------

    public function issueEdit($id)
    {
        $issues = CreateIssue::find($id);
        return response()->json(['success' => $issues]);
    }
    // ------------------------------------------------------------------------

    public function issueUpdate(Request $request, $id)
    {
        $issues = CreateIssue::find($id);

        $issues->issue_date = $request->input('issue_date');
        $issues->issue_description = $request->input('issue_description');
        $issues->current_status = $request->input('current_status');
        $issues->ownership = $request->input('ownership');

        $issues->save();
        return response()->json(['success' => 'Record Updated!']);
    }
    // ------------------------------------------------------------------------

    public function issueDestroy($id)
    {
        CreateIssue::find($id)->delete();
        return response()->json(['sucess' => 'Record deleted successfully!']);
    }
}