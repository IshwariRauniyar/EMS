<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\City;
use App\State;

class CityController extends Controller
{
   
    public function __construct()
    {
        $this->middleware('auth')->only(["index", "create", "store", "edit", "update", "search", "destroy"]);
    }

 
    public function index()
    {
         $cities = DB::table('city')
        ->leftJoin('state', 'city.state_id', '=', 'state.id')
        ->select('city.id', 'city.name', 'state.name as state_name', 'state.id as state_id')
        ->paginate(5);
        return view('system-mgmt/city/index', ['cities' => $cities]);
    }

    
    public function create()
    {
        $states = State::all();
        return view('system-mgmt/city/create', ['states' => $states]);
    }


    public function store(Request $request)
    {
        State::findOrFail($request['state_id']);
        $this->validateInput($request);
         city::create([
            'name' => $request['name'],
            'state_id' => $request['state_id']
        ]);

        return redirect()->intended('system-management/city');
    }

    
    public function show($id)
    {
    
    }

  
    public function edit($id)
    {
        $city = city::find($id);
       
        if ($city == null || count($city) == 0) {
            return redirect()->intended('/system-management/city');
        }

        $states = State::all();
        return view('system-mgmt/city/edit', ['city' => $city, 'states' => $states]);
    }


    public function update(Request $request, $id)
    {
        $city = City::findOrFail($id);
         $this->validate($request, [
        'name' => 'required|max:60'
        ]);
        $input = [
            'name' => $request['name'],
            'state_id' => $request['state_id']
        ];
        City::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/city');
    }

   
    public function destroy($id)
    {
        City::where('id', $id)->delete();
         return redirect()->intended('system-management/city');
    }

    public function loadCities($stateId) {
        $cities = City::where('state_id', '=', $stateId)->get(['id', 'name']);

        return response()->json($cities);
    }


    public function search(Request $request) {
        $constraints = [
            'name' => $request['name']
            ];

       $cities = $this->doSearchingQuery($constraints);
       return view('system-mgmt/city/index', ['cities' => $cities, 'searchingVals' => $constraints]);
    }
    
    private function doSearchingQuery($constraints) {
        $query = City::query();
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
        'name' => 'required|max:60|unique:city'
    ]);
    }
}
