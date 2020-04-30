<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
  <a class="navbar-brand" href="<?php echo URLROOT; ?>"><?php echo SITENAME; ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>">Home</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>checkers/buy">Buy</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
    <?php if(isset($_SESSION['user_id'])) : ?>
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>users/logout">Logout</span></a>
    </li>
    <?php else : ?>
      <li class="nav-item active">
        <a class="nav-link" href="<?php echo URLROOT; ?>users/register">Register</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo URLROOT; ?>users/login">Login</a>
      </li>
    <?php endif; ?>

    </ul>
  </div>
</nav>