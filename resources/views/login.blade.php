@extends('layout')

@section('content')
    @include('navbar')
    <div class="container border border-5" style="max-width: 60%; margin-top: 10%">

        <form method="post" action="{{ route('signin') }}">
            @csrf

            <div class="row mb-2 mt-3 justify-content-center ">
                <div class="col-lg-4 justify-content-center ">
                    <h3 class="text-primary">Log In </h3>
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name='username' required>

                    @error('username')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row mb-2 justify-content-center ">
                <div class="col-lg-4 justify-content-center ">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name='password' required>

                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="row mb-2 justify-content-center ">
                <div class="col-lg-4 justify-content-center ">
                    @error('error')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
            </div>



            <div class="row mb-2 justify-content-center" style="margin-left: 16%">
                <div class="col-lg-4 justify-content-center ">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>



        </form>

    </div>


@endsection
