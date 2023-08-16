@extends('layouts.app')

@section('title', 'All Tasks')

@section('content')
<h1>List of All Tasks</h1>

<a href="{{ URL::signedRoute('task.create') }}" class="btn btn-success btn-sm mb-2">
    New task
</a>

@if(Session::has('success'))
<div class="alert alert-success">
    {{ Session::get('success') }}
</div>
@endif

<ul class="list-group">
    @foreach($tasks as $task)
    <li class="list-group-item">
        <a href="{{ route('task.show', $task->id) }}">{{ $task->id }} : {{ $task->description ?? 'No description'}} </a>
    </li>
    @endforeach
</ul>

@endsection