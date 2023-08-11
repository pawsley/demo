<?php

namespace App\Http\Controllers;

use App\Models\CPort;
use App\Models\Kapal;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class CompanyPortController extends Controller
{
    public function index() {
        $compport = CPort::where('status', 1)
                    ->orderBy('id_company_port', 'desc')
                    ->get();
        $kapal = Kapal::select('kapals.id', 'c_ports.nama', 'kapals.kode_kapal', 'kapals.nama_kapal')
                    ->join('c_ports', 'c_ports.id_company_port', '=', 'kapals.id_company_port')
                    ->get();
        // $ao = $compport->merge($kapal);
        $title = 'Adhipramana Bahari Perkasa';
        $breadcrumb = 'This Breadcrumb';
        return view('pages.abp-page.mkapal', compact('title', 'breadcrumb','kapal','compport'));
    }
    
    public function getDetails($id)
    {
        $getdata = CPort::where('id_company_port', $id)->get();
        return response()->json($getdata);   
    }

    public function store(Request $request) {
        Kapal::create([
            'id_company_port'     => $request->cport_kpl,
            'kode_kapal'     => $request->kode_kpl,
            'nama_kapal'     => $request->nama_kpl,
            'status' => '1'
        ]);
        return redirect()->back();
    }
}
