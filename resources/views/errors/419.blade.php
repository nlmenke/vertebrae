@extends('errors::illustrated-layout')

@section('code', '419')
@section('title', __('exceptions.http.419_title'))

@section('image')
<div style="background-image: url('{{ asset('assets/images/403.svg') }}');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center"></div>
@endsection

@section('message', __('exceptions.http.419_message'))
