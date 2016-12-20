<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\Booking;

use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        if(Auth::user()->email == "paskal@industries.com"){
            $bookings = DB::table('bookings')->get();
           /* print_r($bookings);
            die();*/
            $bookings_ = DB::table('bookings')->where('status', 4)->get();
            $users = DB::table('users')->get();
            $totalIncome = 0;
            $layanans = array();
            $jenislayanan_  = "";
            $data_services = "";
            $a = 0;
            foreach ($bookings as $key => $value) {
                
                $users = DB::table('users')->where('id', $value->id_users)->first();
                $service_hours = DB::table('service_hours')->where('id', $value->waktu_pangkas)->first();
                $jenislayanan_  = "";
                if($value->status == 4){
                    $layanans = array();
                    $dataLayanan =  explode(", ", $value->id_layanans);
                    $totalData_ = count($dataLayanan);
                    for ($i=0; $i < $totalData_; $i++) { 
                        if($dataLayanan[$i] != NULL){
                            $layanans_1 = DB::table('layanans')->where('id', $dataLayanan[$i])->first();
                            $totalIncome += $layanans_1->harga;
                            $layanans[] = $layanans_1->nama_layanans;
                        }
                    }
                }
                else{
                    
                    $layanans = array();
                    $dataLayanan =  explode(", ", $value->id_layanans);
                    $totalData = count($dataLayanan);
                    for ($i=0; $i < $totalData; $i++) { 
                        if($dataLayanan[$i] != NULL){
                            $layanans_1 = DB::table('layanans')->where('id', $dataLayanan[$i])->first();
                            $layanans[] = $layanans_1->nama_layanans;
                        }
                    }
                }
                $data_services = implode(", ", $layanans);

                
            
                $value->id_layanans = $data_services;
                $value->id_users = $users->name.' / '.$users->no_hp;
                $value->waktu_pangkas = $service_hours->hours;
                $a = 0;
                if(isset($layanans)){
                    reset($layanans);
                }
            }

            return view('layouts.homedashboard', [
                'bookings' => $bookings,
                'totalIncome' => $totalIncome,
                'users' => $users,
                'bookings_' => $bookings_
            ]);
        }
        else{
            $images = DB::table('images')->get();
            return view('home', [
                'images' => $images
            ]);
        }
        
    }
}
