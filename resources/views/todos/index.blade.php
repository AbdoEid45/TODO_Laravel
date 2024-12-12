<!-- resources/views/todos/index.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Todo List</h1>

        <!-- Success message -->
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Todos List -->
        <div class="list-group">
            @foreach($todos as $todo)
                <div class="list-group-item d-flex justify-content-between align-items-center">
                    <div>
                        <strong>{{ $todo->name }}</strong> <br>
                        <small>{{ $todo->description }}</small>
                    </div>
                    <div>
                        <!-- Edit button -->
                        <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-warning btn-sm me-2">Edit</a>
                        
                        <!-- Delete button -->
                        <form action="{{ route('todos.destroy', $todo->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Create New Todo Link -->
        <div class="text-center mt-4">
            <a href="{{ route('todos.create') }}" class="btn btn-primary">Create New Todo</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
