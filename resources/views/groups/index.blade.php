@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Groups') }}</div>

                <div class="card-body">
                    @if(count($groups) !== 0)
                    <ul>
                        @foreach($groups as $group)
                        <li>
                            <div class="d-flex">
                                <a class="pr-4 pb-4" href="{{ route('groups.show', $group) }}">{{ $group->name }}</a>
                                <form action="{{ route('groups.leave', ['group' => $group->id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Leave group</button>
                                </form>
                            </div>

                        </li>
                        @endforeach

                    </ul>
                    @else
                    <p>You are not a member of any group.</p>
                    @endif

                    <a href="{{ route('groups.create') }}" class="btn btn-primary">Create new group</a>
                    <a href="{{ route('groups.showJoin') }}" class="btn btn-primary">Join existing group</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
