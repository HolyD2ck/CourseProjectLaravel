<?php

namespace App\Exports;

use App\Models\Employers;
use Maatwebsite\Excel\Concerns\FromCollection;

class EmployersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Employers::select(\DB::raw('id, Фамилия, Имя, Отчество, Организация, Дата_Основания, Вакансия, Телефон, Email'))->get();
    }
}
