<div class="card">

    @isset($title)

        <div class="card-header">

            <h5 class="card-title mb-0">

                {{ $title }}

            </h5>

        </div>

    @endisset

    <div class="card-body">

        {{ $slot }}

    </div>

</div>