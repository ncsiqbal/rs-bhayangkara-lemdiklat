<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorSchedule extends Model
{
    protected $table = 'doctor_schedules';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'doctor_id',
        'polyclinic_id',
        'day',
        'start_time',
        'end_time',
        'status',
    ];

    protected $useTimestamps = true;
}