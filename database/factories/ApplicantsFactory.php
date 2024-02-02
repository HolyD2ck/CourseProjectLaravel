<?php

namespace Database\Factories;
use Faker\Factory as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicants>
 */
class ApplicantsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = Faker::create('ru_RU');
        return [
            'Фамилия' => $faker->lastName,
            'Имя' => $faker->firstName,
            'Отчество' => $faker->middleName,
            'Образование' => $faker->jobTitle,
            'Специальность' => $faker->jobTitle,
            'Дата_Рождения' => $faker->date('Y-m-d'),
            'Телефон' => $faker->phoneNumber,
            'Email' => $faker->email,
            'Фото' => $faker->imageUrl(640, 480, 'Соискатель', true)
        ];
    }
}
