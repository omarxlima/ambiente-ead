@extends('admin.layouts.app')

@section('title', "Detalhes do Usuário {{ $admin->name }}")

@section('content')

    <h1 class="w-full text-3xl text-black pb-6">Detalhes do Administrador {{ $admin->name }}</h1>

    <div class="w-full  my-6 pr-0 lg:pr-2">



        <div class="leading-loose">
            <form class="p-10 bg-white rounded shadow-xl" action="{{ route('admins.destroy', $admin->id) }}" method="POST">

                <ul>
                    <li> {{ $admin->name }} </li>
                    <li> {{ $admin->email }}</li>
                </ul>
                @method('DELETE')
                @csrf
                <button class="px-4 py-1 text-white font-light tracking-wider bg-red-900 rounded" type="submit">
                    Deletar o Usuário {{ $admin->name }}
                </button>

            </form>
        </div>
    </div>

@endsection
