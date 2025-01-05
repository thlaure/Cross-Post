@if (session('success'))
<div class="my-4 bg-success-background border border-success-border text-success-text px-4 py-3 rounded-lg relative text-center" role="alert">
    <p>{{ session('success') }}</p>
    <button class="flex items-center justify-center transition-all w-8 h-8 rounded-md hover:text-success-text-hover absolute top-1.5 right-1.5" type="button">
        @include('icons.close', ['class' => 'w-5 h-5'])
    </button>
</div>
@endif
