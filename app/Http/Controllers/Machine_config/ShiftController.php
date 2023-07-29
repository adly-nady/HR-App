<?php

namespace App\Http\Controllers\Machine_config;

use App\Http\Controllers\Controller;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{
    public function index()
    {
        $shift_time = DB::table('shift_time')->select('*')->get();
        $shift_time1 = $shift_time[0];
        $shift_time2 = $shift_time[1];
        $shift_time3 = $shift_time[2];
        $time1 = new DateTime($shift_time1->default_in);
        $time2 = new DateTime($shift_time1->default_out);
        return view('backend.Atte_Setting.Shifts_Setting', ['shift_time1' => $shift_time1, 'shift_time2' => $shift_time2, 'shift_time3' => $shift_time3]);
    }
    public function update1(Request $request)
    {
        try {
            DB::table('shift_time')->where('id', $request->id)->update([
                'in_from' => $request->in_from,
                'in_to' => $request->in_to,
                'default_in' => $request->default_in,
                'out_from' => $request->out_from,
                'out_to' => $request->out_to,
                'default_out' => $request->default_out,
            ]);
            return "Updated Successfully ...!";
        } catch (\Throwable $e) {
            report($e);
            dd($e);
            // return $e;
        }
    }
    public function update2(Request $request)
    {
        DB::table('shift_time')->where('id', $request->id)->update([
            'in_from' => $request->in_from,
            'in_to' => $request->in_to,
            'default_in' => $request->default_in,
            'out_from' => $request->out_from,
            'out_to' => $request->out_to,
            'default_out' => $request->default_out,
        ]);
        return "Updated Successfully ...!" . $request->id;
    }
    public function update3(Request $request)
    {
        DB::table('shift_time')->where('id', $request->id)->update([
            'in_from' => $request->in_from,
            'in_to' => $request->in_to,
            'default_in' => $request->default_in,
            'out_from' => $request->out_from,
            'out_to' => $request->out_to,
            'default_out' => $request->default_out,
        ]);
        return "Updated Successfully ...!" . $request->id;
    }
}
