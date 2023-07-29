<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersControll extends Controller
{
    function index(){
        $Users = DB::select("SELECT users.id, users.name, users.email, access.name AS 'access_name' , users.password FROM users , access WHERE users.access_id = access.id");
        return view('backend.Users.manage_Users',['Users'=> $Users]);
    }

    function insert(Request $r){
        DB::table('users')->insert([
            'name' => $r->name,
            'email' => $r->email,
            'password' => Hash::make($r->password,['rounds' => 12]),
            'email_verified_at' => date('Y-m-d H-m-s'),
            'access_id' => $r->access_id,
        ]);
        $Users = DB::select("SELECT users.id, users.name, users.email, access.name AS 'access_name' , users.password FROM users , access WHERE users.access_id = access.id");
        return ['Users'=> $Users];
    }

    function delete($id){
        DB::table('users')->where('id',$id)->delete();
        $Users = DB::select("SELECT users.id, users.name, users.email, access.name AS 'access_name' , users.password FROM users , access WHERE users.access_id = access.id");
        return ['Users'=> $Users];
    }
}
