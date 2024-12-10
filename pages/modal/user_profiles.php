<div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">
                    <li class="fa fa-user"></li> Add Record
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="">Note: Fields with (<span class="text-danger">*</span>) are required.</span>
                <div id="stepper" class="bs-stepper">
                    <div class="bs-stepper-header" role="tablist">
                        <div class="step" data-target="#step1">
                            <button type="button" class="step-trigger" role="tab" aria-controls="step1" id="stepperTrigger1">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Fullname</span>
                            </button>
                        </div>
                        <div class="step" data-target="#step2">
                            <button type="button" class="step-trigger" role="tab" aria-controls="step2" id="stepperTrigger2">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Personal Info</span>
                            </button>
                        </div>
                        <div class="step" data-target="#step3">
                            <button type="button" class="step-trigger" role="tab" aria-controls="step3" id="stepperTrigger3">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">Address</span>
                            </button>
                        </div>
                        <div class="step" data-target="#step4">
                            <button type="button" class="step-trigger" role="tab" aria-controls="step4" id="stepperTrigger4">
                                <span class="bs-stepper-circle">4</span>
                                <span class="bs-stepper-label">Contact Info</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content pb-0">
                        <div id="step1" class="content" role="tabpanel" aria-labelledby="stepperTrigger1">
                            <form id="form1" class="form-horizontal" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12 col-sm-7">
                                        <div class="form-group row">
                                            <label for="name" class="col-form-label col-12 col-sm-4">Given Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control col-12 col-sm-8" name="fname" id="fname" placeholder="Pangalan" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-form-label col-12 col-sm-4">Middle Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control col-12 col-sm-8" name="mname" id="mname" placeholder="Gitnang Pangalan" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-form-label col-12 col-sm-4">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control col-12 col-sm-8" name="lname" id="lname" placeholder="Apelyido" required>
                                        </div>
                                        <div class="form-group row">
                                            <label for="name" class="col-form-label col-12 col-sm-4">Suffix</label>
                                            <input type="text" class="form-control col-12 col-sm-8" name="suffix" id="suffix" placeholder="ex: (Jr./Sr./I/II/III)">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-5">
                                        <div class="text-center image-upload">
                                            <label for="file">
                                                <img class="img-content" src="../images/upload_image.png"
                                                    style="cursor:pointer; width: 200px; height: auto;" />
                                            </label>
                                            <input id="file" type="file" accept=".png, .jpg" onchange="readURL(this);" name="file" hidden />
                                            <!-- <span class="text-muted">Upload image (512x512)</span> -->
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
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Birth Date <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="bdate" id="bdate" max="2024-12-31" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Age <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="age" id="age" placeholder="Edad" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Place of Birth <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="birth_place" id="birth_place" placeholder="Lugar ng Kapanganakan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Gender <span class="text-danger">*</span></label>
                                            <select class="custom-select" name="gender" id="gender" required>
                                                <option value="" selected hidden disabled>Pumili ng kasarian</option>
                                                <option value="MALE">MALE (LALAKE)</option>
                                                <option value="FEMALE">FEMALE (BABAE)</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Civil Status <span class="text-danger">*</span></label>
                                            <select class="custom-select" name="civil_status" id="civil_status" required>
                                                <option value="" selected hidden disabled>Pumili ng status</option>
                                                <option value="BALO">BALO (WIDOWED)</option>
                                                <option value="KASAL">KASAL (MARRIED)</option>
                                                <option value="LEGALLY SEPARATED">LEGALLY SEPARATED (LEGAL NA HIWALAY)</option>
                                                <option value="MAY KINAKASAMA">MAY KINAKASAMA (LIVE-IN)</option>
                                                <option value="SINGLE">SINGLE (WALANG ASAWA)</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Citizenship<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="citizenship" id="citizenship" required>
                                                <option value="" selected hidden disabled>Pumili ng Citizenship</option>
                                                <option value="FILIPINO">FILIPINO</option>
                                                <option value="IBANG LAHI">IBANG LAHI</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Voter's Status<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="voter_status" id="voter_status" required>
                                                <option value="" selected hidden disabled>Pumili ng Status</option>
                                                <option value="ACTIVE">ACTIVE</option>
                                                <option value="IN-ACTIVE">IN-ACTIVE</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Occupation <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="occupation" id="occupation" placeholder="Trabaho" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer justify-content-between pl-0 pr-0 pb-0">
                                    <div>
                                        <button class="btn btn-secondary" type="button" onclick="prevStep(1)">PREVIOUS</button>
                                        <button class="btn btn-primary" type="button" onclick="nextStep(2)">NEXT</button>
                                    </div>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                                </div>
                            </form>
                        </div>
                        <div id="step3" class="content" role="tabpanel" aria-labelledby="stepperTrigger3">
                            <form id="form3" class="form-horizontal">
                                <div class="form-group row">
                                    <label for="region" class="col-form-label col-12 col-sm-3">Region <span class="text-danger">*</span></label>
                                    <select class="custom-select col-12 col-sm-9 address" name="region" id="region" data-id="refprovince" data-val="provDesc" data-code="regCode">
                                        <option value="" selected hidden disabled>Pumili ng Rehiyon</option>
                                        <?php
                                        $sql = "SELECT * FROM refregion";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="' . $row['regCode'] . '">' . $row['regDesc'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="province" class="col-form-label col-12 col-sm-3">Province <span class="text-danger">*</span></label>
                                    <select class="custom-select col-12 col-sm-9 address" name="province" id="province" data-id="refcitymun" data-val="citymunDesc" data-code="provCode" required>
                                        <option value="" selected hidden disabled>Pumili ng Probinsya</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-form-label col-12 col-sm-3">City <span class="text-danger">*</span></label>
                                    <select class="custom-select col-12 col-sm-9 address" name="city" id="city" data-id="refbrgy" data-val="brgyDesc" data-code="citymunCode" required>
                                        <option value="" selected hidden disabled>Pumili ng City</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="barangay" class="col-form-label col-12 col-sm-3">Barangay <span class="text-danger">*</span></label>
                                    <select class="custom-select col-12 col-sm-9" name="brgy" id="brgy" required>
                                        <option value="" selected hidden disabled>Pumili ng Barangay</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="street" class="col-form-label col-12 col-sm-3">House No. / Street <span class="text-danger">*</span></label>
                                    <textarea class="form-control col-12 col-sm-9" name="street" id="street" rows="2" placeholder="Numero ng bahay o street" required></textarea>
                                </div>
                                <div class="modal-footer justify-content-between pl-0 pr-0 pb-0">
                                    <div>
                                        <button class="btn btn-secondary" type="button" onclick="prevStep(2)">PREVIOUS</button>
                                        <button class="btn btn-primary" type="button" onclick="nextStep(3)">NEXT</button>
                                    </div>
                                    <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                                </div>
                            </form>
                        </div>
                        <div id="step4" class="content" role="tabpanel" aria-labelledby="stepperTrigger4">
                            <form id="form4" class="form-horizontal">
                                <div class="form-group row">
                                    <label for="phone_no" class="col-form-label col-sm-3 col-12">Phone Number <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control col-sm-9 col-12" name="contact_no" id="contact_no" placeholder="Phone Number" required data-inputmask='"mask": "(9999)999-9999"' data-mask>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-form-label col-sm-3 col-12">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control col-sm-9 col-12" name="email" id="email" placeholder="Email Address" required>
                                </div>
                                <div class="modal-footer justify-content-between pl-0 pr-0 pb-0">
                                    <div>
                                        <button class="btn btn-secondary" type="button" onclick="prevStep(3)">PREVIOUS</button>
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