@extends('layouts.app')

@section('content')
<h1>Create Task</h1>

<form action="{{ route('tasks.create') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ old('title') }}" class="form-control @error('title') is-invalid @enderror">
        @error('title')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror">{{ old('description') }}</textarea>
        @error('description')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-success">Create Task</button>
</form>
@endsection