@if (Session::has('success'))
    <div class="alert alert-success position-fixed text-end" style="right: 20px; z-index: 99999;">
        <p>{{ Session::get('success') }}</p>
    </div>
@endif

@if (Session::has('error'))
    <div class="alert alert-danger position-fixed text-end" style="right: 20px; z-index: 99999;">
        <p>{{ Session::get('error') }}</p>
    </div>
@endif

@if (Session::has('info'))
    <div class="alert alert-info position-fixed text-end" style="right: 20px; z-index: 99999;">
        <p>{{ Session::get('info') }}</p>
    </div>
@endif
