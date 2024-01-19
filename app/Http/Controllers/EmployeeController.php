<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
// use Illuminate\Http\Response;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;
use Inertia\Response;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index():Response
    {
        //
        //$emp = DB::table('employees')->paginate(50);
        // $data = json_decode(json_encode($emp), true);
        // Log::info($data);
        //return response($data);

        // $user_name = DB::table('users')
        //     ->where('name', 'like', 'f%')
        //     ->get();
        // $data = json_decode(json_encode($user), true);
        // Log::info($data);
        // return response($data);

        //assignment departments
        $dept = DB::table('departments')
        ->select('dept_name')
        ->orderBy('dept_name')
        ->get();

        //assignments male and name 'A'
        $male = DB::table('employees')
        ->select('first_name', 'gender')
        ->where('gender', '=', 'M')
        ->distinct()
        ->orderBy('first_name')
        ->paginate(50);

        $female = DB::table('employees')
        ->select('gender','first_name', DB::raw('YEAR(NOW()) - YEAR(birth_date) AS age'))
        ->where('gender', '=', 'F')
        ->where(DB::raw('YEAR(NOW()) - YEAR(birth_date)'), '>', 50)
        ->distinct()
        ->paginate(50);




        //display VUE
        return Inertia::render('Employee/index', [
            'emp' => $male,
            'depart' => $dept,
            'females' => $female,
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
