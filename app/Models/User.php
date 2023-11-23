<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'job_title',
        'phone',
        'type_id',
        'category_id',
        'experience_id',
        'education',
        'current_salary',
        'expected_salary',
        'age',
        'language',
        'about',
        'role_id',
        'cv',
        'facebook',
        'linkedin',
        'instagram',
        'twitter',
        'country',
        'city',
        'full_address',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function savedJobs()
    {
        return $this->hasMany(SavedJob::class, 'user_id');
    }

    public function appliedJobs() {
        return $this->hasMany(AppliedJob::class, 'user_id');
    }

    public function jobs() {
        return $this->hasMany(Job::class);
    }

    public function jobType() {
        return $this->belongsTo(JobType::class, 'type_id');
    }

    public function jobCategory() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function experience() {
        return $this->belongsTo(Experience::class, 'experience_id');
    }

    public function role() {
        return $this->belongsTo(Role::class, 'role_id');
    }

    // Model
    public function getAvatarPath()
    {
        return asset('storage/' . $this->avatar);
    }

    public function getCvPath()
    {
        return asset('storage/' . $this->cv);
    }

}
