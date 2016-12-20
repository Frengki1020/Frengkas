<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Test;

use DB;

class TestsController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
	    return view('tests.index', []);
	}

	public function create(Request $request)
	{
	    return view('tests.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$test = Test::findOrFail($id);
	    return view('tests.add', [
	        'model' => $test	    ]);
	}

	public function show(Request $request, $id)
	{
		$test = Test::findOrFail($id);
	    return view('tests.show', [
	        'model' => $test	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM tests a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE title LIKE '%".$_GET['search']['value']."%' ";
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
		$test = null;
		if($request->id > 0) { $test = Test::findOrFail($request->id); }
		else { 
			$test = new Test;
		}
	    

	    		
			    $test->id = $request->id?:0;
				
	    		
					    $test->title = $request->title;
		
	    		
					    $test->subtitle = $request->subtitle;
		
	    		
					    $test->image = $request->image;
		
	    		
					    $test->created_at = $request->created_at;
		
	    		
					    $test->updated_at = $request->updated_at;
		
	    	    //$test->user_id = $request->user()->id;
	    $test->save();

	    return redirect('/tests');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$test = Test::findOrFail($id);

		$test->delete();
		return "OK";
	    
	}

	
}