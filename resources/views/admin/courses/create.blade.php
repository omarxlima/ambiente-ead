@extends('admin.layouts.app')

@section('title', 'Cadastrar Novo Usuário')

@section('content')

<h1 class="w-full text-3xl text-black pb-6">Adicionar Novo Curso</h1>

<div class="w-full  my-6 pr-0 lg:pr-2">

    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" action="{{ route('courses.store') }}" method="POST" enctype="multipart/form-data">
           @include('admin.courses._partials.form')
        </form>
    </div>
</div>

@endsection
