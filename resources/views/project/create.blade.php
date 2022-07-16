@extends('layouts.app')

@section('title' , 'create new project')


@section('content')
    <div class="card shadow p-3">
        <div class="row justify-content-center text-right">
            <div class="col-10">
                <h3 class="font-weight-bold pb-5 text-center">
                    new project
                </h3>

                <form action="/project" method="post">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="title" class="mb-3 fw-light h4">Title</label>
                        <input type="text" name="title" class="form-control" id="title" value="">
                        @error('title')
                        <div class="text-danger">
                            <small>{{ $message }}</small>
                        </div>
                        @enderror
                    </div>
                    
                        <div class="form-group mb-3">
                            <label for="description" class="mb-3 fw-light h4">description</label>
                            <textarea name="description" class="form-control" id="description" rows="5" value=""></textarea>
                            @error('discription')
                            <div class="text-danger">
                                <small>{{ $message }}</small>
                            </div>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" class="btn btn-primary me-3" value="create">
                            <a href="/project" class="btn btn-danger">cancel</a>
                        </div>
                        
                    </form>
                    
                </div>
        </div>
    </div>
@endsection