@extends('layouts.app')
@section('content')
    <div class="mt-4 jumbotron text-center post-card">
        <h1>Welcome to Laravel</h1>
        <p>This Our landing page, hope we do something good...</p>
        <p>
            <a class=" btn btn-primary btn-lg" href="{{ route('login') }}" role="button">{{ __('Login') }}</a>
            <a class=" btn btn-success btn-lg" href="{{ route('register') }}" role="button">{{ __('Register') }}</a>
        </p>
    </div>

@endsection
