 <?php  if(Session::has('flash_notice')): ?>
 	<div class="alert alert-danger m-t-10 m-0 m-b-10">
		<button type="button" class="alert-close"  data-dismiss="alert">×</button>
     	<div id="flash_notice"><?php echo Session::get('flash_notice') ?></div>
    </div>
<?php endif; ?>
<?php  if(Session::has('flash_success')): ?>
	<div class="alert alert-success m-t-10 m-0 m-b-10">
        <button type="button" class="alert-close" data-dismiss="alert">×</button>
        <div id="flash_success"><?php echo Session::get('flash_success') ?></div>
    </div>
<?php endif; ?>
<?php  if(isset($errors) && count($errors) > 0) { ?>
    <div class="alert alert-danger m-t-10 m-0 m-b-10">
  	    <button type="button" class="alert-close" data-dismiss="alert">×</button>
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
<?php } ?>
