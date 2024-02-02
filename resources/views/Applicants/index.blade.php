
@include('layouts/app')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<h1 class="t">Список Соискателей</h1>
<br />
@if ($applicants == null)
    <p><em>Загрузка...</em></p>
@else
<button class="btn btn-success l">
    <a href="/Applicants/create" style="color: inherit; text-decoration: none;">Внести Соискателя</a>
</button>
<hr>
    <br>
    <table class>
        <thead>
            <tr>
                <th>Фамилия</th>
                <th>Имя</th>
                <th>Отчество</th>
                <th>Образование</th>
                <th>Специальность</th>
                <th>Дата_Рождения</th>
                <th>Телефон</th>
                <th>Email</th>
                <th>Фото</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($applicants as $applicant)
                <tr>
                    <td>{{ $applicant->Фамилия }}</td>
                    <td>{{ $applicant->Имя }}</td>
                    <td>{{ $applicant->Отчество }}</td>
                    <td>{{ $applicant->Образование }}</td>
                    <td>{{ $applicant->Специальность }}</td>
                    <td>{{ $applicant->Дата_Рождения }}</td>
                    <td>{{ $applicant->Телефон }}</td>
                    <td>{{ $applicant->Email }}</td>
                    <td><img src="{{ $applicant->Фото }}" class="db"></td>
                    <td>
                    <button class="btn btn-secondary">
                            <a style="color: inherit; text-decoration: none;" href="{{ url("Applicants/edit/{$applicant->id}") }}">Изменить</a>
                        </button>
                        <form method="post" action="{{ route('applicants.destroy', $applicant->id) }}">
                                @csrf
                                @method('DELETE')
                            <br>
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