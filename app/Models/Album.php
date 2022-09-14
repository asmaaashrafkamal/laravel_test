<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    use HasFactory;
    protected $table="albums";
    protected $fillable=['id','album_name','created_at','updated_at'];
    protected $hidden =['created_at','updated_at'];
    public $timestamps =true;

    public function picture(){
        return $this -> hasMany('App\Models\Picture','album_id','id');
    }}
