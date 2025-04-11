<!-- Header -->
<header class="header">

    <div class="menu-icon" style="cursor: pointer;" onclick="openSidebar()">
        <span class="material-icons-sharp">menu</span>
    </div>

    <div class="header-left">
        <div class="input-group">
			
		</div>
    </div>

    <div class="header-right">

        <span class="termCLA" style="margin-right: 50px;">
            <span><i class='bx bx-calendar'></i> <?php echo date('l, F j, Y');?></span>
        </span>

        <a href="" style=" color: #666666; text-decoration: none; font-size: 20px; margin-right: 10px;">
            <i class='bx bxs-bell'></i>
        </a>

        <div class="langdropdown">
            <span class="langdropbtn" style="font-size: 20px; margin-right: -5px;">
                <i class='bx bx-globe'></i> 
                <i class="fa fa-angle-down" style="font-size: 13px;" aria-hidden="true"></i>
            </span>

            <div class="langdropdown-content">
                <!--<a href="#"> -->
                <!--    <img src="../../assets/flags/1x1/ng.svg" style="width: 20px; height: 15px;"> Igbo-->
                <!--</a>-->
                <!--<a href="#"> -->
                <!--    <img src="../../assets/flags/1x1/ng.svg" style="width: 20px; height: 15px;"> Hausa-->
                <!--</a>-->
                <!--<a href="#"> -->
                <!--    <img src="../../assets/flags/1x1/ng.svg" style="width: 20px; height: 15px;"> Yoruba-->
                <!--</a>-->
                <a href="#"> 
                    <img src="../../assets/flags/1x1/us.svg" style="width: 20px; height: 15px;"> English
                </a>
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
            </div>
        </div>

        
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
                <li>
                    <a class="dropdown-item" href="#"><i class='bx bxs-user'></i> Profile</a>
                </li>
                <li><a class="dropdown-item" href="../wallet"><i class="fas fa-wallet"></i> Wallet</a></li>
                <li><a class="dropdown-item" href="#"><i class='bx bx-credit-card'></i> Subscription</a></li>
                <li><a class="dropdown-item" style="color: #ff0000;" href="../../controller/website-login/logout.php" id="logoutbtn"><i class='bx bx-log-out-circle bx-rotate-90' ></i> Logout</a></li>
            </ul>
        </div>
    </div>
</header>
<!--End Header -->
