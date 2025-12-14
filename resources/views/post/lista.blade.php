@extends('layout.template')
@section('tytul', 'Lista postów')
@section('podtytul', 'Strona listy postów')
@section('tresc')
    <p>Lista postów </p>
    {{-- @dump($posty) --}}
    <table class="table-fixed border border-gray-300 divide-y divide-gray-200 w-full rounded-lg">
  <thead>
    <tr>
        <th scope="col" class="border border-gray-300 px-4 py-2">Lp</th>
        <th scope="col" class="border border-gray-300 px-4 py-2">Tytuł</th>
        <th scope="col" class="border border-gray-300 px-4 py-2">Autor</th>
        <th scope="col" class="border border-gray-300 px-4 py-2">Data utworzenia</th>
        @auth
        <th scope="col" class="border border-gray-300 px-4 py-2">Akcja</th>            
        @endauth
    </tr>
  </thead>
  @isset($posty)
  @php($lp=1)
    @foreach ( $posty as $post)
    <tbody>
      <tr>
        <td class="border border-gray-300 px-4 py-2">{{ $lp++ }} id:[ {{$post['id']}} ]</td>
        <td class="border border-gray-300 px-4 py-2"><a href="{{route('post.show', $post->id)}}">{{$post->tytul}}</a></td>
        <td class="border border-gray-300 px-4 py-2">{{$post->autor}}</td>
        <td class="border border-gray-300 px-4 py-2">{{$post->created_at->setTimezone('Europe/Warsaw')->format('j F Y H:i:s')}}</td>
        @auth
        <td class="border border-gray-300 px-4 py-2">
            <div class="flex items-center gap-x-2">
            <a href="{{route('post.edit', $post->id)}}" class="mb-2">
                <button type="submit" class="bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">E</button>
            </a>
            <form class="mb-2" action="{{route('post.destroy',$post->id)}}" method="post" onsubmit="return confirm('Czy na pewno usunąć ten post?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-lg focus:outline-none focus:shadow-outline">X</button>
            </form>
            </div>
        </td>            
        @endauth
      </tr>
    </tbody>
    @endforeach
  @else
  <tbody>
    <tr>
    @auth
    <th class="text-center" scope="row" colspan="5"> Nie ma żadnych postów</th>
     @else
    <th class="text-center" scope="row" colspan="4"> Nie ma żadnych postów</th>
    @endauth
      
    </tr>
  </tbody>

  @endisset
  
</table>

@endsection
