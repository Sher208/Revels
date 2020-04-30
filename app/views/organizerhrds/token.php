<?php  if($_SESSION['user_category'] == 'organizerhrd') :?>
<?php require APPROOT.'/views/inc/headerHRD.php'; ?>
<h1 class="mb-3 text-center">Give Token To Organizers</h1>
<?php foreach($data['user'] as $categoryHead) : ?>
    <?php if(strcmp($categoryHead->category, "volunteer") == 0) : ?>
        <div class="card card-body mb-3">
            <div class="bg-light p-2 mb-3">
                <h5>Name : <?php echo $categoryHead->name; ?></h5><h5> Event : <?php  echo $categoryHead->event ;?></h5>
                <form action="<?php echo URLROOT;?>organizerhrds/tokenup/<?php echo $categoryHead->id; ?>" method="post">
                    <h5><input type="checkbox" name="token" value="token">Add Token</h5>
                    <input type="submit" value="Submit" class="btn btn-primary">
                </form>
            </div>
        </div>
    <?php endif ; ?>
 <?php endforeach ; ?>
 </div>
<?php else : ?>
<?php redirect($_SESSION['user_category'].'s'); ?>
<?php  endif ; ?>
<?php require APPROOT.'/views/inc/footer.php'; ?>