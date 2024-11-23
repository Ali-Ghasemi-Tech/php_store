<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="../assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="../assets/vendor/simple-datatables/style.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/style.css" rel="stylesheet">

</head>

<body>
<?php
  require "../db/connection.php";
  require "../modules/search.php";

  $conn = connect();
?>
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">StoreAdmin</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="./products_panel.php">
        <input type="text" name="search" placeholder="Search" title="Enter search keyword">
        <button type="submit" name="search_submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Lorem Ipsum</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Atque rerum nesciunt</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Sit rerum fuga</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-chat-left-text"></i>
            <span class="badge bg-success badge-number">3</span>
          </a><!-- End Messages Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
            <li class="dropdown-header">
              You have 3 new messages
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-1.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Maria Hudson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>4 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>Anna Nelson</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>6 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="message-item">
              <a href="#">
                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                <div>
                  <h4>David Muldon</h4>
                  <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                  <p>8 hrs. ago</p>
                </div>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="dropdown-footer">
              <a href="#">Show all messages</a>
            </li>

          </ul><!-- End Messages Dropdown Items -->

        </li><!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">K. Anderson</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Kevin Anderson</h6>
              <span>Web Designer</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="dashboard.php">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->

      <li class="nav-item">
        <a class="nav-link" data-bs-target="#components-nav" href="category_panel.php">
          <i class="bi bi-menu-button-wide "></i><span>categories</span><i class="bi"></i>
        </a>
        <a class="nav-link" data-bs-target="#components-nav" href="products_panel.php">
          <i class="bi bi-menu-button-wide"></i><span>products</span><i class="bi"></i>
        </a>

        <a class="nav-link" data-bs-target="#components-nav" href="content_management.php">
          <i class="bi bi-menu-button-wide"></i><span>Content Management</span><i class="bi"></i>
        </a>


      </li><!-- End Icons Nav -->

    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Files</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Files</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-8">
          <div class="row">
            <!-- Customers Card -->
            <div class="col-xxl-4 col-xl-12">
              <div class="card info-card customers-card">
                <!-- NEW File -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                  New File
                </button>
                <div class="modal fade" id="basicModal" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">New File</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                     
                      <div class="modal-body">
                        <form enctype="multipart/form-data" id="addFile" action="../db/content/addContent.php" method="post" name='addFile'  enctype="multipart/form-data">
                            <input type="file" name="file">
                        </form>
                      </div>
                      <div class="modal-footer">
                        <input type="button" class="btn btn-secondary" data-bs-dismiss="modal" value= 'close'>
                        <input type="submit" name="submit" class="btn btn-primary" form='addFile' value = 'save changes'/>
                      </div>
                    </div>
                  </div>
                </div><!-- End Basic Modal-->
              </div>

            </div><!-- End Customers Card -->

            <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Images</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">file</th>
                        <th scope="col">format</th>
                        <th scope="col">size</th>
                        <th scope="col">actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $query = "SELECT * FROM content WHERE format = 'jpeg' or format = 'webp'";
                      $result = $conn->query($query);

                      while($row = $result->fetch_assoc()){
                      $name = $row['name'];
                      $format = $row['format'];
                      $size = $row['size'];
                      $path = $row['path'];
                      $id = $row['content_id'];

                      $lines = $result->num_rows;
                      
                      echo "<tr>
                            <td><image src = '../$path' style = 'width:5vw'></td>
                            <td> ".$format. "</td>
                            </td>
                            <td> ".$size / 1000 . " kb</td>
                            <td>
                            <a href='../".$path."'>Download</a>
                            <a href='../db/content/deleteContent.php?id=$id'>Delete</a>
                            </td>
                            </tr>";
                            $lines --;
                      
                    }
                      ?>
                    </tbody>
                  </table>

                </div>

                <!-- EDIT MODAL -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" id="editForm" action="../db/updateProduct.php?id=<?php echo $id; ?>" method="post">
                          <input type="hidden" name="product_id" id="product_id">
                          <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            title: <input type="text" class="form-control" id="title" name="title" required>
                            description: <input type="text" class="form-control" id="description" name="description" required>
                            price: <input type="number" class="form-control" id="price" name="price" required>
                            category_id: <select name="category_id" id="category_id" require>
                            <?php
                            $query= "SELECT category_id , title FROM categories";
                            $result = $conn->query($query);
                            if($result && $result->num_rows > 0){
                              while($row = $result->fetch_assoc()){
                                echo "<option value='{$row['category_id']}'>{$row['title']}</option>";
                              }
                            }
                            ?>
                            </select>
                            image: <input type="file" name="img">
                          </div>
                          <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Videos</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">file</th>
                        <th scope="col">format</th>
                        <th scope="col">size</th>
                        <th scope="col">actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $query = "SELECT * FROM content WHERE format= 'mp4'";
                      $result = $conn->query($query);

                      while($row = $result->fetch_assoc()){
                      $name = $row['name'];
                      $format = $row['format'];
                      $size = $row['size'];
                      $path = $row['path'];
                      $id = $row['content_id'];

                      $lines = $result->num_rows;
                      
                      echo "<tr>
                            <td><video width='320' height='240' controls>
                                  <source src='../$path' type='video/mp4'>
                                  Your browser does not support the video tag.
                                </video></td>
                            <td> ".$format. "</td>
                            </td>
                            <td> ".$size / 1000 . " kb</td>
                            <td>
                            <a href='../".$path."'>Download</a>
                            <a href='../db/content/deleteContent.php?id=$id'>Delete</a>
                            </td>
                            </tr>";
                            $lines --;
                      
                    }
                      ?>
                    </tbody>
                  </table>

                </div>

                <!-- EDIT MODAL -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" id="editForm" action="../db/updateProduct.php?id=<?php echo $id; ?>" method="post">
                          <input type="hidden" name="product_id" id="product_id">
                          <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            title: <input type="text" class="form-control" id="title" name="title" required>
                            description: <input type="text" class="form-control" id="description" name="description" required>
                            price: <input type="number" class="form-control" id="price" name="price" required>
                            category_id: <select name="category_id" id="category_id" require>
                            <?php
                            $query= "SELECT category_id , title FROM categories";
                            $result = $conn->query($query);
                            if($result && $result->num_rows > 0){
                              while($row = $result->fetch_assoc()){
                                echo "<option value='{$row['category_id']}'>{$row['title']}</option>";
                              }
                            }
                            ?>
                            </select>
                            image: <input type="file" name="img">
                          </div>
                          <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>

              <!-- Recent Sales -->
            <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">pdf</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">file</th>
                        <th scope="col">format</th>
                        <th scope="col">size</th>
                        <th scope="col">actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $query = "SELECT * FROM content WHERE format = 'pdf'";
                      $result = $conn->query($query);

                      while($row = $result->fetch_assoc()){
                      $name = $row['name'];
                      $format = $row['format'];
                      $size = $row['size'];
                      $path = $row['path'];
                      $id = $row['content_id'];

                      $lines = $result->num_rows;
                      
                      echo "<tr>
                            <td><a href= '../$path'>$name.pdf</a></td>
                            <td> ".$format. "</td>
                            </td>
                            <td> ".$size / 1000 . " kb</td>
                            <td>
                            <a href='../".$path."'>Download</a>
                            <a href='../db/content/deleteContent.php?id=$id'>Delete</a>
                            </td>
                            </tr>";
                            $lines --;
                      
                    }
                      ?>
                    </tbody>
                  </table>

                </div>

                <!-- EDIT MODAL -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" id="editForm" action="../db/updateProduct.php?id=<?php echo $id; ?>" method="post">
                          <input type="hidden" name="product_id" id="product_id">
                          <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            title: <input type="text" class="form-control" id="title" name="title" required>
                            description: <input type="text" class="form-control" id="description" name="description" required>
                            price: <input type="number" class="form-control" id="price" name="price" required>
                            category_id: <select name="category_id" id="category_id" require>
                            <?php
                            $query= "SELECT category_id , title FROM categories";
                            $result = $conn->query($query);
                            if($result && $result->num_rows > 0){
                              while($row = $result->fetch_assoc()){
                                echo "<option value='{$row['category_id']}'>{$row['title']}</option>";
                              }
                            }
                            ?>
                            </select>
                            image: <input type="file" name="img">
                          </div>
                          <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>


              <div class="col-12">
              <div class="card recent-sales overflow-auto">

                <div class="filter">
                  <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                </div>

                <div class="card-body">
                  <h5 class="card-title">Audio</h5>

                  <table class="table table-borderless datatable">
                    <thead>
                      <tr>
                        <th scope="col">file</th>
                        <th scope="col">format</th>
                        <th scope="col">size</th>
                        <th scope="col">actions</th>
                      </tr>
                    </thead>
                    <tbody>

                      <?php
                      $query = "SELECT * FROM content WHERE format= 'mp3'";
                      $result = $conn->query($query);

                      while($row = $result->fetch_assoc()){
                      $name = $row['name'];
                      $format = $row['format'];
                      $size = $row['size'];
                      $path = $row['path'];
                      $id = $row['content_id'];

                      $lines = $result->num_rows;
                      
                      echo "<tr>
                            <td><audio controls>
                                  <source src='../$path' type='audio/mp3'>
                                Your browser does not support the audio element.
                                </audio></td>
                            <td> ".$format. "</td>
                            </td>
                            <td> ".$size / 1000 . " kb</td>
                            <td>
                            <a href='../".$path."'>Download</a>
                            <a href='../db/content/deleteContent.php?id=$id?'>Delete</a>
                            </td>
                            </tr>";
                            $lines --;
                      
                    }
                      ?>
                    </tbody>
                  </table>

                </div>

                <!-- EDIT MODAL -->
                <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel"
                  aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="editModalLabel">Edit Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <form enctype="multipart/form-data" id="editForm" action="../db/updateProduct.php?id=<?php echo $id; ?>" method="post">
                          <input type="hidden" name="product_id" id="product_id">
                          <div class="mb-3">
                            <label for="title" class="form-label">Title</label>
                            title: <input type="text" class="form-control" id="title" name="title" required>
                            description: <input type="text" class="form-control" id="description" name="description" required>
                            price: <input type="number" class="form-control" id="price" name="price" required>
                            category_id: <select name="category_id" id="category_id" require>
                            <?php
                            $query= "SELECT category_id , title FROM categories";
                            $result = $conn->query($query);
                            if($result && $result->num_rows > 0){
                              while($row = $result->fetch_assoc()){
                                echo "<option value='{$row['category_id']}'>{$row['title']}</option>";
                              }
                            }
                            ?>
                            </select>
                            image: <input type="file" name="img">
                          </div>
                          <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            

              <div class="col-12">
                <div class="card top-selling overflow-auto">

                  <div class="filter">
                    <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                  </div>

                </div>
              </div><!-- End Top Selling -->

            </div>
          </div><!-- End Recent Sales -->



        </div>
      </div><!-- End Left side columns -->

      </div>
    </section>
    <?php
    $conn->close();
    ?>
  </main><!-- End #main -->


  <!-- Vendor JS Files -->
  <script src="../assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/chart.js/chart.umd.js"></script>
  <script src="../assets/vendor/echarts/echarts.min.js"></script>
  <script src="../assets/vendor/quill/quill.js"></script>
  <script src="../assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script>
  function openEditModal(id, title , description , price , category_id ) {
    // Set the form fields with the data
    document.getElementById('product_id').value = id;
    document.getElementById('description').value = description;
    document.getElementById('price').value = price;
    document.getElementById('category_id').value = category_id;
    document.getElementById('title').value = title;

    console.log(id);
    var editModal = new bootstrap.Modal(document.getElementById('editModal'));
    editModal.show();
  }
  </script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
</body>

</html>