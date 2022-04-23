<nav class="navbar navbar-expand-lg navbar-light bg-danger">
  <div class="container-fluid">
    <a class="navbar-brand text-white" href="index_admin.php">APEX Admin </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link text-white" href="index_admin.php"><span class="bi bi-house"> | </span>Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="gallery.php"><span class="bi bi-images"></span> | Gallery</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="student.php"><span class="bi bi-person"></span> | Student</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="add_advertise.php" tabindex="-1" ><i class="bi bi-calendar-event"></i> | Advertisement</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          <i class="bi bi-book"></i> | Create Masters
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">        
            <li><a class="dropdown-item" href="create_category.php">Create Category</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="create_course.php">Create Course</a></li>
          </ul>
        </li>              
      </ul>
    </div>
      <ul class="navbar-nav ml-auto">
        <li class="navbar-item">
          <a href="logout.php" class="nav-link text-white"><i class="glyphicon glyphicon-log-out"></i> | Log Out</a>
        </li>
      </ul>

  </div>
</nav>