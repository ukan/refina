<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Option extends Model
{
    protected $table = 'options';

    protected $fillable = [
        'name', 'value'
    ];


    public static function datatables()
    {
        return static::select('id','name','value')->get();
    }

    public static function getValue($name){
    	$value = '';
        if(Option::where('name',$name)->get()->count() == 0){
            
            $options = new Option;
            $options->name = $name;
            $options->save();
            
        }else{
        	$value = Option::where('name',$name)->get()->first()->value;
        }
        return $value;   

    }
}