@extends('layout.template')
@section('tytul', 'O nas')
@section('podtytul', 'Strona o nas')
@section('tresc')
    <p>Treść strony o nas <br>
        {{-- @dd($zadania) --}}
        {{-- @dump($zadania) --}}
        @isset($zadania)
           <ol>
            @foreach ($zadania as $zadanie)
                <li>{{$zadanie}} </li>
            @endforeach
            </ol> 
        @endisset
        </p>
@endsection