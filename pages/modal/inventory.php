<div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false" arai-hiddden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">
                    <li class="fa fa-list"></li> Create Item
                </h4>
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="form" class="form-horizontal" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="row mb-0">
                        <div class="col-12 col-sm-6">
                            <div class="form-group mb-0">
                                <label for="Category">Category</label>
                                <select class="custom-select" name="category" id="category" required>
                                    <option value="" selected hidden disabled>Select Category</option>
                                    <option value="EQUIPMENTS">EQUIPMENTS</option>
                                    <option value="VEHICLES">VEHICLES</option>
                                    <option value="VENUES">VENUES</option>
                                </select>
                                <label for="item_name" class="col-form-label">Item Name</label>
                                <input type="text" class="form-control" name="item_name" id="item_name" placeholder="" required>
                                <label for="qty" class="col-form-label">Quantity</label>
                                <input type="number" class="form-control" step="1" min="1" name="qty" id="qty" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group mb-0">
                                <label for="file" class="col-form-label"></label>
                                <div class="text-center image-upload">

                                    <style>
                                        #file {
                                            background: transparent;
                                            border: none;
                                            outline: none;
                                            color: transparent;
                                            position: fixed;
                                            z-index: -1;
                                            border: 0px solid #fff;
                                        }
                                    </style>
                                    <label for="file">
                                        <input class="mt-5 pl-5" id="file" type="file" accept=".png, .jpg" onchange="readURL(this);" name="file" required />
                                        <img class="img-content" src="../images/upload_image.png" style="cursor:pointer; width: 200px; height: auto;" />
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-12 mb-0">
                            <label for="name" class="col-form-label">Description</label>
                            <textarea id="summernote" name="desc" placeholder=""></textarea>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group">
                                <label for="Category">Item Status</label>
                                <select class="custom-select" name="item_status" id="item_status" required>
                                    <option value="" selected hidden disabled>Select Status</option>
                                    <option value="1">AVAILABLE</option>
                                    <option value="0">UNAVAILABLE</option>
                                    <option value="2">BORROWED/RESERVED</option>
                                    <option value="3">DAMAGED</option>
                                    <option value="4">LOST</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <input type="hidden" name="id" id="id" value="" />
                        <input type="hidden" name="action" id="action" />
                        <button type="submit" class="btn btn-primary">SAVE</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                    </div>
            </form>
        </div>
    </div>
</div>