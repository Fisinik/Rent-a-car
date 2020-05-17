<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Admin Page</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/blog-post.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script type="text/javascript">
$(document).ready(function(){
    $('.search-box input[type="text"]').on("keyup input", function(){
        /* Get input value on change */
        var inputVal = $(this).val();
        var resultDropdown = $(this).siblings(".result");
        if(inputVal.length){
            $.get("backend-search.php", {name: inputVal}).done(function(data){
                // Display the returned data in browser
                resultDropdown.html(data);
            });
        } else{
            resultDropdown.empty();
        }
    });
    
    // Set search input value on click of result item
    $(document).on("click", ".result p", function(){
        $(this).parents(".search-box").find('input[type="text"]').val($(this).text());
        $(this).parent(".result").empty();
    });
});
</script>
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Admin Page</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="single-service.php">Services</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row" style="margin-top:100px">

      <!-- Post Content Column -->
      <div class="col-lg-8" >

      <?php include('db/product-list.php'); ?>  

      </div>

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Search Widget -->
        
          <h5 class="card-header">Search</h5>
          
            <div class="search-box">
              <input type="text" class="form-control" autocomplete="off" placeholder="Search for..."  />
              <div class="result"></div>
            </div>
          
        

        <!-- Categories Widget -->
        <div class="card my-4">
          <h5 class="card-header">Product Properties</h5>
          <div class="card-body">
            <div class="row">
              <a href="" data-toggle="modal" data-target="#largeModal1"><i class="fa fa-user"></i> Add </a>
            </div>
            <div class="row">
              <a href="" data-toggle="modal" data-target="#largeModal2"><i class="fa fa-user"></i> Remove </a>
            </div>
            <div class="row">
              <a href="" data-toggle="modal" data-target="#largeModal3"><i class="fa fa-user"></i> Edit </a>
            </div>
          </div>
        </div>
        <?php
            $copy_date = "Copyright 2019";
            if (preg_match('/2020/', $copy_date)===0) {
              $copy_date = preg_split('/ /', $copy_date , -1, PREG_SPLIT_NO_EMPTY);

              $copy_date = preg_replace("([0-9]+)", "2020", $copy_date);
              printf("<p>%s %u</p>", $copy_date[0], $copy_date[1]);
            }
          ?>
<!-- Add product -->
        <div class="modal fade" id="largeModal1" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Add Product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form class="form-horizontal" method="POST" action="db/product-add.php" enctype="multipart/form-data">
            <fieldset>
            <div class="control-group">
            <span>Choose file</span>  
              <input type="file" name="fileToUpload" id="fileToUpload">
              <br/>
              <!-- <input type="submit" name="fupload" id="fupload"> -->
            </div>

            <div class="control-group">
              <label class="control-label" for="userid">Name:</label>
              <div class="controls">
                <input required="" id="name" name="name" type="text" class="form-control" placeholder="Name " class="input-medium" required="">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="userid">Type:</label>
              <div class="controls">
                <select required="" id="type" name="type" type="text" class="form-control" class="input-medium" required="">
                <option value="" disabled selected hidden>Type</option>
                  <option value="SUV">SUV</option>
                  <option value="Roadster">Roadster</option>
                  <option value="Coupe">Coupe</option>
                  <option value="Minivan">Minivan</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="userid">Price:</label>
              <div class="controls">
                <input required="" id="price" name="price" type="number" class="form-control" placeholder="Price " class="input-medium" required="">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="userid">Color:</label>
              <div class="controls">
                <input required="" id="color" name="color" type="text" class="form-control" placeholder="Color " class="input-medium" required="">
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="add_product"></label>
              <div class="controls">
                <button name="fupload" id="fupload" class="btn btn-success">Save changes</button>
              </div>
            </div>
            </fieldset>
            </form>

        </div>
    </div>
  </div>
</div>
<!--  Delete product -->
<div class="modal fade" id="largeModal2" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Remove Product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form class="form-horizontal" method="POST" action="db/product-delete.php">
            <fieldset>
            <div class="control-group">
              <label class="control-label" for="userid">ID:</label>
              <div class="controls">
                <input required="" id="id" name="id" type="text" class="form-control" placeholder="ID " class="input-medium" required="">
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="remove_product"></label>
              <div class="controls">
                <button id="remove_product" name="remove_product" class="btn btn-success">Save changes</button>
              </div>
            </div>
            </fieldset>
            </form>

        </div>
    </div>
  </div>
</div>
<!-- Edit product -->
<div class="modal fade" id="largeModal3" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Edit Product</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form class="form-horizontal" method="POST" action="db/product-edit.php">
            <fieldset>

            <div class="control-group">
              <label class="control-label" for="userid">ID:</label>
              <div class="controls">
                <input required="" id="id" name="id" type="text" class="form-control" placeholder="ID " class="input-medium" required="">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="userid">Name:</label>
              <div class="controls">
                <input required="" id="name" name="name" type="text" class="form-control" placeholder="Name " class="input-medium" required="">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="userid">Type:</label>
              <div class="controls">
                <select required="" id="type" name="type" type="text" class="form-control" class="input-medium" required="">
                <option value="" disabled selected hidden>Type</option>
                  <option value="SUV">SUV</option>
                  <option value="Roadster">Roadster</option>
                  <option value="Coupe">Coupe</option>
                  <option value="Minivan">Minivan</option>
                </select>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="userid">Price:</label>
              <div class="controls">
                <input required="" id="price" name="price" type="number" class="form-control" placeholder="Price " class="input-medium" required="">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label" for="userid">Color:</label>
              <div class="controls">
                <input required="" id="color" name="color" type="text" class="form-control" placeholder="Color " class="input-medium" required="">
              </div>
            </div>

            <!-- Button -->
            <div class="control-group">
              <label class="control-label" for="add_product"></label>
              <div class="controls">
                <button id="add_product" name="add_product" class="btn btn-success">Save changes</button>
              </div>
            </div>
            </fieldset>
            </form>

        </div>
    </div>
  </div>
</div>


      </div>

    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>
