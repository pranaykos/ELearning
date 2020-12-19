<?php session_start() ?>

<?php include "partials/_header.php"; ?>
    <!-- start of Navbar partial include -->
    <?php include "partials/_navbar.php"; ?>
    <!-- end of Navbar partial include -->

    <?php
    
    // if(isset($_SESSION["username"]) && $_SESSION["isLoggedIn"]){

        if(isset($_GET["success"])){
            echo '<div class="alert my-0 signup-success alert-success alert-dismissible fade show"      role="alert">
                    <strong class="ml-4">Success!</strong> Yout account is created sucesfully.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>';
        }
    ?>

    <!-- start of video play -->
    <div class="container-fluid">
        <div class="vid-parent">
            <video playsinline autoplay muted loop clsss="video">
                <source src="videos/featureVideo.mp4" type="video/mp4">
            </video>
        </div>
        <div class="video-overlay">
            <h1 class="display-4 text-center img-featured">Your course to Success</h1>
            <p>Build skills with courses certificates degree online with world class universities and companies</p>
            <div class="text-center">
                <?php if(isset($_SESSION["username"]) && $_SESSION["isLoggedIn"]){ ?>
                    <a class="btn btn-light" href="student/profile.php"><i class="fad fa-file-certificate"></i>Your profile</a>
                <?php }else{ ?>
                    <button type="button" class="btn btn-light" data-toggle="modal" data-target="#signupmodal"><i class="fad fa-file-certificate"></i>Get started</button>
                <?php } ?>
            </div>
        </div>
    </div>
    <!-- end of video play -->


<h1 id="error"></h1>


    <!-- start of featured supports -->
    <div class="container">
        <div class="row p-2">
            <div class="col-sm-3">
                <div class="text-center py-4">
                    <div>
                        <h1 class="display-2 "><i class="fa fa-address-card mr-3"></i></h1>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea ducimus ad et, doloribus tenetur ut porro, animi adipisci illo assumenda accusamus hic temporibus odio quaerat veniam voluptate distinctio quas repudiandae!</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="text-center py-4">
                    <div>
                    <h1 class="display-2 "><i class="fas fa-home mr-3"></i></h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea ducimus ad et, doloribus tenetur ut porro, animi adipisci illo assumenda accusamus hic temporibus odio quaerat veniam voluptate distinctio quas repudiandae!</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="text-center py-4">
                    <div>
                    <h1 class="display-2 "><i class="fas fa-home mr-3"></i></h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea ducimus ad et, doloribus tenetur ut porro, animi adipisci illo assumenda accusamus hic temporibus odio quaerat veniam voluptate distinctio quas repudiandae!</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="text-center py-4">
                    <div>
                    <h1 class="display-2 "><i class="fas fa-home mr-3"></i></h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea ducimus ad et, doloribus tenetur ut porro, animi adipisci illo assumenda accusamus hic temporibus odio quaerat veniam voluptate distinctio quas repudiandae!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end of featured supports -->

    <!-- start outcomes -->
    <div class="container-fluid">
        <div class="row py-4">
            <div class="col-sm-4 offset-sm-2 py-4">
                <div class="row">
                    <div class="col-sm-6"><img id="student-1" src="images/student-1.jpg" width="200px" alt=""><img id="student-2" class="mt-4" src="images/student-3.jpg" width="200px" alt=""></div>
                    <div class="col-sm-6"><img id="student-3" src="images/student-2.jpg" width="200px" alt=""></div>
                </div>
            </div>
            <div class="col-sm-4 text-center">
                <h1 class="display-4">Learner outcomes on VSchools</h1>
                <p>87% of people learning for professional development report career benefits like getting a promotion, a raise, or starting a new career</p>
                <p> - Coursera Learner Outcomes Survey (2019)</p>
                <p><a href="#" class="btn btn-primary btn-lg active rounded-0" role="button" aria-pressed="true">Start your journey today</a></p>
            </div>
        </div>
    </div>
    <!-- end outcomes -->

    <hr class="style-two">

    <!-- start mode of access -->
    <div class="container-fluid">
        <div class="row py-4">
            <div class="col-sm-4 offset-sm-2 text-center">
                <h1 class="display-4"><span>Easy</span> to choose options</h1>
                <p>The courses we provide is for everyone one can start from simple certification then after that can go for gratuation program and finally can do masters with us</p>
            </div>
            <div class="col-sm-4 offset-sm-1">
                <h1 class="display-1">dad</h1>
            </div>
        </div>
    </div>
    <!-- end mode of access -->

    <hr class="style-two">

    <!-- start of testimonials -->

    <div class="container">
        <h1 class=" text-center display-4">Our shining stars</h1>
        <p class="text-center">More than 1000+ people are already learning with VSchools</p>
        <div class="row">
            <div class="col-sm-4 text-center my-4">
                <div class="card border-light" style="width: 18rem;">
                    <div>
                        <img src="https://source.unsplash.com/100x100/?boys" class="w-50 card-img-top rounded-circle" alt="...">
                    </div>
                    <div class="card-body">
                        <p class="card-text">Some quick example text to build on tdashe card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center my-4">
                <div class="card border-light" style="width: 18rem;">
                    <div>
                        <img src="https://source.unsplash.com/100x100/?boys" class="w-50 card-img-top rounded-circle" alt="...">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                        <p class="card-text">Some quick example text to build on tdashe card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 text-center my-4">
                <div class="card border-light" style="width: 18rem;">
                    <div>
                        <img src="https://source.unsplash.com/100x100/?boys" class="w-50 card-img-top rounded-circle" alt="...">
                    </div>
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                        <p class="card-text">Some quick example text to build on tdashe card title and make up the bulk of the card's content.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- end of testimonials -->

    <hr class="style-two">

    <!-- start of contact us -->
    <div class="container my-4">
        <h1 class="display-4 text-center my-3">Conatct us</h1>
        <div class="row">
            <div class="col-sm-8 offset-sm-2">
                <form>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="inputEmail4">Email</label>
                            <input type="email" class="form-control" id="inputEmail4">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="inputPassword4">Name</label>
                            <input type="text" class="form-control" id="inputPassword4">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Ask your question</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit your query</button>
                </form>
            </div>
        </div>
    </div>
    <!-- end of contact us -->

    
    <!-- start including all the modals -->
    <?php
    include "partials/_admin_login_modal.php"; 
    include "partials/_login_modal.php";
    include "partials/_signup_modal.php";
    ?>
<!-- end including all the modals -->

<!-- start of footer links-->
    <?php include "partials/_footer_links.php"; ?>
<!-- end of footer links -->
<?php include "partials/_footer.php" ?>