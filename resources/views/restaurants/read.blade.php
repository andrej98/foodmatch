
@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div class="card">
                    <div class="card-header">
                        <h3>{{ $restaurant->name }}</h3>
                    </div>
                    <div class="card-body">
                        <p><strong>Address:</strong> {{ $restaurant->address }}</p>
                        <p><strong>Description:</strong> {{ $restaurant->description }}</p>
                        <p><strong>Rating:</strong> {{ $averageRating > 0 ? round($averageRating, 1) : 'Not enough ratings' }}</p>
                        <p><strong>Vegetarian:</strong> {{ $restaurant->vegetarian ? 'Yes' : 'No' }}</p>
                        <p><strong>Vegan:</strong> {{ $restaurant->vegan ? 'Yes' : 'No' }}</p>
                        <p><strong>Nut Allergy:</strong> {{ $restaurant->nut_allergy ? 'Yes' : 'No' }}</p>
                        <p><strong>Lactose Intolerance:</strong> {{ $restaurant->lactose_intolerance ? 'Yes' : 'No' }}</p>
                        <p><strong>Gluten Intolerance:</strong> {{ $restaurant->gluten_intolerance ? 'Yes' : 'No' }}</p>
                        <p><strong>Bio Food:</strong> {{ $restaurant->bio_food ? 'Yes' : 'No' }}</p>
                        <p><strong>Local Food:</strong> {{ $restaurant->local_food ? 'Yes' : 'No' }}</p>
                        <p><strong>Favorite Food:</strong> {{ $restaurant->favorite_food }}</p>
                    </div>


                    <div class="card-footer">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @elseif ($rated)
                        <p>You already rated this restaurant.</p>
                        @else
                            <a href="{{ route('restaurants.review', $restaurant) }}" class="btn btn-primary">Review restaurant</a>
                        @endif

                    </div>
                </div>

            </div>
        </div>
    @endsection
