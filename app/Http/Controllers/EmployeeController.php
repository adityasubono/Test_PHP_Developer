<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function index()
    {
        $data_employee = DB::select('SELECT employees.id, employees.name as employee_name,
                                          locations.name as location_name,
                                          employees.birth_date FROM employees JOIN locations
                                    ON employees.location_code = locations.code');

        $data_location = Location::all();

        return view('employee.index', compact('data_employee', 'data_location'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            Employee::create($request->all());
            return redirect('/employee')->with('status', 'Data Successfully Saved');

        } catch (\Exception $e) {
            return redirect('/employee')->with('error', 'Data Not Successfully Saved');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        try {
            Employee::where('id', $id)->update([
                'name' => $request->name,
                'location_code' => $request->location_code,
                'birth_date' => $request->birth_date
            ]);
            return redirect('/employee')->with('status', 'Data Successfully Updated');

        } catch (\Exception $e) {
            return redirect('/employee')->with('error', 'Data Not Successfully Updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            Employee::destroy($id);
            return redirect('/employee')->with('status', 'Data Successfully Deleted');

        } catch (\Exception $e) {
            return redirect('/employee')->with('error', 'Data Not Successfully Deleted');
        }
    }

    public function search(Request $request)
    {
        try {

            $age = $request->input('age');
            $location = $request->input('location_code');

            $data_location = Location::all();
            if(empty($age) && empty($location)) {
                $data_employee = DB::select('SELECT employees.id, employees.name as employee_name,
                                                   locations.name as location_name,
                                                   employees.birth_date FROM employees JOIN locations
                                                   ON employees.location_code = locations.code');

                return view('employee.index', compact('data_employee', 'data_location'));

            }else{

                $data_employee = DB::select('SELECT employees.id, employees.name as employee_name,
                                                 locations.name as location_name,
                                                 TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()),
                                                 birth_date FROM employees JOIN locations ON employees.location_code = locations.code
                                                 WHERE locations.code='."'$location'".' AND TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) >='."$age");

                return view('employee.index', compact('data_employee','data_location'));
            }


            if ($age) {
                $data_employee = DB::select('SELECT employees.id, employees.name as employee_name,
                                                 locations.name as location_name,
                                                 TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()),
                                                 birth_date FROM employees JOIN locations ON employees.location_code = locations.code
                                                 WHERE TIMESTAMPDIFF(YEAR, employees.birth_date, CURDATE()) >=' . "$age");

                return view('employee.index', compact('data_employee', 'data_location'));
            }



        } catch (\Exception $e) {
            return redirect('/employee')->with('error', 'Data Not Found');
        }
    }
}
