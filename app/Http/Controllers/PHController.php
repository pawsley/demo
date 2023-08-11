<?php

namespace App\Http\Controllers;

use App\Models\DetailPH;
use App\Models\Customer;
use App\Models\PenawaranHarga;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class PHController extends Controller
{
    public function index() {
        $detail = DetailPH::where('status', 1)
                    ->orderBy('id_detail_ph', 'desc')
                    ->get();
        $customer = Customer::where('status', 1)
                    ->orderBy('id', 'desc')
                    ->get();
        $ph = PenawaranHarga::select('penawaran_hargas.id_penawaran', 'penawaran_hargas.nama_pic', 'customers.nama_customer', 'detail_p_h_s.estate')
                    ->join('detail_p_h_s', 'penawaran_hargas.id_detail_ph', '=', 'detail_p_h_s.id_detail_ph')
                    ->join('customers', 'penawaran_hargas.id_customer', '=', 'customers.id')
                    ->get();
        $title = 'Adhipramana Bahari Perkasa';
        $breadcrumb = 'This Breadcrumb';
        return view('pages.abp-page.dph', compact('title', 'breadcrumb','detail', 'customer','ph'));
    }

    public function getDetails($id)
    {
        $getdata = Customer::where('id', $id)->get();
        return response()->json($getdata);   
    }

    public function store(Request $request) {
        DetailPH::create([
            'estate'     => $request->estate_ph,
            'oa_kpl_kayu'     => $request->oa_kk,
            'oa_container'   => $request->oa_cont,
            'status' => '1'
        ]);
        return redirect()->back();
    }

    public function save(Request $request) {
        PenawaranHarga::create([
            'nama_pic'     => $request->nama_pic,
            'id_detail_ph'     => $request->id_detail,
            'id_customer'   => $request->cst_id,
            'status' => '1'
        ]);
        // $barang = Barang::find($id);
        // $barang->update([
        //     'status' => '0'
        // ]);

        return redirect()->back();
    }
}
