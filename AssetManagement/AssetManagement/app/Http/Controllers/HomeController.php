<?php

namespace App\Http\Controllers;

use App\Exports\AssetHistoryExport;
use App\Exports\AssetsExport;
use App\Exports\ConsumableExport;
use App\Exports\IssueExportForEachUser;
use App\Exports\IssuesExport;
use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Issues;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Concerns\ToArray;

class HomeController extends Controller
{
    //
    
    /**
     * Summary of getUsers
     * @return \Illuminate\Http\JsonResponse
     */
    public function getUsers()
    {
        $username = Session::get("username");

        $users = DB::table("users")->where('username','!=', $username)->where('delete_flag','=',0)->get();

        return DataTables::of($users)->addIndexColumn()->addColumn('action', function ($row) {

            $actionBtn = '<a href="' . route('edit_users', ['id' => $row->id ]) . '" class="edit btn btn-success btn-sm">Edit</a> <a href="#" class="delete btn btn-danger btn-sm" data-user-id="'. $row->id .'">Delete</a>';
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function exportAssetHistory($id)
    {
        return(Excel::download(new AssetHistoryExport($id),'AssetHistory_'.$id.'_history.xlsx'));
    }

    public function fetch(Request $request)
    {
        dd($request);

        $asset = DB::table('assets')->where('id',$request->id)->first();

        return($asset->asset_id);
    }

    public function exportIssueHistory(Request $request)
    {
        return(Excel::download(new IssuesExport($request->clickedLabel),"issues.xlsx"));
    }

    public function exportIssueForSpecificUser()
    {
        return(Excel::download(new IssueExportForEachUser,"issue.xlsx"));
    }


    /**
     * Summary of createHistory
     * @param mixed $id1
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    // public function createHistory($id1)
    // {
    //     // ['issue'=>$issue,'id'=>$id,'asset'=>$asset]

    //     $asset = DB::table('assets')->where('id',$id1)->where('delete_flag','=',0)->first();

    //     // dd($asset);

    //     // $assetHistory = DB::table('asset_history')->where('asset_id',$asset->asset_id)->

    //     return(view('createHistory',['id'=>$id1,'asset'=>$asset]));
    // }

    /**
     * Summary of saveHistory
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    // public function saveHistory(Request $request)
    // {
    //     // dd($request);

    //     DB::table('asset_history')->insert([
    //         'asset_id' => $request->asset_id,
    //         'assignedTo' => $request->assignedTo,
    //         'date_from' => $request->date_from,
    //         'date_to' => $request->date_to,
    //     ]);

    //     session()->flash('message','Asset History has been updated!!!');

    //     return(redirect()->route('showHistory',['id'=>$request->id]));
    // }

    /**
     * Summary of changeStatusOfAsset
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function changeStatusOfAsset(Request $request)
    {
        $user_id = intval($request->userId);

        $status = intval($request->newStatus);

        $assetid = DB::table('assets')->where('id',$user_id)->value('asset_id');

        if($status == 0){
            DB::update('update asset_history set date_to = ? where asset_id = ? and action_performed = "ACTIVATED" and date_to IS NULL ',[now(),$assetid]);
        }
        else{
            DB::update('update asset_history set date_to = ? where asset_id = ? and action_performed = "INACTIVATED" and date_to IS NULL ',[now(),$assetid]);
        }


        try {
            DB::update('update assets set status = ? where id = ?',[$status,$user_id]);
        } catch (\Exception $e) {
            // Log or handle the exception
            ($e->getMessage());
        }

        return(response()->json(["message"=>"Asset status has been updated"]));
    }

    /**
     * Summary of getHistory
     * @param mixed $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getHistory($id)
    {
        $asset = DB::table('assets')->where('id',$id)->get();

        $assetHistory = DB::table('asset_history')->where('asset_id',$asset[0]->asset_id)->where('delete_flag','=',0)->orderByDesc('id')->get();

        return DataTables::of($assetHistory)->addIndexColumn()->addColumn('action', function ($row)  {

            // use ($id)
            // "<a href='/home/assets/history/{$id}/edit/{$row->id}' class='edit btn btn-success btn-sm'> Edit </a>"

            $actionBtn = '<a href="#" class="delete btn btn-danger btn-sm" data-history-id="'. $row->id .'">Delete</a>';
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Summary of showHistory
     * @param \Illuminate\Http\Request $request
     * @param mixed $id
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function showHistory(Request $request,$id)
    {
        $id = intval($id);

        $asset = DB::table('assets')->where('id',$id)->first();

        $consumable = false;

        if($asset->consumable==1){
            $consumable=true;
        }

        return(view('History')->with("id",$id)->with("consumable",$consumable));
    }

    /**
     * Summary of close_request
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function close_request(Request $request)
    {
        $close_id = intval($request->close_id);

        $status_remarks = intval($request->status);

        $username = Session::get('username');

        if($status_remarks==0){
            DB::update('update issues set end_date = ?  where id = ?',[now()->toDateTimeString(), $close_id]);
        }

        DB::update('update issues set status = ?  where id = ?',[$status_remarks, $close_id]);

        DB::update('update issues set remarks = ? where id = ?',[$request->remarks, $close_id]);

        if($status_remarks==0){
            DB::update('update issues set resolvedBy = ?  where id = ?',[$username, $close_id]);
            return(response()->json(["message"=> "Request has been closed successfully",200]));
        }

        return(response()->json(["message"=> "Request has been suspended",200]));
    }

    /**
     * Summary of start_request
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function start_request(Request $request)
    {
        $close_id = intval($request->close_id);

        DB::update('update issues set status = ? where id = ?',[1, $close_id]);

        return(response()->json(['message'=> 'Service request has reopened.',200]));
    }


    /**
     * Summary of updateDescription
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function updateDescription(Request $request)
    {
        $close_id = intval($request->close_id);

        DB::update('update issues set description = ? where id = ?',[$request->text,$close_id]);
    }

    /**
     * Summary of getAssets
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAssets(Request $request)
    {
        $clickedLabel = $request->clickedLabel;
        
        $assets=null;

        if($clickedLabel!=null){
            $assets = DB::table("assets")->where('delete_flag','=',0)->where('asset_type','=',$clickedLabel)->where('consumable','=',0)->get();
        }
        else{
            $assets = DB::table("assets")->where('delete_flag','=',0)->where('consumable','=',0)->get();
        }

        return DataTables::of($assets)->addIndexColumn()->addColumn('action', function ($row) {
            // <a href="/home/users/edit/'. $row->id .'
            $actionBtn = '<a href="'. route('edit_assets',['id'=>$row->id]).'"  class="edit btn btn-success btn-sm">Edit</a> <a href="#" class="delete btn btn-danger btn-sm" data-asset-id="'. $row->id .'">Delete</a> <a href="' . route('showHistory',['id' => $row->id]) . '" class="btn btn-primary history" data-history-id="'. $row->id .'"> History </a>';
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    public function getConsumables()
    {
        $assets = DB::table("assets")->where('delete_flag','=',0)->where('consumable','=',1)->get();

        return DataTables::of($assets)->addIndexColumn()->addColumn('action', function ($row) {
            // <a href="/home/users/edit/'. $row->id .'
            $actionBtn = '<a href="'. route('edit_assets',['id'=>$row->id]).'" class="edit btn btn-success btn-sm">Edit</a> <a href="#" class="delete btn btn-danger btn-sm" data-asset-id="'. $row->id .'">Delete</a> <a href="' . route('showHistory',['id' => $row->id]) . '" class="btn btn-primary history" data-history-id="'. $row->id .'"> History </a>';
            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


    /**
     * Summary of create_issue
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function create_issue(Request $request)
    {
        $typeVal = intval($request->priority);

        $asset = DB::table('assets')->where('asset_id',$request->asset_id)->first();

        DB::table('issues')->insert([
            'description' => $request->description,
            'start_date' => now()->toDateTimeString(),
            'asset_id'=> $asset->id,
            'raisedby'=> $asset->assignedTo,
            'priority'=> $typeVal,
        ]);

        session()->flash('message','Request has been raised.');

        return(redirect()->route('raise_request'));
    }

    /**
     * Summary of getlistOfAdmins
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    // public function getlistOfAdmins()
    // {
    //     $users = DB::table('users')->where('role','ADMIN')->get();

    //     return(response()->json($users));
    // }

    /**
     * Summary of create_new_query
     * @return \Illuminate\Contracts\View\View|mixed
     */
    public function create_new_query()
    {
        $username = Session::get('username');

        $assetsOwned = DB::table('assets')->where('assignedTo', $username)->where('delete_flag','=',0)->get();

        return(view('Request')->with('assetsOwned', $assetsOwned));
    }

    /**
     * Summary of getIssues
     * @return \Illuminate\Http\JsonResponse
     */
    public function getIssues()
    {
        $username = Session::get('username');

        // $allIssues = DB::table('issues')->where('raisedby',$username)->where('delete_flag','=',0)->orderByDesc('id')->get();

        $allIssues = DB::table('assets')->join('issues','assets.id','=','issues.asset_id')->where('raisedby',$username)->where('issues.delete_flag','=',0)->where('assets.delete_flag','=',0)->get();
        

        return DataTables::of($allIssues)->addIndexColumn()->addColumn('action', function ($row) {
            // <a href="/home/users/edit/'. $row->id .'

            if($row->status==-1||$row->status==0){
                $actionBtn = '<a href="' . route('describe',['id'=>$row->id])  .'" class="edit btn btn-success btn-sm">View</a>';
            }
            else{
                $actionBtn = '<a href="' . route('describe',['id'=>$row->id])  .'" class="edit btn btn-success btn-sm">View</a> <a href="#" class="delete btn btn-danger btn-sm" data-issue-id="'. $row->id .'">Delete</a>';
            }

            return $actionBtn;
        })
        ->rawColumns(['action'])
        ->make(true);
    }


    /**
     * Summary of show_issues
     * @return \Illuminate\Http\JsonResponse
     */
    public function show_issues(Request $request)
    {
        $clickedLabel = $request->clickedLabel;

        $allIssues=null;

        if($clickedLabel!=null){
            if($clickedLabel=="Resolved"){
                $allIssues = DB::table('issues')->where('delete_flag','=',0)->where('status','=',0)->orderBy('status','desc')->get();            
            }
            else{
                $allIssues = DB::table('issues')->where('delete_flag','=',0)->where('status','!=',0)->orderBy('status','desc')->get();
            }
        }
        else{
            $allIssues = DB::table('issues')->where('delete_flag','=',0)->orderBy('status','desc')->get();
        }

        return DataTables::of($allIssues)->addIndexColumn()->addColumn('action', function ($row) {
            // <a href="/home/assets/edit/'. $row->id .'" class="edit btn btn-success btn-sm">Edit</a>

            $actionBtn = '<a href="'. route('describe',['id' =>$row->id]) .'" class="edit btn btn-success btn-sm">View</a>';

            return $actionBtn;
        })->addColumn('assetId',function($row){
            $assetId = DB::table('assets')->where('id',$row->asset_id)->where('delete_flag','=',0)->first();

            return($assetId->asset_id);
        })->addColumn('assetType',function($row){
            $assetId = DB::table('assets')->where('id',$row->asset_id)->where('delete_flag','=',0)->first();

            return($assetId->asset_type);
        })
        ->rawColumns(['action'])
        ->make(true);
    }

    /**
     * Summary of allIssues
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function allIssues()
    {
        $issues = DB::table('issues')->where('delete_flag','=',0)->get()->toArray();

        $user = DB::table('users')->where('username',Session::get('username'))->first();

        if(sizeof($issues)!=$user->issues_watched_latest){
            DB::update('update users set issues_watched_latest = ? where username = ?',[sizeof($issues),Session::get('username')]);
        }

        return(view('queryPageAdmin'));
    }

    /**
     * Summary of raise_request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function raise_request()
    {
        return(view('queryPage'));
    }

    /**
     * Summary of changeStatus
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function changeStatus(Request $request)
    {
        DB::update('update users set status = ? where id = ?',[$request->newStatus,$request->userId]);

        return(response()->json(["message"=> "User updated successfully",200]));
    }

    /**
     * Summary of assignTo
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function assignTo(Request $request)
    {
        $id = intval($request->assetId);

        $asset = DB::table('assets')->where('id',$id)->where('delete_flag','=',0)->get();

        $assetHistoryAssign = DB::table('asset_history')->where('asset_id',$asset[0]->asset_id)->where('delete_flag','=',0)->where('action_performed','=','ASSIGN OPERATION')->get();

        if(sizeof($assetHistoryAssign)!=0){
            DB::update('update asset_history set date_to = ? where assignedTo = ? and action_performed = ? and date_to IS null',[now(),$asset[0]->assignedTo,'ASSIGN OPERATION']);
        }

        DB::update('update assets set assignedTo = ? where id = ?',[$request->user,$id]);

        return(response()->json(["message"=> "Asset assigned successfully",200]));
    }

    public function savePassword(Request $request)
    {
        $oldPassword     = $request->oldPassword;
        $newPassword     = $request->newPassword;
        $confirmPassword = $request->confirmPassword;
        $email           = session('email');
        $passwordRetrived = DB::table('users')->where('email',$email)->value('password');

        $validator = Validator::make($request->all(),[
            'oldPassword'       => 'required',
            'newPassword'       => 'required|custom_password',
            'confirmPassword'   => 'required|custom_password',
        ],[
            'oldPassword.custom_password' => 'The :attribute must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.',
            
            'newPassword.custom_password' => 'The :attribute must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.',

            'confirmPassword.custom_password' => 'The :attribute must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.',
        ]);

        if($validator->fails()){
            session()->flash('error',$validator->errors()->first());
            
            return(back());
        }

        if($newPassword !== $confirmPassword){
            session()->flash('error','The New Password and the Confirm Password should be the same.');

            return(back());
        }

        if($oldPassword === $newPassword || $oldPassword === $confirmPassword){
            session()->flash('error','Old and New Password cannot be the same.');

            return(back());
        }

        if(Hash::check($oldPassword,$passwordRetrived)){
            DB::update('update users set password = ? where email = ? and delete_flag = 0',[bcrypt($newPassword),$email]);

            session()->flash('message','Password has been reset.');

            return(back());
        }

        return(back()->with('error','The old password is incorrect.'));
    }

    public function changePassword()
    {
        return(view('changepassword'));
    }


    /**
     * Summary of editunituser
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function editunituser(Request $request)
    {
        if($request->password!=null){

            if(!$this->validateAndUpdatePassword($request)){
                return redirect()->route('list_users');
            }

            DB::update('update users set password = ? where id = ?',[bcrypt($request->password),$request->id]);
        }

        DB::update('update users set designation = ? where id = ?',[$request->designation,$request->id]);

        DB::update('update users set email = ? where id = ?',[$request->email,$request->id]);

        session()->flash('message','User updated successfully!!!');

        return(redirect()->route('list_users'));
    }

    /**
     * Summary of delete
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function delete(Request $request)
    {
        $user=DB::table('users')->find($request->userId);

        if($user==null){
            return(response()->json(['message'=> 'Record not found',404]));
        }

        // DB::table('users')->where('id',$request->userId)->delete();

        DB::update('update users set delete_flag = 1 where id = ?',[$request->userId]);

        return(response()->json(["message"=> "Record Deleted Successfully.",200]));
    }

    /**
     * Summary of delete_issues
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function delete_issues(Request $request)
    {
        $issueId = intval($request->issue_id);

        $issue=DB::table('issues')->find($issueId);

        if($issue==null){
            return(response()->json(['message'=> 'Issue not found',404]));
        }

        // DB::table('issues')->where('id',$issueId)->delete();

        DB::update('update issues set delete_flag = 1 where id = ?',[$issueId]);

        DB::update('update issues set end_date = ? where id = ? and end_date IS null',[now(),$issueId]);

        return(response()->json(["message"=> "Issue Deleted Successfully.",200]));
    }

    /**
     * Summary of deleteAssets
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function deleteAssets(Request $request)
    {
        $asset=DB::table('assets')->find($request->assetId);

        if($asset==null){
            return(response()->json(['message'=> 'Record not found',404]));
        }

        $assetHistory = DB::table('asset_history')->where('asset_id',$asset->asset_id)->where('action_performed','ASSIGN OPERATION')->first();

        if($assetHistory!=null){
            return(response()->json(["message"=> "Record cannot be deleted.",500]));            
        }

        DB::update('update assets set delete_flag = 1 where asset_id = ?',[$asset->asset_id]);

        DB::update('update asset_history set delete_flag = 1 where asset_id = ? and delete_flag = 0',[$asset->asset_id]);

        DB::update('update issues set delete_flag = 1 where asset_id = ? and delete_flag = 0',[$asset->id]);

        return(response()->json(["message"=> "Record Deleted Successfully.",200]));
    }

    /**
     * Summary of deleteHistory
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    // public function deleteHistory(Request $request)
    // {
    //     $history_id = intval($request->history_id);

    //     // DB::table('asset_history')->where('id',$history_id)->delete();

    //     DB::update('update asset_history set delete_flag = 1 where id = ?',[$history_id]);

    //     return(response()->json(["message"=> "Record Deleted Successfully.",200]));
    // }

    /**
     * Summary of exportUsers
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportUsers()
    {
        return Excel::download(new UsersExport,"users.xlsx");
    }

    /**
     * Summary of exportAssets
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function exportAssets(Request $request)
    {
        return Excel::download(new AssetsExport($request->clickedLabel),"assets.xlsx");
    }

    public function exportConsumables()
    {
        return Excel::download(new ConsumableExport,"consumables.xlsx");
    }

    /**
     * Summary of changeRole
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function changeRole(Request $request)
    {
        DB::update('update users set role = ? where id = ?',[$request->newRole,$request->userId]);

        return(response()->json(["message"=> "Role Permission of User updated successfully",200]));
    }

    /**
     * Summary of list_users
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list_users()
    {
        return(view('listOfUsers'));
    }

    public function list_consumables()
    {
        return(view('list_consumables'));
    }


    /**
     * Summary of list_assets
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function list_assets()
    {
        return(view('listOfAssets'));
    }

    /**
     * Summary of create_users
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create_users()
    {
        return(view('create_users'));
    }

    private function validateAndUpdatePassword($request)
    {
        if($request->password!=null){

            $validator = Validator::make($request->all(), [
                'password' => 'required|custom_password',
            ], [
                'password.custom_password' => 'The :attribute must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, one digit, and one special character.',
            ]);

            if ($validator->fails()) {
                session()->flash('error',$validator->errors()->first('password'));
                return(false);
            }
        }

        return(true);
    }


    /**
     * Summary of insertunituser
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */

    public function insertunituser(Request $request)
    {
        $email_variable=$request->email;

        $user = DB::table('users')->where('email',$email_variable)->where('delete_flag','=',0)->first();
        
        if($user!=null){
            session()->flash('error','A user is already registered with this email id.');
            return(redirect()->route('list_users'));
        }

        if(!$this->validateAndUpdatePassword($request)){
            return redirect()->route('list_users');
        }


        DB::table('users')->insert([
            'username'=> $request->username,
            'role'=> $request->role,
            'email'=> $email_variable,
            'status' => 1,
            'password'=>bcrypt($request->password),
            'designation'=> $request->designation,
        ]);

        session()->flash('message','User inserted successfully!!!');

        return(redirect()->route('list_users'));
    }

    /**
     * Summary of insertunitasset
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */
    public function insertunitasset(Request $request)
    {
        $asset = DB::table('assets')->where('asset_id',$request->asset_id)->where('delete_flag','=',0)->first();

        $assetUsingMac_Id = DB::table('assets')->where('mac_id',$request->mac_id)->where('delete_flag','=',0)->first();

        if($asset!=null){
            session()->flash('error','Another asset with the same AssetId exists');
            return(redirect()->route('list_assets'));
        }

        if($assetUsingMac_Id!=null){
            if($assetUsingMac_Id->mac_id!=null){
                session()->flash('error','Another asset with the same MAC-Id exists');
                return(redirect()->route('list_assets'));
            }
        }


        DB::table('assets')->insert([
            'asset_id'      => $request->asset_id,
            'asset_type'    =>$request->asset_type,
            'asset_name'    =>$request->asset_name,
            'created_on'    => now(),
            'ip'            => $request->ip,
            'mac_id'        => $request->mac_id,
            'make'          =>$request->make,
            'port'          => $request->port,
            'model'         =>$request->model,
            'assignedTo'    =>'default',
            'consumable'    => intval($request->consumable),
        ]);

        session()->flash('message','Asset created successfully!!!');
        
        return(redirect()->route('list_assets'));
    }

    /**
     * Summary of editUsers
     * @param mixed $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editUsers($id)
    {
        $user = DB::table('users')->find($id);

        return(view('editUsers',['user'=>$user,'id'=>$id]));
    }

    /**
     * Summary of describe
     * @param mixed $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function describe($id)
    {
        $issue = DB::table('issues')->where('id',$id)->where('delete_flag','=',0)->first();

        if($issue==null){
            return(redirect()->route('home'));
        }

        $asset = DB::table('assets')->where('id',$issue->asset_id)->first();

        return(view('issueDescription',['issue'=>$issue,'id'=>$id,'asset'=>$asset]));
    }

    /**
     * Summary of escalate_request
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse|mixed
     */
    public function escalate_request(Request $request)
    {
        $issueId = intval($request->close_id);

        $issue = DB::table('issues')->where('id',$issueId)->first();

        if($issue->priority==2){
            return(response()->json(["message"=> "Issue is already under high priority cannot be further escalated.",404]));
        }

        $dateTimeStringObjectStart=$issue->last_escalation;
        
        if($dateTimeStringObjectStart==null){

            $dateTimeStringObjectStart = Carbon::parse($issue->start_date);
        }

        $dateTimeStringObjectNow = Carbon::parse()->now();

        $difference = $dateTimeStringObjectNow->diffInHours($dateTimeStringObjectStart);

        if($difference >= 24){
            DB::update('update issues set priority = ? where id = ?',[$issue->priority+1,$issueId]);
            
            DB::update('update issues set last_escalation = ? where id = ?',[$dateTimeStringObjectNow->toDateTimeString(),$issueId]);

            return(response()->json(["message"=> "Request has been escalated.",200]));
        }

        return(response()->json(["message"=> "Request cannot be escalated before 24 hours.",404]));
    }

    /**
     * Summary of editAssets
     * @param mixed $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function editAssets($id,Request $request)
    {
        $asset=DB::table('assets')->find($id);

        return(view('editAssets',['asset'=>$asset,'id'=>$id]));
    }

    /**
     * Summary of editunitasset
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|mixed
     */

    // DB::update('update assets set asset_type = ? where id = ?',[$request->asset_type,$request->id]);
    public function editunitasset(Request $request)
    {
        $assetUsingMac_Id = DB::table('assets')->where('mac_id',$request->mac_id)->where('delete_flag','=',0)->first();

        if($assetUsingMac_Id!=null){
            if($assetUsingMac_Id->mac_id!=null){
                session()->flash('error','Another asset with the same MAC-Id exists');
                return(redirect()->route('list_assets'));
            }
        }

        DB::update('update assets set asset_name = ? where id = ?',[$request->asset_name,$request->id]);

        DB::update('update assets set ip = ? where id = ?',[$request->ip,$request->id]);

        DB::update('update assets set mac_id = ? where id = ?',[$request->mac_id,$request->id]);

        DB::update('update assets set make = ? where id = ?',[$request->make,$request->id]);

        DB::update('update assets set model = ? where id = ?',[$request->model,$request->id]);

        DB::update('update assets set port = ? where id = ?',[$request->port,$request->id]);

        DB::update('update assets set created_on = ? where id = ?',[Carbon::parse($request->created_on),$request->id]);

        session()->flash('message','Asset updated successfully!!!');

        $asset = DB::table('assets')->where('asset_id',$request->asset_id)->first();

        if($asset->consumable==1){
            return(redirect()->route('list_consumables'));
        }

        return(redirect()->route('list_assets'));
    }

    /**
     * Summary of create_assets
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create_assets()
    {
        return(view('create_assets'));
    }


}
