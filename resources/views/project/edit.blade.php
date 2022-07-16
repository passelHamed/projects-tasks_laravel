@extends('layouts.app')

@section('title' , 'modifay project')


@section('content')
    <div class="row justify-content-center text-right">
        <div class="col-10">
            <h3 class="font-weight-bold pb-5 text-center">
                new project
            </h3>

            <form action="/project/{{ $project->id }}" method="post">
                @csrf
                @method('PATCH')
                    <div class="form-group mb-3">
                        <label for="title" class="mb-3 fw-light h4">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="{{ $project->title }}">
                            @error('title')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="description" class="mb-3 fw-light h4">description</label>
                        <textarea name="description" class="form-control" id="description" rows="5" value="">{{ $project->description }}</textarea>
                            @error('discription')
                                <div class="text-danger">
                                    <small>{{ $message }}</small>
                                </div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary me-3" value="Modify">
                        <a href="/project" class="btn btn-danger">cancel</a>
                    </div>

            </form>

        </div>
    </div>
@endsection