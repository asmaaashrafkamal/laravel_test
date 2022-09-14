<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
    protected $table="pictures";
    protected $fillable=['picture_name','album_id'];
    public $timestamps =false;

    public function hospital(){
        return $this -> belongsTo('App\Models\Album','album_id','id');
    }}
