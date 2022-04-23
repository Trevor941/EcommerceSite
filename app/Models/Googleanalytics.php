<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Googleanalytics extends Model
{
    use HasFactory;
    protected $table = "googleanalytics";
    protected $fillable = ["name"];
}
