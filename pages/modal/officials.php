<div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">
                    <li class="fa fa-plus"></li> Add Official
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="post">
                <div class="modal-body">
                    <div class="card-body m-0 p-0">
                        <div class="form-group">
                            <label for="fullname">Full Name</label>
                            <input type="text" class="form-control" name="fullname" id="fullname" placeholder="Given name, Middle Initial, Last Name" required />
                        </div>
                        <div class="form-group">
                            <label for="position_id">Select Position</label>
                            <select class="form-control" name="position_id" id="position_id" style="width: 100%" required>
                                <option value="" selected="selected" hidden disabled>Select Position</option>
                                <?php
                                $sql = "SELECT * FROM positions ORDER BY level_priority ASC";
                                $result = $conn->query($sql);
                                if ($result->rowCount() > 0) {
                                    foreach ($result as $row) {
                                        echo '<option value="' . $row['id'] . '">' . $row['position_name'] . '</option>';
                                    }
                                } else {
                                    echo '<option value="" disabled>Please add position title first</option>';
                                }
                                ?>
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
<div class="modal fade" id="modal_position" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">
                    <li class="fa fa-plus"></li> Add Position
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="post">
                <div class="modal-body">
                    <div class="card-body m-0 p-0">
                        <div class="form-group">
                            <label for="position_name">Position Title</label>
                            <input type="text" class="form-control" name="position_name" id="position_name" placeholder="Name of Position" required />
                        </div>
                        <div class="form-group">
                            <label for="level_priority">Priority Level</label>
                            <input type="number" class="form-control" min="1" name="level_priority" id="level_priority" placeholder="Position Rank level" required />
                        </div>
                        <div class="form-group">
                            <label for="max_count">Members Count</label>
                            <input type="number" class="form-control" min="1" name="max_count" id="max_count" placeholder="Number of allowed members" required />
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="id" id="id" />
                    <input type="hidden" name="action" id="action" />
                    <input type="submit" name="btn_action" id="btn_action" class="btn btn-primary" value="SAVE" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>