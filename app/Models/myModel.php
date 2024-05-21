<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myModel extends Model
{
  protected $table="userdata";
  protected $fillable=[
    'name',
    'email',
    'password',
    'number',
  ];
use HasFactory;
}
