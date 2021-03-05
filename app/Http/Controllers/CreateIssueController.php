<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CreateIssue;
use App\Models\Status;
use App\Models\Technician;
use App\Models\User;
use App\Models\Installation;
use DB;

class CreateIssueController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ticket-list|ticket-create|ticket-edit|ticket-delete', ['only' => ['index','store']]);
         $this->middleware('permission:ticket-create', ['only' => ['create','store']]);
         $this->middleware('permission:ticket-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:ticket-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = CreateIssue::orderBy('id','DESC')->with('currentStatus','owner','assignTo','CustomerDetails')->paginate(15);
        // $technicians = Technician::with('user')->get();

        return view('admin.create-issues.index',compact('data'))
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
        // $data = CreateIssue::get('issue_description');

        // $results = array();

        // $queries = DB::table('create_issues')
        //     ->where('id', 'LIKE', '%'.$data.'%')
        //     ->take(5)->get();

        // foreach ($queries as $query)
        // {
        //     $results[] = [ 'id' => $query->id, 'value' => $query->name ];
        // }
        // return response()->json($results);
        // }



        $statuses = Status::get();
        $installations = Installation::get();
        return view('admin.create-issues.create',compact('statuses','installations'));
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
            'issue_date'  => 'required',
            'issue_description'  => 'required',
            'current_status' => 'required',
            'ownership'    => 'required',
          //  'assign_to'    => 'required',
        ]);

        $user_id = User::where('phone',$request->ownership)->value('id');

        $installations = CreateIssue::create([
            'installation_id' => $request->installation_id,
            'issue_date'  =>  $request->issue_date,
            'issue_description'  =>  $request->issue_description,
            'current_status'  =>  $request->current_status,
            'ownership'  =>  $user_id,
           //'assign_to'  =>  $request->ownership,
        ]);

        return redirect()->route('issues.index')
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
        // $issues = CreateIssue::find($id);
        $issues = CreateIssue::with('currentStatus')->find($id);
        return view('admin.create-issues.show', compact('issues'));
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
        $issues = CreateIssue::find($id);

        $statuses = Status::get();
        $installations = Installation::get();

        return view('admin.create-issues.edit',compact('issues','statuses','installations'));
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
        $issues = CreateIssue::find($id);

        $issues->issue_date = $request->input('issue_date');
        $issues->issue_description = $request->input('issue_description');
        $issues->current_status = $request->input('current_status');
        $issues->ownership = $request->input('ownership');

        $issues->save();

        return redirect()->route('issues.index')
                    ->with('success','Record updated successfully !!');
    }
    // ------------------------------------------------------------------------

    public function assignEdit($id)
    {
        $assigned = CreateIssue::find($id);
        return view('admin.create-issues.assign',compact('assigned'));
    }
    // ------------------------------------------------------------------------

    public function assignUpdate(Request $request, $id)
    {
        $issues = CreateIssue::where('id',$id)->update(['assign_to' => $request->assign_to]);


        return redirect()->route('issues.index')
                    ->with('success','Ticket assigned successfully !!');
    }
    // ------------------------------------------------------------------------

    public function getTechAddress(Request $request)
    {
        $techId = $request->tech_id;

        try {
            if ($techId > 0) {
                $data = Technician::where('user_id',$techId)->first();
                return $data;
            }
            
        } catch (\Exception $e) {
            
        }

       // echo $techId;
    }
    // ------------------------------------------------------------------------

    public function getOwnerNumber(Request $request)
    {
         try {
            $ownerPhoneNumber = $request->number;
            if ($ownerPhoneNumber) {
                $queries = User::where('phone', 'like', '%' . $ownerPhoneNumber . '%')->select('phone','id')->get();
            return $queries;
            } else {
               return 'Please enter a valid number';
            }

         } catch (\Exception $e) {
             return '500 Internal Server Error';
         }
    }
    // ------------------------------------------------------------------------
    public function getOwnerMachine(Request $request)
    {
        try {
            $phoneNumber = $request->machine;
            if ($phoneNumber) {
                $user_id = User::where('phone',$phoneNumber)->value('id');
                $machins = Installation::where('user_id',$user_id)->get();
                return $machins;
            }
            
        } catch (Exception $e) {
            
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
        CreateIssue::find($id)->delete();
        return redirect()->route('issues.index')
                        ->with('success','Record deleted successfully !!');
    }
    // ------------------------------------------------------------------------
}
