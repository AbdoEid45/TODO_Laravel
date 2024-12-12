<!-- resources/views/todos/edit.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Todo</title>
    <!-- Link to Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Edit Todo</h1>

        <!-- Display Success or Error Messages -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @elseif(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Form to Edit Todo -->
        <form action="{{ route('todos.update', $todo->id) }}" method="POST" class="shadow p-4 rounded bg-light">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="name" class="form-label">Todo Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $todo->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group mb-3">
                <label for="description" class="form-label">Todo Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4" required>{{ old('description', $todo->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group text-end">
                <button type="submit" class="btn btn-primary">Update Todo</button>
            </div>

            <div class="form-group text-start mt-3">
                <a href="{{ route('todos.index') }}" class="btn btn-secondary">Back to Todo List</a>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS (optional for interaction) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
