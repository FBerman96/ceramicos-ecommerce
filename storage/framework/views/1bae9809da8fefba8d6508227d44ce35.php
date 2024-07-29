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
        <?php if($errors->any()): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        <?php endif; ?>
        <form action="<?php echo e(route('admin.users.update', $user)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="name">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo e($user->name); ?>" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo e($user->email); ?>" required>
            </div>
            <div class="form-group">
                <label for="is_admin">Rol</label>
                <select class="form-control" id="is_admin" name="is_admin">
                    <option value="1" <?php echo e($user->is_admin ? 'selected' : ''); ?>>Administrador</option>
                    <option value="0" <?php echo e(!$user->is_admin ? 'selected' : ''); ?>>Lector</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
            <a href="<?php echo e(route('admin.index')); ?>" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\ceramicos-ecommerce_final\ceramicos-ecommerce\resources\views/admin/edit.blade.php ENDPATH**/ ?>