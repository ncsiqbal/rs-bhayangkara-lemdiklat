<?php

namespace App\Controllers;

use App\Models\Polyclinic;

class AdminPolyclinics extends BaseController
{
    protected Polyclinic $polyclinicModel;

    public function __construct()
    {
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

        $polyclinics = $this->polyclinicModel
            ->orderBy('name', 'ASC')
            ->findAll();

        return view('admin/polyclinics/index', [
            'title' => 'Unit & Poli',
            'polyclinics' => $polyclinics,
        ]);
    }

    public function create()
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        return view('admin/polyclinics/create', [
            'title' => 'Tambah Unit & Poli',
        ]);
    }

    public function store()
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $rules = [
            'name' => 'required|max_length[150]',
            'description' => 'permit_empty|max_length[500]',
            'icon' => 'permit_empty|max_length[100]',
            'status' => 'required|in_list[0,1]',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->polyclinicModel->insert([
            'name' => trim($this->request->getPost('name')),
            'description' => trim($this->request->getPost('description')),
            'icon' => trim($this->request->getPost('icon')),
            'status' => (int) $this->request->getPost('status'),
        ]);

        return redirect()
            ->to('/admin/polyclinics')
            ->with('success', 'Unit & poli berhasil ditambahkan.');
    }

    public function edit($id)
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $polyclinic = $this->polyclinicModel->find($id);

        if (!$polyclinic) {
            return redirect()
                ->to('/admin/polyclinics')
                ->with('error', 'Unit & poli tidak ditemukan.');
        }

        return view('admin/polyclinics/edit', [
            'title' => 'Edit Unit & Poli',
            'polyclinic' => $polyclinic,
        ]);
    }

    public function update($id)
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $polyclinic = $this->polyclinicModel->find($id);

        if (!$polyclinic) {
            return redirect()
                ->to('/admin/polyclinics')
                ->with('error', 'Unit & poli tidak ditemukan.');
        }

        $rules = [
            'name' => 'required|max_length[150]',
            'description' => 'permit_empty|max_length[500]',
            'icon' => 'permit_empty|max_length[100]',
            'status' => 'required|in_list[0,1]',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $this->polyclinicModel->update($id, [
            'name' => trim($this->request->getPost('name')),
            'description' => trim($this->request->getPost('description')),
            'icon' => trim($this->request->getPost('icon')),
            'status' => (int) $this->request->getPost('status'),
        ]);

        return redirect()
            ->to('/admin/polyclinics')
            ->with('success', 'Unit & poli berhasil diperbarui.');
    }

    public function delete($id)
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $polyclinic = $this->polyclinicModel->find($id);

        if (!$polyclinic) {
            return redirect()
                ->to('/admin/polyclinics')
                ->with('error', 'Unit & poli tidak ditemukan.');
        }

        $this->polyclinicModel->delete($id);

        return redirect()
            ->to('/admin/polyclinics')
            ->with('success', 'Unit & poli berhasil dihapus.');
    }
}