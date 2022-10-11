@extends('layout.master')

@section('title', 'Szukaj pogody')

@section('content')
    <div class="container pt-5 mt-5">
        <div class="row pt-5 mt-5">
            <div class="col-12 text-center">
                <h1>WeatherApp</h1>
                <form action="#" method="GET">
                    <input type="text" name="city" class="form-control w-100 mt-2" value="{{ $input }}" placeholder="Wpisz miasto, w którym chcesz sprawdzić pogodę">
                    @error('city')
                        <div>{{ $message }}</div>
                    @enderror
                    <div id="Cities" class="p-2" style="font-size: 14px;"></div>
                    <a href="{{ route('searchView') }}" class="btn btn-lg btn-danger mt-2">Wyczyść!</a>
                    <input type="submit" value="Szukaj!" class="btn btn-lg btn-success mt-2">
                </form>
                @if($content)
                    <h2 class="pt-5">
                        <div>{{ $content->tempC }}°C</div>
                        <div>{{ $content->description }}</div>
                        <div style="font-size: 18px;">{{ $content->location }}, {{ $content->country }}</div>
                        <div style="font-size: 14px;">({{ $content->latitude }}, {{ $content->longitude }})</div>
                        <button class="btn btn-secondary mt-3" onClick="storeLocation('{{ $input }}')">Zapisz lokalizację!</button>
                    </h2>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script>
    if (typeof(Storage) !== "undefined") {
        if(localStorage.getItem("cities") && (localStorage.getItem("cities") !== '[]')){
            document.getElementById("Cities").innerHTML += "Zapisane lokalizacje:<br>";

            var cities = JSON.parse(localStorage.getItem("cities"));

            cities.forEach(city => {
                document.getElementById("Cities").innerHTML += "<a class='btn btn-dark btn-sm' href='/?city="+city+"'>"+city+"</a><button class='btn btn-danger me-2 btn-sm' type='button' onClick=deleteLocation('"+city+"')>(X)</button>";
            });
        }
    } else {
        document.getElementById("Cities").innerHTML = "Twoja przeglądarka nie wspiera Web Storage.";
    }

    function storeLocation(city){
        if(localStorage.getItem("cities")){
            var cities = JSON.parse(localStorage.getItem("cities"));
            cities.push(city);
        } else {
            var cities = [city];
        }

        localStorage.setItem("cities", JSON.stringify(cities));
        location.reload();
    }

    function deleteLocation(city){
        if(localStorage.getItem("cities")){
            var citiesDel = JSON.parse(localStorage.getItem("cities"));

            citiesDel = citiesDel.filter(function(item) {
                return item !== city
            })
        } else {
            return true;
        }

        localStorage.setItem("cities", JSON.stringify(citiesDel));
        location.reload();
    }


</script>
@endsection
