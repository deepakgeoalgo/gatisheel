<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CreateIssue;
use DB;

class CreateIssueController extends Controller
{
    public function issueList(Request $request)
    {
        try {
             $data = CreateIssue::skip($request->skip_id)->take(25)->get();
            return response()->json(['success' => 'Success', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something is worong!']);
        }
       
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
        try {
            $installations = CreateIssue::create([
            'issue_date'  =>  $request->issue_date,
            'issue_description'  =>  $request->issue_description,
            'current_status'  =>  $request->current_status,
            'ownership'  =>  $request->ownership,
        ]);

        return response()->json(['success' => 'Record saved!']);
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Someting went wrong!']);
        }
    }
    // ------------------------------------------------------------------------

    public function issueEdit(Request $request)
    {
        try {
            $issues = CreateIssue::find($request->id);
            return response()->json(['success' => 'Success', 'data' => $issues]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'This issue dosenot match!']);
        }
    }
    // ------------------------------------------------------------------------

    public function issueUpdate(Request $request)
    {
        try {
            
            $issues = CreateIssue::find($request->id);
            $issues->issue_date = $request->input('issue_date');
            $issues->issue_description = $request->input('issue_description');
            $issues->current_status = $request->input('current_status');
            $issues->ownership = $request->input('ownership');

            $issues->save();
            return response()->json(['success' => 'Record Updated!']);

        } catch (\Exception $e) {
            return response()->json(['error' => 'Someting went wrong, please try once!']);
        }
    }
    // ------------------------------------------------------------------------

    public function issueDestroy(Request $request)
    {
        try {
            CreateIssue::find($request->id)->delete();
            return response()->json(['sucess' => 'Record deleted successfully!']);
            
        } catch (\Exception $e) {
             return response()->json(['error' => 'Someting went wrong, please try once!']);
        }
    }
    // ------------------------------------------------------------------------

    public function technicianIssuList(Request $request)
    {
        try {
            $data = CreateIssue::where('assign_to',auth()->user()->id)->get();
            return response()->json(['success' => 'Success', 'data' => $data]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Record not fount, Please contact to admin!']);
        }
    }

    public function technicianIssuSubmit(Request $request)
    {
        try {

            $taskSubmit = CreateIssue::where('id',$request->id)->update(['current_status',2]);
            return response()->json(['success' => 'Issue Completed!']);

            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Issue not done yet!']);
        }
    }
}