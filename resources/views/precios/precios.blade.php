@extends('layouts.master')

@section('header')
    @include('partials.precios.'.$header)
@endsection

@if(!empty($menu))
@section('lateral')
    @include('partials.precios.'.$menu)
@endsection
@endif

@section('content')
    @include('layouts.notifications')
    @include('partials.precios.'.$slug)
@endsection
