@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!

                    <div class="d-grid">
                        <a href="{{ route('create_todo') }}" class="btn btn-dark" type="button">Add Todo</a>
                    </div>

                    @if(session('message'))
                        <div class="alert alert-success my-2" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    <div class="row my-4">
                        <!-- All Todos -->
                        <div class="col-lg-6">
                            <h2>All Todos</h2>
                            @include('includes.todo_list', ['items' => $all, 'show_button' => false, 'delete_button' => false])
                        </div>
                        <!-- My Todos -->
                        <div class="col-lg-6">
                            <h2>My Todos</h2>
                            @include('includes.todo_list', ['items' => $my, 'show_button' => true, 'delete_button' => true])
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(function() {
        $('#change_completed_form').on('submit', function() {
            console.log('completed')
        })
    })
</script>
@endpush