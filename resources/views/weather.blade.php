@extends('layout.master')

@section('title', 'Szukaj pogody')

@section('content')
    <div class="container pt-5 mt-5">
        <div class="row pt-5 mt-5">
            <div class="col-12 text-center">
                <h1>WeatherApp</h1>
                <form action="#" method="GET">
                    <input type="test" name="city" class="form-control w-100 mt-2">
                    <a href="{{ route('searchView') }}" class="btn btn-danger mt-2">Wyczyść!</a>
                    <input type="submit" value="Szukaj!" class="btn btn-success mt-2">
                </form>

                @if($content)
                    <h2 class="pt-2">
                        {{ $content->nearest_area[0]->areaName[0]->value }} - {{ $content->current_condition[0]->FeelsLikeC }}°C
                    </h2>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection
