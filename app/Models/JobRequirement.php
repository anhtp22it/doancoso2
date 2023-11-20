<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRequirement extends Model
{
    use HasFactory;

    protected $table = 'job_requirement';
    protected $primaryKey = 'id';
    protected $fillable = [
        'job_id',
        'requirement',
    ];

    public $timestamps = true;

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}
