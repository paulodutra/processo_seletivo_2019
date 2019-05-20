<?php $__env->startSection('content'); ?>

  <a href="/usuarios/cadastro/" class="btn btn-success">Cadastrar</a>
  <hr>
  <table class="table table-striped">
    <thead>
        <tr>
          <td>#</td>
          <td>Nome</td>
          <td>E-mail</td>
          <td>Data Nascimento</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($usuario->id); ?></td>
            <td><?php echo e($usuario->nome); ?></td>
            <td><?php echo e($usuario->email); ?></td>
            <td><?php echo e(date('d/m/Y', strtotime($usuario->data_nascimento))); ?></td>
            <td><a href="/usuarios/atualizar/<?php echo e($usuario->id); ?>" class="btn btn-primary">Editar</a></td>
            <td>
               <form action="<?php echo e(url('usuarios/excluir', $usuario->id)); ?>" method="post">
                  <?php echo csrf_field(); ?>
                  <?php echo method_field('DELETE'); ?>
                  <button class="btn btn-danger" type="submit">Excluir</button>
                </form>
            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processo_seletivo_2019/desafio-3-laravel/resources/views/usuarios/index.blade.php ENDPATH**/ ?>