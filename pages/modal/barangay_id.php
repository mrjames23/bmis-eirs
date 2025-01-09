<div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">
                    <li class="fas fa-id-card"></li> Request Barangay ID
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="">Fill out required fields.</span>
                <div id="stepper" class="bs-stepper">
                    <div class="bs-stepper-header" role="tablist">
                        <div class="step" data-target="#step1">
                            <button type="button" class="step-trigger" role="tab" aria-controls="step1" id="stepperTrigger1">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Personal Info</span>
                            </button>
                        </div>
                        <div class="step" data-target="#step2">
                            <button type="button" class="step-trigger" role="tab" aria-controls="step2" id="stepperTrigger2">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Emergency Contact</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content pb-0">
                        <div id="step1" class="content" role="tabpanel" aria-labelledby="stepperTrigger1">
                            <form id="form1" class="form-horizontal" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12 col-sm-7">
                                        <div class="form-group row">
                                            <label for="name" class="col-form-label col-12 col-sm-4">Barangay ID <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control col-12 col-sm-8" name="brgy_id" id="brgy_id" value="<?= $profile['brgy_id'] ?? 'SAMPLE1234'?>" placeholder="Pangalan" readonly required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-form-label col-12 col-sm-4">Given Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control col-12 col-sm-8" name="fname" id="fname" value="<?= $profile['fname'] ?? 'USER'?>" placeholder="Pangalan" readonly required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-form-label col-12 col-sm-4">Middle Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control col-12 col-sm-8" name="mname" id="mname" value="<?= $profile['mname'] ?? 'SAMPLE NAME'?>" placeholder="Gitnang Pangalan" readonly required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-form-label col-12 col-sm-4">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control col-12 col-sm-8" name="lname" id="lname" value="<?= $profile['lname'] ?? 'SAMPLE LAST NAME' ?>" placeholder="Apelyido" readonly required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-form-label col-12 col-sm-4">Suffix</label>
                                            <input type="text" class="form-control col-12 col-sm-8" name="suffix" id="suffix" value="<?= $profile['suffix'] ?? 'SAMPLE JR.'?>" placeholder="ex: (Jr./Sr./I/II/III)" readonly>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-form-label col-12 col-sm-4">Birth Date</label>
                                            <input type="date" class="form-control col-12 col-sm-8" name="bdate" id="bdate" value="<?= $profile['bdate'] ?? date('Y-m-d')?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-5">
                                        <div class="text-center image-upload">
                                            <style>
                                                #file {
                                                    background: transparent;
                                                    border: none;
                                                    outline: none;
                                                    color: #fff;
                                                    position: fixed;
                                                    z-index: -1;
                                                    border: 1px solid #fff;
                                                }
                                            </style>
                                            <label for="file">
                                                <input class="mt-5 pl-5" id="file" type="file" accept=".png, .jpg" onchange="readURL(this);" name="file" required />
                                                <img class="img-content" src="../images/upload_image.png"
                                                    style="cursor:pointer; width: 200px; height: auto;" />

                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between pl-0 pr-0 pb-0">
                                    <button class="btn btn-primary" type="button" onclick="nextStep(1)">NEXT</button>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                                </div>
                            </form>
                        </div>
                        <div id="step2" class="content" role="tabpanel" aria-labelledby="stepperTrigger2">
                            <form id="form2">
                                <div class="form-group row">
                                    <label for="emergency_person" class="col-form-label col-12 col-sm-4">Emergency Contact Person <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control col-12 col-sm-8" name="emergency_person" id="emergency_person" placeholder="Buong Pangalan" required>
                                </div>
                                <div class="form-group row">
                                    <label for="emergency_contact" class="col-form-label col-12 col-sm-4">Emergency Contact No. <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control col-12 col-sm-8" name="emergency_contact" id="emergency_contact" placeholder="Phone Number" required data-inputmask='"mask": "9999-999-9999"' data-mask>
                                </div>
                                <div class="form-group row">
                                    <label for="emergency_relationship" class="col-form-label col-12 col-sm-4">Relationship <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control col-12 col-sm-8" name="emergency_relationship" id="emergency_relationship" placeholder="Relasyon sa Emergency Contact person" required>
                                </div>
                                <div class="form-group row">
                                    <label for="emergency_address" class="col-form-label col-12 col-sm-4">Address <span class="text-danger">*</span></label>
                                    <textarea class="form-control col-12 col-sm-8" name="emergency_address" id="emergency_address" rows="2" placeholder="Tirahan ng iyong Emergency Contact Person" required></textarea>
                                </div>
                                <div class="modal-footer justify-content-between pl-0 pr-0 pb-0">
                                    <div>
                                        <button class="btn btn-secondary" type="button" onclick="prevStep(1)">PREVIOUS</button>
                                        <button class="btn btn-success" type="submit" onclick="submitForm(event)">SUBMIT</button>
                                    </div>
                                    <input type="hidden" name="id" id="id">
                                    <input type="hidden" name="action" id="action">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>