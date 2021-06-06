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
<div class="d-flex">
  <h6> Your Phone: <?php echo $phone; ?></h6>  
</div>
<div class="d-flex">
  <h6> Your Address: <?php echo $address; ?>  </h6>  
</div>
<div class="mt-4">
  <a href="/"> Continue to booking </a>
</div>