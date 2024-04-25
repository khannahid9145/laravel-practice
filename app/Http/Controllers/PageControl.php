<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use illuminate\Support\Facades\DB;
use DB;
class PageControl extends Controller
{

    public function __invoke()
    {
        return "<h1>BYEE</h1>";
    }
    public function show()
    {
        // db::select('select * from cities');
        $user = DB::table('cities')->orderBy('id','DESC')->paginate(5);
        // $user = DB::table('cities')->where('id',2)->get();
        //    return $user;
        // dump($user);
        // dd($user);
        return view("alldata",['data'=>$user]);
        // return view("layout2");
        // foreach($user as $value_user){
        //     echo $value_user->name . "<br>";
        // }
    }

    public function showData(string $id){
        $data = DB::table('cities')->find($id);
        return view('showData',['data'=>$data]);
    }

    // public function add(Request $req){
    //     return redirect()->route('adduser');
    // }
    
    public function adduser(Request $req){
        $user = DB :: table('cities')->insert([
            'name'=> $req->name,
            'email'=>  $req->email,
            'city'=>  $req->city,
            'gender'=>  $req->gender,
            'area'=>  $req->area
        ]);

        if($user){
            return redirect()->route("alldata");
            // echo "<h1>data successfully inserted</h1>";
        }else{
            echo "<h1>data NOT inserted</h1>";
        }
    }

    public function updateUser(Request $req,string $id){
        // echo $req;
        // print_r($req);
        $update_Data =  DB::table('cities')->where('id',$id)->update([
            'name' => $req->name,
            'email'=>  $req->email,
            'city'=>  $req->city,
            'gender'=>  $req->gender,
            'area'=>  $req->area
        ]);

        if($update_Data){
            // return redirect()->route("alldata");
            echo "successfully";
        }else{
            echo "<h1>data NOT Updated</h1>";
        }
    }

    public function updateDetails(string $id){
        $updateData = DB::table('cities')->find($id);
        return $updateData;
        // return view('update',['data'=>$updateData]);
    }
    public function deleteuser(string $id){
        $delete_Data = DB::table("cities")->where("id",$id)->delete();
        if($delete_Data){
            return redirect()->route("alldata");
        }else{
            echo "<h1>data NOT deleted</h1>";
        }
    }

    public function deleteAllUser(){
        $deleteAll =  DB::table("cities")->delete();
    }
}
