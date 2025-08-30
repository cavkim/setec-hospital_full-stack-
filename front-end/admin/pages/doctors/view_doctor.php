<?php
$doctor_id = isset($_GET['doctor_id']) ? $_GET['doctor_id'] : 0;
$sql_query = "SELECT d.*,
            n.nationality_name,
            sd.service_name_kh,
            a.address_name,
            a.address_description,
            d.doctor_dob,
            d.doctor_phone,
            d.license_num,
            g.gender_name
            FROM pda_doctor d 
            INNER JOIN pda_nationality n ON d.nationality_id = n.nationality_id
            INNER JOIN pda_service_department sd ON d.service_id = sd.service_id
            INNER JOIN pda_address a ON d.address_id = a.address_id
            INNER JOIN pda_gender g ON d.gender_id = g.gender_id
            WHERE d.doctor_id = $doctor_id
            ";

$result = mysqli_query($CONNECTION, $sql_query);
$num_row = mysqli_num_rows($result);


// echo $num_row;

if ($num_row > 0) {
    $row = mysqli_fetch_array($result);

    ?>

    <div class="content">

        <div class="row">
            <div class="col-sm-7 col-6">
                <h4 class="page-title">My Profile</h4>
            </div>

            <div class="col-sm-5 col-6 text-right m-b-30">
                <a href="edit-profile.html" class="btn btn-primary btn-rounded"><i class="fa fa-plus"></i> Edit Profile</a>
            </div>
        </div>
        <div class="card-box profile-header">
            <div class="row">
                <div class="col-md-12">
                    <div class="profile-view">
                        <div class="profile-img-wrap">
                            <div class="profile-img">
                                <a href="#"><img class="avatar" src="assets/img/doctor-03.jpg" alt=""></a>
                            </div>
                        </div>
                        <div class="profile-basic">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="profile-info-left">
                                        <h3 class="user-name m-t-0 mb-0"><?= $row['doctor_name'] ?></h3>
                                        <small class="text-muted"><?= $row['service_name_kh'] ?></small>
                                        <div class="staff-id">Employee ID : <?= $row['license_num'] ?></div>
                                        <div class="staff-msg"><a href="chat.html" class="btn btn-primary">Send Message</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <ul class="personal-info">
                                        <li>
                                            <span class="title">Phone:</span>
                                            <span class="text"><a href="#"><?= $row['doctor_phone'] ?></a></span>
                                        </li>
                                        <!-- <li>
                                            <span class="title">Email:</span>
                                            <span class="text"><a href="#">cristinagroves@example.com</a></span>
                                        </li> -->
                                        <li>
                                            <span class="title">Age:</span>
                                            <span class="text"><?= $row['doctor_dob'] ?></span>
                                        </li>
                                        <li>
                                            <span class="title">Address:</span>
                                            <span class="text"><?= $row['address_name'] ?></span>
                                        </li>
                                        <li>
                                            <span class="title">Gender:</span>
                                            <span class="text"><?= $row['gender_name'] ?></span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
} else {
    echo "No record found";
}
?>

    <div class="profile-tabs">
        <ul class="nav nav-tabs nav-tabs-bottom">
            <li class="nav-item"><a class="nav-link active" href="#about-cont" data-toggle="tab">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#bottom-tab2" data-toggle="tab">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="#bottom-tab3" data-toggle="tab">Messages</a></li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane show active" id="about-cont">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card-box">
                            <h3 class="card-title">Education Informations</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">International College of Medical Science
                                                    (UG)</a>
                                                <div>MBBS</div>
                                                <span class="time">2001 - 2003</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">International College of Medical Science
                                                    (PG)</a>
                                                <div>MD - Obstetrics &amp; Gynaecology</div>
                                                <span class="time">1997 - 2001</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-box mb-0">
                            <h3 class="card-title">Experience</h3>
                            <div class="experience-box">
                                <ul class="experience-list">
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Consultant Gynecologist</a>
                                                <span class="time">Jan 2014 - Present (4 years 8 months)</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Consultant Gynecologist</a>
                                                <span class="time">Jan 2009 - Present (6 years 1 month)</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="experience-user">
                                            <div class="before-circle"></div>
                                        </div>
                                        <div class="experience-content">
                                            <div class="timeline-content">
                                                <a href="#/" class="name">Consultant Gynecologist</a>
                                                <span class="time">Jan 2004 - Present (5 years 2 months)</span>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="bottom-tab2">
                Tab content 2
            </div>
            <div class="tab-pane" id="bottom-tab3">
                Tab content 3
            </div>
        </div>
    </div>
</div>