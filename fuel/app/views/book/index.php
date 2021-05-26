<style>
label {
  width: 100px;
  background:  	#A9A9A9;
  color:#FFFAFA;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 16px;
  cursor: pointer;
}
input:checked ~ label {
  background: #2522CA; 
}
img{
    width: 100px;
    height: 100px;
}
</style>

<form method="get" action="/book/index">
    <input type="text" class="form-control" id="search"
           placeholder="Search book" name="search_book_name"
           value="<?php echo $search_book_name; ?>"
    />
    <button type="submit" class="btn btn-primary"> Search </button>
</form>
<div class="mt-5 d-flex flex-column">
    <?php
    foreach ($categories as $category) {
    ?>
    <div>
        <a href = "/book/index?selected_category=<?php echo $category['name']; ?>"><?php echo $category['name']; ?></a>
    </div>
       
        <?php
    }
    ?>
</div>
<form method="POST" action="/book/hireBook">
<?php if (!Auth::member(100)): ?>
<button type="submit" name="submit">Check out</button>
<?php endif; ?>

<table class = "table">
    <thead>
    <tr>
        <th>Book Id</th>
        <th>Title</th>
        <th>Author</th>
        <th>Price</th>
        <th>Image</th>
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
            <td><img src="<?php echo $book['url']; ?>"></img></td>
            <td><?php echo $book['category_id']; ?></td>
            <?php if (Auth::member(100)): ?>
            <td>
                <a href = "/book/editBook/<?php echo $book['id']; ?>">Edit</a>
                <a href = "/book/deleteBook/<?php echo $book['id']; ?>">Delete</a>
            </td>
            <?php endif; ?>
            <?php if (!Auth::member(100)): ?>
            <td>
                <input type="checkbox" id="<?php echo $book['id']; ?>" value="<?php echo $book['id']; ?>" name="arrayBook[]" hidden/>
                <label for="<?php echo $book['id']; ?>">Select</label>
            </td>
            <?php endif; ?>
           
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>   
</form>
