@extends('admin.layouts.app')

@section('title', 'Editar Curso')

@section('content')

<h1 class="w-full text-3xl text-black pb-6">Editar Curso  {{$course->name}}</h1>

<div class="w-full  my-6 pr-0 lg:pr-2">

    <div class="leading-loose">
        <form class="p-10 bg-white rounded shadow-xl" action="{{ route('courses.update', $course->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
           @include('admin.courses._partials.form')
        </form>
    </div>
</div>

@endsection
