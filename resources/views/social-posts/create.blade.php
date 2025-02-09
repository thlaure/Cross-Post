@extends('layouts.app')

@section('title', __('messages.title.social_post_create'))

@section('content')
<h1 id="social-post-create-title" class="text-3xl font-bold mb-8">{{ __('messages.title.social_post_create') }}</h1>

@include('layouts.message-success')

<form method="POST" action="{{ url('/api/social-posts') }}" aria-labelledby="social-post-create-title">
    @csrf
    @method('POST')

    <div class="flex flex-col gap-2">
        <label for="content" class="text-lg" hidden>{{ __('messages.social_post.content') }}</label>
        <textarea
            name="content"
            id="content"
            cols="30"
            rows="10"
            class="border-solid border-2 rounded-lg @error('content') border-error-border @enderror"
            aria-describedby="content-help @error('content') content-error @enderror"
        >
            {{ old('content') }}
        </textarea>

        <div
            id="content-help"
            class="text-muted text-sm"
        >
            {{ __('messages.social_post.content_help', ['max' => config('app.custom.social_post.max_content_length')]) }}
        </div>
    
        @error('content')
            <div id="content-error" class="text-error-text" role="alert">{{ $message }}</div>
        @enderror
    </div>

    <button
        type="submit"
        class="shadow-lg mt-4 px-4 py-2 border-solid border-1 rounded-lg font-semibold border-tertiary text-secondary
        bg-primary hover:opacity-90 hover:shadow-2xl"
        aria-label="{{ __('messages.button.submit') }}"
    >
        {{ __('messages.button.submit') }}
    </button>
</form>
@endsection
