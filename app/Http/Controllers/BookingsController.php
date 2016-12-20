<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Booking;
use App\Layanan;
use App\Users;
use App\Service_hour;
use \PDF;
/*use Pdf;*/
use DB;
use App;
/*use Barryvdh\DomPDF\Facade as PDF;
*/
class BookingsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
	{
		$bookings = DB::table('bookings')->where('id_users',Auth::id())->get();

	 	$layanans_ = array();
        $jenislayanan_  = "";
        $a = 0;
        foreach ($bookings as $key => $value) {
        	$layanans_ = array();
            $layanans = DB::table('layanans')->where('id', $value->id_layanans)->first();
            $users = DB::table('users')->where('id', $value->id_users)->first();
            $service_hours = DB::table('service_hours')->where('id', $value->waktu_pangkas)->first();

            $dataLayanan =  explode(", ", $value->id_layanans);
            $totalData = count($dataLayanan);
            for ($i=0; $i < $totalData; $i++) { 
                if($dataLayanan[$i] != NULL){
                    $layanans_1 = DB::table('layanans')->where('id', $dataLayanan[$i])->first();
                    $layanans_[] = $layanans_1->nama_layanans;
                }
            }

            

            $data_services = implode(", ", $layanans_);
            
            $value->id_layanans = $data_services;
            $value->id_users = $users->name;
            $value->waktu_pangkas = $service_hours->hours;
            $a = 0;
            reset($layanans_);
        }
        //die;
        //echo json_encode($jenislayanan_);die;

	    return view('bookings.index', [
	        'bookings' => $bookings
	    ]);
	}

	public function create(Request $request)
	{
		

		$layanan = DB::table('layanans')->get();
		$service_hours = DB::table('service_hours')->get();

	    return view('bookings.add', [
	        'layanan' => $layanan,
	        'service_hours' => $service_hours
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$booking = Booking::findOrFail($id);
	    return view('bookings.add', [
	        'model' => $booking	    ]);
	}

	public function show(Request $request, $id)
	{
		$booking = Booking::findOrFail($id);
	    return view('bookings.show', [
	        'model' => $booking	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM bookings a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE id_users LIKE '%".$_GET['search']['value']."%' ";
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
	    // echo json_encode($request->id_layanans) ;die;

		$booking = null;
		if($request->id > 0) { $booking = Booking::findOrFail($request->id); }
		else { 
			$booking = new Booking;
		}

    	$booking->id = $request->id?:0;
		$booking->id_users = Auth::id();
		$booking->tgl_pangkas = $request->tgl_pangkas;
		$booking->waktu_pangkas = $request->waktu_pangkas;
		$booking->id_layanans = implode(", ",$request->id_layanans);
		$booking->lokasi = $request->lokasi;
		$booking->status = 0;
		// $booking->created_at = $request->created_at;
		// $booking->updated_at = $request->updated_at;
		//$booking->user_id = $request->user()->id;
    	$booking->save();

	    return redirect('/bookings');

	}

	public function store(Request $request)
	{
		$this->validate($request, [
    	 	'tgl_pangkas' => 'required',
            'waktu_pangkas' => 'required',
            'id_layanans' => 'required',
            'lokasi' => 'required|min:5|max:255'
    	]);
		return $this->update($request);
	}

	public function destroy(Request $request, $id) {
		
		$booking = Booking::findOrFail($id);

		$booking->delete();
		//return "OK";
	    return redirect('/home');
	}

	public function diterima($id) {
	    //
	    /*$this->validate($request, [
	        'name' => 'required|max:255',
	    ]);*/
	    if(Auth::user()->email == "paskal@industries.com"){
	    	$booking = Booking::findOrFail($id);

	    	$booking->status = 1;
			//$booking->user_id = $request->user()->id;
	    	$booking->save();

		    return redirect('/home');
	    }
	    else{
	    	return redirect('/');
	    }
	}

	public function ditolak($id) {
	    //
	    /*$this->validate($request, [
	        'name' => 'required|max:255',
	    ]);*/
	    if(Auth::user()->email == "paskal@industries.com"){
	    	$booking = Booking::findOrFail($id);

	    	$booking->status = 2;
			//$booking->user_id = $request->user()->id;
	    	$booking->save();

		    return redirect('/home');
	    }
	    else{
	    	return redirect('/');
	    }
	}

	public function batal($id) {
	    //
	    /*$this->validate($request, [
	        'name' => 'required|max:255',
	    ]);*/
	    
    	$booking = Booking::findOrFail($id);

    	$booking->status = 3;
		//$booking->user_id = $request->user()->id;
    	$booking->save();

	    return redirect('/bookings');
	}

	public function done($id) {
	    //
	    /*$this->validate($request, [
	        'name' => 'required|max:255',
	    ]);*/
	    if(Auth::user()->email == "paskal@industries.com"){
	    	$booking = Booking::findOrFail($id);

	    	$booking->status = 4;
			//$booking->user_id = $request->user()->id;
	    	$booking->save();

		    return redirect('/home');
	    }
	    else{
	    	return redirect('/');
	    }
	}
	/*public function getPdf(){
		if(Auth::user()->email == "paskal@industries.com"){
			$bookings = DB::table('bookings')->where('id_users',Auth::id())->get();
			$pdf = PDF::loadView('bookings.pdf',$bookings);
			return $pdf->download('invoice.pdf');
		}
		else{
			$pdf = App::make('dompdf.wrapper');
			$pdf->loadView('bookings.pdf');
			return $pdf->stream();
		}
   	}*/
   	public function getPdf($id){
			$bookings = DB::table('bookings')->where('id',$id)->get();
			/*print_r($bookings);
			die();*/
			$pdf = App::make('dompdf.wrapper');
			$pdf = PDF::loadView('bookings.pdf',compact('bookings'));
			return $pdf->stream();
		
   	}
	
}