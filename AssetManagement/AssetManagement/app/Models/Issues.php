<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Issues extends Model
{
    use HasFactory;

    protected $table='issues';

    protected $fillable = [
        'id',
        'description', // Description of the issue.
        'start_date', // Date of issue creation.
        'end_date', // End date when the issue resolved.
        'asset_id', // Asset to which the issue belongs to.
        'image_upload_path', // Entire path of attachement.
        'status', // The status of the issue which represents current status.
        'raisedby',
        'priority',
        'resolvedBy',
        'last_escalation',
        'time_taken',
        'remarks',
        'delete_flag',
    ] ;

    public $timestamps = false;
}
