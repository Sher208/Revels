<?php  if($_SESSION['user_category'] == 'category head') :?>
<?php require APPROOT.'/views/inc/headerCH.php'; ?>

    <h1 class="mb-3 text-center">Category Head</h1>
    <table class="table">
  <thead class = "thead-dark">
    <tr>
      <th scope="col">Field</th>
      <th scope="col">Information</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Name :</th>
      <td><?php echo $data['categoryHead']->name ; ?></td>
    </tr>
    <tr>
      <th scope="row">Registration Number :</th>
      <td><?php echo $data['categoryHead']->regNo ; ?></td>
    </tr>
    <tr>
      <th scope="row">Event Name :</th>
      <td><?php echo $data['categoryHead']->event ; ?></td>
    </tr>
    <tr>
      <th scope="row">Tokens Available :</th>
      <td><?php echo $data['categoryHead']->token ; ?></td>
    </tr>
  </tbody>
</table>
</div>
<?php else : ?>
<?php redirect($_SESSION['user_category'].'s'); ?>
<?php  endif ; ?>
<?php require APPROOT.'/views/inc/footer.php'; ?>
