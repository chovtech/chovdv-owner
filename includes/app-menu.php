<input type="hidden" value="<?php echo $UserID;?>" id="user_id">



<?php

       
        
            // disable menu setup mode
            $pros_menuData = pros_locked_menu_onboarding($UserID);

            // echo $pros_menuData['menu_class'];
            // echo $pros_menuData['lock_icon'];
            //  $pros_menuData['status'];

               


?>



<input type="hidden" value="<?php echo $UType;?>" id="user_type">
<aside id="sidebar">
    <div class="sidebar-title">
        <div class="sidebar-brand">
            <img src="../../assets/images/adminImg/favicon.png" style="width: 15%;" alt=""> <span>EduMESS </span>
        </div>
        <div class="close-icon" style="cursor: pointer;" onclick="closeSidebar()">
            <span class="material-icons-sharp">close</span>
        </div>
    </div>

    <ul class="sidebar-List">
        <li class="sidebar-list-item <?php echo $pros_menuData['dash_menu_class'];?>">
            <a href="<?php echo $defaultUrl;?>app/home">
                <i class='bx bx-grid-alt' style="margin-right: 10px;"></i>
                <span>Dashboard</span>
            </a>
            <?php echo $pros_menuData['dash_lock_icon'];?>
        </li>
        
         
                
                

        <li class="sidebar-list-item <?php echo $pros_menuData['menu_class'];?>">
            <a href="<?php echo $defaultUrl;?>app/school">
                <i class='fa fa-university sideicon' style="margin-right: 10px;"></i>
                <span class="links_name">My School</span>
            </a>
             <?php echo $pros_menuData['lock_icon'];?>
        </li>
        <li class="sidebar-list-item <?php echo $pros_menuData['menu_class'];?>">
            <a href="<?php echo $defaultUrl;?>app/administration">
                <i class='bx bxs-network-chart' style="margin-right: 10px;"></i>
                <span class="links_name">Administration</span>
            </a>
            <?php echo $pros_menuData['lock_icon'];?>
        </li>

        <li class="sidebar-list-item <?php echo $pros_menuData['menu_class'];?>">
            <a href="<?php echo $defaultUrl;?>app/academics">
                <i class='fa fa-book sideicon' style="margin-right: 10px;"></i>
                <span class="links_name">Academic/E-learning</span>
            </a>
            <?php echo $pros_menuData['lock_icon'];?>
        </li>
        <li class="sidebar-list-item <?php echo $pros_menuData['menu_class'];?>">
            <a href="<?php echo $defaultUrl;?>app/finance">
                <i class="fa fa-wallet sideicon" style="margin-right: 10px;"></i>
                <span class="links_name">Finance</span>
            </a>
            <?php echo $pros_menuData['lock_icon'];?>
        </li>
        
        <li class="sidebar-list-item <?php echo $pros_menuData['menu_class'];?>">
            <a href="<?php echo $defaultUrl;?>app/admission-setup">
                <i class="fa fa-graduation-cap sideicon" style="margin-right: 10px;"></i>
                <span class="links_name">Admission</span>
            </a>
            <?php echo $pros_menuData['lock_icon'];?>
        </li>
        
         <li class="sidebar-list-item">
            <a href="<?php echo $defaultUrl; ?>app/quality-assurance">
               <i class="fa fa-bullhorn sideicon" style="margin-right: 10px;"></i>
               <span class="links_name">Data Room</span>
            </a>
        </li>

        
      
        
        <!--<div class="pt-2 text-primary" align="center"><small>Coming Soon</small></div>-->
        <!--<li class="sidebar-list-item">-->
        <!--    <a href="<?php echo $defaultUrl;?>app/sales-and-marketing">-->
        <!--        <i class='bx bx-receipt' style="margin-right: 10px;"></i>-->
        <!--        <span class="links_name">Sales/Marketing</span>-->
        <!--    </a>-->
        <!--</li>-->
        
        <!--<li class="sidebar-list-item">-->
        <!--    <a href="<?php echo $defaultUrl;?>app/quality-assurance">-->
        <!--        <i class="fa fa-bullhorn sideicon" style="margin-right: 10px;"></i>-->
        <!--        <span class="links_name">Quality Assurance</span>-->
        <!--    </a>-->
        <!--</li>-->
        
        <li class="<?php echo $pros_menuData['menu_class'];?>">
            <div class="upgrades">
                <span class="material-icons-sharp">update</span>
                <h6>Upgrade your plan here</h6>
                <a href="<?php echo $defaultUrl; ?>app/upgrade" type="button" style="font-size: 10px;" class="btn btn-sm btn-primary">
                    Upgrade Plan
            </a>
            </div>

            <small style="margin-left: 30%; cursor: pointer; font-size: 14px;" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <i class="fa fa-cog fa-spin"></i>
                Settings
            </small>
            <?php echo $pros_menuData['lock_icon'];?>
        </li>
    </ul>
</aside>

<div id="abba_keep_default_institutition" style="display:none;">

</div>
