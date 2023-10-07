@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ trans('auth.verify.email') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ trans('auth.verify.link_sent') }}
                        </div>
                    @endif

                    {{ trans('auth.verify.check_email') }}
                    {{ trans('auth.verify.no_email') }},
                    <form class="d-inline" method="post" action="{{ route('verification.resend') }}">
                        @csrf
		                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ trans('auth.verify.resend_email') }}</button>.
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
