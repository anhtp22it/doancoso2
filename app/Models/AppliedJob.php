<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppliedJob extends Model
{
    use HasFactory;

    protected $table = 'applied_job';
    protected $primaryKey = 'id';

    protected $fillable = [
        'job_id',
        'user_id',
        'status',
        'cv'
    ];

    public $timestamps = true;

    public function job() {
        return $this->belongsTo(Job::class, 'job_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
