<?php

namespace App\Controllers;

use App\Models\Polyclinic;
use App\Models\Doctor;

class Polyclinics extends BaseController
{
    public function index()
    {
        $polyclinicModel = new Polyclinic();

        $data = [
            'title' => 'Unit & Poli',
            'polyclinics' => $polyclinicModel
                ->where('status', 1)
                ->findAll(),
        ];

        return view('polyclinics/index', $data);
    }

    public function show($id)
    {
        $polyclinicModel = new Polyclinic();
        $doctorModel = new Doctor();

        $polyclinic = $polyclinicModel
            ->where('id', $id)
            ->where('status', 1)
            ->first();

        if (!$polyclinic) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Unit / Poli tidak ditemukan.'
            );
        }

        $doctors = $doctorModel
            ->select(
                'doctors.*, 
                doctor_schedules.day,
                doctor_schedules.start_time,
                doctor_schedules.end_time'
            )
            ->join(
                'doctor_schedules',
                'doctor_schedules.doctor_id = doctors.id'
            )
            ->where(
                'doctor_schedules.polyclinic_id',
                $id
            )
            ->where('doctors.status', 1)
            ->where('doctor_schedules.status', 1)
            ->orderBy('doctor_schedules.day', 'ASC')
            ->orderBy('doctor_schedules.start_time', 'ASC')
            ->findAll();

        $data = [
            'title' => $polyclinic['name'],
            'polyclinic' => $polyclinic,
            'doctors' => $doctors,
        ];

        return view('polyclinics/show', $data);
    }
}