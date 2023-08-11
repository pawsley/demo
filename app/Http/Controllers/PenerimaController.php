<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use App\Http\Controllers\DB;
use Illuminate\Http\Request;

class PenerimaController extends Controller
{
    public function index() {
        $penerima = Penerima::where('status', 1)
                    ->orderBy('id_penerima', 'desc')
                    ->get();
        $title = 'Adhipramana Bahari Perkasa';
        $breadcrumb = 'This Breadcrumb';
        return view('pages.abp-page.mpenerima', compact('title', 'breadcrumb','penerima'));
    }
}
