<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransModulPegawai extends Model
{
    use HasFactory;
    protected $table ="trans_modul_pegawai";

    protected $fillable = 
    ['user_id',
    'user_name',
    'email',
    'mobile_number',
    'user_status',
    'module_name',
    'module_type',
    'primary_tag',
    'secondary_tag',
    'estimated_duration',
    'time_spent',
    'enrollment_type',
    'module_status',
    'completion_percentage',
    'enrolled_on',
    'started_on',
    'completed_on',
    'last_accessed_on',
    'is_complete',
    'program_name',
    'skill_name',
    'assessment_count',
    'pass_count',
    'average_score',
    'designation',
    'department',
    'sub_department',
    'location',
    'grade',
    'change_agent',
    'created_at',
    'updated_at',
    'create_by',
    'update_by',
    'modul_id',
    'last_update',
    'id'    
];
}
