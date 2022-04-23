<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Googlesearchconsole extends Model
{
    use HasFactory;
    protected $table = "googlesearchconsoles";
    protected $fillable = ["name"];
}
