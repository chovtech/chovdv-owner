<?php
$pros_menuData = pros_locked_menu_onboarding($UserID);

    
    ?>
<!-- Header -->
<header class="header">

    <div class="menu-icon" style="cursor: pointer;" onclick="openSidebar()">
        <span class="material-icons-sharp">menu</span>
    </div>

    <div class="header-left">
        <div class="input-group">
			<div class="input-group-text" style="border-radius:10px 0px 0px 10px;border-right:none;background:transparent;border-color:#007ffb;">
				<i class='fa fa-university sideicon' style="color:#007ffb;"></i>
			</div>
			
            <input type="hidden" id="user_id" value="<?php echo $UserID; ?>">
            <input type="hidden" id="user_type" value="<?php echo $UType; ?>">
                
           
			<select class="form-select dropbtn abba-change-institution" id="autoSizingSelect" style="border-left:none;background:transparent;border-color:#007ffb;">
				<option value="" selected disabled>Select Institution</option>
				<?php

                    $abba_sql_education_type = ("SELECT * FROM `educationlevel`");
                    $abba_query_link_education_type = mysqli_query($link, $abba_sql_education_type);
                    $abba_get_details_education_type = mysqli_fetch_assoc($abba_query_link_education_type);
                    $abba_row_cnt_education_type = mysqli_num_rows($abba_query_link_education_type);

                    if($abba_row_cnt_education_type > 0)
                    {
                        do{

                            $abba_education_type_id = $abba_get_details_education_type['EducationType'];
                            
                            $abba_education_type_name = $abba_get_details_education_type['EducationLevelName'];

                            $abba_sql_institution = ("SELECT * FROM `institution` WHERE EducationType = '$abba_education_type_id' AND AgencyOrSchoolOwnerID = '$AgencyOrSchoolOwnerID'");
                            $abba_query_link_institution = mysqli_query($link, $abba_sql_institution);
                            $abba_get_details_institution = mysqli_fetch_assoc($abba_query_link_institution);
                            $abba_row_cnt_institution = mysqli_num_rows($abba_query_link_institution);

                            if($abba_row_cnt_institution > 0)
                            {
                                echo '<optgroup label="'.$abba_education_type_name.'">';

									do{
									    
										$abba_institution_id = $abba_get_details_institution['InstitutionID'];
			
										$abba_institution_name = $abba_get_details_institution['InstitutionGeneralName'];
										
										$abba_institution_name_string_length = strlen($abba_institution_name);

										if($abba_institution_name_string_length > 15)
										{
											$abba_institution_name_shortened_or_not = substr($abba_institution_name, 0, 15).'..';
										}
										else
										{
											$abba_institution_name_shortened_or_not = $abba_institution_name;
										}

										echo '<option value="'.$abba_institution_id.'" data-id="'.$abba_institution_id.'" data-name="'.$abba_institution_name.'" data-url="'.$abba_get_details_institution['CustomUrl'].'">'.$abba_institution_name_shortened_or_not.'</option>';
										
									}while($abba_get_details_institution = mysqli_fetch_assoc($abba_query_link_institution));

								echo '</optgroup>';
                            }
                            else
							{

                            }

                        }while($abba_get_details_education_type = mysqli_fetch_assoc($abba_query_link_education_type));
                    }
                    else
					{
                        echo '<option value="0">No records found</option>';
                    }

                ?>
			</select>
			<!-- <div class="input-group-text dropdown-caret"
				style="border-radius:0px 10px 10px 0px;border-left:none;background:transparent;border-color:#007ffb;">
				<i class='fa fa-angle-double-down' style="color:#007ffb;"></i>
			</div> -->
		</div>
    </div>

        <?php
                                    
            if($UserID == '248')
            {
                //   echo '<li class="nav-item dropdown-notifications navbar-dropdown dropdown" style="margin-right: 10px;">
                // 	   <button type="button"  class="btn btn-outline-primary btn-sm chiInviteBtn" style="font-size: 13px; border-radius: 10px;" id="progressbutton">
                // 		   <i class="bx bx-line-chart"></i>  Progress Report
                // 	   </button>
                //   </li>';
            }
        ?>


    
    <div class="header-right">

        <span class="termCLA" style="margin-right: 50px;">
            
            <!--<span><i class='bx bx-calendar'></i> Third Term / 2023-2024</span>-->
        </span>

        <div class="dropdown d-inline-block" id="notificationDropdownWrapper" style="position: relative;">
            <a href="#" id="notificationBell" style=" color: #666666; text-decoration: none; font-size: 20px; margin-right: 10px;" data-bs-toggle="dropdown" aria-expanded="false">
           <i class='bx bxs-bell'></i>
                <span id="notif-badge" style="position:absolute;top:2px;right:2px;display:none;background:#dc3545;color:#fff;font-size:10px;padding:2px 5px;border-radius:50%;">0</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end shadow facebook-notif-dropdown" id="notificationDropdown" style="min-width:360px;max-width:400px;max-height:480px;overflow-y:auto;border-radius:18px;box-shadow:0 8px 32px rgba(0,0,0,0.18);padding:0.5rem 0;">
                <li class="dropdown-header fw-bold px-3 pb-2" style="font-size:1.1rem;">Notifications</li>
                <li class="text-center text-muted small py-2" id="notif-loading">Loading...</li>
                <!-- Notifications will be injected here -->
                <li><hr class="dropdown-divider"></li>
                <li class="text-center"><a href="../notifications/" class="dropdown-item text-primary">See all notifications</a></li>
            </ul>
        </div>

        <!--<div class="langdropdown">-->
        <!--    <span class="langdropbtn" style="font-size: 20px; margin-right: -5px;">-->
        <!--        <i class='bx bx-globe'></i> -->
        <!--        <i class="fa fa-angle-down" style="font-size: 13px;" aria-hidden="true"></i>-->
        <!--    </span>-->

        <!--    <div class="langdropdown-content">-->
                <!--<a href="#"> -->
                <!--    <img src="../../assets/flags/1x1/ng.svg" style="width: 20px; height: 15px;"> Igbo-->
                <!--</a>-->
                <!--<a href="#"> -->
                <!--    <img src="../../assets/flags/1x1/ng.svg" style="width: 20px; height: 15px;"> Hausa-->
                <!--</a>-->
                <!--<a href="#"> -->
                <!--    <img src="../../assets/flags/1x1/ng.svg" style="width: 20px; height: 15px;"> Yoruba-->
                <!--</a>-->
                <!--<a href="#"> -->
                <!--    <img src="../../assets/flags/1x1/us.svg" style="width: 20px; height: 15px;"> English-->
                <!--</a>-->
                <!--<a href="#"> -->
                <!--    <img src="../../assets/flags/1x1/gf.svg"  style="width: 20px; height: 15px;"> French-->
                <!--</a>-->
                <!--<a href="#"> -->
                <!--    <img src="../../assets/flags/1x1/es.svg"  style="width: 20px; height: 15px;"> Español-->
                <!--</a>-->
                <!--<a href="#"> -->
                <!--    <img src="../../assets/flags/1x1/sa.svg"  style="width: 20px; height: 15px;"> Arabic العربية-->
                <!--</a>-->
                <!--<a href="#">-->
                <!--    <img src="../../assets/flags/1x1/cn.svg"  style="width: 20px; height: 15px;"> Chinese हिंदी-->
                <!--</a>-->
                <!--<a href="#">-->
                <!--    <img src="../../assets/flags/1x1/in.svg"  style="width: 20px; height: 15px;"> Hindi हिंदी-->

                <!--</a>-->
        <!--    </div>-->
        <!--</div>-->

        
        <div class="btn-group" style="margin-top: -5px; ">
            <span type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                <?php
					echo '<img src="' . $userPicture . '" style="width: 30px; border-radius: 50%;" id="headerPic">';
				?>
            </span>
            <ul class="dropdown-menu profileDropD dropdown-menu-end">
                <li style="padding: 10px;">
                    <span > 
                        <?php
							echo '<img src="' . $userPicture . '" style="width: 30px; border-radius: 50%;" id="headerPic">';
						?>
                        <span style="font-size: 14px; font-weight: 500;"><?php echo $PrimaryName.' '.$SecondaryName; ?></span>
                    </span>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li class="<?php echo $pros_menuData['dash_menu_class'];?>">
                    <a class="dropdown-item" href="#"><i class='bx bxs-user'></i> Profile <?php echo $pros_menuData['dash_lock_icon'];?></a>
                    
                </li>
                <li class="<?php echo $pros_menuData['dash_menu_class'];?>"><a class="dropdown-item" href="../wallet"><i class="fas fa-wallet"></i> Wallet <?php echo $pros_menuData['dash_lock_icon'];?></a></li>
                <li class="<?php echo $pros_menuData['dash_menu_class'];?>"><a class="dropdown-item" href="#"><i class='bx bx-credit-card'></i> Subscription <?php echo $pros_menuData['dash_lock_icon'];?></a></li>
                <li><a class="dropdown-item" style="color: #ff0000;" href="../../controller/website-login/logout.php" id="logoutbtn"><i class='bx bx-log-out-circle bx-rotate-90' ></i> Logout</a></li>
            </ul>
        </div>
    </div>
