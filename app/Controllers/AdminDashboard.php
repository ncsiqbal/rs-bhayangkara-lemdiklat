<?php

namespace App\Controllers;

use App\Models\Doctor;
use App\Models\Polyclinic;
use App\Models\Gallery;
use App\Models\DoctorSchedule;

class AdminDashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/admin/login');
        }

        $doctorModel = new Doctor();
        $polyclinicModel = new Polyclinic();
        $galleryModel = new Gallery();
        $scheduleModel = new DoctorSchedule();

        $data = [
            'title' => 'Dashboard Admin',
            'doctorCount' => $doctorModel->where('status', 1)->countAllResults(),
            'polyclinicCount' => $polyclinicModel->where('status', 1)->countAllResults(),
            'scheduleCount' => $scheduleModel->where('status', 1)->countAllResults(),
            'galleryCount' => $galleryModel->where('status', 1)->countAllResults(),
        ];

        return view('admin/dashboard', $data);
    }
}