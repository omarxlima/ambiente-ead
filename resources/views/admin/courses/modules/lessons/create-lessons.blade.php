@extends('admin.layouts.app')

@section('title', "Cadastrar Nova Aula para o Módulo {$module->name}")

@section('content')

<h1 class="w-full text-3xl text-black pb-6">
    Cadastrar Nova Aula para o Módulo {{$module->name}}
</h1>

<div class="w-full  my-6 pr-0 lg:pr-2">

    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" action="{{ route('lessons.store', $module->id) }}" method="POST" >
           @include('admin.courses.modules.lessons._partials.form')
        </form>
    </div>
</div>

@endsection


