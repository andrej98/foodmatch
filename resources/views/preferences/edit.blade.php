@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Preferences') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ $preference->id ? route('preferences.update', $preference->id) : route('preferences.store') }}">
                            @csrf
                            @method('POST')

                            <div class="form-group row">
                                <label for="vegetarian" class="col-md-4 col-form-label text-md-right">{{ __('Vegetarian') }}</label>

                                <div class="col-md-6">
                                    <input type="hidden" name="vegetarian" value="0">

                                    <input id="vegetarian" type="checkbox" class="form-control @error('vegetarian') is-invalid @enderror" name="vegetarian" value="1" {{ $preference->vegetarian ? 'checked' : '' }}>

                                    @error('vegetarian')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="vegan" class="col-md-4 col-form-label text-md-right">{{ __('Vegan') }}</label>

                                <div class="col-md-6">
                                    <input type="hidden" name="vegan" value="0">

                                    <input id="vegan" type="checkbox" class="form-control @error('vegan') is-invalid @enderror" name="vegan" value="1" {{ $preference->vegan ? 'checked' : '' }}>

                                    @error('vegan')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="nut_allergy" class="col-md-4 col-form-label text-md-right">{{ __('Allergic to nuts') }}</label>

                                <div class="col-md-6">
                                    <input type="hidden" name="nut_allergy" value="0">

                                    <input id="nut_allergy" type="checkbox" class="form-control @error('nut_allergy') is-invalid @enderror" name="nut_allergy" value="1" {{ $preference->nut_allergy ? 'checked' : '' }}>

                                    @error('nut_allergy')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="lactose_intolerance" class="col-md-4 col-form-label text-md-right">{{ __('Lactose intolerant') }}</label>

                                <div class="col-md-6">
                                    <input type="hidden" name="lactose_intolerance" value="0">
                                    <input id="lactose_intolerance" type="checkbox" class="form-control @error('lactose_intolerance') is-invalid @enderror" name="lactose_intolerance" value="1" {{ $preference->lactose_intolerance ? 'checked' : '' }}>

                                    @error('lactose_intolerance')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gluten_intolerance" class="col-md-4 col-form-label text-md-right">{{ __('Gluten intolerant')
}}</label>
<div class="col-md-6">
    <input type="hidden" name="gluten_intolerance" value="0">
    <input id="gluten_intolerance" type="checkbox" class="form-control @error('gluten_intolerance') is-invalid @enderror" name="gluten_intolerance" value="1" {{ $preference->gluten_intolerance ? 'checked' : '' }}>
    @error('gluten_intolerance')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
</div>


<div class="form-group row">
    <label for="local_food" class="col-md-4 col-form-label text-md-right">{{ __('Only local food') }}</label>

    <div class="col-md-6">
        <input type="hidden" name="local_food" value="0">
        <input id="local_food" type="checkbox" class="form-control @error('local_food') is-invalid @enderror" name="local_food" value="1" {{ $preference->local_food ? 'checked' : '' }}>

        @error('local_food')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="bio_food" class="col-md-4 col-form-label text-md-right">{{ __('Only BIO food') }}</label>

    <div class="col-md-6">
        <input type="hidden" name="bio_food" value="0">
        <input id="bio_food" type="checkbox" class="form-control @error('bio_food') is-invalid @enderror" name="bio_food" value="1" {{ $preference->bio_food ? 'checked' : '' }}>

        @error('bio_food')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="favorite_food" class="col-md-4 col-form-label text-md-right">{{ __('Favorite food') }}</label>

    <div class="col-md-6">
        <input id="favorite_food" type="text" class="form-control @error('favorite_food') is-invalid @enderror" name="favorite_food" value="{{ $preference->favorite_food }}" autocomplete="favorite_food" autofocus>

        @error('favorite_food')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>

<div class="form-group row mb-0">
<div class="col-md-6 offset-md-4">
    <button type="submit" class="btn btn-primary">
        {{ __('Save') }}
    </button>
</div>
</div>
</form>
@endsection
