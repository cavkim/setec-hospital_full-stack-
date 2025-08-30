<div class="content">
    <div class="row">
        <div class="col-sm-4 col-3">
            <h4 class="page-title">Doctors</h4>
        </div>
        <div class="col-sm-8 col-9 text-right m-b-20">
            <a href="index.php?doctors=create_doctor" class="btn btn-primary btn-rounded float-right">
                <i class="fa fa-plus"></i> Add
                Doctor</a>
        </div>

        <div class="col-lg-8 offset-lg-2">
            <?php
            // Code
            
            ?>
        </div>
    </div>
    <div class="row doctor-grid">

        <!-- bd -->
        <?php

        $sql_query = "SELECT d.*,
                n.nationality_name,
                sd.service_name_kh,
                a.address_name,
                a.address_description,
                g.gender_name

                FROM pda_doctor d 

                INNER JOIN pda_nationality n ON d.nationality_id = n.nationality_id
                INNER JOIN pda_service_department sd ON d.service_id = sd.service_id
                INNER JOIN pda_address a ON d.address_id = a.address_id
                INNER JOIN pda_gender g ON d.gender_id = g.gender_id";

        $result = mysqli_query($CONNECTION, $sql_query);
        $num_row = mysqli_num_rows($result);
        // echo $num_row;
        
        if ($num_row > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>

                <div class="col-md-4 col-sm-4  col-lg-3">
                    <div class="profile-widget">
                        <div class="doctor-img">
                            <a class="avatar" href="index.php?doctors=view_doctor&doctor_id=<?= $row['doctor_id'] ?>">
                                <img alt="" src="assets/img/doctor-thumb-03.jpg">
                            </a>
                        </div>
                        <div class="dropdown profile-action">
                            <a href="#" class="action-icon dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><i
                                    class="fa fa-ellipsis-v"></i></a>
                            <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="edit-doctor.html"><i class="fa fa-pencil m-r-5"></i> Edit</a>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#delete_doctor"><i
                                        class="fa fa-trash-o m-r-5"></i> Delete</a>
                            </div>
                        </div>
                        <h4 class="doctor-name text-ellipsis"><a href="profile.html">
                                <?= $row['doctor_name'] ?>
                            </a></h4>
                        <div class="doc-prof">
                            <?= $row['service_name_kh'] ?>
                        </div>
                        <div class="user-country">
                            <i class="fa fa-map-marker"></i>
                            <?= $row['address_name'] ?>
                        </div>
                    </div>
                </div>

                <?php
            }
        } else {
            echo "No record found!";
        }
        ?>
        <!-- db -->
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="see-all">
                <a class="see-all-btn" href="javascript:void(0);">Load More</a>
            </div>
        </div>
    </div>
</div>