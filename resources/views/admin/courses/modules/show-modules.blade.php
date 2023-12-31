@extends('admin.layouts.app')

@section('title', "Detalhes do Módulo {{ $module->name }}")

@section('content')

    <h1 class="w-full text-3xl text-black pb-6">Detalhes do Módulo {{ $module->name }}</h1>

    <div class="w-full  my-6 pr-0 lg:pr-2">



        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('modules.destroy', [$course->id,$module->id]) }}" method="POST">

                <ul>
                    <li> <strong>Nome: </strong> {{ $module->name }} </li>

                </ul>
                @method('DELETE')
                @csrf
                <button class="px-4 py-1 text-white font-light tracking-wider bg-red-900 rounded" type="submit">
                    Deletar o Módulo {{ $module->name }}
                </button>

            </form>
        </div>
    </div>

@endsection
