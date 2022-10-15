<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Applicant extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $hidden = ['deleted_at'];

    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'email',
        'address',
        'dob',
        'gender',
        'resume',
        'applicant_photo',
        'added_by',
        'added_at',
        'updated_by',
        'updated_at'
    ];
}