</header>
<!--End Header -->






  <div class="modal fade" id="ekene_progress_report" tabindex="-1" aria-labelledby="ekene_progress_reporttmodalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-xl" style="width:80%;">
        <div class="modal-content" style="border-radius: 20px;">
            <div class="modal-header">
                
            </div>
            <div class="modal-body">
        
                    <!-- <input type="hidden" id=""> -->

                    <!-- <div id="publishandunpulishassignment"></div> -->
                <div class="row">
                    <div class="col-md-12 col-lg-2">
                        <div class="form-group abba_local-forms ekene_select_class">
                            <label>Campus<span style="color:orangered;">*</span> </label>
                            <select class="form-control" id="emma_display_section_for_display_campus">
                        
                                <option value="NULL">Select campus</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-2">
                        <div class="form-group abba_local-forms ekene_select_class">
                            <label>Class<span style="color:orangered;">*</span> </label>
                            <select class="form-control" id="emma_display_section_for_display_class">
                                <option value="NULL">Select class</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12 col-lg-2">
                        <div class="form-group abba_local-forms ekene_select_class">
                            <label>Term<span style="color:orangered;">*</span> </label>
                            <select class="form-control" id="emma_display_section_for_display_term">
                                <option value="NULL">Select Term</option>
                            </select>
                        </div>
                    </div>

                
                    <div class="col-md-12 col-lg-2">
                    
                    </div>

                    <div class="col-md-12 col-lg-2">
                    
                    </div>
                    <div class="col-md-12 col-lg-2">
                        <button type="button" class="btn btn-primary btn-sm" id="emma_load_assignment_question" style="width: 100%;">
                            <span style="font-size: 13px;">Load</span>
                        </button>
                    </div>
                </div>

                <div class="col-12 mt-3">
                    
                    <div class="row mt-4">
                        <div class="col-12 mt-3" id="display_progress_report">
                            <div align="center">
                                <img src="../../assets/images/adminImg/filter.png" style="width:15%;opacity:0.7;" />
                                <p class="pt-2 fs-6 text-secondary">Please
                                    filter to proceed.</p>
                            </div>
                        
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success" id="submit_topic_ekene">Done</button>
            </div>
        </div>
    </div>
 </div>

			
