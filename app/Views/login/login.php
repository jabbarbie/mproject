<?= $this->extend($config->viewLayout) ?>
<?= $this->section('main') ?>
<p class="login-box-msg"><?= view('Myth\Auth\Views\_message_block') ?></p>

<form action="<?= route_to('login') ?>" method="post">
	<?= csrf_field() ?>

	<?php if ($config->validFields === ['email']): ?>
		<div class="input-group mb-3">
			<input type="email" name="login" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.email')?>">
			<div class="invalid-feedback">
				<?= session('errors.login') ?>
			</div>
			<div class="input-group-append">
			<div class="input-group-text">
				<span class="fas fa-envelope"></span>
			</div>
			</div>
		</div>
	<?php else: ?>
	<div class="input-group mb-3">
			<input type="text" name="login" class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.emailOrUsername')?>">
			<div class="invalid-feedback">
				<?= session('errors.login') ?>
			</div>
			<div class="input-group-append">
			<div class="input-group-text">
				<span class="fas fa-envelope"></span>
			</div>
			</div>
		</div>	
	<?php endif; ?>

        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?=lang('Auth.password')?>">
		  <div class="invalid-feedback">
			<?= session('errors.password') ?>
		  </div>
		  <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
		
          <div class="col-8">
			<?php if ($config->allowRemembering): ?>
		    <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
			<?php endif; ?>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block"><?=lang('Auth.loginAction')?></button>
          </div>
          <!-- /.col -->
        </div>
      </form>

     
      <!-- /.social-auth-links -->
	  <?php if ($config->allowRegistration) : ?>
      <p class="mb-1">
        <a href="forgot">I forgot my password</a>
      </p>
      <p class="mb-0">
        <a href="register" class="text-center">Register a new membership</a>
      </p>
	  <?php endif; ?>

    </div>


<?= $this->endSection() ?>
