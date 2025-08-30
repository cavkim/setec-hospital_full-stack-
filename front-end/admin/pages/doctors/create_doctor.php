<div class="content">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <h4 class="page-title">Add Doctor</h4>
        </div>
        <div class="col-lg-8 offset-lg-2">
            <?php
            $code_auto_generate = "DTR" . date('dmYHis') . rand(100, 999);

            // Define variables and initialize with empty values  
            $d_licenseNumberErr = $d_nameErr = $d_emailErr = $d_mobilenoErr = "";
            $d_dobErr = $d_genderErr = $d_nationalityErr = $d_addressErr = $d_serviceErr = $d_photoErr = "";
            $d_license_num = $d_name = $d_email = $d_mobileno = $d_dob = $d_gender = $d_nationality = $d_address = $d_service = "";

            if (isset($_POST["btn_SaveDoctor"])) {
                $d_license_num = isset($_POST["txt_license_num"]) ? $_POST["txt_license_num"] : "";
                $d_name = isset($_POST["text_doctor_name"]) ? $_POST["text_doctor_name"] : "";
                $d_email = isset($_POST["txt_doctor_email"]) ? $_POST["txt_doctor_email"] : "";
                $d_mobileno = isset($_POST["text_doctor_phone"]) ? $_POST["text_doctor_phone"] : "";
                $d_dob = isset($_POST["text_doctor_dob"]) ? $_POST["text_doctor_dob"] : "";
                $d_gender = isset($_POST["rdo_gender_name"]) ? $_POST["rdo_gender_name"] : "";
                $d_nationality = isset($_POST["sel_nationality_id"]) ? $_POST["sel_nationality_id"] : "";
                $d_address = isset($_POST["sel_address_id"]) ? $_POST["sel_address_id"] : "";
                $d_service = isset($_POST["sel_service_id"]) ? $_POST["sel_service_id"] : "";

                // License number validation  
                if (empty($d_license_num)) {
                    $d_licenseNumberErr = "License Number is required";
                } else {
                    $dlicensenum = input_data($d_license_num);
                    if (!preg_match("/^[a-zA-Z0-9]*$/", $dlicensenum)) {
                        $d_licenseNumberErr = "Only alphabets and numbers are allowed";
                    }
                }

                // Doctor name validation  
                if (empty($d_name)) {
                    $d_nameErr = "Doctor Name is required";
                } else {
                    $dname = input_data($d_name);
                    if (!preg_match("/^[a-zA-Z ]*$/", $dname)) {
                        $d_nameErr = "Only alphabets and white space are allowed";
                    }
                }

                // Email validation  
                if (empty($d_email)) {
                    $d_emailErr = "Email is required";
                } else {
                    $demail = input_data($d_email);
                    if (!filter_var($demail, FILTER_VALIDATE_EMAIL)) {
                        $d_emailErr = "Invalid email format";
                    }
                }

                // Mobile number validation  
                if (empty($d_mobileno)) {
                    $d_mobilenoErr = "Mobile number is required";
                } else {
                    $dmobile = input_data($d_mobileno);
                    if (!preg_match("/^[0-9]{9,11}$/", $dmobile)) {
                        $d_mobilenoErr = "Only numbers are allowed (9–11 digits)";
                    }
                }

                // Date of Birth validation  
                if (empty($d_dob)) {
                    $d_dobErr = "Date of Birth is required";
                } else {
                    $ddob = input_data($d_dob);
                    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $ddob)) {
                        $d_dobErr = "Invalid Date format (use YYYY-MM-DD)";
                    }
                }

                // Gender validation  
                if (empty($d_gender)) {
                    $d_genderErr = "Gender is required";
                }

                // Nationality validation  
                if (empty($d_nationality) || $d_nationality == "Choosse Nationality") {
                    $d_nationalityErr = "Please select nationality";
                }

                // Address validation  
                if (empty($d_address) || $d_address == "Choosse Address") {
                    $d_addressErr = "Please select address";
                }

                // Service validation  
                if (empty($d_service) || $d_service == "Choosse Service") {
                    $d_serviceErr = "Please select service";
                }

                // Photo validation
                if (isset($_FILES["file_doctor_photo"]) && $_FILES["file_doctor_photo"]["error"] == 0) {
                    $target_dir = "uploads/doctors/";
                    $target_file = $target_dir . basename($_FILES["file_doctor_photo"]["name"]);
                    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                    $uploadOk = 1;

                    // Check if image file is an actual image
                    $check = getimagesize($_FILES["file_doctor_photo"]["tmp_name"]);
                    if ($check === false) {
                        $d_photoErr = "File is not an image";
                        $uploadOk = 0;
                    }

                    // Check file size (5MB limit)
                    if ($_FILES["file_doctor_photo"]["size"] > 5000000) {
                        $d_photoErr = "File is too large (max 5MB)";
                        $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                        $d_photoErr = "Only JPG, JPEG, PNG & GIF files are allowed";
                        $uploadOk = 0;
                    }
                } else if (isset($_FILES["file_doctor_photo"]) && $_FILES["file_doctor_photo"]["error"] != 4) {
                    // Error occurred during upload (but not "no file selected")
                    $d_photoErr = "Error uploading file";
                }

                // If no validation errors, process the data and clear form
                if (
                    empty($d_licenseNumberErr) && empty($d_nameErr) && empty($d_emailErr) &&
                    empty($d_mobilenoErr) && empty($d_dobErr) && empty($d_genderErr) &&
                    empty($d_nationalityErr) && empty($d_addressErr) && empty($d_serviceErr) && empty($d_photoErr)
                ) {




                    // Clear all form variables after successful submission
                    $d_license_num = $d_name = $d_email = $d_mobileno = $d_dob = $d_gender = $d_nationality = $d_address = $d_service = "";

                    //SweetAlert success message
                    echo '<script>
                        Swal.fire({
                            title: "Success!",
                            text: "Doctor added successfully!",
                            icon: "success",
                            confirmButtonText: "OK"
                        });
                    </script>';
                }
            }

            // Sanitization function  
            function input_data($data)
            {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
            }
            ?>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-8 offset-lg-2">
            <form method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Doctor Code<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="txt_doctor_code"
                                value="<?= $code_auto_generate; ?>" readonly>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Doctor Number<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="txt_license_num"
                                value="<?= $d_license_num ?>">
                            <span class="error text-danger"><?php echo $d_licenseNumberErr; ?></span>

                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Doctor Name<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="text_doctor_name" value="<?= $d_name ?>">
                            <span class="error text-danger"><?php echo $d_nameErr; ?></span>
                        </div>
                    </div>


                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Date of Birth</label>
                            <div class="cal-icon">
                                <input type="text" class="form-control datetimepicker" name="text_doctor_dob"
                                    value="<?= $d_dob ?>">
                            </div>
                            <span class="error text-danger"><?php echo $d_dobErr; ?></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label>Phone<span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="text_doctor_phone" value="<?= $d_mobileno ?>">
                            <span class="error text-danger"><?php echo $d_mobilenoErr; ?></span>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group gender-select">
                            <label class="gen-label">Gender:</label>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="rdo_gender_name" value="1" class="form-check-input"
                                        <?= ($d_gender == "1") ? "checked" : "" ?>>Male
                                </label>
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="radio" name="rdo_gender_name" value="2" class="form-check-input"
                                        <?= ($d_gender == "2") ? "checked" : "" ?>>Female
                                </label>
                            </div>
                            <span class="error text-danger"><?php echo $d_genderErr; ?></span>
                        </div>
                    </div>

                    <div class="col-sm-12">

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input class="form-control" type="text" name="txt_doctor_email"
                                        value="<?= $d_email ?>">
                                    <span class="error text-danger"><?php echo $d_emailErr; ?></span>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Nationality</label>
                                    <select class="form-control select " name="sel_nationality_id">
                                        <option>Choosse Nationality</option>
                                        <?php
                                        $sql_query = mysqli_query($CONNECTION, "SELECT * FROM pda_nationality;");
                                        while ($row = mysqli_fetch_assoc($sql_query)) {
                                            $selected = ($d_nationality == $row['nationality_id']) ? "selected" : "";
                                            echo '<option value="' . $row['nationality_id'] . '" ' . $selected . '>' . $row['nationality_name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <span class="error text-danger"><?php echo $d_nationalityErr; ?></span>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <select class="form-control select " name="sel_address_id">
                                        <option>Choosse Address</option>
                                        <?php
                                        $sql_query = mysqli_query($CONNECTION, "SELECT * FROM pda_address;");
                                        while ($row = mysqli_fetch_assoc($sql_query)) {
                                            $selected = ($d_address == $row['address_id']) ? "selected" : "";
                                            echo '<option value="' . $row['address_id'] . '" ' . $selected . '>' . $row['address_name'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <span class="error text-danger"><?php echo $d_addressErr; ?></span>
                                </div>
                            </div>

                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <div class="form-group">
                                    <label>Service</label>
                                    <select class="form-control select " name="sel_service_id">
                                        <option>Choosse Service</option>
                                        <?php
                                        $sql_query = mysqli_query($CONNECTION, "SELECT * FROM pda_service_department;");
                                        while ($row = mysqli_fetch_assoc($sql_query)) {
                                            $selected = ($d_service == $row['service_id']) ? "selected" : "";
                                            echo '<option value="' . $row['service_id'] . '" ' . $selected . '>' . $row['service_name_kh'] . '</option>';
                                        }
                                        ?>
                                    </select>
                                    <span class="error text-danger"><?php echo $d_serviceErr; ?></span>
                                </div>
                            </div>



                        </div>
                    </div>

                    <div class="col-sm-12">
                        <div class="form-group">
                            <label>Photo</label>
                            <div class="profile-upload">
                                <div class="upload-img">
                                    <img alt="" src="assets/img/user.jpg">
                                </div>
                                <div class="upload-input">
                                    <input type="file" class="form-control" name="file_doctor_photo">
                                </div>
                            </div>
                            <span class="error text-danger"><?php echo $d_photoErr; ?></span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Short Biography</label>
                    <textarea class="form-control" rows="3" cols="30" name="tar_biography"></textarea>
                </div>
                <div class="form-group">
                    <label class="display-block">Status</label>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rdo_status" value="1" checked="">
                        <label class="form-check-label">
                            Active
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="rdo_status" value="0">
                        <label class="form-check-label" for="doctor_inactive">
                            Inactive
                        </label>
                    </div>
                </div>
                <div class="m-t-20 text-center">
                    <button type="submit" name="btn_SaveDoctor" class="btn btn-primary submit-btn">Create
                        Doctor</button>
                </div>
            </form>
        </div>
    </div>
</div>