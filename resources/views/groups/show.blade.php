@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ $group->name }}</h1>

        <p>Code: {{ $group->code }}</p>

        <h2>Members:</h2>

        <ul>
            @foreach ($members as $member)
                <li>{{ $member->name }} ({{ $member->email }})</li>
            @endforeach
        </ul>

        <h2>Matched restaurants:</h2>

        <ul>
            @foreach ($matches as $match)
                <li><a class="pr-4 pb-4" href="{{ route('restaurants.read', $match) }}">{{ $match->name }}</a></li>
            @endforeach
        </ul>
    </div>
@endsection
