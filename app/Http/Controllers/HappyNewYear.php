<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class HappyNewYear extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //ans1
        $dept = DB::table('departments')
        ->get();

        //ans2
        $emp = DB::table('employees')
        ->take(10)
        ->get(['emp_no', 'first_name']);

        //ans3
        $emp1 = DB::table('employees')
        ->select('emp_no', 'first_name')
        ->offset(10)
	    ->limit(5)
	    ->get();

        //ans4
        $emp2 = DB::table('employees')
        ->where('emp_no','10009')
        ->get();

        //ans5
        $emp3 = DB::table('employees')
        ->where('first_name', 'like', 'T%')
        ->whereRaw('YEAR(CURDATE()) - YEAR(birth_date) > 70')
        ->get();

        //ans6
        $emp4 = DB::table('dept_emp')
        ->select('dept_no',
		DB::raw('COUNT(*) as cnt'))
        ->whereYear('to_date','<>','9999')
        ->groupBy('dept_no')
        ->get();

        //ans7
        $emp5 = DB::table('dept_emp')
        ->select('*',
	    DB::raw('YEAR(NOW()) - YEAR(to_date) as w'))
        ->whereYear('to_date','2000')
        ->limit(10)
        ->get();

        //ans8
        $ljoin = DB::table('dept_emp')
        ->leftJoin('employees','dept_emp.emp_no','=','employees.emp_no')
        ->leftJoin('departments','dept_emp.dept_no','=','departments.dept_no')
        ->select('employees.*','dept_name','dept_emp.to_date',
		DB::raw('YEAR(CURDATE()) - YEAR(dept_emp.to_date) as work'))
        ->whereYear('to_date','<>','9999')
        ->limit(10)
        ->get();

        //ans9
        // DB::table('departments')->insert([
        //     'dept_no' => 'd010',
        //     'dept_name' => 'CS MJU'
        // ]);

        DB::table('employees')
        -> insertOrIgnore([
        'emp_no' => '9999999',
        'birth_date' => DB::raw('DATE_SUB(CURDATE(), INTERVAL 30 DAY)'),
        'first_name' => 'Attawit',
        'last_name' => 'Chang',
        'gender' => 'M',
        'hire_date' => DB::raw('CURDATE()')
        ]);






        return Inertia::render('Employee/happy', [
            'dept' => $dept,
            'emp' => $emp,
            'emp1' => $emp1,
            'emp2' => $emp2,
            'emp3' => $emp3,
            'emp4' => $emp4,
            'emp5' => $emp5,
            'ljoin' => $ljoin,
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
