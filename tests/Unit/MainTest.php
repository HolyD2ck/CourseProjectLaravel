<?php

namespace Tests\Feature;
//Arrange
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Applicants;
use App\Models\Employers;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\CalcController;
use Illuminate\Http\Request;

class MainTest extends TestCase
{
    use RefreshDatabase;
    /**
     * Тест главной страницы.
     */

     //Act
    public function test_home_page(): void
    {
        $response = $this->get('/');
//Assert
        $response->assertStatus(200);
    }

    /**
     * Тест страницы "О нас".
     */

     //Act
    public function test_about_page(): void
    {
        $response = $this->get('/about');
//Assert
        $response->assertStatus(200);
    }

    /**
     * Тест страницы "Контакты".
     */

     //Act
    public function test_contact_page(): void
    {
        $response = $this->get('/contact');
//Assert
        $response->assertStatus(200);
    }

    /**
     * Тест страницы просмотра данных Работодателей.
     */
    public function test_index_employer(): void
    {
        $response = $this->get('Employers/index');
//Assert
        $response->assertStatus(200);
    }

    /**
     * Тест страницы ввода данных Работодателей.
     */

     //Act
    public function test_create_employer(): void
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
//Assert
        $response = $this->post("/Employers/create", $updatedData);

        $response->assertRedirect('/Employers/index');
    }

    /**
     * Тест страницы редактирования Работодателей.
     */

     //Act
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
//Assert
        $response = $this->post("/Employers/update/{$employer->id}", $updatedData);

        $response->assertRedirect('/Employers/index');
    }
        /**
     * Тест страницы просмотра данных Соискателей.
     */

     //Act
    public function test_index_applican(): void
    {
        $response = $this->get('Applicants/index');
//Assert
        $response->assertStatus(200);
    }

    /**
     * Тест страницы ввода данных Соискателей.
     */

     //Act
    public function test_create_applican(): void
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

        $response = $this->post("/Applicants/create", $updatedData);
//Assert
        $response->assertRedirect('/Applicants/index');
    }

    /**
     * Тест страницы редактирования Соискателей.
     */

     //Act
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
//Assert
        $response = $this->post("/Applicants/update/{$applicant->id}", $updatedData);

        $response->assertRedirect('/Applicants/index');
    }
    public function test_calc(): void
    {
        $calculator = new CalcController();

        $request =  new Request();

        $request->replace(['h' => 1, 'r' => 1]);

        $response = $calculator->result($request);

        $this->assertEquals(3.14, $response->getData()['v']);
        $this->assertEquals(12.57, $response->getData()['p']);
    }
    
}
