<?php

namespace App\Http\Controllers\Machine_config;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Rats\Zkteco\Lib\ZKTeco;

class Machine_configController extends Controller
{
    public function search_in_Work_Outside_Statement(Request $R)
    {
        switch ($R->type_saerch) {
            case '0':
                $data = DB::table("work_out")->where('date',$R->only_date??null)->get();
                break;
            case '1':
                $data = DB::table("work_out")->whereBetween('date',[$R->from_date,$R->to_date])->get();
                break;
            case '2':
                $data = DB::table("work_out")->where([['date','>=',$R->from_date2??null],['date','<=',$R->to_date2??null],['emp_id',$R->name??null]])->get();
                break;
        }
        foreach ($data as $key => $value) {
            $data[$key]->emp_id=DB::table('users')->where('id',$value->emp_id)->get()[0]->name;
        }
        return $data;
    }
    public function get_users()
    {
        return DB::table("users")->get();
    }
    public function search_in_Days_Off_Statement(Request $R)
    {
        switch ($R->type_saerch) {
            case '0':
                $data = DB::table("day_off")->where('date',$R->only_date??null)->get();
                break;
            case '1':
                $data = DB::table("day_off")->whereBetween('date',[$R->from_date,$R->to_date])->get();
                break;
            case '2':
                $data = DB::table("day_off")->where([['date','>=',$R->from_date2??null],['date','<=',$R->to_date2??null],['emp_id',$R->name??null]])->get();
                break;
        }
        foreach ($data as $key => $value) {
            $data[$key]->emp_id=DB::table('users')->where('id',$value->emp_id)->get()[0]->name;
        }
        return $data;
    }
    public function list_of_Days_Off_Statement()
    {
        $data = DB::table('day_off')->orderByDesc('id')->get();
        foreach ($data as $key => $value) {
            $data[$key]->emp_id=DB::table('users')->where('id',$value->emp_id)->get()[0]->name;
        }
        return $data;
    }
    public function list_of_Work_Outside_Statement()
    {
        $data = DB::table('work_out')->orderByDesc('id')->get();
        foreach ($data as $key => $value) {
            $data[$key]->emp_id=DB::table('users')->where('id',$value->emp_id)->get()[0]->name;
        }
        return $data;
    }
    public function delete_Days_Off_Statement(Request $R)
    {
        DB::table('day_off')->where('id',$R->id)->delete();
    }
    public function delete_Work_Outside_Statement(Request $R)
    {
        DB::table('work_out')->where('id',$R->id)->delete();
    }
    public function display_Days_Off_Statement()
    {
        $data = DB::select("SELECT day_off.id, employees.name, day_off.date, day_off.is_annual_holiday FROM day_off , employees WHERE day_off.emp_id = employees.id ORDER BY day_off.id DESC");
        return view('backend.Attendance.Days_Off_Statement',['data'=>$data]);
    }
    public function display_Work_Outside_Statement()
    {
        $data = DB::select("SELECT work_out.id, employees.name, work_out.date, work_out.cost_plus FROM work_out , employees WHERE work_out.emp_id = employees.id ORDER BY work_out.id DESC");
        return view('backend.Attendance.Work_Outside_Statement',['data'=>$data]);
    }
    public function index()
    {
        $machin_data = DB::table('machine_config')->select('*')->get();
        $machin_name = $machin_data[0]->machin_name ?? " ";
        $machin_ip = $machin_data[0]->machin_ip ?? " ";
        $machin_port = $machin_data[0]->machin_port ?? " ";

        return view('backend.Machine_config.main', ['machin_name' => $machin_name, 'machin_ip' => $machin_ip, 'machin_port' => $machin_port]);
    }
    public function save(Request $request)
    {
        DB::table('machine_config')->insert([
            'machin_name' => $request->machin_name,
            'machin_ip' => $request->machin_ip,
            'machin_port' => $request->machin_port
        ]);
        return "Machine Config Saved ...!";
    }
}
