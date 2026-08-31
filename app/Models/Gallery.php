<?php

namespace App\Models;

use CodeIgniter\Model;

class Gallery extends Model
{
    protected $table = 'galleries';

    protected $primaryKey = 'id';

    protected $returnType = 'array';

    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'title',
        'description',
        'image',
        'event_date',
        'status',
    ];

    protected $useTimestamps = true;
}