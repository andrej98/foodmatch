@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <a href="{{ route('restaurants.showOne') }}" class="btn btn-primary">Swipe!</a>
                        <a href="{{ route('groups.index') }}" class="btn btn-primary">Groups</a>
                        @if ($preference)
                            <a href="{{ route('preferences.edit', $preference) }}" class="btn btn-primary">Preferences</a>
                        @else
                            <a href="{{ route('preferences.create') }}" class="btn btn-primary">Preferences</a>
                        @endif
                    @endsection

                </div>
            </div>
        </div>
    </div>
</div>