<!--<script src="../../controller/js/app/progressreport.js"></script>-->
<script src="../../assets/plugins/jquery/code.jquery.com_jquery-3.5.1.min.js"></script>
<script>
$(document).ready(function() {
    function loadNotifications() {
        var userID = $('#user_id').val();
        var userType = $('#user_type').val();
       
        $('#notif-loading').show();
        $.ajax({
            type: 'POST',
            url: '../../controller/scripts/owner/notifications/get_last_five.php',
            data: { userID: userID, userType: userType },
            dataType: 'json',
            success: function(res) {
                var $dropdown = $('#notificationDropdown');
                $dropdown.find('.notif-item').remove();
                $('#notif-loading').hide();
                if (res.success && res.notifications.length > 0) {
                    // Show badge if there are unread notifications
                    var unreadCount = res.notifications.filter(n => n.ViewStatus == 0).length;
                    if (unreadCount > 0) {
                        $('#notif-badge').text(unreadCount).show();
                    } else {
                        $('#notif-badge').hide();
                    }
                    res.notifications.forEach(function(n) {
                        var readClass = n.ViewStatus == 0 ? 'notif-fb-unread' : 'notif-fb-read';
                        var dot = n.ViewStatus == 0 ? '<span class="notif-fb-dot"></span>' : '<span class="notif-fb-dot notif-fb-dot-read"></span>';
                        var notifLink = `../notifications/?page=detail&id=${n.NotificationID}`;
                        var desc = n.Description.length > 50 ? n.Description.substring(0, 50) + '...' : n.Description;
                        var notifItem = `<li class="notif-item px-2 py-2 facebook-notif-item ${readClass}" style="border-bottom:1px solid #f1f1f1;transition:background 0.2s;">
                            <a href="${notifLink}" class="dropdown-item d-flex align-items-start gap-2" style="white-space:normal;padding:0;background:transparent;">
                                <div class="notif-fb-avatar"><i class='bx bxs-bell'></i></div>
                                <div style="flex:1;min-width:0;">
                                    <div style="font-size:14px;line-height:1.3;white-space:nowrap;overflow:hidden;text-overflow:ellipsis;font-weight:${n.ViewStatus == 0 ? '600' : '400'};">${desc}</div>
                                    <div class="small text-muted" style="font-size:11px;">${n.DateandTime}</div>
                                </div>
                                ${dot}
                            </a>
                        </li>`;
                        $(notifItem).insertBefore($dropdown.find('li').last().prev());
                    });
                } else {
                    var emptyMsg = '<li class="notif-item text-center text-muted small py-2">No notifications found.</li>';
                    $(emptyMsg).insertBefore($dropdown.find('li').last().prev());
                    $('#notif-badge').hide();
                }
            },
            error: function() {
                $('#notif-loading').hide();
                var errMsg = '<li class="notif-item text-center text-danger small py-2">Failed to load notifications.</li>';
                $(errMsg).insertBefore($('#notificationDropdown').find('li').last().prev());
            }
        });
    }

    // Load notifications when bell is clicked
    $('#notificationBell').on('click', function(e) {
        loadNotifications();
    });

    // Show notification count badge on page load
    function updateNotifBadge() {
        var userID = $('#user_id').val();
        var userType = $('#user_type').val();
        $.ajax({
            type: 'POST',
            url: '../../controller/scripts/owner/notifications/get_unread_count.php',
            data: { userID: userID, userType: userType },
            dataType: 'json',
            success: function(res) {
                if (res.success && res.count > 0) {
                    $('#notif-badge').text(res.count).show();
                } else {
                    $('#notif-badge').hide();
                }
            }
        });
    }
    updateNotifBadge();
});
</script>

<style>
.facebook-notif-dropdown {
    border-radius: 18px !important;
    box-shadow: 0 8px 32px rgba(0,0,0,0.18) !important;
    padding: 0.5rem 0 !important;
    background: #fff !important;
}
.facebook-notif-item {
    border-radius: 12px;
    margin: 0 8px 4px 8px;
    transition: background 0.18s;
    cursor: pointer;
}
.facebook-notif-item:hover {
    background: #f0f2f5 !important;
}
.notif-fb-avatar {
    width: 36px;
    height: 36px;
    background: #e4e6eb;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
    color: #1877f2;
    margin-right: 8px;
}
.notif-fb-dot {
    width: 10px;
    height: 10px;
    border-radius: 50%;
    background: #1877f2;
    margin-left: 10px;
    margin-top: 8px;
    display: inline-block;
}
.notif-fb-dot-read {
    background: #cfd8dc;
}
.notif-fb-unread {
    font-weight: 600;
    background: #e7f3ff;
}
.notif-fb-read {
    font-weight: 400;
    background: #fff;
}
</style>
