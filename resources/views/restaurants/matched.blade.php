@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                           You have matched with these groups: {{$matchedGroups}}
                        </div>
                    </div>

                    <div class="card-footer">
                        <a href="{{ route('restaurants.showOne') }}" class="btn btn-primary">Continue swiping!</a>
                        <a href="/groups" class="btn btn-primary">Your groups</a>
                    </div>
                </div>

            </div>
        </div>
    @endsection
