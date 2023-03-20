@if (session('status'))
    <div class="alert alert-{{ session('status') }}" role="alert">
        {{ session('message') }}
    </div>
@endif
