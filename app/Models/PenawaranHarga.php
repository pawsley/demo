<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenawaranHarga extends Model
{
    use HasFactory;
    protected $fillable = ['id_detail_ph', 'id_customer','nama_pic','status'];
}
