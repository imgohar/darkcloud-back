<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Twilio\Rest\Client;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','verified','customer']);
    }
  

    public function index()
    {
        if(Session::has('is_verified')){
            $key = Session::get('is_verified');
            if($key == true){
                $page_title = 'Dashboard';
                $page_description = 'Welcome to your dashboard';
        
                return view('pages.dashboard', compact('page_title', 'page_description'));
            }
        }

        $id = Auth::user()->id;
        $user = User::find($id);
        if($user->is_tfa_enabled == 1 ){
            Session::put('is_verified', false);
            if($user->pin == ''){

                $pin = rand(0,9). rand(0,9).rand(0,9).rand(0,9).rand(0,9).rand(0,9);
                $user->pin = $pin;
                $user->save();
                $sid = env('TWILIO_SID');
                $token = env('TWILIO_TOKEN');
    
                $client = new Client($sid,$token);
                $client->messages->create('+12243238312',[
                    'from' => env('TWILIO_NUMBER'),
                    'body' => 'The code is '.$pin
                ]);
    
            }
            return view('auth.pin');

        }else{
            Session::put('is_verified', true);
            $page_title = 'Dashboard';
            $page_description = 'Welcome to your dashboard';
    
            return view('pages.dashboard', compact('page_title', 'page_description'));
        }


        
    }

    public function index2(Request $request){
        $request->validate([
            'pin'=> 'required|min:2|numeric'
        ]);
        $user_id = Auth::user()->id;
        $user = User::find($user_id);
        $pin = $request->pin;
        if($pin == $user->pin){
            $user->pin = '';
            $user->save();
            Session::put('is_verified',true);
            return redirect('/');
        }else{
            return back()->with('error',"Wrong Pin");
        }

    }

    /**
     * Demo methods below
     */

    // Datatables
    public function datatables()
    {
        $page_title = 'Datatables';
        $page_description = 'This is datatables test page';

        return view('pages.datatables', compact('page_title', 'page_description'));
    }

    public function enable2Fa(){
        $page_title = 'Enable 2 Factor Authenetication';
        $page_description = 'Receive pin code on phone to proceed login ';
        $id = Auth::user()->id;
        $user = User::find($id);
        $is_2fa = $user->is_tfa_enabled;
        return view('pages.enable-twofa',compact('page_title', 'page_description','is_2fa'));
    }
    public function enable2FaSubmit(Request $request){
        $enable = $request->enable;
        if($enable == 'on'){
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->is_tfa_enabled = 1;
            $user->save();
            return redirect('/enable-2fa')->with('success',"2 factor authentiaction enabled successfully");
        }else{
            $id = Auth::user()->id;
            $user = User::find($id);
            $user->is_tfa_enabled = 0;
            $user->save();
            return redirect('/enable-2fa')->with('success',"2 factor authentiaction disabled successfully");
        }
    }


    public function deleteAccount(){
        // $user = User::find(Auth::user()->id)->delete;
        return "DELETE ACCOUNT";
    }


    // KTDatatables
    public function ktDatatables()
    {
        $page_title = 'KTDatatables';
        $page_description = 'This is KTdatatables test page';

        return view('pages.ktdatatables', compact('page_title', 'page_description'));
    }

    // Select2
    public function select2()
    {
        $page_title = 'Select 2';
        $page_description = 'This is Select2 test page';

        return view('pages.select2', compact('page_title', 'page_description'));
    }

    // jQuery-mask
    public function jQueryMask()
    {
        $page_title = 'jquery-mask';
        $page_description = 'This is jquery masks test page';

        return view('pages.jquery-mask', compact('page_title', 'page_description'));
    }

    // custom-icons
    public function customIcons()
    {
        $page_title = 'customIcons';
        $page_description = 'This is customIcons test page';

        return view('pages.icons.custom-icons', compact('page_title', 'page_description'));
    }

    // flaticon
    public function flaticon()
    {
        $page_title = 'flaticon';
        $page_description = 'This is flaticon test page';

        return view('pages.icons.flaticon', compact('page_title', 'page_description'));
    }

    // fontawesome
    public function fontawesome()
    {
        $page_title = 'fontawesome';
        $page_description = 'This is fontawesome test page';

        return view('pages.icons.fontawesome', compact('page_title', 'page_description'));
    }

    // lineawesome
    public function lineawesome()
    {
        $page_title = 'lineawesome';
        $page_description = 'This is lineawesome test page';

        return view('pages.icons.lineawesome', compact('page_title', 'page_description'));
    }

    // socicons
    public function socicons()
    {
        $page_title = 'socicons';
        $page_description = 'This is socicons test page';

        return view('pages.icons.socicons', compact('page_title', 'page_description'));
    }

    // svg
    public function svg()
    {
        $page_title = 'svg';
        $page_description = 'This is svg test page';

        return view('pages.icons.svg', compact('page_title', 'page_description'));
    }

    // Quicksearch Result
    public function quickSearch()
    {
        return view('layout.partials.extras._quick_search_result');
    }

    public function changeProfile(){
        $page_title = 'Change Profile';
        $page_description = 'Update Your Profile';
        $userId = Auth::user()->id;
        $user = User::find($userId);
        return view('pages.change-profile', compact('page_title', 'page_description','user'));

    }
    public function changeProfileSubmit(Request $request){
        $request->validate([
            'fname' => 'required',
            'mname' => 'required',
            'lname' => 'required',
            'phone' => 'required',
            'business_name' => 'required',
            'business_contact_number' => 'required'
        ]);
        $user = User::find(Auth::user()->id);
        $user->fname = $request->fname;
        $user->mname = $request->mname;
        $user->lname = $request->lname;
        $user->phone = $request->phone;
        $user->business_name = $request->business_name;
        $user->dba = $request->dba;
        $user->business_tax_id = $request->business_tax_id;
        $user->business_contact_number = $request->business_contact_number;
        if($request->two_fa){
            $user->is_tfa_enabled = 1;
        }else{
            $user->is_tfa_enabled = 0;
        }
        $user->save();
        return redirect('/')->with('success',"Account Information changed successfully");
    }


    public function passwordRreset(){
        $page_title = 'Password Reset';
        $page_description = 'Reset Your Password';

        return view('pages.password-reset', compact('page_title', 'page_description'));
    }

    public function passwordRresetSubmit(Request $request){
        $request->validate([
            'newPassword' => 'required|min:8'
        ]);

        $user = User::find(Auth::user()->id);
        $new = $request->newPassword;
        $user->password = Hash::make($new);
        $user->save();
        return redirect("/")->with('success','Password have been updated');

    }


    public function new(){
        return view('new');
    }


}
