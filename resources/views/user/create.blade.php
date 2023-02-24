@extends('layouts.app')


@section('title', 'Cadastro')
@section('slot')

    <div class="w-[700px] flex flex-col items-center justify-center my-6">
       <livewire:user-form  />
    </div>

@endsection
