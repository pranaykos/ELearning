<!-- Signup-Modal -->
<div class="modal fade" id="signupmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Signup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-0">
                <form action="signup.php" id="signupform" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1"><strong><i class="fa fa-envelope" aria-hidden="true"></i> Email </strong><small><span id="emailMessage"></span></small></label>
                        <input type="email" class="form-control" aria-describedby="emailHelp" name="email" id="semail">
                        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"><strong><i class="fa fa-user" aria-hidden="true"></i> Username </strong><small><span id="usernameMsg"> </span></small></label>
                        <input type="text" class="form-control" name="username" id="susername">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"><strong><i class="fa fa-key" aria-hidden="true"></i> Password</strong></label>
                        <input type="password" class="form-control" name="password">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit"  class="btn btn-primary" id="signUpButton">Sign up</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>