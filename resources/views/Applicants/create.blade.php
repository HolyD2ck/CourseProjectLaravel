@include('layouts/app')
<h1 class="t">Внести Соискателя</h1>

<h4>Соискатель</h4>
<hr />
<div class="row">
    <div class="col-md-4">
        <form method="POST"  enctype="multipart/form-data">
        @csrf
            <div class="form-group">
                <label for="Фамилия" class="control-label">Фамилия</label>
                <input id="Фамилия" name="Фамилия" class="form-control" />
            </div>
            <div class="form-group">
                <label for="Имя" class="control-label">Имя</label>
                <input id="Имя" name="Имя" class="form-control" />
            </div>
            <div class="form-group">
                <label for="Отчество" class="control-label">Отчество</label>
                <input id="Отчество" name="Отчество" class="form-control" />
            </div>
            <div class="form-group">
                <label for="Образование" class="control-label">Образование</label>
                <input id="Образование" name="Образование" class="form-control" />
            </div>
            <div class="form-group">
                <label for="Специальность" class="control-label">Специальность</label>
                <input id="Специальность" name="Специальность" class="form-control" />
            </div>
            <div class="form-group">
                <label for="Дата_Рождения" class="control-label">Дата_Рождения</label>
                <input id="Дата_Рождения" type="date" name="Дата_Рождения" class="form-control" />
            </div>
            <div class="form-group">
                <label for="Телефон" class="control-label">Телефон</label>
                <input id="Телефон" type="tel" name="Телефон" class="form-control" />
            </div>
            <div class="form-group">
                <label for="Email" class="control-label">Email</label>
                <input id="Email" type="email" name="Email" class="form-control" />
            </div>
            <div class="form-group">
                <label for="Фото" class="control-label">Фото</label>
                <img src="" alt="" class="db control-label" id="file-preview">
                <input id="Фото" type="file" name="Фото" class="form-control" accept="image/*" onchange="showFile(event)"/>
            </div>
            <br>
             <div class="form-group">
                <input type="submit" value="Внести" class="btn btn-primary" />
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
        
                

