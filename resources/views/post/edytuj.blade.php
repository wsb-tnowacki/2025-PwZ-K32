@extends('layout.template')
@section('tytul', 'Edytuj post')
@section('podtytul', 'Strona formularza edytującego post')
@section('tresc')
<div class="w-full ">
@isset($post)
<form action="{{route('post.update', $post->id)}}" method="post">
    @method('PUT')   
    @csrf
        <div class="mb-2"><label for="tytul" class="block text-gray-700 font-bold mb-2">Tytuł</label>
            <input type="text" name="tytul" id="tytul" value="@if(old('tytul') !== null){{old('tytul')}}@else{{$post->tytul}}@endif" placeholder="Podaj tytuł postu" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >
        @error('tytul')
            <div class="text-red-400">{{$message}} </div>
        @enderror
        </div>
        <div class="mb-2">
            <label for="tresc" class="block text-gray-700 font-bold mb-2">Treść</label>
            <textarea name="tresc" id="tresc" rows="4" placeholder="Wpisz treść posta" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >@if(old('tresc') !== null){{old('tresc')}}@else{{$post->tresc}}@endif</textarea>
            @error('tresc')
            <div class="text-red-400">{{$message}} </div>
            @enderror
        </div>
        <div class=" items-center justify-between">
            <span class="mb-2">
                <a href="{{route('post.index')}}" >
                <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Powrót do listy</button>
                </a>
            </span>
            @auth
            <span class="mb-2">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Zmień posta</button>
            </span>                
            @endauth               
        </div>
</form>
@endisset
</div>
@endsection
