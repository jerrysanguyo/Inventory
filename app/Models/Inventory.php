<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table="inventories";
    protected $fillable = [
        'name', 'equipment_id', 'serial_number', 'quantity',
        'unit_id', 'remark', 'created_by', 'updated_by'
    ];

    public static function getAllInventory() 
    {
        return self::all();
    }
    
    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function unitName()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function equipmentName()
    {
        return $this->belongsTo(Equipment::class, 'equipment_id');
    }

    // public function deployments()
    // {
    //     return $this->hasMany(Deployment::class);
    // }

    public function latestDeployment()
    {
        return $this->hasOne(Deployment::class)->latest();
    }
}
