<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB; 

class Inventory extends Model
{
    use HasFactory;

    protected $table="inventories";
    protected $fillable = [
        'name', 'equipment_id', 'serial_number', 'quantity',
        'unit_id', 'remark', 'created_by', 'updated_by',
        'pk_os', 'pk_ms_office', 'email', 'password'
    ];

    public static function getAllInventory() 
    {
        return self::all();
    }

    public static function getEquipmentTypesWithCounts()
    {
        return self::join('equipments', 'inventories.equipment_id', '=', 'equipments.id')
                   ->selectRaw('tbl_equipments.name as equipment_name, count(*) as count')
                   ->groupBy('equipments.name')
                   ->get()
                   ->pluck('count', 'equipment_name');
    }

    public static function getEquipmentByStatus($status)
    {
        return self::join('deployments', 'inventories.id', '=', 'deployments.inventory_id')
                    ->join('equipments', 'inventories.equipment_id', '=', 'equipments.id')
                    ->select('equipments.name as equipment_name', DB::raw('count(*) as count'))
                    ->where('deployments.status', $status)
                    ->groupBy('equipments.name')
                    ->get()
                    ->pluck('count', 'equipment_name');
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

    public function deployments()
    {
        return $this->hasMany(Deployment::class, 'inventory_id');
    }

    public function latestDeployment()
    {
        return $this->hasOne(Deployment::class)->latest();
    }
}
