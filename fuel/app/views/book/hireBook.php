<style>
img{
    width: 100px;
    height: 100px;
}
</style>


<?php if (count($books) == 0): ?>
    <div> Your cart is empty</div>
<?php endif; ?>
<?php
  if (count($books) > 0):
?>
<h3>YOUR SELECTION</div>
<table class = "table">
    <thead>
    <tr>
        <th>Book ID</th>
        <th>Image</th>
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
            <td><img src="<?php echo $book['url']; ?>"></img></td>
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
  </div>
  <div class="form-group">
    <label for="exampleInputAddress">Shipping Address</label>
    <input type="text" class="form-control" name="address">
  </div>
  <button type="submit" class="btn btn-primary mt-3">Send</button>
</form>
<?php endif; ?>