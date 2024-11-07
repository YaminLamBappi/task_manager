@extends('layouts.app')

@section('content')
    <h1>Task List</h1>
    <a href="{{ route('tasks.form') }}" class="btn btn-primary mb-3">Create New Task</a>

    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif


    @if ($tasks->count())
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Completed</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td>{{ $task->is_completed ? 'Yes' : 'No' }}</td>
                        <td>
                            <a href="{{ route('tasks.edit', $task) }}" class="btn btn-info btn-sm">Edit</a>
                            <form action="{{ route('tasks.destroy', $task) }}" method="POST" onsubmit="return confirmDelete()" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" >Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No tasks found.</p>
    @endif
@endsection

<script src="{{ asset('js/tasks.js') }}"></script>