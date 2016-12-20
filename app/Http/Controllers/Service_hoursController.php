<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Service_hour;

use DB;

class Service_hoursController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
		$service_hours = DB::table('service_hours')->get();
	    return view('service_hours.index', ['service_hours' => $service_hours]);
	}

	public function create(Request $request)
	{
	    return view('service_hours.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$service_hour = Service_hour::findOrFail($id);
	    return view('service_hours.add', [
	        'model' => $service_hour	    ]);
	}

	public function show(Request $request, $id)
	{
		$service_hour = Service_hour::findOrFail($id);
	    return view('service_hours.show', [
	        'model' => $service_hour	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM service_hours a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE hours LIKE '%".$_GET['search']['value']."%' ";
		}
		
		$presql .= "  ";

		$sql = $select.$presql." LIMIT ".$start.",".$len;


		$qcount = DB::select("SELECT COUNT(a.id) c".$presql);
		//print_r($qcount);
		$count = $qcount[0]->c;

		$results = DB::select($sql);
		$ret = [];
		foreach ($results as $row) {
			$r = [];
			foreach ($row as $value) {
				$r[] = $value;
			}
			$ret[] = $r;
		}

		$ret['data'] = $ret;
		$ret['recordsTotal'] = $count;
		$ret['iTotalDisplayRecords'] = $count;

		$ret['recordsFiltered'] = count($ret);
		$ret['draw'] = $_GET['draw'];

		echo json_encode($ret);

	}


	public function update(Request $request) {
	    //
	    /*$this->validate($request, [
	        'name' => 'required|max:255',
	    ]);*/
		$service_hour = null;
		if($request->id > 0) { $service_hour = Service_hour::findOrFail($request->id); }
		else { 
			$service_hour = new Service_hour;
		}
	    $service_hour->id = $request->id?:0;
		$service_hour->hours = $request->hours;
		$service_hour->created_at = $request->created_at;
		$service_hour->updated_at = $request->updated_at;
		//$service_hour->user_id = $request->user()->id;
	    $service_hour->save();

	    return redirect('/service_hours');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$service_hour = Service_hour::findOrFail($id);

		$service_hour->delete();
		return redirect('/service_hours');
	    
	}

	
}