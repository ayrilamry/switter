@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="row">
            <div class="col-8 offset-2">
                <div class="row">
                    <h1>{{ __('Create new post')}}</h1>
                </div>
                <div class="form-group row mb-3">
                    <label for="caption" class="col-md-4 col-form-label">{{ __('Caption') }}</label>
    
                    <input id="caption" type="text" class="form-control @error('caption') is-invalid @enderror" name="caption" value="{{ old('caption') }}" autocomplete="caption">
                    @error('caption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="form-group row mb-3">
                    <label for="image" class="col-md-4 col-form-label">{{ __('Image') }}</label>
    
                    <input id="image" type="file" class="form-control"  name="image" value="{{ old('image ') }}">
                    @error('image')
                        <strong>{{ $message }}</strong>
                    @enderror
                </div>
    
                <div class="row mb-0">
                    <div class="col-md-6 pt-3">
                        <button class="btn btn-primary">
                            {{ __('Create new post') }}
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
