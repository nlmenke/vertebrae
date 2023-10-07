@extends('errors::illustrated-layout')

@section('code', '503')
@section('title', __('exceptions.http.503_title'))

@section('image')
<div style="background-image: url('{{ asset('assets/images/503.svg') }}');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center"></div>
@endsection

@section('message', __($exception->getMessage() ?: 'exceptions.http.503_message'))
