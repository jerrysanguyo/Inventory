<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deployment extends Model
{
    use HasFactory;

    protected $table="deployments";
    protected $fillable = [
        'inventory_id', 'department_id', 'issued_by', 'assigned_to', 'received_by',
        'deploy_by', 'deploy_date', 'status', 'created_by', 'updated_by',
    ];
    
    public static function getAllDeployment()
    {
        return self::all();
    }

    public function departmentName()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function issuedName() 
    {
        return $this->belongsTo(User::class, 'issued_by');
    }

    public function deployName() 
    {
        return $this->belongsTo(User::class, 'deploy_by');
    }
}
