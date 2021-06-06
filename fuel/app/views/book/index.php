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

<ul class="nav nav-pills mb-3">
    <?php
    foreach ($categories as $category) {
    ?>
    <li class="nav-item">
        <a class="nav-link text-capitalize" href = "/book/index?selected_category=<?php echo $category['name']; ?>"><?php echo $category['name']; ?></a>
    </li>
       
        <?php
    }
    ?>
</ul>

<form method="get" action="/book/index" class="d-flex" >
    <input type="text" class="form-control" id="search"
           placeholder="Search book" name="search_book_name"
           value="<?php echo $search_book_name; ?>"
    />
    <button type="submit" class="btn btn-primary"> Search </button>
</form>

<form method="POST" action="/book/hireBook" class="mt-3">
<?php if (!Auth::member(100)): ?>
<button type="submit" name="submit" class="btn btn-success" >Check out</button>
<?php endif; ?>

<?php if (Auth::member(100)): ?>
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
<?php endif; ?>

<?php if (!Auth::member(100)): ?>
    <div class="row">
    <div class="col-lg-8 mx-auto">

    <ul class="list-group shadow">
    <?php
    foreach($books as $book) {
        ?>
 <li class="list-group-item">
 <div class="media align-items-lg-center flex-column flex-lg-row p-3">
 </div><img src="<?php echo $book['url']; ?>" alt="Generic placeholder image" width="200" class="ml-lg-5 order-1 order-lg-2">
            <div class="media-body order-2 order-lg-1">
              <h5 class="mt-0 font-weight-bold mt-2">  <?php echo $book['title']; ?></h5>
              <p class="font-italic text-muted mb-0 small">   <?php echo $book['author']; ?></p>
              <div class="d-flex align-items-center justify-content-between mt-1">
                <h6 class="font-weight-bold my-2">  <?php echo $book['price']; ?> USD</h6>
                <input type="checkbox" id="<?php echo $book['id']; ?>" value="<?php echo $book['id']; ?>" name="arrayBook[]" hidden/>
                <label for="<?php echo $book['id']; ?>">Select</label>
              </div>
           
          </div>
        </li>
        <?php
    }
    ?>
      </ul>
    </div>
  </div>
<?php endif; ?>   
</form>
