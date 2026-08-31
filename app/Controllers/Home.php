<?php

namespace App\Controllers;

use App\Models\Doctor;
use App\Models\Polyclinic;
use App\Models\Gallery;

class Home extends BaseController
{
    public function index()
    {
        $doctorModel = new Doctor();
        $polyclinicModel = new Polyclinic();
        $galleryModel = new Gallery();

        $data = [
            'title' => 'Rumah Sakit Bhayangkara Lemdiklat',
            'doctors' => $doctorModel
                ->where('status', 1)
                ->findAll(4),
            'polyclinics' => $polyclinicModel
                ->where('status', 1)
                ->findAll(5),
            'galleries' => $galleryModel
                ->where('status', 1)
                ->orderBy('event_date', 'DESC')
                ->findAll(6),
        ];

        return view('home', $data);
    }
}