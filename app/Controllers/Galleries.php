<?php

namespace App\Controllers;

use App\Models\Gallery;

class Galleries extends BaseController
{
    public function index()
    {
        $galleryModel = new Gallery();

        $data = [
            'title' => 'Galeri & Kegiatan',
            'galleries' => $galleryModel
                ->where('status', 1)
                ->orderBy('event_date', 'DESC')
                ->findAll(),
        ];

        return view('galleries/index', $data);
    }

    public function show($id)
    {
        $galleryModel = new Gallery();

        $gallery = $galleryModel
            ->where('id', $id)
            ->where('status', 1)
            ->first();

        if (!$gallery) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound(
                'Kegiatan tidak ditemukan.'
            );
        }

        $data = [
            'title' => $gallery['title'],
            'gallery' => $gallery,
        ];

        return view('galleries/show', $data);
    }
}