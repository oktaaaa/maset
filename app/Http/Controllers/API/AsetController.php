<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Aset;
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController;
class AsetController extends BaseController
{
    //
    public function index(){
        $asets = Aset::all();
        $success['data'] = $asets;
        return $this->sendResponse($success, 'Data aset');
    }
}