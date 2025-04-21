<?php

// error_reporting(E_ALL);
//     ini_set('display_errors', 1);
    
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
			
            <input type="hidden" id="user_id" value="<?php #echo $UserID; ?>">
            <input type="hidden" id="user_type" value="<?php #echo $UType; ?>">
                
			<select class="form-select dropbtn abba-change-institution" id="autoSizingSelect" style="border-left:none;background:transparent;border-color:#007ffb;">
				<option value="" selected disabled>Session</option>
				
			</select>
			<!-- <div class="input-group-text dropdown-caret"
				style="border-radius:0px 10px 10px 0px;border-left:none;background:transparent;border-color:#007ffb;">
				<i class='fa fa-angle-double-down' style="color:#007ffb;"></i>
			</div> -->
		</div>
    </div>


  

    
    <div class="header-right">

        <span class="termCLA" style="margin-right: 50px;">
            
            <span><i class='bx bx-calendar'></i> Third Term / 2023-2024</span>
        </span>

     

        
        <div class="btn-group" style="margin-top: -5px; ">
            <span type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown">
                <?php
					// echo '<img src="' . $userPicture . '" style="width: 30px; border-radius: 50%;" id="headerPic">';
				?>
            </span>
            <ul class="dropdown-menu profileDropD dropdown-menu-end">
                <li style="padding: 10px;">
                    <span > 
                        <?php
							// echo '<img src="' . $userPicture . '" style="width: 30px; border-radius: 50%;" id="headerPic">';
						?>
                        <span style="font-size: 14px; font-weight: 500;"><?php #echo $PrimaryName.' '.$SecondaryName; ?></span>
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





