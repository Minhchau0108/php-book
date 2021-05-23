<div>
    User Id : <?php echo Auth::get_user_id()[1] ?>
</div>
<div>
    Username : <?php echo Auth::get_screen_name() ?>
</div>

<?php if (count($books) == 0): ?>
    <div> Your cart is empty</div>
<?php endif; ?>
<?php
  if (count($books) > 0):
?>
<h3>List books</div>
<table class = "table">
    <thead>
    <tr>
        <th>Book Id</th>
        <th>Title</th>
        <th>Author</th>
        <th>Price</th>
    </tr>
    </thead>

    <tbody>
    <?php
    foreach($books as $book) {
        ?>
        <tr>
            <td><?php echo $book['id']; ?></td>
            <td><?php echo $book['title']; ?></td>
            <td><?php echo $book['author']; ?></td>
            <td><?php echo $book['price']; ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>

<form method="POST" action="/book/saveOrder" >
  <div class="form-group">
    <label for="exampleInputEmail1">Phone Contact</label>
    <input type="text" class="form-control" name="phone">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputAddress">Shipping Address</label>
    <input type="text" class="form-control" name="address">
  </div>
  <button type="submit" class="btn btn-primary">Send</button>
</form>
<?php endif; ?>