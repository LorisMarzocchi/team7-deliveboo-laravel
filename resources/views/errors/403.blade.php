@extends('errors.layout.base')
@section ('content')
<div class="container max-w-2xl mx-auto mt-52 flex items-center">
    <h1 class="text-center text-3xl w-6/12">Errore 403! Non sei autorizzato!</h1>
    <img src="{{ Vite::asset('public/img/tacos.jpg') }}" alt="tacos" class="w-6/12">
</div>
@endsection