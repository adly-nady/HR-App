<?php

namespace App\Http\Controllers\Attendance;

use App\Http\Controllers\Controller;
use App\View\Components\message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AttendanceControll extends Controller
{
    public function click_add_day_out(Request $R)
    {
        if (!$R->date) return ['error' => " enter the date "];
        if (!$R->cost) return ['error' => " enter the cost "];

        DB::table('work_out')->insert([
            'emp_id' => $R->name,
            'cost_plus' => $R->cost,
            'date' => $R->date,
        ]);
    }
    public function add_day_off(Request $R)
    {
        $YearDayOff = DB::table('emp_data')->where('emp_id', $R->name)->select('vacation_balance')->get()[0]->vacation_balance;

        if ($R->name && $R->date && $YearDayOff > 0 && $R->is_annual_holiday == 1) {

            $YearDayOff--;
            DB::table('emp_data')->where('emp_id', $R->name)->update(['vacation_balance' => $YearDayOff]);
            DB::table('day_off')->insert([
                'emp_id' => $R->name,
                'is_annual_holiday' => $R->is_annual_holiday,
                'date' => $R->date,
            ]);

        }else if ($R->name && $R->date && $R->is_annual_holiday == 0) {
            DB::table('day_off')->insert([
                'emp_id' => $R->name,
                'is_annual_holiday' => $R->is_annual_holiday,
                'date' => $R->date,
            ]);
        } else {
            return ['error' => " Chack Your Data  OR There is not enough leave balance ...! "];
        }
    }
    public function Attendance_View()
    {
        $Employees = DB::table('employees')->select('*')->get();
        $getAttendance = DB::select("SELECT attendance.`id`, employees.name AS 'name', attendance.`date`, attendance.`time` FROM `attendance` , employees WHERE attendance.emp_id = employees.id ORDER BY attendance.`id` LIMIT 20 ");
        $getAttendanceT2 = DB::select("SELECT dayes_work.emp_name, COUNT(dayes_work.date) AS 'Count_Dayes_Work', TIME_FORMAT(SUM(dayes_work.time_work), '%H:%i:%s') AS 'Total_Hours_Work' FROM ( SELECT attendance.`emp_id`, employees.name AS 'emp_name', attendance.`date`, TIMEDIFF( MAX(attendance.`time`), MIN(attendance.`time`)) AS 'time_work' FROM attendance , employees WHERE attendance.emp_id = employees.id  GROUP BY attendance.`emp_id`, attendance.`date` ) AS dayes_work GROUP BY dayes_work.emp_name");
        return view('backend.Attendance.All_Attendance', ['EmpData' => $getAttendance, 'EmpData2' => $getAttendanceT2, 'Employees' => $Employees]);
    }
    public function Attendance_search(Request $r)
    {
        $getAttendance = DB::select("SELECT attendance.`id`, employees.name AS 'name', attendance.`date`, attendance.`time` FROM `attendance` , employees WHERE " . $r->QueryAttendance . " ");
        $getAttendanceT2 = DB::select("SELECT dayes_work.emp_name, COUNT(dayes_work.date) AS 'Count_Dayes_Work', TIME_FORMAT(SUM(dayes_work.time_work), '%H:%i:%s') AS 'Total_Hours_Work' FROM ( SELECT attendance.`emp_id`, employees.`name` AS 'emp_name', attendance.`date`, TIMEDIFF( MAX(attendance.`time`), MIN(attendance.`time`)) AS 'time_work' FROM attendance , employees WHERE attendance.emp_id = employees.id  GROUP BY attendance.`emp_id`, attendance.`date` ) AS dayes_work WHERE " . $r->QueryAttendanceT2 . " GROUP BY dayes_work.emp_name ");
        return ['EmpData_Search' => $getAttendance, 'EmpData2' => $getAttendanceT2];
    }
}
