@extends('admin.layouts.app')

@section('title', 'Alterar a imagem do Administrador')

@section('content')

<h1 class="w-full text-3xl text-black pb-6">Alterar a imagem do Administrador  {{$admin->name}}</h1>

<div class="w-full  my-6 pr-0 lg:pr-2">

    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" action="{{ route('admins.update.image', $admin->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="mt-2">
                @include('admin.includes.alerts')
                <label class=" block text-sm text-gray-600" for="senha">Nova Imagem</label>
                <input class="w-full px-5  py-2 text-gray-700 bg-gray-200 rounded" type="file" name="images"  >
            </div>
            <div class="mt-6">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit">Atualizar Foto</button>
            </div>
        </form>
    </div>
</div>

@endsection
