<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Image;

use DB;

class ImagesController extends Controller
{
    //
    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index(Request $request)
	{
		$images = DB::table('images')->get();
	    return view('images.index', ['images' => $images]);
	}

	public function create(Request $request)
	{
	    return view('images.add', [
	        []
	    ]);
	}

	public function edit(Request $request, $id)
	{
		$image = Image::findOrFail($id);
	    return view('images.add', [
	        'model' => $image	    ]);
	}

	public function show(Request $request, $id)
	{
		$image = Image::findOrFail($id);
	    return view('images.show', [
	        'model' => $image	    ]);
	}

	public function grid(Request $request)
	{
		$len = $_GET['length'];
		$start = $_GET['start'];

		$select = "SELECT *,1,2 ";
		$presql = " FROM images a ";
		if($_GET['search']['value']) {	
			$presql .= " WHERE file LIKE '%".$_GET['search']['value']."%' ";
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
		$image = null;
		if($request->id > 0) { $image = Image::findOrFail($request->id); }
		else { 
			$image = new Image;
		}
	    

	    		
			    $image->id = $request->id?:0;
				
	    		
					    $image->file = $request->file;
		
	    		
					    $image->caption = $request->caption;
		
	    		
					    $image->description = $request->description;
		
	    	    //$image->user_id = $request->user()->id;
	    $image->save();

	    return redirect('/images');

	}

	// public function store(Request $request)
	// {
	// 	return $this->update($request);
	// }

	public function destroy(Request $request, $id) {
		
		$image = Image::findOrFail($id);

		$image->delete();
		return redirect('/images');
	    
	}
	public function store(Request $request)
    {
       /* $this->validate($request, [
            'tittle' => ['required', 'min:5'],
            'file' => ['mimes:jpg,jpeg,JPEG,png,gif,bmp', 'max:2024'],
        ]);*/
 
        //$data = $request->all();
		$image = new Image;
 
        $photo = $request->file->getClientOriginalName();
        //echo $photo;die;
        $destination = base_path() . '/public/uploads';
        $request->file->move($destination, $photo);
 
        $image->file = $photo;
        $image->caption = $request->caption;
        $image->description = $request->description;
 
        $image->save();

	    return redirect('/images');	
    }
    /*public function store(Request $request) {
        
        $this->validate($request, [
            'name' => 'required',
            'details' => 'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $product = new Image($request->input()) ;
     
         if($file = $request->hasFile('file')) {
            
            $file = $request->file('file') ;
            
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/public/uploads' ;
            $file->move($destinationPath,$fileName);
            $product->product_image = $fileName ;
        }
        $product->save() ;
         return redirect()->route('images.index')
                        ->with('success','You have successfully uploaded your files');
    }*/

	
}