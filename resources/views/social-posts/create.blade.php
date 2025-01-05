@extends('layouts.app')

@section('title', __('messages.title.social_post_create'))

@section('content')
<h1 id="social-post-create-title" class="text-3xl font-bold mb-8">{{ __('messages.title.social_post_create') }}</h1>

@include('layouts.message-success')

<form method="POST" action="{{ route('post.social-posts', ['locale' => App::currentLocale()]) }}" aria-labelledby="social-post-create-title">
    @csrf
    @method('POST')

    <div class="flex flex-col gap-2">
        <label for="content" class="text-lg" hidden>{{ __('messages.social_post.content') }}</label>
        <textarea
            name="content"
            id="content"
            cols="30"
            rows="10"
            class="border-solid border-2 rounded-lg @error('content') border-red-500 @enderror"
            aria-describedby="content-help @error('content') content-error @enderror"
        >
            {{ old('content') }}
        </textarea>

        <div
            id="content-help"
            class="text-stone-500 text-sm"
        >
            {{ __('messages.social_post.content_help', ['max' => config('app.custom.social_post.max_content_length')]) }}
        </div>
    
        @error('content')
            <div id="content-error" class="text-red-500" role="alert">{{ $message }}</div>
        @enderror
    </div>

    <button
        type="submit"
        class="shadow-lg mt-4 px-4 py-2 border-solid border-2 rounded-lg font-semibold border-orange-600
        bg-gradient-to-r from-orange-600 via-red-500 to-pink-500
        hover:bg-gradient-to-r hover:from-orange-500 hover:via-red-400 hover:to-pink-400
        border-orange-600 bg-orange-600 text-white hover:bg-orange-500 hover:border-orange-500"
        aria-label="{{ __('messages.button.submit') }}"
    >
        {{ __('messages.button.submit') }}
    </button>
</form>
@endsection
