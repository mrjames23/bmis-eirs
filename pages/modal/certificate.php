<div class="modal fade" id="modal" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h4 class="modal-title">
                    <li class="fa fa-certificate"></li> Request Certificate
                </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="">Select Certificate you want to request and fill out required fields.</span>
                <div id="stepper" class="bs-stepper">
                    <div class="bs-stepper-header" role="tablist">
                        <div class="step" data-target="#step1">
                            <button type="button" class="step-trigger" role="tab" aria-controls="step1" id="stepperTrigger1">
                                <span class="bs-stepper-circle">1</span>
                                <span class="bs-stepper-label">Certificate Type</span>
                            </button>
                        </div>
                        <div class="step" data-target="#step2">
                            <button type="button" class="step-trigger" role="tab" aria-controls="step2" id="stepperTrigger2">
                                <span class="bs-stepper-circle">2</span>
                                <span class="bs-stepper-label">Purpose</span>
                            </button>
                        </div>
                        <div class="step" data-target="#step3">
                            <button type="button" class="step-trigger" role="tab" aria-controls="step3" id="stepperTrigger3">
                                <span class="bs-stepper-circle">3</span>
                                <span class="bs-stepper-label">Full Name</span>
                            </button>
                        </div>
                        <div class="step" data-target="#step4">
                            <button type="button" class="step-trigger" role="tab" aria-controls="step4" id="stepperTrigger4">
                                <span class="bs-stepper-circle">4</span>
                                <span class="bs-stepper-label">Address</span>
                            </button>
                        </div>
                    </div>
                    <div class="bs-stepper-content pb-0">
                        <div id="step1" class="content" role="tabpanel" aria-labelledby="stepperTrigger1">
                            <form id="form1" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group h4">
                                    <div class="custom-control custom-radio m-2">
                                        <input class="custom-control-input" type="radio" id="customRadio1" name="cert_type" value="Barangay Certification" required>
                                        <label for="customRadio1" class="custom-control-label">Barangay Certification</label>
                                    </div>
                                    <div class="custom-control custom-radio m-2">
                                        <input class="custom-control-input" type="radio" id="customRadio2" name="cert_type" value="Certificate of Indigency" required>
                                        <label for="customRadio2" class="custom-control-label">Certificate of Indigency</label>
                                    </div>
                                    <div class="custom-control custom-radio m-2">
                                        <input class="custom-control-input" type="radio" id="customRadio3" name="cert_type" value="Certificate of Residency" required>
                                        <label for="customRadio3" class="custom-control-label">Certificate of Residency/Non-Residency</label>
                                    </div>
                                    <div class="custom-control custom-radio m-2">
                                        <input class="custom-control-input" type="radio" id="customRadio5" name="cert_type" value="Certificate of Guardianship" required>
                                        <label for="customRadio5" class="custom-control-label">Certificate of Guardianship</label>
                                    </div>
                                    <div class="custom-control custom-radio m-2">
                                        <input class="custom-control-input" type="radio" id="customRadio7" name="cert_type" value="Certificate of Solo Parent" required>
                                        <label for="customRadio7" class="custom-control-label">Certificate of Solo Parent</label>
                                    </div>
                                    <div class="custom-control custom-radio m-2">
                                        <input class="custom-control-input" type="radio" id="customRadio6" name="cert_type" value="Certification of Living Together" required>
                                        <label for="customRadio6" class="custom-control-label">Certification of Living Together</label>
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
                                <div class="form-group h4">
                                    <div class="custom-control custom-radio m-2">
                                        <input class="custom-control-input" type="radio" id="purpose1" name="purpose" value="Local Employment" required>
                                        <label for="purpose1" class="custom-control-label">Local Employment</label>
                                    </div>
                                    <div class="custom-control custom-radio m-2">
                                        <input class="custom-control-input" type="radio" id="purpose2" name="purpose" value="Medical Assistance/Hospital Requirement" required>
                                        <label for="purpose2" class="custom-control-label">Medical Assistance/Hospital Requirement</label>
                                    </div>
                                    <div class="custom-control custom-radio m-2">
                                        <input class="custom-control-input" type="radio" id="purpose3" name="purpose" value="School Purposes" required>
                                        <label for="purpose3" class="custom-control-label">School Purposes</label>
                                    </div>
                                    <div class="custom-control custom-radio m-2">
                                        <input class="custom-control-input" type="radio" id="purpose4" name="purpose" value="Travel/Transfer of Residency" required>
                                        <label for="purpose4" class="custom-control-label">Travel/Transfer of Residency</label>
                                    </div>
                                    <div class="custom-control custom-radio m-2">
                                        <input class="custom-control-input" type="radio" id="purpose5" name="purpose" value="First Time Jobseekers Assistance Act (RA 11261)" required>
                                        <label for="purpose5" class="custom-control-label">First Time Jobseekers Assistance Act (RA 11261)</label>
                                    </div>
                                    <div class="row pl-2">
                                        <div class="custom-control custom-radio m-2">
                                            <input class="custom-control-input" type="radio" id="purpose6" name="purpose" value="Others" required>
                                            <label for="purpose6" class="custom-control-label">Others</label>
                                        </div>
                                        <input type="text" class="form-control col-sm-6" name="specify" id="specify" placeholder="Please specify if others.">
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