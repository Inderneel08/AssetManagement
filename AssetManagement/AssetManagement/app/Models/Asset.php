<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    use HasFactory;

    protected $table='assets';

    protected $fillable = [
        'id',
        'asset_id',
        'asset_type',
        'assignedTo',
        'ip',
        'mac_id',
        'asset_name',
        'port',
        'status',
        'make',
        'model',
        'created_on',
        'delete_flag',
        'consumable',
    ];

    public $timestamps = false;
}
