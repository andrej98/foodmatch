@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Preferences Details') }}</div>

                    <div class="card-body">
                        <div class="form-group row">
                            <label for="vegetarian" class="col-md-4 col-form-label text-md-right">{{ __('Vegetarian') }}</label>

                            <div class="col-md-6">
                                <p>{{ $preferences->vegetarian ? 'Yes' : 'No' }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vegan" class="col-md-4 col-form-label text-md-right">{{ __('Vegan') }}</label>

                            <div class="col-md-6">
                                <p>{{ $preferences->vegan ? 'Yes' : 'No' }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="allergic_to_nuts" class="col-md-4 col-form-label text-md-right">{{ __('Allergic to Nuts') }}</label>

                            <div class="col-md-6">
                                <p>{{ $preferences->allergic_to_nuts ? 'Yes' : 'No' }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lactose_intolerant" class="col-md-4 col-form-label text-md-right">{{ __('Lactose Intolerant') }}</label>

                            <div class="col-md-6">
                                <p>{{ $preferences->lactose_intolerant ? 'Yes' : 'No' }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="gluten_intolerant" class="col-md-4 col-form-label text-md-right">{{ __('Gluten Intolerant') }}</label>

                            <div class="col-md-6">
                                <p>{{ $preferences->gluten_intolerant ? 'Yes' : 'No' }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="only_bio_food" class="col-md-4 col-form-label text-md-right">{{ __('Only Bio Food') }}</label>

                            <div class="col-md-6">
                                <p>{{ $preferences->only_bio_food ? 'Yes' : 'No' }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="only_local_food" class="col-md-4 col-form-label text-md-right">{{ __('Only Local Food') }}</label>

                            <div class="col-md-6">
                                <p>{{ $preferences->only_local_food ? 'Yes' : 'No' }}</p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="favorite_food" class="col-md-4 col-form-label text-md-right">{{ __('Favorite Food') }}</label>

                            <div class="col-md-6">
                                <p>{{ $preferences->favorite_food }}</p>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <a href="{{ route('preferences.edit', $preferences->id) }}" class="btn btn-primary">Edit
                                </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endsection
