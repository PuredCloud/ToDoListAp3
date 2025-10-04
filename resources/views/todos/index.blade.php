@extends('layouts.app')

@section('content')
<style>
    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }
    .success-msg {
        padding: 10px;
        background: #d4edda;
        border: 1px solid #c3e6cb;
        color: #155724;
        border-radius: 4px;
        margin-bottom: 15px;
    }
    .info-msg {
        padding: 10px;
        background: #d1ecf1;
        border: 1px solid #bee5eb;
        color: #0c5460;
        border-radius: 4px;
        margin-bottom: 15px;
    }
    .task-list {
        list-style: none;
    }
    .task-item {
        padding: 12px;
        border: 1px solid #ddd;
        border-radius: 4px;
        margin-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .task-content {
        flex-grow: 1;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .task-text {
        flex-grow: 1;
    }
    .completed {
        text-decoration: line-through;
        color: #999;
    }
    .task-actions {
        display: flex;
        gap: 5px;
    }
    .btn-add {
        padding: 8px 16px;
        background: #28a745;
        color: white;
        border: none;
        border-radius: 4px;
        text-decoration: none;
        display: inline-block;
    }
    .btn-add:hover {
        background: #218838;
        text-decoration: none;
    }
    .btn-edit {
        padding: 5px 10px;
        background: #ffc107;
        color: #333;
        border: none;
        border-radius: 4px;
        text-decoration: none;
    }
    .btn-edit:hover {
        background: #e0a800;
        text-decoration: none;
    }
    .btn-delete {
        padding: 5px 10px;
        background: #dc3545;
        color: white;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }
    .btn-delete:hover {
        background: #c82333;
    }
</style>

<div class="header">
    <h2>All Tasks</h2>
    <a href="{{ route('todos.create') }}" class="btn-add">+ Add New Task</a>
</div>

@if(session('success'))
    <div class="success-msg">{{ session('success') }}</div>
@endif

@if($todos->isEmpty())
    <div class="info-msg">No tasks yet. Create your first task!</div>
@else
    <ul class="task-list">
        @foreach($todos as $todo)
            <li class="task-item">
                <div class="task-content">
                    <form action="{{ route('todos.toggle', $todo) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="checkbox" 
                               {{ $todo->is_completed ? 'checked' : '' }}
                               onchange="this.form.submit()">
                    </form>
                    
                    <div class="task-text {{ $todo->is_completed ? 'completed' : '' }}">
                        <strong>{{ $todo->title }}</strong>
                        @if($todo->description)
                            <br><small>{{ $todo->description }}</small>
                        @endif
                    </div>
                </div>
                
                <div class="task-actions">
                    <a href="{{ route('todos.edit', $todo) }}" class="btn-edit">Edit</a>
                    
                    <form action="{{ route('todos.destroy', $todo) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </div>
            </li>
        @endforeach
    </ul>
@endif
@endsection