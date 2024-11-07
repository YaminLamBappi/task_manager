@extends('layouts.app')

@section('content')
<h1>Edit Task</h1>

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('tasks.update', $task) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" class="form-control" value="{{ $task->title }}" required>
    </div>
    <div class="form-group">
        <label for="description">Description:</label>
        <textarea id="description" name="description" class="form-control">{{ $task->description }}</textarea>
    </div>
    <div class="form-check">
        <input type="checkbox" id="is_completed" name="is_completed" class="form-check-input" {{ $task->is_completed ? 'checked' : '' }}>
        <label for="is_completed" class="form-check-label">Completed</label>
    </div>
    <button type="submit" class="btn btn-primary">Update Task</button>
</form>
@endsection