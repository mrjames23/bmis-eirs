<div class="modal fade" id="modal_notification" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">
                    <li class="fa fa-envelope"></li> Create Claiming email notification
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form" method="post">
                <div class="modal-body">
                    <div class="card-body m-0 p-0">
                        <div class="form-group">
                            <label for="subject">Subject Title</label>
                            <input type="text" class="form-control" name="subject_title" id="subject_title" required />
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" rows="5" name="message_content" id="message_content" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="type" id="type" value="" />
                    <input type="hidden" name="action" id="action" value="email_notification" />
                    <input type="submit" name="btn_action" id="btn_action" class="btn btn-primary" value="SAVE" />
                    <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                </div>
            </form>
        </div>
    </div>
</div>