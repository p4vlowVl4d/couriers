<?php require_once(ROOT.'/views/layouts/header.php');?>
<div class="container">
	<h3 class="col-sm-offset-3">Войти</h3>
  <?php if(isset($errors) && is_array($errors)):?>
    <div class="row">
    <?php foreach($errors as $error):?>
      <p class="warning-text col-sm-offset-3 col-sm-5"><?=$error;?></p>
    <?php endforeach;?>
    </div>
  <?php endif;?>
	<form class="form-inline col-sm-offset-3" method="post" action="#">
  <div class="form-group">
    <label class="sr-only" for="exampleInputEmail3">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail3" placeholder="Email">
  </div>
  <div class="form-group">
    <label class="sr-only" for="exampleInputPassword3">Password</label>
    <input type="password" name="password" class="form-control" id="exampleInputPassword3" placeholder="Password">
  </div>
  <button type="submit" class="btn btn-default" name="submit">Sign in</button>
</form>
<pre>
  <?php print_r($_POST);?>
</pre>

</div>

<?php require_once(ROOT.'/views/layouts/footer.php');?>