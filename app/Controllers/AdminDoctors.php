<?php

namespace App\Controllers;

use App\Models\Doctor;

class AdminDoctors extends BaseController
{
    protected Doctor $doctorModel;

    public function __construct()
    {
        $this->doctorModel = new Doctor();
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

        $data = [
            'title' => 'Kelola Dokter',
            'doctors' => $this->doctorModel
                ->orderBy('id', 'DESC')
                ->findAll(),
        ];

        return view('admin/doctors/index', $data);
    }

    public function create()
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        return view('admin/doctors/create', [
            'title' => 'Tambah Dokter',
        ]);
    }

    public function store()
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $rules = [
            'name' => 'required|max_length[100]',
            'specialization' => 'required|max_length[150]',
            'description' => 'permit_empty|max_length[1000]',
            'status' => 'required|in_list[0,1]',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->doctorModel->insert([
            'name' => trim($this->request->getPost('name')),
            'specialization' => trim($this->request->getPost('specialization')),
            'description' => trim($this->request->getPost('description')),
            'status' => (int) $this->request->getPost('status'),
            'photo' => 'doctor-default.jpg',
        ]);

        return redirect()
            ->to('/admin/doctors')
            ->with('success', 'Dokter berhasil ditambahkan.');
    }

    public function edit($id)
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $doctor = $this->doctorModel->find($id);

        if (!$doctor) {
            return redirect()
                ->to('/admin/doctors')
                ->with('error', 'Data dokter tidak ditemukan.');
        }

        return view('admin/doctors/edit', [
            'title' => 'Edit Dokter',
            'doctor' => $doctor,
        ]);
    }

    public function update($id)
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $doctor = $this->doctorModel->find($id);

        if (!$doctor) {
            return redirect()
                ->to('/admin/doctors')
                ->with('error', 'Data dokter tidak ditemukan.');
        }

        $rules = [
            'name' => 'required|max_length[100]',
            'specialization' => 'required|max_length[150]',
            'description' => 'permit_empty|max_length[1000]',
            'status' => 'required|in_list[0,1]',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->doctorModel->update($id, [
            'name' => trim($this->request->getPost('name')),
            'specialization' => trim($this->request->getPost('specialization')),
            'description' => trim($this->request->getPost('description')),
            'status' => (int) $this->request->getPost('status'),
        ]);

        return redirect()
            ->to('/admin/doctors')
            ->with('success', 'Data dokter berhasil diperbarui.');
    }

    public function delete($id)
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $doctor = $this->doctorModel->find($id);

        if (!$doctor) {
            return redirect()
                ->to('/admin/doctors')
                ->with('error', 'Data dokter tidak ditemukan.');
        }

        $this->doctorModel->delete($id);

        return redirect()
            ->to('/admin/doctors')
            ->with('success', 'Dokter berhasil dihapus.');
    }
}