<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class HospitalSeeder extends Seeder
{
    public function run()
    {
        /*
        |--------------------------------------------------------------------------
        | POLICLINICS
        |--------------------------------------------------------------------------
        */

        $polyclinics = [
            [
                'name'        => 'Poli Umum',
                'description' => 'Pelayanan pemeriksaan kesehatan umum dan konsultasi kesehatan dasar.',
                'icon'        => 'fa-solid fa-stethoscope',
                'status'      => 1,
            ],
            [
                'name'        => 'Poli Penyakit Dalam',
                'description' => 'Pelayanan diagnosis dan penanganan berbagai penyakit pada organ dalam.',
                'icon'        => 'fa-solid fa-heart-pulse',
                'status'      => 1,
            ],
            [
                'name'        => 'Poli Anak',
                'description' => 'Pelayanan kesehatan dan tumbuh kembang anak.',
                'icon'        => 'fa-solid fa-child',
                'status'      => 1,
            ],
            [
                'name'        => 'Poli Bedah',
                'description' => 'Pelayanan konsultasi dan tindakan bedah sesuai indikasi medis.',
                'icon'        => 'fa-solid fa-user-doctor',
                'status'      => 1,
            ],
            [
                'name'        => 'Poli Gigi',
                'description' => 'Pelayanan pemeriksaan dan perawatan kesehatan gigi dan mulut.',
                'icon'        => 'fa-solid fa-tooth',
                'status'      => 1,
            ],
        ];

        $this->db->table('polyclinics')->insertBatch($polyclinics);

        /*
        |--------------------------------------------------------------------------
        | DOCTORS
        |--------------------------------------------------------------------------
        */

        $doctors = [
            [
                'name'           => 'dr. Ahmad Fauzan, Sp.PD',
                'specialization' => 'Spesialis Penyakit Dalam',
                'photo'          => 'doctor-default.jpg',
                'description'    => 'Dokter spesialis penyakit dalam.',
                'status'         => 1,
            ],
            [
                'name'           => 'dr. Rina Maharani, Sp.A',
                'specialization' => 'Spesialis Anak',
                'photo'          => 'doctor-default.jpg',
                'description'    => 'Dokter spesialis anak.',
                'status'         => 1,
            ],
            [
                'name'           => 'dr. Budi Santoso, Sp.B',
                'specialization' => 'Spesialis Bedah',
                'photo'          => 'doctor-default.jpg',
                'description'    => 'Dokter spesialis bedah.',
                'status'         => 1,
            ],
            [
                'name'           => 'dr. Nadia Putri, Sp.OG',
                'specialization' => 'Spesialis Obstetri & Ginekologi',
                'photo'          => 'doctor-default.jpg',
                'description'    => 'Dokter spesialis obstetri dan ginekologi.',
                'status'         => 1,
            ],
            [
                'name'           => 'dr. Andi Wijaya, Sp.THT',
                'specialization' => 'Spesialis THT',
                'photo'          => 'doctor-default.jpg',
                'description'    => 'Dokter spesialis telinga, hidung, dan tenggorokan.',
                'status'         => 1,
            ],
            [
                'name'           => 'drg. Siti Rahma',
                'specialization' => 'Dokter Gigi',
                'photo'          => 'doctor-default.jpg',
                'description'    => 'Dokter gigi.',
                'status'         => 1,
            ],
        ];

        $this->db->table('doctors')->insertBatch($doctors);

        /*
        |--------------------------------------------------------------------------
        | DOCTOR SCHEDULES
        |--------------------------------------------------------------------------
        |
        | doctor_id dan polyclinic_id mengikuti ID hasil insert di database.
        |
        */

        $schedules = [
            // dr. Ahmad Fauzan - Poli Penyakit Dalam
            [
                'doctor_id'     => 1,
                'polyclinic_id' => 2,
                'day'           => 'Senin',
                'start_time'    => '08:00:00',
                'end_time'      => '12:00:00',
                'status'        => 1,
            ],
            [
                'doctor_id'     => 1,
                'polyclinic_id' => 2,
                'day'           => 'Rabu',
                'start_time'    => '08:00:00',
                'end_time'      => '12:00:00',
                'status'        => 1,
            ],

            // dr. Rina Maharani - Poli Anak
            [
                'doctor_id'     => 2,
                'polyclinic_id' => 3,
                'day'           => 'Senin',
                'start_time'    => '09:00:00',
                'end_time'      => '13:00:00',
                'status'        => 1,
            ],
            [
                'doctor_id'     => 2,
                'polyclinic_id' => 3,
                'day'           => 'Kamis',
                'start_time'    => '09:00:00',
                'end_time'      => '13:00:00',
                'status'        => 1,
            ],

            // dr. Budi Santoso - Poli Bedah
            [
                'doctor_id'     => 3,
                'polyclinic_id' => 4,
                'day'           => 'Selasa',
                'start_time'    => '10:00:00',
                'end_time'      => '14:00:00',
                'status'        => 1,
            ],
            [
                'doctor_id'     => 3,
                'polyclinic_id' => 4,
                'day'           => 'Jumat',
                'start_time'    => '10:00:00',
                'end_time'      => '14:00:00',
                'status'        => 1,
            ],

            // dr. Nadia Putri - Poli Umum
            [
                'doctor_id'     => 4,
                'polyclinic_id' => 1,
                'day'           => 'Selasa',
                'start_time'    => '08:00:00',
                'end_time'      => '12:00:00',
                'status'        => 1,
            ],
            [
                'doctor_id'     => 4,
                'polyclinic_id' => 1,
                'day'           => 'Kamis',
                'start_time'    => '08:00:00',
                'end_time'      => '12:00:00',
                'status'        => 1,
            ],

            // dr. Andi Wijaya - Poli Umum
            [
                'doctor_id'     => 5,
                'polyclinic_id' => 1,
                'day'           => 'Rabu',
                'start_time'    => '13:00:00',
                'end_time'      => '16:00:00',
                'status'        => 1,
            ],

            // drg. Siti Rahma - Poli Gigi
            [
                'doctor_id'     => 6,
                'polyclinic_id' => 5,
                'day'           => 'Senin',
                'start_time'    => '13:00:00',
                'end_time'      => '16:00:00',
                'status'        => 1,
            ],
            [
                'doctor_id'     => 6,
                'polyclinic_id' => 5,
                'day'           => 'Kamis',
                'start_time'    => '13:00:00',
                'end_time'      => '16:00:00',
                'status'        => 1,
            ],
        ];

        $this->db->table('doctor_schedules')->insertBatch($schedules);

        /*
        |--------------------------------------------------------------------------
        | GALLERIES
        |--------------------------------------------------------------------------
        */

        $galleries = [
            [
                'title'       => 'Kegiatan Pelayanan Kesehatan',
                'description' => 'Dokumentasi kegiatan pelayanan kesehatan rumah sakit.',
                'image'       => 'gallery-1.jpg',
                'event_date'  => '2026-08-01',
                'status'      => 1,
            ],
            [
                'title'       => 'Edukasi Kesehatan',
                'description' => 'Kegiatan edukasi dan sosialisasi kesehatan.',
                'image'       => 'gallery-2.jpg',
                'event_date'  => '2026-08-08',
                'status'      => 1,
            ],
            [
                'title'       => 'Bakti Sosial',
                'description' => 'Kegiatan pelayanan kesehatan kepada masyarakat.',
                'image'       => 'gallery-3.jpg',
                'event_date'  => '2026-08-15',
                'status'      => 1,
            ],
            [
                'title'       => 'Kegiatan Rumah Sakit',
                'description' => 'Dokumentasi kegiatan internal rumah sakit.',
                'image'       => 'gallery-4.jpg',
                'event_date'  => '2026-08-20',
                'status'      => 1,
            ],
            [
                'title'       => 'Pemeriksaan Kesehatan',
                'description' => 'Kegiatan pemeriksaan kesehatan masyarakat.',
                'image'       => 'gallery-5.jpg',
                'event_date'  => '2026-08-25',
                'status'      => 1,
            ],
            [
                'title'       => 'Pelayanan Kesehatan Masyarakat',
                'description' => 'Dokumentasi pelayanan kesehatan.',
                'image'       => 'gallery-6.jpg',
                'event_date'  => '2026-08-28',
                'status'      => 1,
            ],
        ];

        $this->db->table('galleries')->insertBatch($galleries);
    }
}