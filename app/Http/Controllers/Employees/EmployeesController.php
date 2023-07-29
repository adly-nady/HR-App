<?php

namespace App\Http\Controllers\Employees;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class EmployeesController extends Controller
{
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| Departments Funictions :-
    public function department_view()
    {
        $departments = DB::table('department')->select('*')->get();
        // dd($departments[0]->id);
        return view('backend.Employees.departments', ['departments' => $departments]);
    }
    public function GetData()
    {
        $departments = DB::table('department')->select('*')->get();
        return compact('departments');
    }
    public function save(Request $request)
    {
        DB::table('department')->insert([
            'dep_name' => $request->dep_name
        ]);
        return "Inserted Successfully ...";
    }
    public function delete($id)
    {
        DB::table('department')->where('id', $id)->delete();
        return "Deleted Successfully ...";
    }
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| Qualifications Funictions :-
    public function qualifications_view()
    {
        $qualifications = DB::table('qualifications')->select('*')->get();
        // dd($departments[0]->id);
        return view('backend.Employees.qualifications', ['qualifications' => $qualifications]);
    }
    public function qualifications_GetData()
    {
        $qualifications = DB::table('qualifications')->select('*')->get();
        return compact('qualifications');
    }
    public function qualifications_save(Request $request)
    {
        DB::table('qualifications')->insert([
            'name' => $request->dep_name
        ]);
        return "Inserted Successfully ...";
    }
    public function qualifications_delete($id)
    {
        DB::table('qualifications')->where('id', $id)->delete();
        return "Deleted Successfully ...";
    }
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| Employees Funictions :-
    public function Employee_view()
    {
        $qualific = DB::table('qualifications')->select('*')->get();
        $depart = DB::table('department')->select('*')->get();
        $getID = DB::table('employees')->select('id')->orderByDesc('id')->first();
        $id = 0;
        $getID != null ? $id = $getID->id + 1 : $id = 1;

        return view('backend.Employees.addEmp', ['depart' => $depart, 'id' => $id, 'ourQualific' => null, 'ourDepart' => null, 'qualific' => $qualific, 'update' => 0]);
    }
    public function Employee_save(Request $R)
    {
        // Make Avalidation :-
        $vale = Validator::make(
            $R->all(),
            [
                'name' => 'required',
                'id_card' => 'required',
                'role' => 'required',
                'salary_month' => 'required'
            ],
            [
                'name.required' => 'name is required',
                'id_card.required' => 'id card is required',
                'role.required' => 'role is required',
                'salary_month.required' => 'salary/month is required',
            ]
        );
        // Chack Validation :-
        if (!$vale->fails()) {
            if ($R->update == 0) {
                // Insert Primary Data First :-
                DB::table('employees')->insert([
                    'id' => $R->id,
                    'name' => $R->name,
                    'id_card' => $R->id_card,
                    'role' => $R->role,
                    'password' => $R->password,
                    'salary_month' => $R->salary_month,
                    'salary_day' => $R->salary_month / 26,
                    'depart_id' => $R->depart_id,
                    'job_title' => $R->job_title,
                    'plus_incentive'=>$R->plus_incentive,
                ]);
                DB::table('emp_data')->insert([
                    'emp_id' => $R->id,
                    'Qualifications' => $R->Qualifications ?? 0,
                    'army' => $R->army ?? 0,
                    'birth_certificate' => $R->birth_certificate ?? 0,
                    'fishe' => $R->fishe ?? 0,
                    'health_certificate' => $R->health_certificate ?? 0,
                    'work_stub' => $R->work_stub ?? 0,
                    'form_111' => $R->form_111 ?? 0,
                    'personal_id' => $R->personal_id ?? 0,
                    'personal_photos' => $R->personal_photos ?? 0,
                    'vacation_balance' => $R->vacation_balance ?? 0,
                    'job_request' => $R->job_request ?? 0,
                    'paper_qualification' => $R->paper_qualification ?? 0,
                    'driving_license' => $R->driving_license ?? 0,
                ]);
                return "Add Employee Successfully ...";
            } else {
                DB::table('employees')->where('id', $R->id)->update([
                    'name' => $R->name,
                    'id_card' => $R->id_card,
                    'role' => $R->role,
                    'password' => $R->password,
                    'salary_month' => $R->salary_month,
                    'salary_day' => $R->salary_month / 26,
                    'depart_id' => $R->depart_id,
                    'job_title' => $R->job_title,
                    'plus_incentive'=>$R->plus_incentive,
                ]);
                DB::table('emp_data')->where('emp_id', $R->id)->update([
                    'Qualifications' => $R->Qualifications ?? 0,
                    'army' => $R->army ?? 0,
                    'birth_certificate' => $R->birth_certificate ?? 0,
                    'fishe' => $R->fishe ?? 0,
                    'health_certificate' => $R->health_certificate ?? 0,
                    'work_stub' => $R->work_stub ?? 0,
                    'form_111' => $R->form_111 ?? 0,
                    'personal_id' => $R->personal_id ?? 0,
                    'personal_photos' => $R->personal_photos ?? 0,
                    'vacation_balance' => $R->vacation_balance ?? 0,
                    'job_request' => $R->job_request ?? 0,
                    'paper_qualification' => $R->paper_qualification ?? 0,
                    'driving_license' => $R->driving_license ?? 0,
                ]);
                return "Updated Employee Successfully ...!";
            }
        } else {
            return [
                'errors' => [
                    $vale->errors()->first('name'),
                    $vale->errors()->first('id_card'),
                    $vale->errors()->first('role'),
                    $vale->errors()->first('Salary')
                ]
            ];
        }
    }
    // |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||| All Employees Funictions :-
    public function All_Employee()
    {
        $EmpData = DB::select("SELECT employees.`id`, employees.`name`, employees.`id_card`, employees.`role`, employees.`password`, employees.`salary_month`, department.dep_name, employees.`job_title` FROM `employees` , department WHERE employees.depart_id = department.id");
        return view('backend.Employees.All_Employee', ['EmpData' => $EmpData]);
    }
    public function delete_Employee($id)
    {
        DB::table('employees')->where('id', $id)->delete();
        DB::table('emp_data')->where('emp_id', $id)->delete();

        $EmpDataTable = DB::select("SELECT employees.`id`, employees.`name`, employees.`id_card`, employees.`role`, employees.`password`, employees.`salary_month`, department.dep_name, employees.`job_title` FROM `employees` , department WHERE employees.depart_id = department.id");
        return ["Message" => "Deleted SuccessFully ...", "EmpDataTable" => $EmpDataTable];
    }
    public function Employee_Select($id)
    {
        $emp = DB::table('employees')->find($id);
        $emp_plus = DB::table('emp_data')->where('emp_id', $id)->select('*')->first();
        $depart = DB::table('department')->select('*')->get();
        $qualific = DB::table('qualifications')->select('*')->get();
        if ($emp) {
            return view('backend.Employees.addEmp', ['Data_emp' => $emp, 'emp_plus' => $emp_plus, 'qualific' => $qualific,  'depart' => $depart, 'ourQualific' => $emp_plus->Qualifications, 'ourDepart' => $emp->depart_id, 'id' => $id, 'update' => 1]);
        } else {
            return 'Your Data is Valed ...!';
        }
    }
}
