@extends('layouts.master') @section('css')
<link rel="stylesheet" href="{{ asset('css/weather.css') }}" />
@endsection @section('content')
<main>
    <p class="desc">
        Sumber Diperoleh Secara Resmi dari
        <a href="https://data.bmkg.go.id">BMKG</a>
        Secara Real Time.
        <span id="date"></span>
        <span id="time"></span>
    </p>

    <section class="weather-section">
        <h1>Weather ⛅️</h1>
        <p>Province: {{ $getWeather['domain'] }}</p>
        <p>City: {{ $getWeather['description'] }}</p>

        @foreach($getWeather['params'][6]['times'] as $cuaca)
        <p>Cuaca: {{ $cuaca['name'] }}</p>
        @endforeach
    </section>
    <section class="earthquake-section">
        <h1>Earthquake 🌎</h1>
        <h4 class="blinking-text-important">Lastest Earthquake</h4>
        <img src="{{ $getQuakeData['shakemap'] }}" alt="Earthquake Image" style="max-width: 100%;">
        <div class="table-responsive">
            <table class="table table-responsive">
                <tr>
                    <th>Tanggal</th>
                    <th>Wilayah</th>
                    <th>Jam</th>
                    <th>Magnitude</th>
                </tr>
                <tr>
                    <td>{{ $getQuakeData['tanggal'] }}</td>
                    <td>{{ $getQuakeData['wilayah'] }}</td>
                    <td>{{ $getQuakeData['jam'] }}</td>
                    <td>{{ $getQuakeData['magnitude'] }}</td>
                </tr>
            </table>
        </div>
        <h4 class="blinking-text-important">Earthquake > 5 Mag</h4>
        <br />
        <div class="table-responsive">
            <table class="table table-responsive">
                <tr>
                    <th>Tanggal</th>
                    <th>Wilayah</th>
                    <th>Jam</th>
                    <th>Magnitude</th>
                    <th>Potensi</th>
                </tr>
                @foreach($quakeBigData as $row)
                <tr>
                    <td>{{ $row['Tanggal'] }}</td>
                    <td>{{ $row['Wilayah'] }}</td>
                    <td>{{ $row['Jam'] }}</td>
                    <td>{{ $row['Magnitude'] }}</td>
                    <td>{{ $row['Potensi'] }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </section>
</main>
@endsection @section('script')
<script src="{{ asset('js/weather.js') }}" defer></script>
@endsection