<input type="hidden" value="<?php echo $UserID;?>" id="user_id">



<?php
// disable menu setup mode
$pros_menuData = pros_locked_menu_onboarding($UserID);

// Add payment status check for current term/session
$sessionRes = mysqli_query($link, "SELECT sessionName FROM session WHERE sessionStatus = '1'");
$termRes = mysqli_query($link, "SELECT TermOrSemesterName, TermOrSemesterID FROM termorsemester WHERE status = '1'");
$sessionData = mysqli_fetch_assoc($sessionRes);
$termData = mysqli_fetch_assoc($termRes);

$sessionName = $sessionData['sessionName'] ?? '';
$termID = $termData['TermOrSemesterID'] ?? '';

$institutionRes = mysqli_query($link, "SELECT InstitutionID FROM institution WHERE AgencyOrSchoolOwnerID = '$UserID'");
$institution = mysqli_fetch_assoc($institutionRes);
$institutionId = $institution['InstitutionID'] ?? 0;

$campusRes = mysqli_query($link, "SELECT CampusID FROM campus WHERE InstitutionID = '$institutionId'");
$hasPaid = false;
while ($campus = mysqli_fetch_assoc($campusRes)) {
    $campusID = $campus['CampusID'];
    $paymentRes = mysqli_query($link, "SELECT 1 FROM plantransaction 
    WHERE CampusID = '$campusID' AND SessionName = '$sessionName' 
    AND TermOrSemesterName = '$termID' LIMIT 1");
    if (mysqli_num_rows($paymentRes) > 0) {
        $hasPaid = true;
        break;
    }
}
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
        
        <li class="">
            <div class="upgrades">
                <span class="material-icons-sharp">credit_card</span>
                <?php if ($hasPaid): ?>
                    <h6>Click to upgrade your plan</h6>
                    <a href="<?php echo $defaultUrl; ?>app/subscription" type="button" style="font-size: 10px;" class="btn btn-sm btn-primary">
                        <i class="fas fa-arrow-up me-2"></i>
                        Upgrade
                    </a>
                <?php else: ?>
                    <h6>Click to subscribe below</h6>
                    <a href="<?php echo $defaultUrl; ?>app/subscription" type="button" style="font-size: 10px;" class="btn btn-sm btn-primary">
                        <i class="fas fa-credit-card me-2"></i>
                        Pay Now
                    </a>
                <?php endif; ?>
            </div>

            <a href="<?php echo $defaultUrl; ?>app/menus" class="<?php echo $pros_menuData['menu_class'];?>"
             style="margin-left: 30%; cursor: pointer; font-size: 14px;color:#6c757d;text-decoration:none;" >
                
                <i class="fa fa-cog fa-spin"></i>
                Settings
                
            </a>
            <?php echo $pros_menuData['lock_icon'];?>
        </li>
    </ul>
</aside>

<div id="abba_keep_default_institutition" style="display:none;">

</div>
