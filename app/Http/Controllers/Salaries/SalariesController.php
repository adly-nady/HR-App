<?php

namespace App\Http\Controllers\Salaries;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalariesController extends Controller
{
    function Employees_Salaries_view()
    {
        $Employees = DB::table('employees')->select ('*')->get();
        return view('backend.Salaries.Employees_Salaries', ['Employees' => $Employees]);
    }

    function add_salary_deduction_reward(Request $r)
    {
        if ($r->date || $r->Salary_Deduction || $r->Salary_Reword) {
            DB::table('salary_deduction_reward')->insert([
                'emp_id' => $r->name,
                'date' =>  $r->date,
                'count_days' => $r->count_days,
                'Salary_Deduction' =>  $r->Salary_Deduction,
                'Salary_reward' => $r->Salary_Reword
            ]);
        } else {
            return ['error' => " Chack Data ...!"];
        }
    }

    function add_salary_borrow(Request $r)
    {
        if ($r->date || $r->amount) {
            DB::table('borrow_salary')->insert([
                'emp_id' =>  $r->name,
                'date' =>  $r->date,
                'amount' =>  $r->amount
            ]);
        } else {
            return ['error' => " Chack Data ...!"];
        }
    }

    function Employees_Salaries_Search(Request $r)
    {
        if ($r->status == "date") {
            $EmpData_Search = DB::select ("SELECT main_Query3.emp_id,main_Query3.emp_name,main_Query3.dep_name,main_Query3.Count_Dayes_Work,main_Query3.Total_Hours_Work,main_Query3.count_days_off,main_Query3.count_days_work_out,main_Query3.primary_hours_works,main_Query3.total_Days,main_Query3.All_hours, (main_Query3.Total_Hours_Work)-(main_Query3.Count_Dayes_Work*8) AS 'hour_difference',main_Query3.salary_hours,main_Query3.salary,main_Query3.work_out_reward,main_Query3.days_deduction,main_Query3.days_reward,main_Query3.sum_borrow_salary,main_Query3.plus_incentive,main_Query3.vacation_balance,(((main_Query3.All_hours -(main_Query3.days_deduction * 8)) +(main_Query3.days_reward * 8))) * main_Query3.salary_hours +(main_Query3.work_out_reward - main_Query3.sum_borrow_salary)+ (IF(main_Query3.Count_Dayes_Work >= 23,(main_Query3.plus_incentive*8)* main_Query3.salary_hours , 0)) AS 'Final_Salary'  FROM(SELECT main_Query2.emp_id,main_Query2.emp_name,department.dep_name,main_Query2.Count_Dayes_Work,main_Query2.Total_Hours_Work,main_Query2.count_days_off,main_Query2.count_days_work_out,main_Query2.primary_hours_works,main_Query2.total_Days,main_Query2.All_hours,(main_Query2.All_hours - main_Query2.primary_hours_works) AS 'over_time',employees.salary_day / 8 AS 'salary_hours',(main_Query2.All_hours *(employees.salary_day / 8)) AS 'salary',IF(main_Query2.sum_reward IS NULL,0,main_Query2.sum_reward) AS 'work_out_reward',IF(main_Query2.days_deduction IS NULL,0,main_Query2.days_deduction) AS 'days_deduction',IF(main_Query2.days_reward IS NULL,0,main_Query2.days_reward) AS 'days_reward',IF(main_Query2.sum_borrow_salary IS NULL,0,main_Query2.sum_borrow_salary) AS 'sum_borrow_salary' ,employees.plus_incentive AS 'plus_incentive',emp_data.vacation_balance AS 'vacation_balance' FROM  ( SELECT  dayes_work.emp_id, dayes_work.emp_name, COUNT(dayes_work.date) AS 'Count_Dayes_Work', TIME_FORMAT( SUM(dayes_work.time_work), '%H:%i:%s' ) AS 'Total_Hours_Work', IF( days_work_more.count_days_off IS NULL, 0, days_work_more.count_days_off ) AS 'count_days_off', IF( count_work_out.count_days_work_out IS NULL, 0, count_work_out.count_days_work_out ) AS 'count_days_work_out', '208' AS 'primary_hours_works', ( COUNT(dayes_work.date) + IF( days_work_more.count_days_off IS NULL, 0, days_work_more.count_days_off ) + IF( count_work_out.count_days_work_out IS NULL, 0, count_work_out.count_days_work_out ) ) AS 'total_Days', TIME_FORMAT( SUM(dayes_work.time_work), '%H:%i:%s' ) +( 8 *( IF(days_work_more.count_days_off IS NULL,0,days_work_more.count_days_off)  + IF(count_work_out.count_days_work_out IS NULL,0,count_work_out.count_days_work_out) ) ) AS 'All_hours', count_work_out.sum_reward, salary_deduction.days_deduction, salary_reward.days_reward, borrow_salary.sum_borrow_salary FROM ( SELECT  attendance.`emp_id`, employees.`name` AS 'emp_name', attendance.`date`, TIMEDIFF( MAX(attendance.`time`), MIN(attendance.`time`) ) AS 'time_work' FROM attendance, employees
            WHERE attendance.emp_id = employees.id AND attendance.date BETWEEN '" . $r->from_date . "' AND '" . $r->to_date . "' GROUP BY  attendance.`emp_id`, attendance.`date` ) AS dayes_work LEFT JOIN( SELECT  day_off.emp_id AS 'emp_id', COUNT(day_off.emp_id) AS 'count_days_off' FROM day_off
            WHERE day_off.is_annual_holiday = 1 AND day_off.date BETWEEN '" . $r->from_date . "' AND '" . $r->to_date . "' GROUP BY  day_off.emp_id ) AS days_work_more ON dayes_work.emp_id = days_work_more.emp_id LEFT JOIN( SELECT  work_out.emp_id, SUM(work_out.cost_plus) AS 'sum_reward', COUNT(work_out.emp_id) AS 'count_days_work_out' FROM work_out
            WHERE work_out.date BETWEEN '" . $r->from_date . "' AND '" . $r->to_date . "' GROUP BY  work_out.emp_id ) AS count_work_out ON dayes_work.emp_id = count_work_out.emp_id  LEFT JOIN( SELECT  salary_deduction_reward.emp_id, SUM( salary_deduction_reward.count_days ) AS 'days_deduction' FROM salary_deduction_reward
            WHERE salary_deduction_reward.Salary_Deduction = 1 AND salary_deduction_reward.date BETWEEN '" . $r->from_date . "' AND '" . $r->to_date . "' GROUP BY  salary_deduction_reward.emp_id ) AS salary_deduction ON dayes_work.emp_id = salary_deduction.emp_id LEFT JOIN (SELECT  borrow_salary.emp_id , SUM(borrow_salary.amount) AS 'sum_borrow_salary' FROM borrow_salary
            WHERE borrow_salary.date BETWEEN '" . $r->from_date . "' AND '" . $r->to_date . "'   GROUP BY  borrow_salary.emp_id   ) AS borrow_salary on dayes_work.emp_id = borrow_salary.emp_id  LEFT JOIN( SELECT  salary_deduction_reward.emp_id, SUM( salary_deduction_reward.count_days ) AS 'days_reward' FROM salary_deduction_reward
            WHERE salary_deduction_reward.Salary_reward = 1 AND salary_deduction_reward.date BETWEEN '" . $r->from_date . "' AND '" . $r->to_date . "' GROUP BY  salary_deduction_reward.emp_id ) AS salary_reward ON  dayes_work.emp_id = salary_reward.emp_id GROUP BY  dayes_work.emp_id ) AS main_Query2 JOIN employees ON main_Query2.emp_id = employees.id  JOIN emp_data ON main_Query2.emp_id = emp_data.emp_id  JOIN department ON employees.depart_id = department.id  GROUP BY  main_Query2.emp_id,main_Query2.emp_name) AS main_Query3");
            return ['EmpData_Search' => $EmpData_Search];
        } else if ($r->status == "date_name") {
            $EmpData_Search = DB::select ("SELECT  main_Query3.emp_id,main_Query3.emp_name,main_Query3.dep_name,main_Query3.Count_Dayes_Work,main_Query3.Total_Hours_Work,main_Query3.count_days_off,main_Query3.count_days_work_out,main_Query3.primary_hours_works,main_Query3.total_Days,main_Query3.All_hours, (main_Query3.Total_Hours_Work)-(main_Query3.Count_Dayes_Work*8) AS 'hour_difference',main_Query3.salary_hours,main_Query3.salary,main_Query3.work_out_reward,main_Query3.days_deduction,main_Query3.days_reward,main_Query3.sum_borrow_salary,main_Query3.plus_incentive,main_Query3.vacation_balance,(((main_Query3.All_hours -(main_Query3.days_deduction * 8)) +(main_Query3.days_reward * 8))) * main_Query3.salary_hours +(main_Query3.work_out_reward - main_Query3.sum_borrow_salary)+ (IF(main_Query3.Count_Dayes_Work >= 23,(main_Query3.plus_incentive*8)* main_Query3.salary_hours , 0)) AS 'Final_Salary'  FROM(SELECT main_Query2.emp_id,main_Query2.emp_name,department.dep_name,main_Query2.Count_Dayes_Work,main_Query2.Total_Hours_Work,main_Query2.count_days_off,main_Query2.count_days_work_out,main_Query2.primary_hours_works,main_Query2.total_Days,main_Query2.All_hours,(main_Query2.All_hours - main_Query2.primary_hours_works) AS 'over_time',employees.salary_day / 8 AS 'salary_hours',(main_Query2.All_hours *(employees.salary_day / 8)) AS 'salary',IF(main_Query2.sum_reward IS NULL,0,main_Query2.sum_reward) AS 'work_out_reward',IF(main_Query2.days_deduction IS NULL,0,main_Query2.days_deduction) AS 'days_deduction',IF(main_Query2.days_reward IS NULL,0,main_Query2.days_reward) AS 'days_reward',IF(main_Query2.sum_borrow_salary IS NULL,0,main_Query2.sum_borrow_salary) AS 'sum_borrow_salary' ,employees.plus_incentive AS 'plus_incentive',emp_data.vacation_balance AS 'vacation_balance' FROM  ( SELECT  dayes_work.emp_id, dayes_work.emp_name, COUNT(dayes_work.date) AS 'Count_Dayes_Work', TIME_FORMAT( SUM(dayes_work.time_work), '%H:%i:%s' ) AS 'Total_Hours_Work', IF( days_work_more.count_days_off IS NULL, 0, days_work_more.count_days_off ) AS 'count_days_off', IF( count_work_out.count_days_work_out IS NULL, 0, count_work_out.count_days_work_out ) AS 'count_days_work_out', '208' AS 'primary_hours_works', ( COUNT(dayes_work.date) + IF( days_work_more.count_days_off IS NULL, 0, days_work_more.count_days_off ) + IF( count_work_out.count_days_work_out IS NULL, 0, count_work_out.count_days_work_out ) ) AS 'total_Days', TIME_FORMAT( SUM(dayes_work.time_work), '%H:%i:%s' ) +( 8 *( IF(days_work_more.count_days_off IS NULL,0,days_work_more.count_days_off)  + IF(count_work_out.count_days_work_out IS NULL,0,count_work_out.count_days_work_out) ) ) AS 'All_hours', count_work_out.sum_reward, salary_deduction.days_deduction, salary_reward.days_reward, borrow_salary.sum_borrow_salary FROM ( SELECT  attendance.`emp_id`, employees.`name` AS 'emp_name', attendance.`date`, TIMEDIFF( MAX(attendance.`time`), MIN(attendance.`time`) ) AS 'time_work' FROM attendance, employees
            WHERE attendance.emp_id = employees.id AND attendance.date BETWEEN '" . $r->from_date . "' AND '" . $r->to_date . "' AND attendance.`emp_id` = '" . $r->emp_name . "' GROUP BY  attendance.`emp_id`, attendance.`date` ) AS dayes_work LEFT JOIN( SELECT  day_off.emp_id AS 'emp_id', COUNT(day_off.emp_id) AS 'count_days_off' FROM day_off
            WHERE day_off.is_annual_holiday = 1 AND day_off.date BETWEEN '" . $r->from_date . "' AND '" . $r->to_date . "' AND day_off.emp_id = '" . $r->emp_name . "' GROUP BY  day_off.emp_id ) AS days_work_more ON dayes_work.emp_id = days_work_more.emp_id LEFT JOIN( SELECT  work_out.emp_id, SUM(work_out.cost_plus) AS 'sum_reward', COUNT(work_out.emp_id) AS 'count_days_work_out' FROM work_out
            WHERE work_out.date BETWEEN '" . $r->from_date . "' AND '" . $r->to_date . "' AND work_out.emp_id = '" . $r->emp_name . "' GROUP BY  work_out.emp_id ) AS count_work_out ON dayes_work.emp_id = count_work_out.emp_id  LEFT JOIN( SELECT  salary_deduction_reward.emp_id, SUM( salary_deduction_reward.count_days ) AS 'days_deduction' FROM salary_deduction_reward
            WHERE salary_deduction_reward.Salary_Deduction = 1 AND salary_deduction_reward.date BETWEEN '" . $r->from_date . "' AND '" . $r->to_date . "' AND salary_deduction_reward.emp_id = '" . $r->emp_name . "' GROUP BY  salary_deduction_reward.emp_id ) AS salary_deduction ON dayes_work.emp_id = salary_deduction.emp_id LEFT JOIN (SELECT  borrow_salary.emp_id , SUM(borrow_salary.amount) AS 'sum_borrow_salary' FROM borrow_salary
            WHERE borrow_salary.date BETWEEN '" . $r->from_date . "' AND '" . $r->to_date . "' AND borrow_salary.emp_id = '" . $r->emp_name . "'  GROUP BY  borrow_salary.emp_id   ) AS borrow_salary on dayes_work.emp_id = borrow_salary.emp_id  LEFT JOIN( SELECT  salary_deduction_reward.emp_id, SUM( salary_deduction_reward.count_days ) AS 'days_reward' FROM salary_deduction_reward
            WHERE salary_deduction_reward.Salary_reward = 1 AND salary_deduction_reward.date BETWEEN '" . $r->from_date . "' AND '" . $r->to_date . "' AND salary_deduction_reward.emp_id = '" . $r->emp_name . "' GROUP BY  salary_deduction_reward.emp_id ) AS salary_reward ON  dayes_work.emp_id = salary_reward.emp_id GROUP BY  dayes_work.emp_id ) AS main_Query2 JOIN employees ON main_Query2.emp_id = employees.id  JOIN emp_data ON main_Query2.emp_id = emp_data.emp_id  JOIN department ON employees.depart_id = department.id  GROUP BY main_Query2.emp_id,main_Query2.emp_name   ) AS main_Query3");
            return ['EmpData_Search' => $EmpData_Search];
        }
    }

    function Salary_Deduction_Reward_View()
    {
        $Employees = DB::table('employees')->select ('*')->get();
        $Data = DB::select ("SELECT  salary_deduction_reward.`id`, salary_deduction_reward.`date`, employees.name AS 'employee' , salary_deduction_reward.`count_days`, salary_deduction_reward.`Salary_Deduction`, salary_deduction_reward.`Salary_reward` FROM salary_deduction_reward, employees WHERE salary_deduction_reward.emp_id = employees.id ORDER BY  salary_deduction_reward.`id` LIMIT 10");
        return view('backend.Salaries.salary_deduction_reward', ['data' => $Data , 'Employees' => $Employees]);
    }

    function Salary_Deduction_Reward_Delete($id)
    {
        $Employees = DB::table('employees')->select ('*')->get();
        DB::table('salary_deduction_reward')->where('id',$id)->delete();
        $Data = DB::select ("SELECT  salary_deduction_reward.`id`, salary_deduction_reward.`date`, employees.name AS 'employee' , salary_deduction_reward.`count_days`, salary_deduction_reward.`Salary_Deduction`, salary_deduction_reward.`Salary_reward` FROM salary_deduction_reward, employees WHERE salary_deduction_reward.emp_id = employees.id ORDER BY  salary_deduction_reward.`id` LIMIT 10");
        return ['Emp_data' => $Data , 'Employees' => $Employees];
    }

    function Salary_Deduction_Reward_Search(Request $r){
        $Data = DB::select ("SELECT  salary_deduction_reward.`id`, salary_deduction_reward.`date`, employees.name AS 'employee' , salary_deduction_reward.`count_days`, salary_deduction_reward.`Salary_Deduction`, salary_deduction_reward.`Salary_reward` FROM salary_deduction_reward, employees WHERE salary_deduction_reward.emp_id = employees.id AND ".$r->Query." ORDER BY  salary_deduction_reward.`id` ");
        return ['Emp_data' => $Data];
    }

    function Salary_Borrow_View()
    {
        $Employees = DB::table('employees')->select ('*')->get();
        $Data = DB::select ("SELECT  borrow_salary.id, borrow_salary.date, employees.name, borrow_salary.amount FROM `borrow_salary`, employees WHERE borrow_salary.emp_id = employees.id");
        return view('backend.Salaries.borrow_salary',['data' => $Data , 'Employees' => $Employees]);
    }

    function Salary_Borrow_Delete($id)
    {
        DB::table('borrow_salary')->where('id',$id)->delete();
        $Employees = DB::table('employees')->select ('*')->get();
        $Data = DB::select ("SELECT  borrow_salary.id, borrow_salary.date, employees.name, borrow_salary.amount FROM `borrow_salary`, employees WHERE borrow_salary.emp_id = employees.id");
        return ['data' => $Data , 'Employees' => $Employees];
    }

    function Salary_Borrow_Search(Request $r){
        $Data = DB::select ("SELECT  borrow_salary.id, borrow_salary.date, employees.name, borrow_salary.amount FROM `borrow_salary`, employees WHERE borrow_salary.emp_id = employees.id AND ".$r->Query." ");
        return ['Emp_data' => $Data];
    }
}
