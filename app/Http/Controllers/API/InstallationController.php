<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Installation;
use App\Models\User;
use App\Models\CreateIssue;
use Hash;
use Validator;
use Illuminate\Validation\Rule;
class InstallationController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:installation-list|installation-create|installation-edit|installation-delete', ['only' => ['index','store']]);
         $this->middleware('permission:installation-create', ['only' => ['create','store']]);
         $this->middleware('permission:installation-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:installation-delete', ['only' => ['destroy']]);
    }

    public function installationList(Request $request)
    {
    	$data = Installation::orderBy('id','DESC')->with('user')->skip($request->skip_id)->take(25)->get();

    	return response()->json(['success' => 'Success', 'data'=>$data]);
    }
    // ------------------------------------------------------------------------

    public function installationStore(Request $request)
    {
      if(!User::where('email',$request->email)->orWhere('phone',$request->phone)->value('id')){
      
        $valid= Validator::make($request->all(),[
                  'name'=>['required'],
                  'email' => "unique:users,email,id",
                  'phone'=> "unique:users,phone,id",
                  'village_name'=>['required'],
                  'district'=>['required'],
                  'state'=>['required'],
                  'pincode'=>['required'],
                  'installtion_address'=>['required'],
                  'year'=>['required'],
                  'model_type'=>['required'],   
                  'installtion_machine_number'=>['required'],
                  'installtion_phone'=>['required'],
                  'installtion_date'=>['required'],
                  'installtion_image'=>['required'],
                  'responsible_service_person'=>['required'],
                  'warranty'=>['required'],
                  'password'=>['required'],
                  ]);

        if($valid->fails()){
             return response()->json(['error'=>$valid->errors()->all()],401);
              }


        if ($request->hasFile('installtion_image') && $request->installtion_image->isValid()) {
            $extension = $request->installtion_image->extension();
            $filename = "product_".time().".".$extension;
            $request->installtion_image->move(public_path('product_images'), $filename);
        }else {
            echo "Image Not Uploaded!";
        }

        try {
            $user = new User();
            $user->name  =  $request->name;
            $user->email  =  $request->email;
            $user->phone  =  $request->phone;
            $user->password  =  Hash::make($request->password);
            $user->assignRole('Customer');
            $user->save(); 
             try {
                    $installations = new Installation();
                    $installations->user_id = $user->id;
                    $installations->village_name  =  $request->village_name;
                    $installations->district  =  $request->district;
                    $installations->state  =  $request->state;
                    $installations->pincode  =  $request->pincode;
                    $installations->installtion_address  =  $request->installtion_address;
                    $installations->year  = $request->year;        
                    $installations->model_type  =  $request->model_type;        
                    $installations->installtion_machine_number  =  $request->installtion_machine_number;
                    $installations->installtion_phone  =  $request->installtion_phone;
                    $installations->installtion_date  =  $request->installtion_date;
                    $installations->installtion_image =  $filename;         
                    $installations->responsible_service_person  =  $request->responsible_service_person;
                    $installations->warranty  =  $request->warranty;
                    $installations->invoice_value  =  $request->invoice_value;
                    $installations->created_by  =  auth()->user()->id;
                    $installations->save();
                    return response()->json(['success' => 'Installation Created Successfully!']);
             } catch (Exception $e) {
                    User::where('id',$user->id)->delete();
                return response()->json(['error' => 'Installation Dosenot Create, please try once !']);
             }
        } catch (\Exception $userEx) {
            if ($userEx) {
                return response()->json(['error' => 'User Dosenot Created , please try once !']);
            }
        }
      }else{
          return response()->json(['error' => 'Customer Already Created, you can assign a new machin']);
      }

    }
    // ------------------------------------------------------------------------

    public function installNewMachin(Request $request)
    {      
        $valid= Validator::make($request->all(),[
                  //'phone'=> "unique:users,phone,id",
                  'village_name'=>['required'],
                  'district'=>['required'],
                  'state'=>['required'],
                  'pincode'=>['required'],
                  'installtion_address'=>['required'],
                  'year'=>['required'],
                  'model_type'=>['required'],   
                  'installtion_machine_number'=>['required'],
                  'installtion_phone'=>['required'],
                  'installtion_date'=>['required'],
                  'installtion_image'=>['required'],
                  'responsible_service_person'=>['required'],
                  'warranty'=>['required'],
                  ]);

        if($valid->fails()){
             return response()->json(['error'=>$valid->errors()->all()],401);
              }


        if ($request->hasFile('installtion_image') && $request->installtion_image->isValid()) {
            $extension = $request->installtion_image->extension();
            $filename = "product_".time().".".$extension;
            $request->installtion_image->move(public_path('product_images'), $filename);
        }else {
            echo "Image Not Uploaded!";
        }
             try {
                    $user_id =  User::where('phone',$request->phone)->value('id');

                    $installations = new Installation();
                    $installations->user_id = $user_id;
                    $installations->village_name  =  $request->village_name;
                    $installations->district  =  $request->district;
                    $installations->state  =  $request->state;
                    $installations->pincode  =  $request->pincode;
                    $installations->installtion_address  =  $request->installtion_address;
                    $installations->year  = $request->year;        
                    $installations->model_type  =  $request->model_type;        
                    $installations->installtion_machine_number  =  $request->installtion_machine_number;
                    $installations->installtion_phone  =  $request->installtion_phone;
                    $installations->installtion_date  =  $request->installtion_date;
                    $installations->installtion_image =  $filename;         
                    $installations->responsible_service_person  =  $request->responsible_service_person;
                    $installations->warranty  =  $request->warranty;
                    $installations->invoice_value  =  $request->invoice_value;
                     $installations->created_by  =  auth()->user()->id;
                    $installations->save();
                    return response()->json(['success' => 'New Machine Install Successfully!']);
             } catch (Exception $e) {
                    User::where('id',$user->id)->delete();
                return response()->json(['error' => 'Installation Dosenot Create, please try once !']);
             }

    }
    // ------------------------------------------------------------------------

    public function installationEdit(Request $request)
    {
        $installations = Installation::with('user')->find($request->id);
        return response()->json(['success' => 'Seccess','data'=>$installations]);
    }
    // ------------------------------------------------------------------------

    public function installationUpdate(Request $request)
    {
        $installations = Installation::find($request->installation_id);
        if ($request->hasFile('installtion_image') && $request->installtion_image->isValid()) {
            $extension = $request->installtion_image->extension();
            $filename = "product_".time().".".$extension;
            $request->installtion_image->move(public_path('product_images'), $filename);
            $installations->installtion_image = $filename;
        }  
        try {
                $installations->village_name  =  $request->village_name;
                $installations->district  =  $request->district;
                $installations->state  =  $request->state;
                $installations->pincode  =  $request->pincode;
                $installations->installtion_address  =  $request->installtion_address;
                $installations->year  = $request->year;        
                $installations->model_type  =  $request->model_type;        
                $installations->installtion_machine_number  =  $request->installtion_machine_number;
                $installations->installtion_phone  =  $request->installtion_phone;
                $installations->installtion_date  =  $request->installtion_date;       
                $installations->responsible_service_person  =  $request->responsible_service_person;
                $installations->warranty  =  $request->warranty;
                $installations->invoice_value  =  $request->invoice_value;
                $installations->save();
                try {
                        $user = User::find($request->user_id);
                        $user->name  =  $request->name;
                        $user->email  =  $request->email;
                        $user->phone  =  $request->phone;
                        $user->save();
                        return response()->json(['success' => 'Update Successfully']);

                } catch (\Exception $e) {
                     return response()->json(['error' => $e]); 
                }
            
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something Wrong , Please Try Once']);
        }
    }
    // ------------------------------------------------------------------------

    public function installationDestroy(Request $request)
    {
        try {
                Installation::find($request->id)->delete();
                return response()->json(['success' => 'Record deleted!']); 
        } catch (Exception $e) {
                return response()->json(['error' => 'Something Wrong!']); 
            
        }

    }
    // ------------------------------------------------------------------------

    public function totalIssue(Request $request)
    {
      try {
          $totalCreateCustomer = Installation::where('created_by',auth()->user()->id)->get()->count();

          $totalCompletedIssue = CreateIssue::where('assign_to',auth()->user()->id)->where('current_status',2)->get()->count();

          $totalIssue = CreateIssue::where('assign_to',auth()->user()->id)->get()->count();

          $totalNewIssue = CreateIssue::where('assign_to',auth()->user()->id)->where('current_status',1)->get()->count();

          return response()->json(['success' => 'Success', 'total_issue' => $totalIssue, 'total_create_customer' => $totalCreateCustomer, 'total_completed_issue' => $totalCompletedIssue, 'total_new_issue' => $totalNewIssue]);
        
      } catch (Exception $e) {
        
      }
    }

}
