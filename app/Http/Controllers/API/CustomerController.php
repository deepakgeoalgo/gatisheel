<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Installation;
use App\Models\User;
use App\Models\CreateIssue;
use App\Models\Technician;
use App\Models\Reference;

class CustomerController extends Controller
{
    public function machineList(Request $request)
    {
    	try {

    		$totalMachineList = Installation::where('user_id',auth()->user()->id)->get();

    		return response()->json(['success' => 'Success', 'total_machine_list' => $totalMachineList]);
    		
    	} catch (\Exception $e) {
    		return response()->json(['error' => 'Machine list not found!']);
    	}
    }
    // ------------------------------------------------------------------------

    public function customerCreateIssue(Request $request)
    {
    	try {
    		$this->validate($request, [
            'issue_date'  => 'required',
            'issue_description'  => 'required',  
            'installation_id'  => 'required',                  
	        ]);

	        if ($request->installation_id > 0) {
	        	$data = array('installation_id' => $request->installation_id , 
					'issue_date' => $request->issue_date , 
					'issue_description' => $request->issue_description, 
					'current_status' => 1, 
					'ownership' => auth()->user()->id );
	        	$result = CreateIssue::create($data);

	        	return response()->json(['success' => 'Issue created successfully!']);

	        } else {
	        	return response()->json(['error' => 'Dose not have a any issue']);
	        }
	       
	        return response()->json(['success' => 'Issue created successfully!']);
	    		
    	} catch (\Exception $e) {
    		return response()->json(['error' => $e]);
    	}
    }
    // ------------------------------------------------------------------------

    public function customerUpdateIssue(Request $request)
    {
    	try {
    		$updateIssue = CreateIssue::find($request->id);

    		$updateIssue->issue_date = $request->issue_date;
    		$updateIssue->issue_description = $request->issue_description;
  			$updateIssue->save();

  			return response()->json(['success' => 'Success', 'data' => $updateIssue]);
    		
    	} catch (\Exception $e) {
    		return response()->json(['error' => 'Update not complete, please try again!']);
    	}
    }
    // ------------------------------------------------------------------------

    public function customerIssueList(Request $request)
    {
    	try {

    		$machins = Installation::where('user_id',auth()->user()->id)->with('issue')->get();
    		$data = $this->modifiedData($machins);
    		return response()->json($data);
    	} catch (\Exception $e) {
    		return response()->json($e);
    	}
    }


    public function modifiedData($machins)
    {
    	$data = [];

    		//return $machins;

    		foreach ($machins as $key => $machin) {
    			$data = [
    				'id' => $machin->id,
    				'user_id' => $machin->user_id,
    				'village_name' => $machin->village_name,
    				'district' => $machin->district,
    				'installtion_address' => $machin->installtion_address,
    				'model_type' => $machin->model_type,
    				'installtion_machine_number' => $machin->installtion_machine_number,
    				'warranty' => $machin->warranty,
    				'invoice_value' => $machin->invoice_value,
    				'tech_name' => $this->getTechnicianName($machin->issue->assign_to),
    				'tech_email' => $this->getTechnicianEmail($machin->issue->assign_to),
    				'tech_phone' => $this->getTechnicianPhone($machin->issue->assign_to),
    				'issue' => $this->issue($machin->issue),
    				'issue_status' => $machin->issue->current_status ==1 ? 'Assign' : ($machin->issue->current_status ==2 ? 'Issue Submited' : ($machin->issue->current_status ==3 ? 'Issue Completed' : 'Unknoen Issue')),
    			];
    		}

    		return $data;
    }

    public function getTechnicianName($user_id)
    {
    	return User::where('id',$user_id)->value('name');
    }


    public function getTechnicianEmail($user_id)
    {
    	return User::where('id',$user_id)->value('email');
    }

    public function getTechnicianPhone($user_id)
    {
    	return User::where('id',$user_id)->value('phone');
    }


    public function issue($isshu)
    {
    	$data = [];

    	return $data=[
    		'id' => $isshu->id,
    		'issue_date' => $isshu->issue_date,
    		'issue_description' => $isshu->issue_description,
    		//'current_status' => $isshu->current_status,
    	];
    }
    // ------------------------------------------------------------------------
    	// REFERED ANOTHER USER
    // ------------------------------------------------------------------------

    public function refereStore(Request $request)
    {
    	try {
    		$data = $request->all();
    		$data['refered_by'] = auth()->user()->id;
    		$data['refered_phone'] = User::where('id',auth()->user()->id)->value('phone');
    		$result = Reference::create($data);
    		return response()->json(['success' => 'Referred Successfully']);
    	} catch (\Exception $e) {
    		return response()->json(['error' => 'Something Wrong']);
    		
    	}
    }

}
