<?php require APPROOT.'/views/inc/headerAdmin.php'; ?>
<h1 class="mb-3 text-center">Please Confirm the Users</h1>
<?php foreach($data['members'] as $member) : ?>
    <?php if($member->category == '') : ?>
        <div class="card card-body mb-3">
            <div class="bg-light p-2 mb-3">
                <h4>Name : <?php echo $member->name; ?></h4><h4> Created On: <?php  echo $member->created_at ;?></h4>
            </div>
            <a href="<?php URLROOT; ?>assign/<?php echo $member->id ; ?>" class = "btn btn-dark">Confirm & Assign</a>
        </div>
    <?php endif ; ?>
 <?php endforeach ; ?>
<?php require APPROOT.'/views/inc/footer.php'; ?>