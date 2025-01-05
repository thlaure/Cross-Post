@extends('layouts.app')

@section('title', __('messages.title.social_post_create'))

@section('content')
<h1 id="social-post-create-title">{{ __('messages.title.social_post_create') }}</h1>

@include('layouts.message-success')

<form method="POST" action="{{ route('post.social-posts', ['locale' => App::currentLocale()]) }}" aria-labelledby="social-post-create-title">
    @csrf
    @method('POST')

    <div>
        <label for="content">{{ __('messages.social_post.content') }}</label>
        <textarea
            name="content"
            id="content"
            cols="30"
            rows="10"
            class="@error('content') is-invalid @enderror"
            aria-describedby="content-help @error('content') content-error @enderror"
        >
            {{ old('content') }}
        </textarea>
        <div id="content-help">{{ __('messages.social_post.content_help', ['max' => config('app.custom.social_post.max_content_length')]) }}</div>
        @error('content')
            <div id="content-error" role="alert">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" aria-label="{{ __('messages.button.submit') }}">{{ __('messages.button.submit') }}</button>
</form>
@endsection
