@extends('layouts.app');

@section('content')
    <header>
        <div class="text-align-center my-5 justify-content-between d-flex">
            <div class="text-dark h5">
                <a href="/project" style="text-decoration: none;">projects</a>
            </div>

            <div>
                <a href="/project/create" class="btn btn-primary px-4" role="button">new project</a>
            </div>
        </div>
    </header>

    <section>
        <div class="row">
            @forelse ($project as $oneproject)
            <div class="col-md-4 mb-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="status">
                            @switch($oneproject->status)
                            @case(1)
                            <span class="text-success mb-2">completed</span>
                            @break
                            @case(2)
                            <span class="text-danger">canceled</span>
                            @break
                            @default
                            <span class="text-warning">in progress</span>
                            @endswitch
                            <h5 class="font-weight-bold card-title">
                                <a href="/project/{{ $oneproject->id }}" style="text-decoration: none;">{{ $oneproject->title }}</a>
                            </h5>
                            
                            <div class="card-text mt-4 mb-3">
                                {{ $oneproject->description }}
                            </div>
                            
                            @include('project.footerCard')
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="m-auto align-content-center text-center">
                <h3>There are no projects</h3>
                <div class="mt-5">
                    <a href="/project/create" class="btn btn-primary align-items-center btn-lg d-inline-flex" role="button">Create a new project</a>
                </div>
            </div>
            @endforelse
        </div>
    </section>
@endsection