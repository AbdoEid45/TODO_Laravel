<!-- resources/views/todos/create.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Todo</title>
    <!-- Link to Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h3>Create a New Todo</h3>
                    </div>
                    <div class="card-body">
                        <!-- Success Message (optional) -->
                        @if(session('success'))
                            <div class="alert alert-success text-center">
                                {{ session('success') }}
                            </div>
                        @endif

                        <!-- Form Start -->
                        <form action="{{ route('todos.store') }}" method="POST">
                            @csrf

                            <!-- Todo Name -->
                            <div class="form-group mb-4">
                                <label for="name" class="form-label">Todo Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Enter todo name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Todo Description -->
                            <div class="form-group mb-4">
                                <label for="description" class="form-label">Todo Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description" rows="4" placeholder="Describe the task" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="form-group d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary px-4 py-2">Create Todo</button>
                            </div>
                        </form>
                        <!-- Form End -->

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS (optional for interaction) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
