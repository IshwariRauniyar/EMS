<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Department;

class DepartmentController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth');
    }

  
    public function index()
    {
        $departments = Department::paginate(5);

        return view('system-mgmt/department/index', ['departments' => $departments]);
    }

   
    public function create()
    {
        return view('system-mgmt/department/create');
    }


    public function store(Request $request)
    {
        $this->validateInput($request);
         Department::create([
            'name' => $request['name']
        ]);

        return redirect()->intended('system-management/department');
    }

   
    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $department = Department::find($id);
      
        if ($department == null || count($department) == 0) {
            return redirect()->intended('/system-management/department');
        }

        return view('system-mgmt/department/edit', ['department' => $department]);
    }

 
    public function update(Request $request, $id)
    {
        $department = Department::findOrFail($id);
        $this->validateInput($request);
        $input = [
            'name' => $request['name']
        ];
        Department::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/department');
    }

 
    public function destroy($id)
    {
        Department::where('id', $id)->delete();
         return redirect()->intended('system-management/department');
    }

  
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name']
            ];

       $departments = $this->doSearchingQuery($constraints);
       return view('system-mgmt/department/index', ['departments' => $departments, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = department::query();
        $fields = array_keys($constraints);
        $index = 0;
        foreach ($constraints as $constraint) {
            if ($constraint != null) {
                $query = $query->where( $fields[$index], 'like', '%'.$constraint.'%');
            }

            $index++;
        }
        return $query->paginate(5);
    }
    private function validateInput($request) {
        $this->validate($request, [
        'name' => 'required|max:60|unique:department'
    ]);
    }
}
