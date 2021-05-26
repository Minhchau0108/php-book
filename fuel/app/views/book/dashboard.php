<div>
    User Id : <?php echo Auth::get_user_id()[1] ?>
</div>
<div>
    Username : <?php echo Auth::get_screen_name() ?>
</div>
<div>
    Tong so don hang da dat la : <?php echo count($forms); ?>
</div>
<table class = "table">
    <thead>
    <tr>
        <th>Form Id</th>
        <th>Address</th>
        <th>Contact</th>
        <th>View detail</th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach($forms as $form) {
        ?>

        <tr>
            <td><?php echo $form['id']; ?></td>
            <td><?php echo $form['phone']; ?></td>
            <td><?php echo $form['address']; ?></td>
            <td>
                <a href = "/book/detail/<?php echo $form['id']; ?>">View detail</a>
            </td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>   