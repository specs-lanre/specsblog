<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogentry extends Model
{
    use HasFactory;
    protected $table ='blogentries';
	public $timestamps = true;
}
