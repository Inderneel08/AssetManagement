<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssetHistory extends Model
{
    use HasFactory;

    protected $table='asset_history';

    protected $fillable = [
        'asset_id',
        'assignedTo',
        'date_from',
        'date_to',
        'id',
        'delete_flag',
        'action_performed',
        'serviceId',
    ];


    public $timestamps = false;
}
