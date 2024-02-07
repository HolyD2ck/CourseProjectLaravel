@include('layouts/app')

<div class="container mt-5">
    <form method="POST">
        @csrf
        <h2 class="text-center mb-4">Расчет объема и площади цилиндра</h2>
        <div class="mb-3">
            <label for="r" class="form-label">Радиус</label>
            <input type="number" class="form-control" id="r" name="r" value="{{ old('r') }}" aria-describedby="radiusHelp">
            <div id="radiusHelp" class="form-text">Введите радиус цилиндра.</div>
        </div>
        <div class="mb-3">
            <label for="h" class="form-label">Высота</label>
            <input type="number" class="form-control" id="h" name="h" value="{{ old('h') }}" aria-describedby="heightHelp">
            <div id="heightHelp" class="form-text">Введите высоту цилиндра.</div>
        </div>
        <div class="mb-3">
            <label for="v" class="form-label">Объем</label>
            <input type="text" readonly class="form-control" id="v" name="v" value="{{  isset($v) ? $v : '' }}" aria-describedby="volumeHelp">
            <div id="volumeHelp" class="form-text">Вычисленный объем</div>
        </div>
        <div class="mb-3">
            <label for="p" class="form-label">Площадь</label>
            <input type="text" readonly class="form-control" id="p" name="p" value="{{  isset($p) ? $p : '' }}" aria-describedby="areaHelp">
            <div id="areaHelp" class="form-text">Вычисленная площадь</div>
        </div>
        <button type="submit" class="btn btn-primary">Рассчитать</button>
    </form>
</div>
