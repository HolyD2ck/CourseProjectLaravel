<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Applicants;

class ApplicantsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $applicants = Applicants::all(); 
        return view('Applicants.index', ['applicants' => $applicants]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        try 
        {
            $validatedData = $request->validate
            ([
                'Фамилия' => 'required|max:255',
                'Имя' => 'required|max:255',
                'Отчество' => 'required|max:255',
                'Образование' => 'required|max:255',
                'Специальность' => 'required|max:255',
                'Дата_Рождения' => 'required|date_format:Y-m-d',
                'Телефон' => 'required|max:255',
                'Email' => 'required|max:255',
            ]);

            $file_name = ""; 

            if($request->hasFile('Фото')) {
                $file_name = '/img/applicants/'.time().'.'.$request->Фото->getClientOriginalExtension();
                $request->Фото->move(public_path('img/applicants'),$file_name);
            } else {
                echo "Фото не загружено";
            }
            $applicant = new Applicants;
            $applicant->Фамилия = $request->Фамилия;
            $applicant->Имя = $request->Имя;
            $applicant->Отчество = $request->Отчество;
            $applicant->Образование = $request->Образование;
            $applicant->Специальность = $request->Специальность;
            $applicant->Дата_Рождения = $request->Дата_Рождения;
            $applicant->Телефон = $request->Телефон;
            $applicant->Email = $request->Email;
            $applicant->Фото = $file_name;
            $applicant->save();
        
            return redirect('/Applicants/index');
        }   
        catch (\Exception $e) {echo('Ошибка при создании работодателя: ' . $e->getMessage());}
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $applicant = Applicants::find($id);
        return view('applicants.edit', compact('applicant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $applicant = Applicants::find($id);
        try 
        {
            $validatedData = $request->validate
            ([
                'Фамилия' => 'required|max:255',
                'Имя' => 'required|max:255',
                'Отчество' => 'required|max:255',
                'Образование' => 'required|max:255',
                'Специальность' => 'required|max:255',
                'Дата_Рождения' => 'required|date_format:Y-m-d',
                'Телефон' => 'required|max:255',
                'Email' => 'required|max:255',
            ]);

            $file_name = $applicant->Фото; 

            if($request->hasFile('Фото')) {
                $file_name = '/img/applicants/'.time().'.'.$request->Фото->getClientOriginalExtension();
                $request->Фото->move(public_path('img/applicants'),$file_name);
            } else {
                echo "Фото не загружено";
            }

            $applicant->Фамилия = $request->Фамилия;
            $applicant->Имя = $request->Имя;
            $applicant->Отчество = $request->Отчество;
            $applicant->Образование = $request->Образование;
            $applicant->Специальность = $request->Специальность;
            $applicant->Дата_Рождения = $request->Дата_Рождения;
            $applicant->Телефон = $request->Телефон;
            $applicant->Email = $request->Email;
            $applicant->Фото = $file_name;
            $applicant->save();
        
            return redirect('/Applicants/index');
        }   
        catch (\Exception $e) {echo('Ошибка при создании работодателя: ' . $e->getMessage());}
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $applicant = Applicants::findOrFail($id);
        $image_path=public_path();
        $image = $image_path.$applicant->Фото;
        if(file_exists($image)){
            @unlink($image);
        }
        $applicant->delete();
        return redirect('/Applicants/index');
    }
}
