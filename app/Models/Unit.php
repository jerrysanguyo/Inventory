<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    protected $table="units";
    protected $fillable=['name', 'created_by', 'updated_by'];

    public static function getAllUnit() 
    {
        return self::all();
    }
    
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
