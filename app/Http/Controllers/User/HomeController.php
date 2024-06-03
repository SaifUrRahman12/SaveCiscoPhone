<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Phone;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/* .... if user have agent role this is controller .... */
class HomeController extends Controller
{
    /* .... User show method .... */
    public function index(){
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('user.home', compact('profileData'));
    }
    /* .... user change profile method .... */
    public function UserProfileStore(Request $request){
        $id = Auth::user()->id;
        $data = User::find($id);
        if(!Hash::check($request->current_password, $data->password)){
            return redirect()->back()->with('Error','Current password is incorrect');
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


    /* .... user logout method .... */
    public function UserLogout(){
        session()->flush();
        return redirect()->route('login');
    }



    public function GetUserCisco(){
        $phone =Phone::all();
        $province = Province::all();
        return view('user.CiscoPhone.cisco',compact('province','phone'));
    }
    public function StoreUserCisco(Request $request){

        $phone = new Phone();
        $phone->registrar_name = $request->name;
        $phone->source = $request->city;
        $phone->model = $request->model;
        $phone->serial_number = $request->serial_number;
        $phone->mac_address = $request->mac_address;
        $phone->date_added = $request->date_added;

        $phone->save();
        if($phone){
            return redirect()->back()->with('success','Phone Added Successfully!');
        }else{
            return redirect()->back()->with('errors','Phone not Added, Something went Wrong!!!!!');
        }
    }
    public function UpdateUserCisco(Request $request, $id){
        $phone = Phone::find($id);
        $phone->registrar_name = $request->name;
        $phone->source = $request->city;
        $phone->model = $request->model;
        $phone->serial_number = $request->serial_number;
        $phone->mac_address = $request->mac_address;
        $phone->date_added = $request->date_added;

        $phone->update();
        if($phone){
            return redirect()->back()->with('success','Phone Info Updated Successfully!');
        }else{
            return redirect()->back()->with('errors','Phone Info not Updated Something went wrong!!!!!!');
        }
    }

    public function StoreUserProvince(Request $request){
        $request->validate([
            'province_name' => 'required',
        ]);
        $province = new Province();
        $province->province_name = $request->province_name;
        $province->save();
        if($province){
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }

    public function ShowUserProvince(){
        $province = Province::all();
        return view('user.Province.province', compact('province'));
    }
}
