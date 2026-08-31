<?php

namespace App\Controllers;

use App\Models\Doctor;
use App\Models\Polyclinic;

class Doctors extends BaseController
{
    public function index()
    {
        $doctorModel = new Doctor();
        $polyclinicModel = new Polyclinic();

        $search = $this->request->getGet('search');
        $polyclinicId = $this->request->getGet('polyclinic');
        $day = $this->request->getGet('day');

        $builder = $doctorModel
            ->select(
                'doctors.id,
                doctors.name,
                doctors.specialization,
                doctors.photo,
                doctors.description,
                doctor_schedules.day,
                doctor_schedules.start_time,
                doctor_schedules.end_time,
                polyclinics.name AS polyclinic_name'
            )
            ->join(
                'doctor_schedules',
                'doctor_schedules.doctor_id = doctors.id'
            )
            ->join(
                'polyclinics',
                'polyclinics.id = doctor_schedules.polyclinic_id'
            )
            ->where('doctors.status', 1)
            ->where('doctor_schedules.status', 1)
            ->where('polyclinics.status', 1);

        if (!empty($search)) {
            $builder->groupStart()
                ->like('doctors.name', $search)
                ->orLike('doctors.specialization', $search)
                ->groupEnd();
        }

        if (!empty($polyclinicId)) {
            $builder->where('doctor_schedules.polyclinic_id', $polyclinicId);
        }

        if (!empty($day)) {
            $builder->where('doctor_schedules.day', $day);
        }

        $schedules = $builder
            ->orderBy('doctor_schedules.day', 'ASC')
            ->orderBy('doctor_schedules.start_time', 'ASC')
            ->findAll();

        $data = [
            'title' => 'Jadwal Dokter',
            'schedules' => $schedules,
            'polyclinics' => $polyclinicModel
                ->where('status', 1)
                ->findAll(),
            'search' => $search,
            'selectedPolyclinic' => $polyclinicId,
            'selectedDay' => $day,
        ];

        return view('doctors/index', $data);
    }
}