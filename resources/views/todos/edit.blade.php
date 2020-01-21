@extends('layouts.app')

@section('title')
    Create Todos
@endsection

@section('content')
<h1 class="text-center my-5">Edit Todos</h1>
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">Edit Todos :: {{ $todo->name }} </div>
            <div class="card-body">
                <form action=" {{ route('update.todos', $todo->id) }} " method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ $todo->name }}">
                        @error('name')
                            <div class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <textarea name="description" placeholder="Description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5">{{ $todo->description }}
                        </textarea>
                        @error('description')
                            <div class="error invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group text-center">
                        <button class="btn btn-success">Create Todo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection