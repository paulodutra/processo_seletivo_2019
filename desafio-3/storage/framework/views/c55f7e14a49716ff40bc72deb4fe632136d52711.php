<?php $__env->startSection('content'); ?>
<?php if($errors->any()): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
<form class="form-horizontal" method="post" action="<?php echo e(url('usuarios/cadastro')); ?>">
  <?php echo e(csrf_field()); ?>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="nome">Nome</label>
      <input type="text" class="form-control" name="nome" id="nome" placeholder="Nome">
    </div>
    <div class="form-group col-md-6">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="data_nascimento">Data de nascimento</label>
      <input type="text" class="form-control" name="data_nascimento" id="data_nascimento" placeholder="Data de nascimento">
    </div>
    <div class="form-group col-md-4">
      <label for="senha">Senha</label>
      <input type="password" class="form-control" name="senha"  id="senha" placeholder="Senha">
    </div>
    <div class="form-group col-md-4">
      <label for="confirma_senha">Confirmação de senha</label>
      <input type="password" class="form-control" name="confirma_senha" id="confirma_senha" placeholder="Confirmação de senha">
    </div>
  </div>
  <button class="btn btn-success" type="submit">Salvar</button>
</form>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/processo_seletivo_2019/desafio-3-laravel/resources/views/usuarios/create.blade.php ENDPATH**/ ?>