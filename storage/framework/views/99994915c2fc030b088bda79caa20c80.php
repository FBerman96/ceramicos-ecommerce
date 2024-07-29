<!-- resources/views/admin/index.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Administración de Usuarios</title>
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
        <h1 class="mb-4">Administración de Usuarios</h1>
        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($user->id); ?></td>
                    <td><?php echo e($user->name); ?></td>
                    <td><?php echo e($user->email); ?></td>
                    <td><?php echo e($user->is_admin ? 'Administrador' : 'Lector'); ?></td>
                    <td>
                        <a href="<?php echo e(route('admin.users.edit', $user)); ?>" class="btn btn-primary btn-sm">Modificar</a>
                        <form action="<?php echo e(route('admin.users.destroy', $user)); ?>" method="POST" style="display:inline-block;">
                            <?php echo csrf_field(); ?>
                            <?php echo method_field('DELETE'); ?>
                            <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
</body>
</html><?php /**PATH C:\xampp\htdocs\ceramicos-ecommerce_final\ceramicos-ecommerce\resources\views/admin/index.blade.php ENDPATH**/ ?>