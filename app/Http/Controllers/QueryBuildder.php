<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;


class QueryBuildder extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ans1
        $depart = DB::table('departments')
        ->select('dept_name', 'dept_no')
        ->get();

        //ans2
        $empage = DB::table('employees')
        ->select('first_name',
        DB::raw('YEAR(NOW())- YEAR(birth_date) AS age'))
        ->paginate(50);

        //ans3
        $cougender = DB::table('employees')
        ->select('gender', DB::raw('COUNT(first_name) as count'))
        ->groupBy('gender')
        ->get();

        //ans4
        $depmanager = DB::table('departments')
        ->join('dept_manager', 'departments.dept_no', '=', 'dept_manager.dept_no')
        ->join('employees', 'employees.emp_no', '=', 'dept_manager.emp_no')
        ->select('dept_manager.dept_no', 'departments.dept_name', 'employees.first_name', 'employees.last_name')
        ->where('dept_manager.to_date', '=', '9999-01-01')
        ->groupBy('dept_manager.dept_no', 'departments.dept_name', 'employees.first_name', 'employees.last_name')
        ->get();

        //ans5
        $salaemp = DB::table('salaries')
        ->join('employees', 'salaries.emp_no','=','employees.emp_no')
        ->select('first_name','last_name','salary')
        ->where('salaries.to_date','=','9999-01-01')
        ->paginate(50);

        //ans6
        $departCount = DB::table('dept_emp')
        ->select('departments.dept_name', DB::raw('COUNT(employees.emp_no) as emp_count'))
        ->join('departments', 'departments.dept_no', '=', 'dept_emp.dept_no')
        ->join('employees', 'employees.emp_no', '=', 'dept_emp.emp_no')
        ->groupBy('departments.dept_name')
        ->orderBy('departments.dept_name')
        ->get();

        //ans7
        $salaryAVG = DB::table('dept_emp')
        ->select('departments.dept_name', DB::raw('AVG(salaries.salary) as salaryavg'))
        ->join('departments', 'departments.dept_no', '=', 'dept_emp.dept_no')
        ->join('employees', 'employees.emp_no', '=', 'dept_emp.emp_no')
        ->join('salaries','salaries.emp_no','=','employees.emp_no')
        ->groupBy('departments.dept_name')
        ->orderBy('departments.dept_name')
        ->get();

        //insert departments emp_no = d010
        // DB::table('dept_emp')
        // ->insert([
        //     'dept_no' => 'd010',
        // ]);

        //ans8
        $InsertEmp = DB::table('dept_emp')
        ->insertOrIgnore([
            'emp_no' => '9999999',
            'dept_no' => 'd010',
            'from_date' => '2024-01-11',
            'to_date' => '9999-01-01'
        ]);

        //ans9
        $upsalary = DB::table('salaries')
        ->update(['salary'=>DB::raw('salary * 1.10')]);

        //ans10
        $delsalary = DB::table('salaries')
        ->where('emp_no', '=', '10001')
        ->where('to_date', '!=', '9999-01-01')
        ->delete();




        return Inertia::render('Employee/builder',[
            'depart' => $depart,
            'empage' => $empage,
            'cougender' => $cougender,
            'depmanager' => $depmanager,
            'salaemp' => $salaemp,
            'departCount' => $departCount,
            'salaryAVG' => $salaryAVG,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
