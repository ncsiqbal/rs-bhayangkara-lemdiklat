<?php

namespace App\Controllers;

use App\Models\Doctor;
use App\Models\DoctorSchedule;
use App\Models\Polyclinic;

class AdminDoctorSchedules extends BaseController
{
    protected DoctorSchedule $scheduleModel;
    protected Doctor $doctorModel;
    protected Polyclinic $polyclinicModel;

    public function __construct()
    {
        $this->scheduleModel = new DoctorSchedule();
        $this->doctorModel = new Doctor();
        $this->polyclinicModel = new Polyclinic();
    }

    private function checkAuth()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/admin/login');
        }

        if (session()->get('user_role') !== 'admin') {
            return redirect()->to('/admin/login');
        }

        return null;
    }

    public function index()
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $schedules = $this->scheduleModel
            ->select(
                'doctor_schedules.*,
                doctors.name AS doctor_name,
                doctors.specialization,
                polyclinics.name AS polyclinic_name'
            )
            ->join(
                'doctors',
                'doctors.id = doctor_schedules.doctor_id'
            )
            ->join(
                'polyclinics',
                'polyclinics.id = doctor_schedules.polyclinic_id'
            )
            ->orderBy(
                "FIELD(
                    doctor_schedules.day,
                    'Senin',
                    'Selasa',
                    'Rabu',
                    'Kamis',
                    'Jumat',
                    'Sabtu',
                    'Minggu'
                )",
                '',
                false
            )
            ->orderBy('doctor_schedules.start_time', 'ASC')
            ->findAll();

        return view('admin/schedules/index', [
            'title' => 'Jadwal Dokter',
            'schedules' => $schedules,
        ]);
    }

    public function create()
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        return view('admin/schedules/create', [
            'title' => 'Tambah Jadwal Dokter',
            'doctors' => $this->doctorModel
                ->where('status', 1)
                ->orderBy('name', 'ASC')
                ->findAll(),
            'polyclinics' => $this->polyclinicModel
                ->where('status', 1)
                ->orderBy('name', 'ASC')
                ->findAll(),
        ]);
    }

    public function store()
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $rules = [
            'doctor_id' => 'required|integer',
            'polyclinic_id' => 'required|integer',
            'day' => 'required|in_list[Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu]',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required|in_list[0,1]',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->scheduleModel->insert([
            'doctor_id' => (int) $this->request->getPost('doctor_id'),
            'polyclinic_id' => (int) $this->request->getPost('polyclinic_id'),
            'day' => $this->request->getPost('day'),
            'start_time' => $this->request->getPost('start_time'),
            'end_time' => $this->request->getPost('end_time'),
            'status' => (int) $this->request->getPost('status'),
        ]);

        return redirect()
            ->to('/admin/schedules')
            ->with('success', 'Jadwal dokter berhasil ditambahkan.');
    }

    public function edit($id)
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $schedule = $this->scheduleModel->find($id);

        if (!$schedule) {
            return redirect()
                ->to('/admin/schedules')
                ->with('error', 'Jadwal tidak ditemukan.');
        }

        return view('admin/schedules/edit', [
            'title' => 'Edit Jadwal Dokter',
            'schedule' => $schedule,
            'doctors' => $this->doctorModel
                ->where('status', 1)
                ->orderBy('name', 'ASC')
                ->findAll(),
            'polyclinics' => $this->polyclinicModel
                ->where('status', 1)
                ->orderBy('name', 'ASC')
                ->findAll(),
        ]);
    }

    public function update($id)
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $schedule = $this->scheduleModel->find($id);

        if (!$schedule) {
            return redirect()
                ->to('/admin/schedules')
                ->with('error', 'Jadwal tidak ditemukan.');
        }

        $rules = [
            'doctor_id' => 'required|integer',
            'polyclinic_id' => 'required|integer',
            'day' => 'required|in_list[Senin,Selasa,Rabu,Kamis,Jumat,Sabtu,Minggu]',
            'start_time' => 'required',
            'end_time' => 'required',
            'status' => 'required|in_list[0,1]',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->scheduleModel->update($id, [
            'doctor_id' => (int) $this->request->getPost('doctor_id'),
            'polyclinic_id' => (int) $this->request->getPost('polyclinic_id'),
            'day' => $this->request->getPost('day'),
            'start_time' => $this->request->getPost('start_time'),
            'end_time' => $this->request->getPost('end_time'),
            'status' => (int) $this->request->getPost('status'),
        ]);

        return redirect()
            ->to('/admin/schedules')
            ->with('success', 'Jadwal dokter berhasil diperbarui.');
    }

    public function delete($id)
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $schedule = $this->scheduleModel->find($id);

        if (!$schedule) {
            return redirect()
                ->to('/admin/schedules')
                ->with('error', 'Jadwal tidak ditemukan.');
        }

        $this->scheduleModel->delete($id);

        return redirect()
            ->to('/admin/schedules')
            ->with('success', 'Jadwal dokter berhasil dihapus.');
    }
}