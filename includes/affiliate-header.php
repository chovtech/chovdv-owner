<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $pros_get_current_term = mysqli_query($link,"SELECT * FROM `session` INNER JOIN `termorsemester` WHERE `session`.`sessionStatus`='1' AND `termorsemester`.`status`=1");//PROS GET CURRENT TERM AND SESSION HERE

    $pros_get_current_term_fetch = mysqli_fetch_assoc($pros_get_current_term);

?>
<!-- Header -->
<header class="header">

    <div class="menu-icon" style="cursor: pointer;" onclick="openSidebar()">
        <span class="material-icons-sharp">menu</span>
    </div>

    <div class="header-left d-flex gap-2">
        <div class="input-group">
			<div class="input-group-text" style="border-radius:10px 0px 0px 10px;border-right:none;background:transparent;border-color:#007ffb;">
				<i class='fas fa-calendar-alt sideicon' style="color:#007ffb;"></i>
			</div>
			
            <input type="hidden" id="user_id" value="<?php echo $UserID; ?>">
            <input type="hidden" id="user_type" value="<?php echo $UType; ?>">

            <input type="hidden" id="pros_load_crrnt_session_gen" value="<?php echo $pros_get_current_term_fetch['sessionName']; ?>">

            
                
<<<<<<< HEAD
			<select class="form-select dropbtn abba-change-session" id="autoSizingSelect" style="border-left:none;background:transparent;border-color:#007ffb;">
				<option value="0" selected>All Session</option>
=======
			<select class="form-select dropbtn abba-change-institution pros_load_session_general" id="autoSizingSelect" style="border-left:none;background:transparent;border-color:#007ffb;">
				<option value="" selected disabled>Session</option>

>>>>>>> a4fd272ea131f98b38f85a842d73a7cfe8421b70

                <?php

                    $abba_sql_session = ("SELECT * FROM `session` ORDER BY sessionName DESC");
                    $abba_result_session = mysqli_query($link, $abba_sql_session);
                    $abba_row_session = mysqli_fetch_assoc($abba_result_session);
                    $abba_row_cnt_session = mysqli_num_rows($abba_result_session);

                    if ($abba_row_cnt_session > 0) {
                        do {
                            if ($abba_row_session['sessionStatus'] == '1') {
                                $abba_selected_session = 'selected';
                            } else {
                                $abba_selected_session = '';
                            }
                            echo '<option value="' . $abba_row_session['sessionName'] . '" ' . $abba_selected_session . '>' . $abba_row_session['sessionName'] . ' Session</option>';

                        } while ($abba_row_session = mysqli_fetch_assoc($abba_result_session));
                    } else {
                        echo '<option value="0">No Records Found</option>';
                    }
                ?>

			</select>

            <input type="hidden" id="user_id" value="<?php echo $UserID; ?>">
            <input type="hidden" id="user_type" value="<?php echo $UType; ?>">

            <select class="form-select dropbtn abba-change-term" id="autoSizingSelect" style="border-left:none;background:transparent;border-color:#007ffb;">
                <option value="0" selected>All Term</option>

                <?php

                    $abba_sql_termorsemester = ("SELECT * FROM `termorsemester`");
                    $abba_result_termorsemester = mysqli_query($link, $abba_sql_termorsemester);
                    $abba_row_termorsemester = mysqli_fetch_assoc($abba_result_termorsemester);
                    $abba_row_cnt_termorsemester = mysqli_num_rows($abba_result_termorsemester);

                    if ($abba_row_cnt_termorsemester > 0) {
                        do {
                            if ($abba_row_termorsemester['status'] == '1') {
                                $abba_selected_termorsemester = 'selected';
                            } else {
                                $abba_selected_termorsemester = '';
                            }
                            echo '<option value="' . $abba_row_termorsemester['TermOrSemesterID'] . '" ' . $abba_selected_termorsemester . '>' . $abba_row_termorsemester['TermOrSemesterName'] . ' Term</option>';

                        } while ($abba_row_termorsemester = mysqli_fetch_assoc($abba_result_termorsemester));
                    } else {
                        echo '<option value="0">No Records Found</option>';
                    }
                ?>

            </select>
        </div>
    </div>


    <div class="header-right">

        <span class="termCLA" style="margin-right: 50px;">
            
            <span><i class='bx bx-calendar'></i> <?php echo $pros_get_current_term_fetch['sessionName']?> / <?php echo $pros_get_current_term_fetch['TermOrSemesterName']?> Term</span>
        </span>

        <div class="btn-group" style="margin-top: -5px; ">
            <span type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                <?php
					echo '<img src="'. $userPicture.'" class="pros_load_header_image" style="width: 30px; border-radius: 50%;" id="headerPic">';
				?>
            </span>
            <ul class="dropdown-menu profileDropD dropdown-menu-end">
                <li style="padding: 10px;">
                    <span > 
                        <?php
							echo '<img src="'. $userPicture.'"  class="pros_load_header_image" style="width: 30px; border-radius: 50%;" id="headerPic">';
						?>
                        <span class="prosload_header_fullname" style="font-size: 14px; font-weight: 500;"><?php echo $fullname; ?></span>
                    </span>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item" href="../profile"><i class='bx bxs-user'></i> Profile</a>
                </li>
                <!-- <li><a class="dropdown-item" href="../wallet"><i class="fas fa-wallet"></i> Wallet</a></li> -->
                <!-- <li><a class="dropdown-item" href="#"><i class='bx bx-credit-card'></i> Subscription</a></li> -->
                <li><a class="dropdown-item" style="color: #ff0000;" href="../../controller/website-login/logout.php" id="logoutbtn"><i class='bx bx-log-out-circle bx-rotate-90' ></i> Logout</a></li>
            </ul>
        </div>
    </div>
</header>
<!--End Header -->