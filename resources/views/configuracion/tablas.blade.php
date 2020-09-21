@extends('layouts.master')

@section('header')
    @include('partials.tablas.'.$header)
@endsection

@if(!empty($menu))
@section('lateral')
    @include('partials.tablas.'.$menu)
@endsection
@endif

@section('content')
    @include('layouts.notifications')
    @include('partials.tablas.'.$slug)
@endsection
