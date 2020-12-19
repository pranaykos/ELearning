<div class="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Login</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body pb-0">
                <form>
                    <div class="form-group">
                        <label for="exampleInputEmail1"><strong><i class="fa fa-user" aria-hidden="true"></i> Username</strong></label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" id="lusername" name="username">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1"><strong><i class="fa fa-key" aria-hidden="true"></i> Password</strong></label>
                        <input type="password" class="form-control" name="password" id="lpassword">
                    </div>
                    <div class="form-group form-check">
                        <input type="checkbox" class="form-check-input">
                        <label class="form-check-label">Remember me</label>
                    </div>

            </div>
            <div class="modal-footer">
                <div class="alert" role="alert" id="login-status">
                </div>
                <button type="button" class="btn btn-primary" id="loginButton">Login</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>