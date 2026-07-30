<header class="mb-3">
    <div class="d-flex justify-content-between align-items-center">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>

        <div class="d-flex align-items-center gap-3 ms-auto">
            <span class="text-muted small d-none d-md-inline">
                {{ auth()->user()->name }}
            </span>
            <span class="badge bg-primary rounded-pill d-none d-md-inline">
                {{ ucfirst(str_replace('_', ' ', auth()->user()->role)) }}
            </span>
            <a href="{{ route('profile.edit') }}" class="btn btn-outline-secondary btn-sm rounded-circle p-1"
               title="Profile">
                <i class="bi bi-person-circle fs-5"></i>
            </a>
        </div>
    </div>
</header>
