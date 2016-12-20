<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Layanan;

use DB;

class LayanansController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
	{
		$layanans = DB::table('layanans')->get();
	    return view('layanans.index', ['layanans' => $layanans]);
	}

	public function create(Request $request)
	{
	    return view('layanans.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$layanan = Layanan::findOrFail($id);
	    return view('layanans.add', [
	        'model' => $layanan	    ]);
	}

	public function show(Request $request, $id)
	{
		$layanan = Layanan::findOrFail($id);
	    return view('layanans.show', [
	        'model' => $layanan	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM layanans a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE nama_layanans LIKE '%".$_GET['search']['value']."%' ";
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
		$layanan = null;
		if($request->id > 0) { $layanan = Layanan::findOrFail($request->id); }
		else { 
			$layanan = new Layanan;
		}
	    

	    		
			    $layanan->id = $request->id?:0;
				
	    		
					    $layanan->nama_layanans = $request->nama_layanans;
		
	    		
					    $layanan->harga = $request->harga;
		
	    		
					    $layanan->created_at = $request->created_at;
		
	    		
					    $layanan->updated_at = $request->updated_at;
		
	    	    //$layanan->user_id = $request->user()->id;
	    $layanan->save();

	    return redirect('/layanans');

	}

	public function store(Request $request)
	{
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$layanan = Layanan::findOrFail($id);

		$layanan->delete();
		return redirect('/layanans');
	    
	}

	
}