@extends('layouts.master')

@section('header')
    @include('partials.articulos.'.$header)
@endsection

@if(!empty($menu))
@section('lateral')
    @include('partials.articulos.'.$menu)
@endsection
@endif

@section('content')
    @include('layouts.notifications')
    @include('partials.articulos.'.$slug)
@endsection
