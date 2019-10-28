<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Country;

class CountryController extends Controller
{
  
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        $countries = Country::paginate(5);

        return view('system-mgmt/country/index', ['countries' => $countries]);
    }

  
    public function create()
    {
        return view('system-mgmt/country/create');
    }

    
    public function store(Request $request)
    {
        $this->validateInput($request);
         Country::create([
            'name' => $request['name'],
            'country_code' => $request['country_code']
        ]);

        return redirect()->intended('system-management/country');
    }

    
    public function show($id)
    {
    
    }

   
   
    public function edit($id)
    {
        $country = Country::find($id);
   
        if ($country == null || count($country) == 0) {
            return redirect()->intended('/system-management/country');
        }

        return view('system-mgmt/country/edit', ['country' => $country]);
    }


    public function update(Request $request, $id)
    {
        $country = Country::findOrFail($id);
        $input = [
            'name' => $request['name'],
            'country_code' => $request['country_code']
        ];
        $this->validate($request, [
        'name' => 'required|max:60'
        ]);
        Country::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/country');
    }

    
    public function destroy($id)
    {
        Country::where('id', $id)->delete();
         return redirect()->intended('system-management/country');
    }

  
    public function search(Request $request) {
        $constraints = [
            'name' => $request['name'],
            'country_code' => $request['country_code']
            ];

       $countries = $this->doSearchingQuery($constraints);
       return view('system-mgmt/country/index', ['countries' => $countries, 'searchingVals' => $constraints]);
    }

    private function doSearchingQuery($constraints) {
        $query = country::query();
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
        'name' => 'required|max:60|unique:country',
        'country_code' => 'required|max:3|unique:country'
    ]);
    }
}
