<div>
    User Id : <?php echo Auth::get_user_id()[1] ?>
</div>
<div>
    Username : <?php echo Auth::get_screen_name() ?>
</div>
<h3>List books</div>
<?php
    foreach($arrayBook as $item) {
        ?>
       <div> id <?php echo $item; ?></div>
    <?php
    }
    ?>