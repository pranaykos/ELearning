<!-- Footer -->
<footer class="page-footer font-small mdb-color pt-4">

    <!-- Footer Links -->
    <div class="container text-center text-md-left">

        <!-- Footer links -->
        <div class="row text-center text-md-left mt-3 pb-3">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">VSchools</h6>
                <p>VSchools aims at providing high quality education with cost as low as possible.</p>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Catagories</h6>
                <p>
                    <a href="#!">Computer Science</a>
                </p>
                <p>
                    <a href="#!">Digital marketing</a>
                </p>
                <p>
                    <a href="#!">Music thoery</a>
                </p>
                <p>
                    <a href="#!">Management</a>
                </p>
            </div>
            <!-- Grid column -->

            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Useful links</h6>
                <p>
                    <a href="#!">Courses</a>
                </p>
                <p>
                    <a href="#!">Payment status</a>
                </p>
                <p>
                    <a href="#!">Contact</a>
                </p>
                <p class="text-primary" style="cursor: pointer">
                    <?php
                    // if(isset($_SESSION["adminusername"]) && $_SESSION["isAdminLoggedIn"]){
                    if (isset($_SESSION["isAdminLoggedIn"]) &&  $_SESSION["isAdminLoggedIn"]) {
                        echo '<a href="logout.php">
                                Logout ' . $_SESSION["adminusername"] . '
                            </a>';
                    } else {
                        echo '<a data-toggle="modal"          
                                data-target="#adminloginmodal">
                                Admin Login
                            </a>';
                    }
                    ?>
                </p>
            </div>

            <!-- Grid column -->
            <hr class="w-100 clearfix d-md-none">

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mt-3">
                <h6 class="text-uppercase mb-4 font-weight-bold">Contact</h6>
                <p>
                    <i class="fas fa-home mr-3"></i> 182  Holt Street, Florida, US</p>
                <p>
                    <i class="fas fa-envelope mr-3"></i> email@mail.com</p>
                <p>
                    <i class="fas fa-phone mr-3"></i> + 01 561-306-0073</p>
                <p>
                    <i class="fas fa-print mr-3"></i> + 01 904-583-4893</p>
            </div>
            <!-- Grid column -->

        </div>
        <!-- Footer links -->

        <hr>
    </div>
    <div class="container">

        <p class="text-center">© 2020 Copyright:
            <a href="https://vschools.com/">
                <strong class="text-dark"> VSchools.com</strong>
            </a>
        </p>

    </div>
</footer>
<!-- Footer Links -->