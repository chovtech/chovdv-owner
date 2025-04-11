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
        <li class="sidebar-list-item">
            <a href="<?php echo $defaultUrl;?>office/home">
                <i class='bx bx-grid-alt' style="margin-right: 10px;"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="sidebar-list-item">
            <a href="<?php echo $defaultUrl;?>office/sales">
                <i class="fas fa-bullseye sideicon" style="margin-right: 10px;"></i>
                <span class="links_name">Sales</span>
            </a>
        </li>
        
        <li>
            <div class="upgrades">
                <span class="material-icons-sharp">update</span>
                <h6>Upgrade your plan here</h6>
                <button type="button" style="font-size: 10px;" class="btn btn-sm btn-primary">
                    Upgrade Plan
                </button>
            </div>

            <small style="margin-left: 30%; cursor: pointer; font-size: 14px;" data-bs-toggle="modal"
                data-bs-target="#exampleModal">
                <i class="fa fa-cog fa-spin"></i>
                Settings
            </small>
        </li>
    </ul>
</aside>

<div id="abba_keep_default_institutition" style="display:none;">

</div>
