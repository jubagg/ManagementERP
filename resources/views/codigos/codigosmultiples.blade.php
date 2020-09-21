@extends('layouts.master')

@section('header')
    @include('partials.codigosmultiples.'.$header)
@endsection

@if(!empty($menu))
@section('lateral')
    @include('partials.codigosmultiples.'.$menu)
@endsection
@endif

@section('content')
    @include('layouts.notifications')
    @include('partials.codigosmultiples.'.$slug)
@endsection
