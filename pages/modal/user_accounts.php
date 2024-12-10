<div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">
                    <li class="fa fa-user"></li> Create Account
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="post">
                <div class="modal-body">
                    <div class="card-body m-0 p-0">
                        <div class="form-group">
                            <label for="lname">Email</label>
                            <input type="text" class="form-control" name="email" id="email" required />
                        </div>
                        <div class="form-group">
                            <label for="fname">Password</label>
                            <input type="password" class="form-control" name="pass" id="pass" required />
                        </div>
                        <div class="form-group">
                            <label for="mname">Confirm Password</label>
                            <input type="password" class="form-control" name="pass2" id="pass2" required />
                        </div>
                        <div class="form-group">
                            <label for="access_type">User Type</label>
                            <select class="form-control" name="user_type" id="user_type" style="width: 100%" required>
                                <option value="" selected="selected" hidden disabled>Select User Type</option>
                                <option value="ADMIN">ADMIN</option>
                                <option value="STAFF">STAFF</option>
                                <option value="USER">USER</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="id" id="id" value="" />
                    <input type="hidden" name="action" id="action" />
                    <input type="submit" name="btn_action" id="btn_action" class="btn btn-primary" value="SAVE" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>