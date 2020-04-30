<?php  if($_SESSION['user_category'] == 'organizer') :?>
<?php require APPROOT.'/views/inc/headerOrg.php'; ?>
<div class="container">
    <h1 class="mb-3 text-center">Organizer</h1>
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
      <td><?php echo $data['user']->name ; ?></td>
    </tr>
    <tr>
      <th scope="row">Registration Number :</th>
      <td><?php echo $data['user']->regNo ; ?></td>
    </tr>
    <tr>
      <th scope="row">Event Name :</th>
      <td><?php echo $data['user']->event ; ?></td>
    </tr>
    <tr>
      <th scope="row">Email :</th>
      <td><?php echo $data['user']->email; ?></td>
    </tr>
    <tr>
      <th scope="row">Phone Number :</th>
      <td><?php echo $data['user']->phoneNo; ?></td>
    </tr>
    <tr>
      <th scope="row">Tokens Available :</th>
      <td><?php echo $data['user']->token ; ?></td>
    </tr>
  </tbody>
</table>
</div>
</div>
<?php else : ?>
<?php redirect($_SESSION['user_category'].'s'); ?>
<?php  endif ; ?>
<?php require APPROOT.'/views/inc/footer.php'; ?>