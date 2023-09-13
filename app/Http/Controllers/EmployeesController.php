<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\session;
use Illuminate\Http\Request;

class EmployeesController extends Controller
{
    public function listEmployees()
    {
        $json = file_get_contents("../public/example.json");
        $array = json_decode($json, true);
        return view('employees.index')->with('array', $array);
    }

    public function SearchEmployeesEmail(Request $request)
    {
        $json = file_get_contents("../public/example.json");
        $array = json_decode($json, true);
        $data = array();
        foreach ($array as $item) {
            if ($request->email == $item['email']) {
                array_push($data, $item);
            }
            session::flash('mensaje', 'El empleado no existe');
        }
        return view('employees.index')->with('data', $data);
    }

    public function SearchEmployeesSalary(Request $request)
    {
        $json = file_get_contents("../public/example.json");
        $array = json_decode($json, true);
        $data = array();
        foreach ($array as $item) {
            if ($item['salary'] >= $request->min && $item['salary'] <= $request->max) {
                array_push($data, $item);
            }
            session::flash('mensaje', 'El valor que desea buscar no se encuentra');
        }
        return view('employees.index')->with('data', $data);
    }

    public function DetailsEmployees(Request $request)
    {
        $json = file_get_contents("../public/example.json");
        $array = json_decode($json, true);
        $data = array();
        foreach ($array as $item) {
            if ($item['id'] == $request->id) {
                array_push($data, $item);
            }
        }
        return view('employees.form')->with('data', $data);
    }
}
