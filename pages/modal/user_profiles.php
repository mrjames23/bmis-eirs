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
                                            <label for="name">Barangay Status<span class="text-danger">*</span></label>
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
                                        <!-- <option value="" selected hidden disabled>Pumili ng Rehiyon</option> -->
                                        <?php
                                        $sql = "SELECT * FROM refregion WHERE regCode = 13";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="' . $row['regCode'] . '" selected readonly>' . $row['regDesc'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="province" class="col-form-label col-12 col-sm-3">Province <span class="text-danger">*</span></label>
                                    <select class="custom-select col-12 col-sm-9 address" name="province" id="province" data-id="refcitymun" data-val="citymunDesc" data-code="provCode" required>
                                        <!-- <option value="" selected hidden disabled>Pumili ng Probinsya</option> -->
                                        <?php
                                        $sql = "SELECT * FROM refprovince WHERE provCode = 1339";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="' . $row['provCode'] . '" selected readonly>' . $row['provDesc'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="city" class="col-form-label col-12 col-sm-3">City <span class="text-danger">*</span></label>
                                    <select class="custom-select col-12 col-sm-9 address" name="city" id="city" data-id="refbrgy" data-val="brgyDesc" data-code="citymunCode" required>
                                        <!-- <option value="" selected hidden disabled>Pumili ng City</option> -->
                                        <?php
                                        $sql = "SELECT * FROM refcitymun WHERE citymunCode  = 133914";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="' . $row['citymunCode'] . '" selected readonly>' . $row['citymunDesc'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group row">
                                    <label for="barangay" class="col-form-label col-12 col-sm-3">Barangay <span class="text-danger">*</span></label>
                                    <select class="custom-select col-12 col-sm-9" name="brgy" id="brgy" required>
                                        <!-- <option value="" selected hidden disabled>Pumili ng Barangay</option> -->
                                        <?php
                                        $sql = "SELECT * FROM refbrgy WHERE brgyCode  = 133914031";
                                        $result = $conn->query($sql);
                                        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                            echo '<option value="' . $row['brgyCode'] . '" selected readonly>' . $row['brgyDesc'] . '</option>';
                                        }
                                        ?>
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
                                    <input type="text" class="form-control col-sm-9 col-12" name="contact_no" id="contact_no" placeholder="Phone Number" required data-inputmask='"mask": "9999-999-9999"' data-mask>
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

