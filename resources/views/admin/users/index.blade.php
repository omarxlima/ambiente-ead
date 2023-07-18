@extends('admin.layouts.app')

@section('title', 'Usuários')

@section('content')

@foreach ($users as $user)
        {{ dd($user)}}
@endforeach


@endsection
