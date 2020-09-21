@extends('layouts.master')

@section('header')
    @include('partials.articulos.'.$header)
@endsection

@section('lateral')
    @include('partials.articulos.'.$menu)
@endsection

@section('content')
    @include('layouts.notifications')
    @include('partials.articulos.'.$slug)
@endsection
