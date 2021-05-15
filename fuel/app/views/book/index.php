<form method="get" action="/book/index">
    <input type="text" class="form-control" id="search"
           placeholder="Search book" name="search_book_name"
           value="<?php echo $search_book_name; ?>"
    />
    <button type="submit" class="btn btn-primary"> Search </button>
</form>
<ul class="mt-5">
    <?php
    foreach ($categories as $category) {
    ?>
        <a href = "/book/index?selected_category=<?php echo $category['name']; ?>"><?php echo $category['name']; ?></a>
        <?php
    }
    ?>
</ul>
<table class = "table">
    <thead>
    <tr>
        <th>Book Id</th>
        <th>Title</th>
        <th>Author</th>
        <th>Price</th>
        <th>Category ID</th>
        <th></th>
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
            <td><?php echo $book['category_id']; ?></td>
            <?php if (Auth::member(100)): ?>
            <td>
                <a href = "/book/editBook/<?php echo $book['id']; ?>">Edit</a>
                <a href = "/book/deleteBook/<?php echo $book['id']; ?>">Delete</a>
            </td>
            <?php endif; ?>
            <?php if (!Auth::member(100)): ?>
            <td>
                <a href = "/book/hireBook/<?php echo $book['id']; ?>">Hire Book</a>
              
            </td>
            <?php endif; ?>
           
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>
<ul>
</ul>