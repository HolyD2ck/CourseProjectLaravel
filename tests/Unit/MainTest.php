<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Applicants;
use App\Models\Employers;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class MainTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Тест главной страницы.
     */
    public function test_home_page(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Тест страницы "О нас".
     */
    public function test_about_page(): void
    {
        $response = $this->get('/about');

        $response->assertStatus(200);
    }

    /**
     * Тест страницы "Контакты".
     */
    public function test_contact_page(): void
    {
        $response = $this->get('/contact');

        $response->assertStatus(200);
    }

    /**
     * Тест страницы просмотра данных Работодателей.
     */
    public function test_index_employer(): void
    {
        $response = $this->get('Employers/index');

        $response->assertStatus(200);
    }

    /**
     * Тест страницы ввода данных Работодателей.
     */
    public function test_create_employer(): void
    {
        $response = $this->get('Employers/create');

        $response->assertStatus(200);
    }

    /**
     * Тест страницы редактирования Работодателей.
     */
    public function test_update_employer(): void
    {
        $employer = Employers::factory()->create();

        $updatedData = [
            'Фамилия' => 'Иванов',
            'Имя' => 'Иван',
            'Отчество' => 'Иванович',
            'Организация' => 'ООО "Рога и Копыта"',
            'Дата_Основания' => '1990-01-01',
            'Вакансия' => 'Программист',
            'Телефон' => '+7 900 123 45 67',
            'Email' => 'ivanov@example.com',
            'Фото' => UploadedFile::fake()->image('avatar.jpg'),
        ];

        $response = $this->post("/Employers/update/{$employer->id}", $updatedData);

        $response->assertRedirect('/Employers/index');
    }
        /**
     * Тест страницы просмотра данных Соискателей.
     */
    public function test_index_applican(): void
    {
        $response = $this->get('Applicants/index');

        $response->assertStatus(200);
    }

    /**
     * Тест страницы ввода данных Соискателей.
     */
    public function test_create_applican(): void
    {
        $response = $this->get('Applicants/create');

        $response->assertStatus(200);
    }

    /**
     * Тест страницы редактирования Соискателей.
     */
    public function test_update_applicant(): void
    {
        $applicant = Applicants::factory()->create();

        $updatedData = [
            'Фамилия' => 'Иванов',
            'Имя' => 'Иван',
            'Отчество' => 'Иванович',
            'Образование' => 'Высшее',
            'Специальность' => 'Программист',
            'Дата_Рождения' => '1990-01-01',
            'Телефон' => '+7 900 123 45 67',
            'Email' => 'ivanov@example.com',
            'Фото' => UploadedFile::fake()->image('avatar.jpg'),
        ];

        $response = $this->post("/Applicants/update/{$applicant->id}", $updatedData);

        $response->assertRedirect('/Applicants/index');
    }
    
}
