<?php

namespace Database\Factories;

use App\Constant\DBTypes;
use App\Services\TypeService;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    function findType(String $code)
    {
        $service = new TypeService();
        return $service->getIdWithCode($code);
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'judul' => $this->faker->sentence,
            'isi_berita' => $this->faker->text(),
            'status' => $this->findType(DBTypes::NewsDraft),
            'kategori' => $this->findType(DBTypes::NewsCategoryIT),
            'created_by' => 1
        ];
    }
}
