<div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">
                    <li class="fa fa-bullhorn"></li> Create Announcements
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="card-body m-0 p-0">
                        <div class="form-group col-12">
                            <div class="text-center">
                                <div class="image-upload ">
                                    <label for="file-input">
                                        <img class="img-profile img-content" src="../images/upload_image.png"
                                            style="cursor:pointer; width: 160px; height: auto;" />
                                    </label>
                                    <input id="file-input" type="file" accept=".png, .jpg" onchange="readURL(this);" name="file" hidden />
                                </div>
                                <!-- <span class="text-muted">Upload image (512x512)</span> -->
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" name="date" id="date" required />
                        </div>
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" name="title" id="title" required />
                        </div>
                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" name="content" id="content" rows="5" required></textarea>
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
                    <input type="hidden" name="id" id="id" value="" />
                    <input type="hidden" name="action" id="action" />
                    <input type="submit" name="btn_action" id="btn_action" class="btn btn-primary" value="SAVE" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>