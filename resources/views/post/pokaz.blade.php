@extends('layout.template')
@section('tytul', 'Szczegóły postu')
@section('podtytul', 'Szczegóły postu')
@section('tresc')
    <p>Szczegóły postu </p>
  {{--   @dump($post) --}}
  <div class="w-full ">
    
        <div class="mb-2"><label for="tytul" class="block text-gray-700 font-bold mb-2">Tytuł</label>
            <input type="text" name="tytul" id="tytul" value="{{ $post->tytul }}" placeholder="Podaj tytuł postu" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>
        </div>
        <div class="mb-2"><label for="autor" class="block text-gray-700 font-bold mb-2">Autor</label>
            <div id="autor" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >{{$post->user->name}}</div>
        </div>
        <div class="mb-2"><label for="email" class="block text-gray-700 font-bold mb-2">Email</label>
            <div id="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" >{{$post->user->email}}</div>
        </div>
        <div class="mb-2">
            <label for="tresc" class="block text-gray-700 font-bold mb-2">Treść</label>
            <textarea name="tresc" id="tresc" rows="4" placeholder="Wpisz treść posta" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>{{ $post->tresc }}</textarea>
        </div>
        <div class="mb-2">
            <div><b>Czas utworzenia:</b> {{ $post->created_at->setTimezone('Europe/Warsaw')->locale('pl')->translatedFormat('j F Y H:i:s') }}</div>
            <div><b>Czas edycji:</b> {{ $post->updated_at->setTimezone('Europe/Warsaw')->locale('pl')->translatedFormat('j F Y H:i:s') }}</div>
        </div>
        <div class="flex items-center gap-x-2">
            <a href="{{route('post.index')}}" class="mb-2">
                <button type="button" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Powrót do listy</button>
            </a>
            @auth
            <a href="{{route('post.edit', $post->id)}}" class="mb-2">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Edytuj posta</button>
            </a>
            <form class="mb-2" action="{{route('post.destroy',$post->id)}}" method="post" onsubmit="return confirm('Czy na pewno usunąć ten post?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">Usuń posta</button>
            </form>                
            @endauth

        </div>
        
</div>
@endsection
