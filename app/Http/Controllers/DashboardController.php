<?php

namespace App\Http\Controllers;

use App\Models\Aset;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;
use DB;

class DashboardController extends Controller
{
    //
    public function index(){
        $data['asets'] = Aset::all();
       
        return view('dashboardapp', $data);
    
    }
    
}