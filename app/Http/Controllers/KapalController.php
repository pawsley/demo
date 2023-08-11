<?php

namespace App\Http\Controllers;

use App\Models\Kapal;
use App\Models\CPort;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class KapalController extends Controller
{
    public function index()
    {
        $kapal = Kapal::where('status', 1)
                    ->orderBy('id', 'desc')
                    ->get();
        $title = 'Adhipramana Bahari Perkasa';
        $breadcrumb = 'This Breadcrumb';
        return view('pages.abp-page.mkapal', compact('title', 'breadcrumb','kapal'));
    }

    public function create() {
        $compport = CPort::where('status', 1)
                    ->orderBy('id_company_port', 'desc')
                    ->get();
        $title = 'Adhipramana Bahari Perkasa';
        $breadcrumb = 'This Breadcrumb';
        return view('pages.abp-page.mkapal', compact('title', 'breadcrumb','compport'));
    }

    public function getDetails($id)
    {
        $getdata = CPort::where('id_company_port', $id)->get();
        return response()->json($getdata);   
    }
}
