<?php require APPROOT.'/views/inc/header.php'; ?>
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-3"><?php echo $data['title']; ?></h1>
        <p class="lead">Welcome to the System Admin Portal </p>
        <ol type="A">
            <li>The database is created called revels and has 1 table called users which should have field :</li>
            <ul style="list-style-type:disc">
                <li>id(:autoincrement)</li>
                <li>name</li>
                <li>regNo</li>
                <li>phoneNo</li>
                <li>email</li>
                <li>category</li>
                <li>event</li>
                <li>token</li>
                <li>password</li>
                <li>created_at</li>
            </ul>
            <li>Category of admin has to be assigned in the database .</li>
            <li>Scripts are placed in footer and qrcode is in footercamera inside app->view->inc</li>
            <li>Basic configuration is changed in app->config->config.php .</li>
            <li>Navbar and basic structure of the pages are in app->view .</li>
        </ol>  
    </div>
</div>

<?php require APPROOT.'/views/inc/footer.php'; ?>