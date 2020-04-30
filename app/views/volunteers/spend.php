<?php  if($_SESSION['user_category'] == 'volunteer') :?>
<?php 
    require APPROOT.'/views/inc/headervol.php';
?>
<h1 class="text-center">Spend Your Tokens</h1>
                <form action="<?php echo URLROOT;?>volunteers/spend" method="post">
                    <div class="form-group">
                        <label for="email">Enter Tokens to spend:</label>
                        <input type="number" name="spend" class = "form-control form-control-lg <?php echo (!empty($data['spend_err'])) ? 'is-invalid' : ''; ?>">
                        <span class="invalid-feedback"><?php echo $data['spend_err']; ?></span>
                    </div>
                    <div class="row">
                        <div class="col">
                            <input type="submit" value="Login" class ="btn btn-success btn-block">
                            <img src="https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl='<?php echo $data['count']; ?>'" title="Link to Google.com">
                        </div>
                    </div>
                </form>
                </div>
<?php else : ?>
<?php redirect($_SESSION['user_category'].'s'); ?>
<?php  endif ; ?>
<?php require APPROOT.'/views/inc/footer.php'; ?>