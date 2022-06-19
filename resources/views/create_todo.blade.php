@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add Todo</div>

                <div class="card-body">

                    <form method="POST" action="{{ route('store_todo') }}">
                        @csrf
                        <textarea name="title" class="form-control" placeholder="Title">{{ old('title') }}</textarea>
                        @error('title')
                            <p class="text-danger my-2">
                                {{ $message }}
                            </p>
                        @enderror

                        <div class="d-grid my-4">
                            <button type="submit" class="btn btn-dark">Add</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection