<?php

namespace App\Models;

use CodeIgniter\Model;

class Polyclinic extends Model
{
    protected $table = 'polyclinics';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'name',
        'description',
        'icon',
        'status',
    ];

    protected $useTimestamps = true;
}