<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employees;

class EmployeesController extends Controller
{
    public function index($id = null) 
    {
        if ($id == null) {
            return employees::orderBy('id', 'asc')->get();
        } else {
            return $this->show($id);
        }
    }

    public function store(Request $request)
    {
        $model = new employees;
        $model->name = $request->input('name');
        $model->email = $request->input('email');
        $model->phone_number = $request->input('phone_number');
        $model->position = $request->input('position');
        $model->save();

        return "Employee has been saved with id ". $model->id;
    }

    public function show($id)
    {
        return employees::find($id);
    }

    public function update(Request $request, $id)
    {
        $model = employees::find($id);
        $model->name = $request->input('name');
        $model->email = $request->input('email');
        $model->phone_number = $request->input('phone_number');
        $model->position = $request->input('position');
        $model->save();

        return "Employee has been updated with id ". $model->id;
    }

    public function destroy($id)
    {
        $model = employees::where('id', $id)->first();
        $model->delete();

        return "Employee has been deleted #". $id;
    }
}
