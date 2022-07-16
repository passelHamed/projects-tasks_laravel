@extends('layouts.app')

@section('title' , 'Profile personly')

@section('content')


    <div class="row">
        <div class="col-md-6 mx-auto">
            <div class="card-body shadow mt-3 p-3">
                <div class="">
                    <div class="text-center">
                        <img src="{{ asset('storage/'.auth()->user()->image ) }}" alt="" width="82px" height="82px">
                    </div>
                    <h3 class="text-center mt-2">{{ auth()->user()->name }}</h3>
                </div>
                <div class="mt-2">
                    <form action="/profile" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <div class="form-group mt-3 mb-3">
                            <label for="name" class="h5">your Name</label>
                            <input type="text" name="name" id="name" class="form-control mt-2" value="{{ auth()->user()->name }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="email" class="h5">your Email</label>
                            <input type="email" name="mail" id="email" class="form-control mt-2" value="{{ auth()->user()->email }}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="pass" class="h5">your password</label>
                            <input type="password" name="password" id="pass" class="form-control mt-2">
                        </div>

                        <div class="form-group mb-3">
                            <label for="pass2" class="h5">confirm password</label>
                            <input type="password" name="password-confirmation" id="pass2" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="image" class="h5">change your image</label>
                            <div class="custom-file">
                                <input type="file" name="image" id="image" class="custom-file-input mt-2">
                                <label for="image" id="image-label" class="custon-file-label text-left" data-browse="show"></label>
                            </div>
                        </div>

                        <div class="form-group flex-row-reverse mt-3">
                            <button type="submit" class="btn btn-primary me-2">Save edits</button>
                            <button type="submit" class="btn btn-danger" form="logout">logout</button>
                        </div>
                    </form>
                </div>

                <form action="/logout" method="post" id="logout">
                    @csrf
                </form>
            </div>
        </div>
    </div>



@endsection