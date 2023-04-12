@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Preferences</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('users.preferences.update') }}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="vegetarian" class="col-md-4 col-form-label text-md-right">Vegetarian</label>

                            <div class="col-md-6">
                                <input id="vegetarian" type="checkbox" class="form-control @error('vegetarian') is-invalid @enderror" name="vegetarian" value="1" {{ $preferences->vegetarian ? 'checked' : '' }}>

                                @error('vegetarian')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="vegan" class="col-md-4 col-form-label text-md-right">Vegan</label>

                            <div class="col-md-6">
                                <input id="vegan" type="checkbox" class="form-control @error('vegan') is-invalid @enderror" name="vegan" value="1" {{ $preferences->vegan ? 'checked' : '' }}>

                                @error('vegan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nut_allergy" class="col-md-
