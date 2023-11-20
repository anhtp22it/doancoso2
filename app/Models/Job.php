<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job';
    protected $primaryKey = 'id';

    protected $fillable = [
        'title',
        'image',
        'company',
        'description',
        'salary',
        'category_id',
        'type_id',
        'experience_id',
        'deadline',
        'country',
        'city',
        'full_address',
        'applicant_limit',
        'applicant_current',
        'status',
    ];

    public $timestamps = true;

    public function getJobPath()
    {
        return asset('storage/' . $this->image);
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function appliedJobs()
    {
        return $this->hasMany(AppliedJob::class, 'job_id');
    }

    public function hasApplied($userId)
    {
        return $this->appliedJobs()->where('user_id', $userId)->exists();
    }

    public function jobType()
    {
        return $this->belongsTo(JobType::class, 'type_id');
    }

    public function requirements() {
        return $this->hasMany(JobRequirement::class, 'job_id');
    }

    public function experience() {
        return $this->belongsTo(Experience::class, 'experience_id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function savedJobs() {
        return $this->hasMany(SavedJob::class, 'job_id');
    }
}
