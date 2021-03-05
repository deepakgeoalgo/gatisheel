<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AssignIssue;
use App\Models\CreateIssue;
use App\Models\Technician;

class AssignIssueController extends Controller
{
    public function issueAssignList(Request $request)
    {
        $data = AssignIssue::orderBy('id','DESC')->with('createIssue')->paginate(15);

    	return response()->json(['success' => $data]);
    }
    // ------------------------------------------------------------------------

    public function issueAssignListStore(Request $request)
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

        return response()->json(['success' => $assign]);
    }
}
