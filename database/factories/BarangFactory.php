<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BarangFactory extends Factory
{
    public function definition(): array
    {
        return [
            'kode_barang' => 'LAB-' . fake()->unique()->numberBetween(1000, 9999),

            'nama_barang' => fake()->randomElement([
                'Mikroskop',
                'Tabung Reaksi',
                'Gelas Ukur',
                'Pipet Tetes',
                'Termometer',
                'Timbangan Digital',
                'Rak Tabung Reaksi',
                'Bunsen',
                'Kacamata Laboratorium',
                'Sarung Tangan',
            ]),

            'kategori' => fake()->randomElement([
                'Alat Ukur',
                'Alat Praktikum',
                'Alat Pelindung',
                'Peralatan Laboratorium',
            ]),

            'lokasi' => fake()->randomElement([
                'Laboratorium Kimia',
                'Laboratorium Fisika',
                'Laboratorium Biologi',
                'Ruang Penyimpanan',
            ]),

            'jumlah' => fake()->numberBetween(1, 20),

            'kondisi' => fake()->randomElement([
                'Baik',
                'Rusak Ringan',
                'Rusak Berat',
            ]),

            'keterangan' => fake()->optional()->sentence(),
        ];
    }
}
