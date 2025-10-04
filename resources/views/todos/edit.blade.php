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
    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 8px;
        margin-bottom: 20px;
    }
    .checkbox-group input[type="checkbox"] {
        width: auto;
    }
    .checkbox-group label {
        margin: 0;
        font-weight: normal;
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

<h2>Edit Task</h2>

<div class="form-container">
    <form action="{{ route('todos.update', $todo) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="title">Title *</label>
            <input type="text" 
                   id="title" 
                   name="title" 
                   value="{{ old('title', $todo->title) }}"
                   required>
            @error('title')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" 
                      name="description" 
                      rows="4">{{ old('description', $todo->description) }}</textarea>
            @error('description')
                <div class="error-msg">{{ $message }}</div>
            @enderror
        </div>

        <div class="checkbox-group">
            <input type="checkbox" 
                   id="is_completed" 
                   name="is_completed" 
                   value="1"
                   {{ old('is_completed', $todo->is_completed) ? 'checked' : '' }}>
            <label for="is_completed">Mark as completed</label>
        </div>

        <div class="form-actions">
            <a href="{{ route('todos.index') }}" class="btn-cancel">Cancel</a>
            <button type="submit">Update Task</button>
        </div>
    </form>
</div>
@endsection