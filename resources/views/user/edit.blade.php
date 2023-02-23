@extends('layouts.app')


@section('title', 'Editar')
@section('slot')

    <div class="w-[700px] flex items-center justify-center my-6">
       <livewire:user-form  :user="$user" />
    </div>

@endsection
