<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addpeople extends Model
{
    use HasFactory;
    public function SubCategory(){
      return $this->belongsTo('App\Models\Subcategory','depertment_id','id');
    }
    public function Category(){
      return $this->belongsTo('App\Models\Category','depertment_id','id');
    }
    protected $fillable = [ 'name',
                            'phone',
                            'email',
                            'designation'
                          ];
}
