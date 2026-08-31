<?php

namespace App\Controllers;

use App\Models\Gallery;

class AdminGalleries extends BaseController
{
    protected Gallery $galleryModel;

    public function __construct()
    {
        $this->galleryModel = new Gallery();
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

        $galleries = $this->galleryModel
            ->orderBy('event_date', 'DESC')
            ->findAll();

        return view('admin/galleries/index', [
            'title' => 'Galeri & Kegiatan',
            'galleries' => $galleries,
        ]);
    }

    public function create()
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        return view('admin/galleries/create', [
            'title' => 'Tambah Kegiatan',
        ]);
    }

    public function store()
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $rules = [
            'title' => 'required|max_length[200]',
            'description' => 'permit_empty|max_length[1000]',
            'event_date' => 'required|valid_date[Y-m-d]',
            'status' => 'required|in_list[0,1]',
            'image' => 'uploaded[image]|is_image[image]|max_size[image,5120]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]',
        ];

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $image = $this->request->getFile('image');

        $imageName = null;

        if ($image && $image->isValid() && !$image->hasMoved()) {
            $imageName = $image->getRandomName();

            $image->move(
                FCPATH . 'uploads/gallery',
                $imageName
            );
        }

        $this->galleryModel->insert([
            'title' => trim($this->request->getPost('title')),
            'description' => trim($this->request->getPost('description')),
            'image' => $imageName,
            'event_date' => $this->request->getPost('event_date'),
            'status' => (int) $this->request->getPost('status'),
        ]);

        return redirect()
            ->to('/admin/galleries')
            ->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $gallery = $this->galleryModel->find($id);

        if (!$gallery) {
            return redirect()
                ->to('/admin/galleries')
                ->with('error', 'Kegiatan tidak ditemukan.');
        }

        return view('admin/galleries/edit', [
            'title' => 'Edit Kegiatan',
            'gallery' => $gallery,
        ]);
    }

    public function update($id)
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $gallery = $this->galleryModel->find($id);

        if (!$gallery) {
            return redirect()
                ->to('/admin/galleries')
                ->with('error', 'Kegiatan tidak ditemukan.');
        }

        $rules = [
            'title' => 'required|max_length[200]',
            'description' => 'permit_empty|max_length[1000]',
            'event_date' => 'required|valid_date[Y-m-d]',
            'status' => 'required|in_list[0,1]',
        ];

        $image = $this->request->getFile('image');

        if ($image && $image->getError() !== UPLOAD_ERR_NO_FILE) {
            $rules['image'] =
                'uploaded[image]|is_image[image]|max_size[image,5120]|mime_in[image,image/jpg,image/jpeg,image/png,image/webp]';
        }

        if (!$this->validate($rules)) {
            return redirect()
                ->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'title' => trim($this->request->getPost('title')),
            'description' => trim($this->request->getPost('description')),
            'event_date' => $this->request->getPost('event_date'),
            'status' => (int) $this->request->getPost('status'),
        ];

        if ($image && $image->isValid() && !$image->hasMoved()) {

            $newImageName = $image->getRandomName();

            $image->move(
                FCPATH . 'uploads/gallery',
                $newImageName
            );

            if (
                !empty($gallery['image']) &&
                is_file(FCPATH . 'uploads/gallery/' . $gallery['image'])
            ) {
                unlink(
                    FCPATH . 'uploads/gallery/' . $gallery['image']
                );
            }

            $data['image'] = $newImageName;
        }

        $this->galleryModel->update($id, $data);

        return redirect()
            ->to('/admin/galleries')
            ->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function delete($id)
    {
        if ($redirect = $this->checkAuth()) {
            return $redirect;
        }

        $gallery = $this->galleryModel->find($id);

        if (!$gallery) {
            return redirect()
                ->to('/admin/galleries')
                ->with('error', 'Kegiatan tidak ditemukan.');
        }

        if (
            !empty($gallery['image']) &&
            is_file(FCPATH . 'uploads/gallery/' . $gallery['image'])
        ) {
            unlink(
                FCPATH . 'uploads/gallery/' . $gallery['image']
            );
        }

        $this->galleryModel->delete($id);

        return redirect()
            ->to('/admin/galleries')
            ->with('success', 'Kegiatan berhasil dihapus.');
    }
}