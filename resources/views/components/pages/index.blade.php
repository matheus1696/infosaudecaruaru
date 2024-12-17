@extends('adminlte::page')

@section('title', '')

@section('content_header')
    {{$header ?? ""}}
@stop

@section('content')
    <section class="pb-5">
        <!-- Alerta de Atulizações -->
        @include('components.alert.alert')

        <!-- Inicio de Componentização do Search -->
        <div>
            {{$search ?? ""}}
        </div>

        <!-- Inicio de Componentização do Conteiner -->
        <div>
            {{$body ?? ""}} 
        </div>
    </section>
@stop

@section('css')
    @include('components.pages.partials.css')
@endsection

@section('js')
    @include('components.pages.partials.js')
@endsection