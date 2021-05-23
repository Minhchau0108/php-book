<h3>Order Summary</div>
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
<div>
  <h3> Your Phone</h1>  <?php echo $phone; ?>
</div>
<div>
<h3> Your Address</h1>  <?php echo $address; ?>  
</div>
<div>
  <a href="/"> Continue to booking </a>
</div>