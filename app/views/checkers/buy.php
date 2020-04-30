<?php  if($_SESSION['user_category'] == 'checker') :?>
<?php require APPROOT.'/views/inc/headerCheck.php'; ?>
<div class="container" style="text-align: center">
		<h1> Scan </h1>
		<br><br>

		<video id="preview"></video>

    	<div style="padding:20px;" class="row">
      		<div class="col">
      			<button style="padding:10px;font-size:18px;" id="scan" class="btn btn-success btn-sm">start scaning</button>
      		</div>
     		<div class="col">
      			<button style="padding:10px;font-size:18px;" id="stop" class="btn btn-warning btn-sm disabled">stop scanning</button>
      		</div>
    	</div>
	</div>
	</div>
<?php else : ?>
<?php redirect($_SESSION['user_category'].'s'); ?>
<?php  endif ; ?>
<?php require APPROOT.'/views/inc/footercamera.php'; ?>