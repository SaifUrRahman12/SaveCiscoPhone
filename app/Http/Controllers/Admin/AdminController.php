<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Models\Phone;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

     /* .... Dashboard home page .... */
    public function index()
    {
        $users = User::all()->count();
        $phone = Phone::all()->count();
        $province = Province::all()->count();
        return view('admin.home',compact('users','phone','province'));
    }

    /* .... logout method of admin .... */
    public function AdminLogout(){
        session()->flush();
        return redirect()->route('login');
    }

    public function GetCiscoForm(){
        $phone =Phone::all();
        $province = Province::all();
        return view('admin.CiscoPhone.cisco',compact('province','phone'));
    }
    public function StoreCisco(Request $request){

        $phone = new Phone();
        $phone->registrar_name = $request->name;
        $phone->source = $request->city;
        $phone->model = $request->model;
        $phone->serial_number = $request->serial_number;
        $phone->mac_address = $request->mac_address;
        $phone->date_added = $request->date_added;

        $phone->save();
        if($phone){
            return redirect()->back()->with('success','Phone Added Successfully!!!!!!!');
        }else{
            return redirect()->back()->with('errors','Something went wrong!!!!!!');
        }
    }
    public function UpdateCisco(Request $request, $id){
        $phone = Phone::find($id);
        $phone->registrar_name = $request->name;
        $phone->source = $request->city;
        $phone->model = $request->model;
        $phone->serial_number = $request->serial_number;
        $phone->mac_address = $request->mac_address;
        $phone->date_added = $request->date_added;

        $phone->update();
        if($phone){
            return redirect()->back()->with('success','Phone Updated Successfully!!!!!!!!!');
        }else{
            return redirect()->back()->with('errors','Something went wrong!!!!!!!!');
        }
    }
    public function DeleteCisco(string $id){
        // find the phone
        $phone = Phone::where('id', $id)->delete();
        if($phone){
            return redirect()->back()->with('success','Phone Deleted Successfully!!!!!!!!');
        }else{
            return redirect()->back()->with('errors','Something went Wrong ?');
        }
    }

    public function ShowProvince(){
        $province = Province::all();
        return view('admin.Province.province', compact('province'));
    }
    public function StoreProvince(Request $request){

        $province = new Province();
        $province->province_name = $request->province_name;
        $province->save();
        if($province){
            return redirect()->back()->with('success','Province Added Successfully!!!!!!!!!');
        }else{
            return redirect()->back()->with('errors','Something went wrong ?');
        }
    }
    public function DeleteProvince(string $id){

        // find the province
        $province = Province::find($id);

        if(!is_null($province)) {
            $province->delete();
            if($province){
                return redirect()->back()->with('success','Province Deleted Successfully!!!!!!!!!');
            }else{
                return redirect()->back()->with('errors','Something went wrong ?');
            }
        }
    }

    /* .... profile page show method .... */
    public function ShowProfile(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.profile.profile',compact('profileData'));
    }
    /* .... if admin change his profile this methode work .... */
    public function AdminProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);

        if(!Hash::check($request->current_password, $data->password)){
            return redirect()->back()->with('Error','Current password is incorect');
        }
        if($request->password != $request->confirm_password){
            return redirect()->back()->with('Error','Password and Confirm_Password Mismatch');
        }
        $password="";
        if($request->password ==""){
            $password = $data->password;
        }else{
            $password = Hash::make($request->password);
        }

        $data->name = $request->name;
        $data->username = $request->username;
        $data->email = $request->email;
        $data->phone_number = $request->phone_number;
        $data->password = $password;

        if($request->file('photo')){
            $file = $request->file('photo');
            // @unlink(public_path('uploads/image/'.$data->photo));
            $filename = date('Ymdhi').$file->getClientOriginalName();
            $file->move(public_path('uploads/image'),$filename);
            $data['photo'] = $filename;
        }
        $data->save();
        return redirect()->back();
    }


    /* .... users show methode .... */
    public function get_usermanage(){
        $users = User::all();
        return view('Admin.UserManagement.user_manage', compact('users'));
    }
    /* .... new users add methode  .... */
    public function storeUsers(Request $request){
        $photo_address = "uploads/logo.jpg";
        if($request->file('photo')){
            $file = $request->file('photo');
            $name='uploads/image/'.time().$file->getClientOriginalName();
            $file->move('uploads/image/',$name);
            $photo_address=$name;
        }
        $users = new User();
        $users->name = $request->name;
        $users->username = $request->username;
        $users->phone_number = $request->phone_number;
        $users->photo =   $photo_address;
        $users->email = $request->email;
        $users->role = $request->role;
        $users->password = $request->password;

        $users->save();
        if($users){
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    /* .... users update methode .... */
    public function UpdateUser(Request $request, $id){
        $users = User::find($id);
        $photo_address = "uploads/logo.jpg";
        if($request->file('photo')){
            $file = $request->file('photo');
            $name='uploads/image/'.time().$file->getClientOriginalName();
            $file->move('uploads/image/',$name);
            $photo_address=$name;
        }
        $users->name = $request->name;
        $users->username = $request->username;
        $users->phone_number = $request->phone_number;
        $users->photo =   $photo_address;
        $users->email = $request->email;
        $users->role = $request->role;
        $users->password = $request->password;
        $users->update();
        if($users){
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
    /* .... users delete methode .... */
    public function DeleteUser($id){
        $users = User::where('id', $id)->delete();
        if($users){
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
}
