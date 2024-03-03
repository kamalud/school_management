@if (!empty(session('success')))
    <div class="alert alert-success alert-dismissible fadein" role="alert">{{ session('success') }}</div>
@endif

@if (!empty(session('errors')))
    <div class="alert alert-danger alert-dismissible fadein" role="alert">{{ session('errors') }}</div>
@endif