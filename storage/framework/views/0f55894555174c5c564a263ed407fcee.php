

<?php $__env->startSection('content'); ?>
<div class="container">
    <h2>Mi Carrito</h2>
    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('receipt')): ?>
        <div class="alert alert-info">
            <pre><?php echo e(session('receipt')); ?></pre>
        </div>
    <?php endif; ?>
    <?php if($cartItems->isEmpty()): ?>
        <p>No tienes productos en tu carrito.</p>
    <?php else: ?>
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Precio</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $cartItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($item->product->name); ?></td>
                        <td><?php echo e($item->quantity); ?></td>
                        <td>$<?php echo e($item->product->price); ?></td>
                        <td>$<?php echo e($item->product->price * $item->quantity); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <form action="<?php echo e(route('cart.checkout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit" class="btn btn-primary">Comprar</button>
        </form>
    <?php endif; ?>
    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-secondary mt-3">Volver al catálogo</a>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\ferna\Desktop\Nueva carpeta (2)\ceramicos-ecommerce_final\ceramicos-ecommerce\resources\views/cart/index.blade.php ENDPATH**/ ?>