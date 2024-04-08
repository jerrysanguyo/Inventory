<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $table="inventories";
    protected $fillable = [
        'name', 'equipment_id', 'serial_number', 'quantity', 'unit_id',
        'department_id', 'issued_by', 'assigned_to', 'received_by', 
        'deploy_by', 'deploy_date', 'remarks', 'created_by'
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

    public function departmentName()
    {
        return $this->belongTo(Department::class, 'department_id');
    }

    public function issuedName() 
    {
        return $this->belongTo(User::class, 'issued_by');
    }

    public function deployName() 
    {
        return $this->belongTo(User::class, 'deploy_by');
    }
}
