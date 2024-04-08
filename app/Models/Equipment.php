<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $table="equipments";
    protected $fillable=['name', 'created_by', 'updated_by'];

    public static function getAllEquipment() 
    {
        return self::all();
    }
    
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
