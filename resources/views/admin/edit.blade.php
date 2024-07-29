<!-- resources/views/admin/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Editar Usuario</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bona+Nova+SC&display=swap" rel="stylesheet">
    <style>
        h1 {
            font-family: 'Bona Nova SC', serif;
            color:chocolate;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Editar Usuario</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.users.update', $user) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="is_admin">Rol</label>
                <select class="form-control" id="is_admin" name="is_admin">
                    <option value="1" {{ $user->is_admin ? 'selected' : '' }}>Administrador</option>
                    <option value="0" {{ !$user->is_admin ? 'selected' : '' }}>Lector</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>