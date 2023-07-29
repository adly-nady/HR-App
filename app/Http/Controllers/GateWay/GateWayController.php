<?php

namespace App\Http\Controllers\GateWay;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GateWayController extends Controller
{
    function index(){
        $Get_ID = DB::select("SELECT IF(MAX(`id`)+1 IS NULL , 1 , MAX(`id`)+1)  AS 'id' FROM `gateway`")[0]->id;
        $Employees = DB::table('employees')->select('*')->get();
        $Gateway_Data = DB::select("SELECT gateway.id, employees.name, gateway.date, gateway.time , gateway.in , gateway.out , gateway.notes FROM `gateway` , employees WHERE gateway.emp_id = employees.id ORDER BY gateway.id DESC LIMIT 20 ");
        return view('backend.GateWay.gateway',['Gateway_Data' => $Gateway_Data,'Employees'=> $Employees , 'New_ID'=> $Get_ID]);
    }

    function insert(Request $r){
        DB::table('gateway')->insert([
            'id'=> $r->id,
            'emp_id'=> $r->emp_id,
            'date'=> $r->date,
            'time'=> $r->time,
            'in' => $r->in ,
            'out' => $r->out,
            'notes'=> $r->notes ?? " ",

        ]);
        $Gateway_Data = DB::select("SELECT gateway.id, employees.name, gateway.date, gateway.time , gateway.in , gateway.out , gateway.notes FROM `gateway` , employees WHERE gateway.emp_id = employees.id ORDER BY gateway.id DESC LIMIT 20 ");

        return ['Gateway_Data' => $Gateway_Data,'Message'=>"Successfully"];
    }

    function delete($id)
    {
        DB::table('gateway')->where('id', $id)->delete();
        $Gateway_Data = DB::select("SELECT gateway.id, employees.name, gateway.date, gateway.time , gateway.in , gateway.out , gateway.notes FROM `gateway` , employees WHERE gateway.emp_id = employees.id ORDER BY gateway.id DESC LIMIT 20 ");
        return ['Gateway_Data' => $Gateway_Data,'Message'=>"Successfully"];
    }

    function Search(Request $r){
        $Employees = DB::table('employees')->select('*')->get();
        $Gateway_Data = DB::select("SELECT gateway.id, employees.name, gateway.date, gateway.time , gateway.in , gateway.out , gateway.notes FROM `gateway` , employees WHERE gateway.emp_id = employees.id ORDER BY gateway.id DESC LIMIT 20 ");
        return ['Gateway_Data' => $Gateway_Data,'Employees'=> $Employees];
    }
}
