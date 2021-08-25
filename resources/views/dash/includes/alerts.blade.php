@if ($errors->any())
    <div class="bg-yellow-100 text-sm text-center rounded-lg py-2 mb-5">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@if (session('message'))
    <div class="bg-green-100 text-sm text-center rounded-lg py-2 mb-5">
        {!! session('message') !!}
    </div>
@endif

@if (session('error'))
    <div class="bg-red-100 text-sm text-center rounded-lg py-2 mb-5">
        {{ session('error') }}
    </div>
@endif

@if (session('info'))
    <div class="bg-blue-50 text-sm text-center rounded-lg py-2 mb-5">
        {{ session('info') }}
    </div>
@endif
