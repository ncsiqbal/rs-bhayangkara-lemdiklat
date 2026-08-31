<?php

namespace App\Models;

use CodeIgniter\Model;

class Doctor extends Model
{
    protected $table = 'doctors';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'name',
        'specialization',
        'photo',
        'description',
        'status',
    ];

    protected $useTimestamps = true;
}