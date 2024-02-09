@include('layouts/app')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<h1 class="t">Список Работадателей</h1>
<br />
@if ($employers == null)
    <p><em>Загрузка...</em></p>
@else
<button class="btn btn-secondary l">
    <a href="/Employers/create" style="color: inherit; text-decoration: none;">Внести Работодателя</a>
</button>
<button class="btn btn-success l">
    <a href="/Employers/export" style="color: inherit; text-decoration: none;">Дамб В Excel</a>
</button>
<button class="btn btn-success l">
    <a href="/Employers/export2" style="color: inherit; text-decoration: none;">Дамб В Excel Не Четный</a>
</button>
<button class="btn btn-primary l">
    <a href="/Employers/word" style="color: inherit; text-decoration: none;">Дамб В Word</a>
</button>
<button class="btn btn-primary l">
    <a href="/Employers/word2" style="color: inherit; text-decoration: none;">Дамб В Word Четный</a>
</button>
<hr>
    <br>
    <table class="">
        <thead>
            <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Организация</th>
                <th>Дата Основания</th>
                <th>Вакансия</th>
                <th>Телефон</th>
                <th>Email</th>
                <th>Фото</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employers as $employer)
                <tr>
                    <td>{{ $employer->Фамилия }}</td>
                    <td>{{ $employer->Имя }}</td>
                    <td>{{ $employer->Отчество }}</td>
                    <td>{{ $employer->Организация }}</td>
                    <td>{{ $employer->Дата_Основания }}</td>
                    <td>{{ $employer->Вакансия }}</td>
                    <td>{{ $employer->Телефон }}</td>
                    <td>{{ $employer->Email }}</td>
                    <td><img src="{{ $employer->Фото }}" class="db"></td>
                    <td>
                        <button class="btn btn-secondary">
                            <a style="color: inherit; text-decoration: none;" href="{{ url("Employers/edit/{$employer->id}") }}">Изменить</a>
                        </button>
                        <form method="post" action="{{ route('employers.destroy', $employer->id) }}">
                        <br>
                        @csrf
                        @method('DELETE')
                            <button class="btn btn-danger" onclick="deleteConfirm(event, this.closest('form'))">
                                <a style="color: inherit; text-decoration: none;">Удалить</a>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
                <script>
                    window.deleteConfirm = function(e, form){
                        e.preventDefault();
                        Swal.fire({
                            title: 'Вы уверены?',
                            text: 'Что хотите удалить запись?!',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Да!',
                            cancelButtonText: 'Нет!'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                form.submit();
                            }
                        });
                    }
                </script>
        </tbody>
    </table>
    @endif