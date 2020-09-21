@extends('layouts.master')

@section('header')
    @include('partials.stock.'.$header)
@endsection

@section('lateral')
    @include('partials.stock.'.$menu)
@endsection

@section('content')
    @include('layouts.notifications')
    @include('partials.stock.'.$slug)
@endsection
