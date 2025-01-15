<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    use HasFactory;
    protected $fillable=['name','description','organization','place','start','end','time','seat','image'];

    public function product(){
        return $this->belongsTo('App\Models\Category');
    }
}
