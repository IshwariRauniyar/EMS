<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Division;

class DivisionController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

 
    public function index()
    {
        $divisions = Division::paginate(5);

        return view('system-mgmt/division/index', ['divisions' => $divisions]);
    }

   
    public function create()
    {
        return view('system-mgmt/division/create');
    }

    public function store(Request $request)
    {
        $this->validateInput($request);
         Division::create([
            'name' => $request['name']
        ]);

        return redirect()->intended('system-management/division');
    }

    public function show($id)
    {
       
    }

    
    public function edit($id)
    {
        $division = Division::find($id);
        
        if ($division == null || count($division) == 0) {
            return redirect()->intended('/system-management/division');
        }

        return view('system-mgmt/division/edit', ['division' => $division]);
    }


    public function update(Request $request, $id)
    {
        $division = Division::findOrFail($id);
        $this->validateInput($request);
        $input = [
            'name' => $request['name']
        ];
        Division::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/division');
    }

    public function destroy($id)
    {
        Division::where('id', $id)->delete();
         return redirect()->intended('system-management/division');
    }

  
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name']
            ];

       $divisions = $this->doSearchingQuery($constraints);
       return view('system-mgmt/division/index', ['divisions' => $divisions, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = Division::query();
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
        'name' => 'required|max:60|unique:division'
    ]);
    }
}
