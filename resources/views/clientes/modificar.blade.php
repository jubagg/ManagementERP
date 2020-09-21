
@extends('layouts.master')
@section('header')
    @include('partials.clientes.'.$header)
@endsection

@section('lateral')
    @include('partials.clientes.'.$menu)
@endsection

@section('content')
    @include('layouts.notifications')
    @include('partials.clientes.'.$slug)
@endsection
