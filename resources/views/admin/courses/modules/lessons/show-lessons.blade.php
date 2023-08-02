@extends('admin.layouts.app')

@section('title', "Detalhes da Aula {{ $lesson->name }}")

@section('content')

    <h1 class="w-full text-3xl text-black pb-6">Detalhes da Aula {{ $lesson->name }}</h1>

    <div class="w-full  my-6 pr-0 lg:pr-2">



        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('lessons.destroy', [$module->id,$lesson->id]) }}" method="POST">

                <ul>
                    <li> <strong>Nome: </strong> {{ $lesson->name }} </li>
                    <li> <strong>URL: </strong> {{ $lesson->url }} </li>
                    <li> <strong>Vídeo: </strong> {{ $lesson->video }} </li>
                    <li> <strong>Descrição do Vídeo: </strong> {{ $lesson->description }} </li>


                </ul>
                @method('DELETE')
                @csrf
                <button class="px-4 py-1 text-white font-light tracking-wider bg-red-900 rounded" type="submit">
                    Deletar o Módulo {{ $lesson->name }}
                </button>

            </form>
        </div>
    </div>

@endsection
