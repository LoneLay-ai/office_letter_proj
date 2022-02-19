<?php

namespace App\Http\Controllers;
use App\Models\Division;
use App\Models\Letter;
use App\Models\LetterType;
use App\Models\MainDispatch;
use App\Models\Title;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests;




class CommonController extends Controller
{

    public function index(){
        $urlData = getURLList();
        return view('user.inbox');
    }

    public function dataDivision()
    {
        $divisions = Division::all();
        return response()->json([
            'divisions'=>$divisions,
        ]);
        // return View::make('divisions', $divisions);
        return view('compose')->with('divisions',$divisions);
    }

    function get()
    {
        $letters = Letter::all();
        return response()->json([
            'letters'=>$letters,
        ]);
    }

    public function store(Request $request)
    {
        $rules = [
			'letter_date' => 'required|string|min:3|max:255',
			'received_form_or_sent_to' => 'required|string|min:3|max:255',
            'title'=> 'required|string|min:3|max:255',
			'letter_no' => 'required|string|min:3|max:255',
            'ledger_Sno' => 'required|string|min:3|max:255',
            'description' => 'required|string|min:3|max:255',
            'dg_up' => 'required|string|min:3|max:255',
            'dg_down' => 'required|string|min:3|max:255',
            'dg_remark' => 'required|string|min:3|max:255',
            'ddg_up' => 'required|string|min:3|max:255',
            'ddg_down' => 'required|string|min:3|max:255',
            'ddg_remark' => 'required|string|min:3|max:255',
            'd_up' => 'required|string|min:3|max:255',
            'd_down' => 'required|string|min:3|max:255',
            'd_remark' => 'required|string|min:3|max:255'
		];

        $this->validate($request,$rules);

        $todayDate = Carbon::now()->format('Y-m-d');

        

        $data = $request->input();
        $titleData = $data['title'];
        
        try{
            $letter_datas = new Letter;
            $letter_datas->ledger_date       = $todayDate;
            $letter_datas->letter_type_id    = $data['letter_type_id'];
            $letter_datas->ledger_Sno        = $data['ledger_Sno'];
            $letter_datas->main_dispatch_id  = $data['letter_type_id'];
            $letter_datas->letter_no         = $data['ledger_Sno'];
            $letter_datas->letter_date       = $data['letter_date'];
            $letter_datas->title_id          = $data['letter_type_id'];
            $letter_datas->description       = $data['description'];
            $letter_datas->received_form_or_sent_to = $data['received_form_or_sent_to'];
            $letter_datas->d_up              = $data['d_up'];
            $letter_datas->d_down            = $data['d_down'];
            $letter_datas->d_remark          = $data['d_remark'];
            $letter_datas->ddg_up            = $data['ddg_up'];
            $letter_datas->ddg_down          = $data['ddg_down'];
            $letter_datas->ddg_remark        = $data['ddg_remark'];
            $letter_datas->dg_up             = $data['dg_up'];
            $letter_datas->dg_down           = $data['dg_down'];
            $letter_datas->dg_remark         = $data['dg_remark'];
            $letter_datas->case_officer      = "";
            $letter_datas->remark            = "";
            $letter_datas->save();

            $title_datas = new Title;
            $title_datas->title_name= $titleData;
            $title_datas->save();

            return redirect('/inbox/compose')->with('message',"Saved Successful!");

        }catch(Exception $e){
            return redirect('/inbox/compose')->with('message',"operation failed");

        }
    }

    

    function editData(Request $request)
    {
        $id=$request->id;
        $letters = Letter::find($id);

        $datatwo = $letters->toArray();

        
        if($datatwo){
           
            return view('user/compose', ["datas"=>$datatwo]);

        }else{

            return redirect('/inbox/compose')->with('message',"this data is already deleted!");
        }
        
    }

    function deleteData(Request $request)
    {
        $id=$request->id;
        
        $letters = Letter::find($id);
        
        if($letters){
            $letters->delete();
            return redirect('/inbox')->with('message',"Delete Successful!");
            
        }else{
            
            return redirect('/inbox')->with('message',"this data is already deleted!");
        }
        
        
    }

    function details(Request $request)
    {
        $id=$request->id;
        
        $letters = Letter::find($id);
        
        if($letters){
            return view('/inbox/compose', compact('letters'));
            
        }else{

            return redirect('/inbox/compose')->with('message',"this data is already deleted!");
        }
        
        
    }

    function update(Request $request)
    {
        $id=$request->id;
        
        $upd_letters = Letter::find($id);
        $data = $request->input();
        if($upd_letters){
            $upd_letters->letter_type_id    = $data['letter_type_id'];
            $upd_letters->ledger_Sno        = $data['ledger_Sno'];
            $upd_letters->main_dispatch_id  = $data['letter_type_id'];
            $upd_letters->letter_no         = $data['ledger_Sno'];
            $upd_letters->letter_date       = $data['letter_date'];
            $upd_letters->title_id          = $data['letter_type_id'];
            $upd_letters->description       = $data['description'];
            $upd_letters->received_form_or_sent_to = $data['received_form_or_sent_to'];
            $upd_letters->d_up              = $data['d_up'];
            $upd_letters->d_down            = $data['d_down'];
            $upd_letters->d_remark          = $data['d_remark'];
            $upd_letters->ddg_up            = $data['ddg_up'];
            $upd_letters->ddg_down          = $data['ddg_down'];
            $upd_letters->ddg_remark        = $data['ddg_remark'];
            $upd_letters->dg_up             = $data['dg_up'];
            $upd_letters->dg_down           = $data['dg_down'];
            $upd_letters->dg_remark         = $data['dg_remark'];
            $upd_letters->case_officer      = "";
            $upd_letters->remark            = "";
            $upd_letters->update();
            return redirect('/inbox/compose')->with('message',"Updated Successful!");
        }else{
            return redirect('/inbox/compose')->with('message',"Updated fail!");
        }

            
    }


}
