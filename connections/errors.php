
<?php  if (count($errors) > 0) : ?>

  <div class="alert alert-danger" role="alert">

  	<?php foreach ($errors as $error) : ?>

  	  <p class="alert-inline-text"><?php echo $error ?></p>

  	<?php endforeach ?>

  </div>

<?php  endif ?>

<?php  if (count($good) > 0) : ?>

  <div class="alert alert-danger" role="alert" style="background-color:green; opacity:0.7;">

  	<?php foreach ($good as $goods) : ?>

  	  <p class="alert-inline-text"><?php echo $goods ?></p>

  	<?php endforeach ?>

  </div>

<?php  endif ?>
