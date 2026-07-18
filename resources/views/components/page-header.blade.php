<div class="page-heading mb-4">

    <div class="d-flex justify-content-between align-items-center">

        <div>

            <h3 class="mb-1">{{ $title }}</h3>

            @isset($subtitle)
                <p class="text-muted mb-0">
                    {{ $subtitle }}
                </p>
            @endisset

        </div>

        <div>

            {{ $slot }}

        </div>

    </div>

</div>