<?php

namespace App\Http\Controllers;

use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use phpDocumentor\Reflection\PseudoTypes\True_;
use Rats\Zkteco\Lib\ZKTeco;

class ZktecoController extends Controller
{
    // create get function
    public function get_data()
    {
        $ip = DB::table('machine_config')->get()[0]->machin_ip;

        $zk = new ZKTeco($ip);
        $zk->connect();
        $zk->enableDevice();

        $Atten = $zk->getAttendance();
        $zk->disableDevice();

        // {
        //     // for ($i = 130; $i <200; $i++) {
        //     //     if ($Users[$i]['userid'] >= 159 && $Users[$i]['userid'] <= 183) {
        //     //         DB::table('employees')->insert([
        //     //             'id' =>$Users[$i]['userid'],
        //     //             'name' => $Users[$i]['name'],
        //     //             'id_card'=>"000000",
        //     //             'role'=> 0,
        //     //             'password' => "",
        //     //             'salary_month' => 4000,
        //     //             'salary_day' => 153.84,
        //     //             'depart_id' => 1,
        //     //             'job_title' => "Test Data"
        //     //         ]);
        //     //     }
        //     // }
        //     // return "Users Inserted"
        // }

        // Tatget Date it Will get Data >= Target_Date:
        $ToDay =  mb_str_split(date("Y-m-d h:i:sa"),10)[0];
        $Target_Date = new DateTime('2022-10-01');
        // this Array are filter data to Targrt Data:
        $return = array();
        for ($user = 0; $user < count($Atten); $user++) {
            $CompareDate = new DateTime(mb_str_split($Atten[$user]['timestamp'], 10)[0]);

            if ($CompareDate >= $Target_Date) {
                array_push($return, $Atten[$user]);
            }
        }

        // Get Shifts :
        $shifts = DB::table('shift_time')->select('*')->get();

        // Shift 1
        $Shift1_start_In = new DateTime($shifts[0]->in_from);
        $Shift1_end_In = new DateTime($shifts[0]->in_to);
        $Shift1_start_out = new DateTime($shifts[0]->out_from);
        $Shift1_end_out = new DateTime($shifts[0]->out_to);
        $Shift1_default_out = new DateTime($shifts[0]->default_out);
        $Shift1_default_in = new DateTime($shifts[0]->default_in);

        // Shift 2
        $Shift2_start_In = new DateTime($shifts[1]->in_from);
        $Shift2_end_In = new DateTime($shifts[1]->in_to);
        $Shift2_start_out = new DateTime($shifts[1]->out_from);
        $Shift2_end_out = new DateTime($shifts[1]->out_to);
        $Shift2_default_out = new DateTime($shifts[1]->default_out);
        $Shift2_default_in = new DateTime($shifts[1]->default_in);

        // Shift 3
        $Shift3_start_In = new DateTime($shifts[2]->in_from);
        $Shift3_end_In = new DateTime($shifts[2]->in_to);
        $Shift3_start_out = new DateTime($shifts[2]->out_from);
        $Shift3_end_out = new DateTime($shifts[2]->out_to);
        $Shift3_default_out = new DateTime($shifts[2]->default_out);
        $Shift3_default_in = new DateTime($shifts[2]->default_in);


            // {
            //     // return "Hello";
            //     // return $zk->getUser();
            //     //$Users = $zk->getUser();
            //     //$emp = "";
            //     // for ($i = 1; $i <= count($Users); $i++) {
            //     //     DB::statement("INSERT INTO `employees`(`id`, `name`, `role`, `password`, `salary_month`, `salary_day`, `depart_id`) VALUES
            //     //     ('" . $Users[$i]['userid'] . "','" . $Users[$i]['name'] . "','" . $Users[$i]['role'] . "','" . $Users[$i]['password'] . "','" . "0" . "','" . "0" . "','" . "1" . "')");
            //     // }
            // }


        // Insert Attendance in DB With (Time)
        for ($i = 0; $i < count($return); $i++) {
            $Atten_Time = new DateTime(mb_str_split($return[$i]['timestamp'], 10)[1]);

            if ($Atten_Time >= $Shift1_start_In && $Atten_Time <= $Shift1_end_In) {
                DB::statement("INSERT INTO `attendance`(`emp_id`, `state`, `date`, `time`) VALUES ('" . $return[$i]['id'] . "','" . "0" . "','" . mb_str_split($return[$i]['timestamp'], 10)[0] . "','" . $Shift1_default_in . "')");
            } elseif ($Atten_Time >= $Shift1_start_out && $Atten_Time <= $Shift1_end_out) {
                DB::statement("INSERT INTO `attendance`(`emp_id`, `state`, `date`, `time`) VALUES ('" . $return[$i]['id'] . "','" . "1" . "','" . mb_str_split($return[$i]['timestamp'], 10)[0] . "','" . $Shift1_default_out . "')");
            } elseif ($Atten_Time >= $Shift2_start_In && $Atten_Time <= $Shift2_end_In) {
                DB::statement("INSERT INTO `attendance`(`emp_id`, `state`, `date`, `time`) VALUES ('" . $return[$i]['id'] . "','" . "0" . "','" . mb_str_split($return[$i]['timestamp'], 10)[0] . "','" . $Shift2_default_in . "')");
            } elseif ($Atten_Time >= $Shift2_start_out && $Atten_Time <= $Shift2_end_out) {
                DB::statement("INSERT INTO `attendance`(`emp_id`, `state`, `date`, `time`) VALUES ('" . $return[$i]['id'] . "','" . "1" . "','" . mb_str_split($return[$i]['timestamp'], 10)[0] . "','" . $Shift2_default_out . "')");
            } elseif ($Atten_Time >= $Shift3_start_In && $Atten_Time <= $Shift3_end_In) {
                DB::statement("INSERT INTO `attendance`(`emp_id`, `state`, `date`, `time`) VALUES ('" . $return[$i]['id'] . "','" . "0" . "','" . mb_str_split($return[$i]['timestamp'], 10)[0] . "' - INTERVAL 1 DAY" . ",'" . $Shift3_default_in . "')");
            } elseif ($Atten_Time >= $Shift3_start_out && $Atten_Time <= $Shift3_end_out) {
                DB::statement("INSERT INTO `attendance`(`emp_id`, `state`, `date`, `time`) VALUES ('" . $return[$i]['id'] . "','" . "1" . "','" . mb_str_split($return[$i]['timestamp'], 10)[0] . "' - INTERVAL 1 DAY" . ",'" . $Shift3_default_out . "')");
            } else {
                DB::statement("INSERT INTO `attendance`(`emp_id`, `state`, `date`, `time`) VALUES ('" . $return[$i]['id'] . "','" . "0" . "','" . mb_str_split($return[$i]['timestamp'], 10)[0] . "','" . mb_str_split($return[$i]['timestamp'], 10)[1] . "')");
            }
        }


        $zk->enableDevice();
        $Atten = $zk->clearAttendance();
        $zk->disableDevice();

        return "Fineshed and Clear Attendance ...!";


        // {
        //             // // return $Atten;
        //     // return "Inserted Attendance Successfully ...!";
        //     // return "Inserted Attendance Successfully ...!";

        //     // $str = $Atten[0]['id'];
        //     // $date = mb_str_split($Atten[0]['timestamp'], 10)[0];
        //     // $time = mb_str_split($Atten[0]['timestamp'], 10)[1];
        //     // $result = $zk->clearAttendance();
        //     // $result =  $zk->setTime("2022-09-06 2:29:00");
        //     // $getTime =  $zk->getTime();


        //     // $platform = $zk->platform();
        //     // $zk->restart();
        //     // $deviceName = $zk->deviceName();
        //     // $test = $zk->workCode();
        //     // $zk->pinWidth();

        //     //    set user

        //     // {
        //     // //    1 s't parameter int $uid Unique ID (max 65535)
        //     // //    2 nd parameter int|string $userid ID in DB (same like $uid, max length = 9, only numbers - depends device setting)
        //     // //    3 rd parameter string $name (max length = 24)
        //     // //    4 th parameter int|string $password (max length = 8, only numbers - depends device setting)
        //     // //    5 th parameter int $role Default Util::LEVEL_USER
        //     // //    6 th parameter int $cardno Default 0 (max length = 10, only numbers

        //     // //    return bool|mixed

        //     // $zk->setUser(1, "1", "Beshoy Nady", 14, 14, 0);
        //     // $zk->setUser(2, "2", "Beshoy_Nady", 12, 12, 0);
        //     // $zk->removeUser(25);
        //     // $zk->clearUsers();
        //     // $users =  $zk->getUser();

        //     // $zk->disableDevice();
        //     // $zk->shutdown();
        //     // }
        //     // for ($i = 0; $i < 10; $i++) {
        //     //     echo "<h3>" . $Atten[$i]['timestamp'] . "</h3>";
        //     // }


        //     // // Insert User in DB
        //     // for ($i = 1; $i <= count($users); $i++) {
        //     //     DB::statement("INSERT INTO `users`(`id`, `name`, `role`, `password`) VALUES ('" . $users[$i]['userid'] . "','" . $users[$i]['name'] . "','" . $users[$i]['role'] . "','" . $users[$i]['password'] . "')");
        //     // }

        //     // return  "Inserted Users Successfully ...!";
        //     // dd($Atten[1]);
        //     // dd(compact('users'));
        // }
    }

    public function test(){
        DB::table('gateway')->insert([
            'emp_id' => 5,
            'date' => '2022-02-20',
            'time' => '01:01:01',
            'notes'=> 'Test Using Zkteco Function'
        ]);
        return ['message'=>"Done"];
    }
}
