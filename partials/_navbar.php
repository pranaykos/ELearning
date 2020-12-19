<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">VSchools</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse ml-4" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item navbar-item">
        <a class="nav-link" href="index.php">Home </a>
      </li>
      <li class="nav-item  navbar-item">
        <a class="nav-link" href="courses.php">Courses</a>
      </li>


      <?php if (isset($_SESSION["username"])  && $_SESSION["isLoggedIn"]) { ?>
        <li class="nav-item  navbar-item">
          <a class="nav-link" href="logout.php">Logout</a>
        </li>
      <?php } else { ?>
        <li class="nav-item  navbar-item">
          <a class="nav-link" href="#" data-toggle="modal" data-target="#loginmodal">Login</a>
        </li>
        <li class="nav-item  navbar-item">
          <a class="nav-link" data-toggle="modal" data-target="#signupmodal" href="#">Signup</a>
        </li>
      <?php } ?>

      <li class="nav-item  navbar-item">
        <a class="nav-link" href="#">Payment status</a>
      </li>

      <li class="nav-item  navbar-item">
        <a class="nav-link" href="#">Feedback</a>
      </li>
      <li class="nav-item  navbar-item">
        <a class="nav-link" href="#">Contact</a>
      </li>
    </ul>
  </div>
</nav>