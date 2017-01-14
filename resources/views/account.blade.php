@extends('layouts.master')

@section('title')
    Account
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="page-header">
                    <h1>{{ $user->username }}</h1>
                    <h6>{{ $user->name }}, {{ $user->location }}</h6>
                    <p><b>Email:</b> {{ $user->email }}</p>
                    <p><b>Bio: </b> {{ $user->bio }}</p>
                    <p><a href="{{ route('account') }}">Change account settings</a></p>
                </div>
            </div>
            <div class="col-md-4">
                @if (Storage::disk('local')->has($user->username . '-' . $user->id . '.jpg'))
                    <section class="row new-post">
                        <div class="col-md-6 col-md-offset-3">
                            <img src="{{ route('account.image', ['filename' => $user->username . '-' . $user->id . '.jpg']) }}" alt="" class="img-responsive">
                        </div>
                    </section>
                @endif
            </div>
        </div>
    </div>
@endsection