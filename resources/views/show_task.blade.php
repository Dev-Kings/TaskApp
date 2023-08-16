@extends('layouts.app')

@section('title', 'Show task')

@section('content')
    <div class="m-auto w-50">
        <div class="card">
            <div class="card-body">
                {{ $task->description }}
            </div>
            <div class="card-footer">
                {{ $task->created_at->diffForHumans() }}
                <form action="{{ route('task.destroy', $task->id) }}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger btn-sm float-end"
                    onclick="return confirm('Are you sure ?')">Delete</button>
                </form>
                <a href="{{ route('task.edit', $task->id) }}" class="btn btn-warning btn-sm float-end">Edit</a>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
@endsection