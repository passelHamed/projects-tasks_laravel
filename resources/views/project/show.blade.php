@extends('layouts.app')

@section('title' , 'tasks')

@section('content')
    <header>
        <div class="text-align-center my-5 justify-content-between d-flex">
            <div class="text-dark h5">
                <a href="/project" style="text-decoration: none;">projects\{{ $project->title }}</a>
            </div>

            <div>
                <a href="/project/{{ $project->id }}/edit" class="btn btn-primary px-4" role="button">modifay project</a>
            </div>
        </div>
    </header>

    <section>
        <div class="row">
            <div class="col-lg-4">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="status">
                            @switch($project->status)
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
                                <a href="/project/{{ $project->id }}" style="text-decoration: none;">{{ $project->title }}</a>
                            </h5>
                            
                            <div class="card-text mt-4 mb-3">
                                {{ $project->description }}
                            </div>
                            
                            <div class="card-footer bg-transparent">
                                <div class="d-flex">
                                    <div class="d-flex align-items-center">
                                        <img src="/images/clock.svg" alt="">
                                        <div class="mr-2 ms-2 me-2">
                                            {{ $project->created_at->diffForHumans() }}
                                        </div>
                                    </div>
                            
                                    <div class="d-flex align-items-center mr-4 mt-1">
                                        <img src="/images/list-check.svg" alt="">
                                        <div class="mr-2">
                                            {{-- {{ count($oneproject->tasks) }} --}}
                                        </div>
                                    </div>
                            
                                    <div class="d-flex align-items-center ms-auto mt-3">
                                        <form action="/project/{{ $project->id }}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                                <input type="image" src="/images/trash.svg" class="btn-delete" alt="">
                                        </form>
                                    </div>
                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card shadow mt-5 mb-5 p-3">
                    <div class="card-body">
                        <form action="/project/{{ $project->id }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="form-select w-100" onchange="this.form.submit()">
                                <option value="0" {{ ($project->status == 0) ? 'selected' : ""}}>in progress</option>
                                <option value="1" {{ ($project->status == 1) ? "selected" : ""}}>completed</option>
                                <option value="2" {{ ($project->status == 2) ? "selected" : ""}}>canceled</option>
                            </select>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
    
                @foreach ($project->tasks as $task)
                    <div class="card d-flex flex-row p-3 align-items-center h5">
                        <div class="{{ $task->done ? 'checked muted' : '' }}">
                            {{ $task->body }}
                        </div>

                        <div class="ms-auto">
                            <form action="/project/{{ $project->id }}/tasks/{{ $task->id }}" method="POST">
                                @csrf
                                @method('PATCH')
                                <input type="checkbox" name="done" {{ $task->done ? 'checked' : ""}} class="form-check-input" onchange="this.form.submit()">
                            </form>
                        </div>

                        <div class="d-flex align-items-center mt-1 ms-3">
                            <form action="/project/{{ $task->project_id }}/tasks/{{ $task->id }}" method="POST">
                                @method('DELETE')
                                @csrf
                                    <input type="image" src="/images/trash.svg" class="btn-delete" alt="">
                            </form>
                        </div>

                    </div>
                @endforeach
    
                <div class="card">
                    <form action="/project/{{ $project->id }}/tasks" method="GET" class="d-flex">
                        @csrf
                        <input type="text" name="body" placeholder="add new task" class="form-control p-2 ml-2">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </form>
                </div>
    
            </div>
        </div>



    </section>
@endsection