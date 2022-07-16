<div class="card-footer bg-transparent">
    <div class="d-flex">
        <div class="d-flex align-items-center">
            <img src="/images/clock.svg" alt="">
            <div class="mr-2 ms-2 me-2">
                {{ $oneproject->created_at->diffForHumans() }}
            </div>
        </div>

        <div class="d-flex align-items-center mr-4 mt-1">
            <img src="/images/list-check.svg" alt="">
            <div class="mr-2 ">
                {{ count($oneproject->tasks) }}
            </div>
        </div>

        <div class="d-flex align-items-center ms-auto mt-3">
            <form action="/project/{{ $oneproject->id }}" method="POST">
                @method('DELETE')
                @csrf
                    <input type="image" src="images/trash.svg" class="btn-delete" alt="">
            </form>
        </div>

    </div>
</div>