@include('layouts/app')
<h1 class="t">Изменить Работодателя</h1>

<h4>Работодатель:</h4>
<hr />
<div class="row">
    <div class="col-md-4">
        <form method="POST" action="{{ url("/Employers/update/{$employer->id}") }}" enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="Фамилия" class="control-label">Фамилия</label>
                <input id="Фамилия" value="{{ $employer->Фамилия }}" name="Фамилия" class="form-control" />
            </div>
            <div class="form-group">
                <label for="Имя" class="control-label">Имя</label>
                <input id="Имя" value="{{ $employer->Имя }}" name="Имя" class="form-control" />
            </div>
            <div class="form-group">
                <label for="Отчество" class="control-label">Отчество</label>
                <input id="Отчество" value="{{ $employer->Отчество }}" name="Отчество" class="form-control" />
            </div>
            <div class="form-group">
                <label for="Организация" class="control-label">Организация</label>
                <input id="Организация" value="{{ $employer->Организация }}" name="Организация" class="form-control" />
            </div>
            <div class="form-group">
                <label for="Дата_Основания" class="control-label">Дата Основания</label>
                <input id="Дата_Основания" value="{{ $employer->Дата_Основания }}" type="date" name="Дата_Основания" class="form-control" />
            </div>
            <div class="form-group">
                <label for="Вакансия" class="control-label">Вакансия</label>
                <input id="Вакансия" value="{{ $employer->Вакансия }}" name="Вакансия" class="form-control" />
            </div>
            <div class="form-group">
                <label for="Телефон" class="control-label">Телефон</label>
                <input id="Телефон" value="{{ $employer->Телефон }}" type="tel" name="Телефон" class="form-control" />
            </div>
            <div class="form-group">
                <label for="Email" class="control-label">Email</label>
                <input id="Email" value="{{ $employer->Email }}" type="email" name="Email" class="form-control" />
            </div>
            <div class="form-group">
                <label for="Фото" class="control-label">Фото</label>
                <img src="{{ $employer->Фото }}" alt="" class="db control-label" id="file-preview">
                <input value="{{ $employer->Фото }}" id="Фото" type="file" name="Фото" class="form-control" accept="image/*" onchange="showFile(event)"/>
            </div>
            <br>
            <button class="btn btn-danger">
                <a href="/Employers/index" style="color: inherit; text-decoration: none;">Отмена</a>
            </button>
            <br>
            <br>
             <div class="form-group">
                <input type="submit" value="Сохранить" class="btn btn-primary" />
            </div>
        </form>
        <script>
                function showFile(event){
                    var input = event.target
                    var reader = new FileReader();
                    reader.onload = function(){
                        var dataURL = reader.result;
                        var output = document.getElementById('file-preview');
                        output.src = dataURL;
                    };
                    reader.readAsDataURL(input.files[0]);

                }
            </script>
    </div>
</div>