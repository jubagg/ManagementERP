@php
    $titulo = 'Listado clientes';
    $slug = 'listado_clientes';
    $icon = 'fas fa-users';
    $header ='listado_clientesh';
    $menu = null;

@endphp
@extends('layouts.master')




@section('header')
    @include('partials.clientes.'.$header)
@endsection
@if(!empty($menu))
@section('lateral')
    @include('partials.clientes.'.$menu)
@endsection
@endif

@section('content')

    @include('partials.clientes.'.$slug)
@endsection
