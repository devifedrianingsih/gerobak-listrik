<?php

namespace Database\Factories;

use App\Models\CalonMitra;
use Illuminate\Database\Eloquent\Factories\Factory;

class CalonMitraFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CalonMitra::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nomor' => $this->faker->unique()->randomNumber(), // Nomor acak
            'nama_calon_mitra' => $this->faker->company, // Nama calon mitra (perusahaan)
            'email_calon_mitra' => $this->faker->unique()->safeEmail, // Email calon mitra
            'no_hp_calon_mitra' => $this->faker->phoneNumber, // Nomor telepon calon mitra
            'alamat_calon_mitra' => $this->faker->address, // Alamat calon mitra
            'berkas_pdf' => 'berkas/' . $this->faker->word . '.pdf', // Nama berkas PDF
            'status' => 'belum diproses', // Status default
        ];
    }
}
