@if (session('success'))
<div class="my-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded-lg relative text-center" role="alert">
    <p>{{ session('success') }}</p>
    <button class="flex items-center justify-center transition-all w-8 h-8 rounded-md text-green-700 hover:text-green-500 absolute top-1.5 right-1.5" type="button">
        @include('icons.close', ['class' => 'w-5 h-5'])
    </button>
</div>
@endif
