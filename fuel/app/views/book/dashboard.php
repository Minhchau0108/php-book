
<div>
    Hello, customer <?php echo Auth::get_screen_name() ?>
</div>
<div>
    Your total order : <?php echo count($forms); ?>
</div>
<table class = "table">
    <thead>
    <tr>
        <th>Order Id</th>
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