<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPH extends Model
{
    use HasFactory;
    protected $fillable = ['estate', 'oa_kpl_kayu','oa_container','status'];
}
