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
    </div>
@endsection
