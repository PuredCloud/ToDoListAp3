@extends('layouts.app')

@section('content')
<style>
    .form-container {
        max-width: 600px;
        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .error-msg {
        color: #dc3545;
        font-size: 14px;
        margin-top: 5px;
    }
    .form-actions {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
    }
    .btn-cancel {
        padding: 8px 16px;
        background: #6c757d;
        color: white;
        border: none;
        border-radius: 4px;
        text-decoration: none;
    }
    .btn-cancel:hover {
        background: #5a6268;
        text-decoration: none;
    }
</style>

<h2>Create New Task</h2>

<div class="form-container">
    <form action="{{ route('todos.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="title">Title *</label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   value="{{ old('title') }}"
                   required>
            @error('title')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" 
                      name="description" 
                      rows="4">{{ old('description') }}</textarea>
            @error('description')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-actions">
            <a href="{{ route('todos.index') }}" class="btn-cancel">Cancel</a>
            <button type="submit">Create Task</button>
        </div>
    </form>
</div>
@endsection