<!-- Modal Census-->
<div class="modal fade" id="modal_census" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-info">
                <h5 class="modal-title">PROFILE RECORD</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_census" action="" class="form-horizontal">
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3">
                                <!-- Profile Image -->
                                <div class="card card-info card-outline">
                                    <div class="card-body box-profile">
                                        <div class="text-center">
                                            <img class="profile-user-img img-fluid img-circle"
                                                src="../images/avatar.png"
                                                alt="User profile picture">
                                        </div>
                                        <h3 class="profile-username text-center" id="fullname">Juan Lorem Dela Cruz Jr.</h3>
                                        <p class="text-muted text-center" id="gender">FEMALE</p>
                                        <ul class="list-group list-group-unbordered mb-3">
                                            <li class="list-group-item">
                                                <b>Birth Date</b> <a class="float-right" id="bdate">1989-07-23</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Civil Status</b> <a class="float-right" id="civil_status">SINGLE</a>
                                            </li>
                                            <li class="list-group-item">
                                                <b>Citizenship</b> <a class="float-right" id="citizenship">FILIPINO</a>
                                            </li>
                                        </ul>
                                        <div class="text-center">
                                            <b class="text-center text-success" id="voter_status">ACTIVE</b>
                                        </div>
                                    </div>
                                </div>
                                <!-- Information -->
                                <div class="card card-info">
                                    <div class="card-header">
                                        <h4 class="card-title">Personal Details</h4>
                                    </div>
                                    <div class="card-body">
                                        <strong><i class="fas fa-phone-alt mr-1"></i> Contact No.</strong>
                                        <p class="text-muted" id="contact_no">0912-345-6789</p>
                                        <hr>
                                        <strong><i class="fas fa-envelope mr-1"></i>&nbsp;Email</strong>
                                        <p class="text-muted" id="email">admin@admin.com</p>
                                        <hr>
                                        <strong><i class="fas fa-map-marker-alt mr-1"></i>&nbsp;Birth Place</strong>
                                        <p class="text-muted" id="birth_place">Manila</p>
                                        <hr>
                                        <strong><i class="fas fa-map-marker-alt mr-1"></i>&nbsp;Primary Address</strong>
                                        <p class="text-muted" id="address">Malibu, California</p>
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="card card-info card-outline">
                                    <div class="card-header p-2">
                                        <h4>Census Information</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="" class="col-form-label">PROVINCIAL ADDRESS <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="provincial_address" id="provincial_address" placeholder="Provincial Address" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">House Hold Type <span class="text-danger">*</span></label>
                                            <select class="custom-select" name="household_type" id="household_type" required>
                                                <option value="" selected hidded disabled>Pumili ng Household Type</option>
                                                <option value="HEAD">HEAD</option>
                                                <option value="MEMBER">MEMBER</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">KASAMA KA, ILAN ANG MIYEMBRO NG INYONG PAMILYA? <span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="member_count" id="member_count" placeholder="Member Count" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">ANO ANG PINAKAMATAAS NA ANTAS NG PAGAARAL ANG NATAPOS? <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="educational_attainment" id="educational_attainment" placeholder="Highest Educational Attainment" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> EMPLOYMENT STATUS (TRABAHO) <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="employment_status" id="employment_status" placeholder="Employment Status" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> MAYROON BANG PHILHEALTH NA ACTIVE?<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="is_philhealth" id="is_philhealth" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="MERON">MERON</option>
                                                <option value="WALA">WALA</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> NABAKUNAHAN LABAN SA COVID-19?<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="is_covid_vacinated" id="is_covid_vacinated" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="OO">OO</option>
                                                <option value="HINDI">HINDI</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> PWD PO BA?<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="is_pwd" id="is_pwd" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="OO">OO</option>
                                                <option value="HINDI">HINDI</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> KUNG PWD, MAYROON PO BANG PWD ID?<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="with_pwd_id" id="with_pwd_id" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="MERON">MERON</option>
                                                <option value="WALA">WALA</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> KUNG PWD, ANO ANG URI DISABILITY<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="disability_type" id="disability_type" placeholder="Type of Disability" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> SOLO PARENT PO BA?<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="is_solo_parent" id="is_solo_parent" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="OO">OO</option>
                                                <option value="HINDI">HINDI</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> DAHILAN NG PAGIGING SOLO PARENT<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="solo_parent_reason" id="solo_parent_reason" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="WALANG ASAWA">WALANG ASAWA</option>
                                                <option value="NAMATAY">NAMATAY</option>
                                                <option value="NASA KULUNGAN NG MAHIGIT ISANG TAON">NASA KULUNGAN NG MAHIGIT ISANG TAON</option>
                                                <option value="HIWALAY SA ASAWA">HIWALAY SA ASAWA</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> KUNG SOLO PARENT, MAYROON PO BANG SOLO PARENT ID?<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="with_solo_parent_id" id="with_solo_parent_id" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="MERON">MERON</option>
                                                <option value="WALA">WALA</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> NAKUMPLETO BA ANG BAKUNA NG (BATA) BAGO MAG-ISANG TAONG GULANG?<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="child_vaccine_completed" id="child_vaccine_completed" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="OO">OO</option>
                                                <option value="HINDI">HINDI</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="">KUNG OO, IPAKITA ANG IMMUNIZATION CARD NG (BATA)<span class="text-danger">*</span></label>
                                            <input type="file" class="form-control" accept="image/png, image/gif, image/jpeg" name="immunization_card_img" id="immunization_card_img" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label">KUNG NAKUMPLETO, SAAN NAGPABAKUNA? <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="child_vaccine_location" id="child_vaccine_location" placeholder="Location" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> KUNG 17 TAONG GULANG PABABA AY NABIGYAN BA NG PAMPURGA?<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="below_17_napurga" id="below_17_napurga" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="OO">OO</option>
                                                <option value="HINDI">HINDI</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> KUNG OO, KAILAN ITO NATANGGAP?<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="when_napurga" id="when_napurga" placeholder="Kailan napurga ang bata" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> KUNG OO, SAAN GALING ANG PAMPURGA? <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="where_napurga" id="where_napurga" placeholder="Saan galing ang pampurga" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> PARA SA BATANG ANIM NA BUWAN PABABA, ANG BATA BA AY SUMUSUSO SA NANAY? <span class="text-danger">*</span></label>
                                            <select class="custom-select" name="is_breast_feeding_below_sixmonths" id="is_breast_feeding_below_sixmonths" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="OO">OO</option>
                                                <option value="HINDI">HINDI</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> BUNTIS PO BA?<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="is_pregnant" id="is_pregnant" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="OO">OO</option>
                                                <option value="HINDI">HINDI</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> KUNG BUNTIS, KAILAN ANG UNANG ARAW NG HULING REGLA? (LAST MENSTRUAL PERIOD)<span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="last_period" id="last_period" placeholder="Last menstrual period" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> KUNG BUNTIS, KAILAN ANG DUE DATE? <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" name="due_date_birth" id="due_date_birth" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> KUNG BUNTIS, NAGPAPRENATAL CHECK-UP PO BA?<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="is_prenatal_checkup" id="is_prenatal_checkup" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="OO">OO</option>
                                                <option value="HINDI">HINDI</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> KUNG NAGPAPRENATAL, SAAN?<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="where_prenatal" id="where_prenatal" placeholder="Lugar kung saan nagpaprenatal" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> NAGPAPASUSO BA NG BATA?<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="is_breastfeeding" id="is_breastfeeding" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="OO">OO</option>
                                                <option value="HINDI">HINDI</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> ILANG BUWAN ANG BATANG PINAPASUSO?<span class="text-danger">*</span></label>
                                            <input type="number" class="form-control" name="month_of_child_breastfeed" id="month_of_child_breastfeed" placeholder="Ilang Buwan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> GUMAGAMIT BA NG CONTRACEPTIVES(FOR BABAE)<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="use_contraceptives" id="use_contraceptives" placeholder="" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="OO">OO</option>
                                                <option value="HINDI">HINDI</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> KUNG OO, ANONG CONTRACEPTIVE ANG GINAGAMIT?<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="what_contraceptive" id="what_contraceptive" placeholder="Gamit na contraceptives" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> KUNG OO, SAAN KINUHA ANG CONTRACEPTIVES?<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="where_contraceptive" id="where_contraceptive" placeholder="Saan kinukuha o bumibili" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> ANG BAHAY AY:<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="house_type" id="house_type" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="BUSINESS HOUSE">BUSINESS HOUSE</option>
                                                <option value="RESIDENTIAL">RESIDENTIAL</option>
                                                <option value="PAREHONG BUSINESS AT RESIDENTIAL">PAREHONG BUSINESS AT RESIDENTIAL</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> KUNG BUSINESS O PAREHONG BUSINESS AT RESIDENTIAL, ITYPE ANG URI NG NEGOSYO<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" name="business_type" id="business_type" placeholder="Uri ng negosyo" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> ANONG URI NG MATERYALES ANG GINAMIT SA PAGGAWA NG INYONG BAHAY?<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="house_materials" id="house_materials" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="IBA’T-IBANG MATERYALES NA GINAMIT">IBA’T-IBANG MATERYALES NA GINAMIT</option>
                                                <option value="KAHOY">KAHOY</option>
                                                <option value="KALAHATING SEMENTO/BATO AT KALAHATING KAHOY">KALAHATING SEMENTO/BATO AT KALAHATING KAHOY</option>
                                                <option value="SEMENTO">SEMENTO</option>
                                                <option value="SEMENTO/BATO">SEMENTO/BATO</option>
                                                <option value="SEMENTO/KAHOY">SEMENTO/KAHOY</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> GAANO NA PO KAYO KATAGAL NANINIRAHAN DITO SA BARANGAY?<span class="text-danger">*</span></label>
                                            <div class="row" style="margin-left: 2px;margin-right: 2px;">
                                                <input type="number" class="form-control col-6" name="years_stay_manila" id="years_stay_manila" placeholder="Years" required>
                                                <input type="number" class="form-control col-6" name="months_stay_manila" id="months_stay_manila" placeholder="Months" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> ALIN PO SA MGA SUMUSUNOD ANG NAGLALARAWAN SA ESTADO NG INYONG PANINIRAHAN?<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="residential_status" id="residential_status" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="OWNER">MAY-ARI NG BAHAY (OWNER)</option>
                                                <option value="SHARER">NAKIKITIRA (SHARER)</option>
                                                <option value="RENTER">NANGUNGUPAHAN (RENTER)</option>
                                                <option value="SANGLA-TIRA">SANGLA-TIRA</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> ANO ANG PANGUNAHING PINAGKUKUNAN NG INYONG TUBIG?<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="water_source" id="water_source" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="KINOKOLEKTANG TUBIG ULAN">KINOKOLEKTANG TUBIG ULAN</option>
                                                <option value="NAKIKIIGIB SA KAMAG-ANAK O KAPITBAHAY">NAKIKIIGIB SA KAMAG-ANAK O KAPITBAHAY</option>
                                                <option value="PAMPUBLIKONG IGIBAN">PAMPUBLIKONG IGIBAN</option>
                                                <option value="POSO">POSO</option>
                                                <option value="SARILING GRIPO">SARILING GRIPO</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="" class="col-form-label"> ALIN SA MGA SUMUSUNOD ANG PINAKANAGLALARAWAN SA INYONG PALIKURAN?<span class="text-danger">*</span></label>
                                            <select class="custom-select" name="palikuran" id="palikuran" required>
                                                <option value="" selected hidded disabled>Pumili ng sagot</option>
                                                <option value="MAY SARILING PALIKURAN NA MAY POSO NEGRO">MAY SARILING PALIKURAN NA MAY POSO NEGRO</option>
                                                <option value="NAKIKI-CR SA KAMAG-ANAK">NAKIKI-CR SA KAMAG-ANAK</option>
                                                <option value="NAKIKI-CR SA KAPITBAHAY">NAKIKI-CR SA KAPITBAHAY</option>
                                                <option value="NAKIKI-CR SA PAMPUBLIKONG PALIKURAN">NAKIKI-CR SA PAMPUBLIKONG PALIKURAN</option>
                                                <option value="SARILING PALIKURAN PERO WALANG POSO NEGRO">SARILING PALIKURAN PERO WALANG POSO NEGRO</option>
                                                <option value="WALA">WALA</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <input type="hidden" name="user_profile_id" id="id">
                    <input type="hidden" name="action" id="action">
                    <button type="submit" class="btn btn-primary">SAVE</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">CLOSE</button>
                </div>
            </form>

        </div>
    </div>
</div>