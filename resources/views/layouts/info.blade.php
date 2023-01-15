@if (session('success'))
    <p class="text-success">
        {{ session('success') }}
    </p>
@endif

@if(session('error'))
    <p class="text-danger">
        {{ session('error') }}
    </p>
@endif