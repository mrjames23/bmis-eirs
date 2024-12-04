<div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">
                    <li class="fa fa-bullhorn"></li> Barangay Information
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form id="form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body m-0 p-0">
                        <div class="form-group">
                            <label for="lname">Barangay Title</label>
                            <input type="text" class="form-control" name="header" id="header" required />
                        </div>
                        <div class="form-group">
                            <label for="fname">Name</label>
                            <input type="text" class="form-control" name="name" id="name" required />
                        </div>
                        <div class="form-group">
                            <label for="fname">Position</label>
                            <input type="text" class="form-control" name="title" id="title" required />
                        </div>
                        <div class="form-group">
                            <label for="mname">Barangay Content</label>
                            <textarea class="form-control" name="content" id="content" rows="8" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="fname">Footer and logo</label>
                            <input type="text" class="form-control mb-2" name="footer" id="footer" required />
                            <input type="file" class="form-control" accept="image/png, image/gif, image/jpeg" name="file" id="file" required>
                        </div>
                        <!-- <div class="form-group">
                            <label for="access_type">User Type</label>
                            <select class="form-control" name="user_access" id="user_access" style="width: 100%" required>
                                <option value="ADMIN">YES</option>
                                <option value="USER">NO</option>
                            </select>
                        </div> -->

                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="id" id="id" />
                    <input type="hidden" name="action" id="action" />
                    <input type="submit" class="btn btn-primary" value="SAVE" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>