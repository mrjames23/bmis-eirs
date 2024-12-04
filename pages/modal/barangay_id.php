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
                                <span class="bs-stepper-label">Other Details</span>
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
                                <span class="bs-stepper-label">Emergency Contact</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content pb-0">
                        <div id="step1" class="content" role="tabpanel" aria-labelledby="stepperTrigger1">
                            <form id="form1" class="form-horizontal" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="fname">Given Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="fname" id="fname" placeholder="Pangalan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="mname">Middle Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="mname" id="mname" placeholder="Gitnang Pangalan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="mname">Last Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="lname" id="mname" placeholder="Apelyido" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="suffix">Suffix</label>
                                            <input type="text" class="form-control" name="suffix" id="suffix" placeholder="ex: (Jr./Sr./I/II/II)">
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-6">
                                        <div class="form-group">
                                            <label for="name">Birth Date<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="bdate" id="bdate" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Gender <span class="text-danger">*</span></label>
                                            <select class="custom-select" name="gender" id="gender" required>
                                                <option value="" selected hidden disabled>Pumili ng kasarian</option>
                                                <option value="MALE">MALE (LALAKE)</option>
                                                <option value="FEMALE">FEMALE (BABAE)</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Civil Status <span class="text-danger">*</span></label>
                                            <select class="custom-select" name="civil_status" id="civil_status" required>
                                                <option value="" selected hidden disabled>Pumili ng Civil Status</option>
                                                <option value="BALO">BALO (WIDOWED)</option>
                                                <option value="KASAL">KASAL (MARRIED)</option>
                                                <option value="LEGALLY SEPARATED">LEGALLY SEPARATED (LEGAL NA HIWALAY)</option>
                                                <option value="MAY KINAKASAMA">MAY KINAKASAMA (LIVE-IN)</option>
                                                <option value="SINGLE">SINGLE (WALANG ASAWA)</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="name">Employer's Name <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="emp_name" id="emp_name" placeholder="Pangalan ng Pinapasukang Trabaho" required>
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
                                    <label for="contact_no" class="col-form-label col-12 col-sm-4">Contact No. <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control col-12 col-sm-8" name="contact_no" id="contact_no" placeholder="Contact Number" required>
                                </div>
                                <div class="form-group row">
                                    <label for="email" class="col-form-label col-12 col-sm-4">Email Address <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control col-12 col-sm-8" name="email" id="email" placeholder="Email Address" required>
                                </div>
                                <div class="form-group row">
                                    <label for="fathers_name" class="col-form-label col-12 col-sm-4">Father's Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control col-12 col-sm-8" name="fathers_name" id="fathers_name" placeholder="Buong pangalan ng Tatay" required>
                                </div>
                                <div class="form-group row">
                                    <label for="mothers_name" class="col-form-label col-12 col-sm-4">Mother's Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control col-12 col-sm-8" name="mothers_name" id="mothers_name" placeholder="Buong pangalan ng Nanay" required>
                                </div>
                                <div class="form-group row">
                                    <label for="length_year" class="col-form-label col-12 col-sm-4">Length Stay in Manila <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control col-12 col-sm-4" min="0" name="length_year" id="length_year" placeholder="Year/s" required>
                                    <input type="number" class="form-control col-12 col-sm-4" min="0" name="length_month" id="length_month" placeholder="Month/s" required>
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
                                        <option value="" disabled>Pumili muna ng Rehiyon</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-form-label col-12 col-sm-3">City <span class="text-danger">*</span></label>
                                    <select class="custom-select col-12 col-sm-9 address" name="city" id="city" data-id="refbrgy" data-val="brgyDesc" data-code="citymunCode" required>
                                        <option value="" selected hidden disabled>Pumili ng City</option>
                                        <option value="" disabled>Pumili muna ng Probinsya</option>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="barangay" class="col-form-label col-12 col-sm-3">Barangay <span class="text-danger">*</span></label>
                                    <select class="custom-select col-12 col-sm-9" name="brgy" id="brgy" required>
                                        <option value="" selected hidden disabled>Pumili ng Barangay</option>
                                        <option value="" disabled>Pumili muna ng City</option>
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
                                    <label for="emergency_person" class="col-form-label col-12 col-sm-4">Emergency Contact Person <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control col-12 col-sm-8" name="emergency_person" id="emergency_person" placeholder="Pangalan" required>
                                </div>
                                <div class="form-group row">
                                    <label for="emergency_contact" class="col-form-label col-12 col-sm-4">Emergency Contact No. <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control col-12 col-sm-8" name="emergency_contact" id="emergency_contact" placeholder="Contact Number" required>
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