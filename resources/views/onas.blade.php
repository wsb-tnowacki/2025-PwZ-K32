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
        <br>
    Lorem ipsum dolor sit amet consectetur adipisicing elit. Deleniti explicabo, beatae porro a iste labore odio magni sequi odit, perspiciatis veniam quaerat iusto eligendi inventore similique vero eius. Veniam, perspiciatis.</p>
@endsection