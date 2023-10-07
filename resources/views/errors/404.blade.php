@extends('errors::illustrated-layout')

@section('code', '404')
@section('title', __('exceptions.http.404_title_page'))

@section('image')
<div style="background-image: url('{{ asset('assets/images/404.svg') }}');" class="absolute pin bg-cover bg-no-repeat md:bg-left lg:bg-center"></div>
@endsection

@section('message', __('exceptions.http.404_message_page'))
