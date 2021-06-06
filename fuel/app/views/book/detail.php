<style>
img{
    width: 100px;
    height: 100px;
}
</style>

<h3>Detail order</div>
<table class = "table">
    <thead>
    <tr>
        <th>Book Id</th>
        <td>Image</td>
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