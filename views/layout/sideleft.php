<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center " href="../home/">
  <div class="sidebar-brand-icon rotate-n-15">
    <i class="fas fa-laugh-wink"></i>
  </div>
  <div class="sidebar-brand-text mx-3"><?= $app['name']?> <sup>2</sup></div>
</a>

<!-- Divider -->
<hr class="sidebar-divider my-0">

<!-- Nav Item - Dashboard -->
<li class="nav-item">
  <a class="nav-link" href="../home/index.php">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>ECN Overview</span></a>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  Interface
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
    <i class="fas fa-fw fa-cog"></i>
    <span>Notification</span>
  </a>
  <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Custom Components:</h6>
      <a class="collapse-item" href="buttons.html">Buttons</a>
      <a class="collapse-item" href="cards.html">Cards</a>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
  System
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item <?=$ap == ($ap == 'module') || ($ap == 'menu') || ($ap == 'eff') ? 'active':'';?>">
  <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true" aria-controls="collapseMaster">
    <i class="fas fa-fw fa-folder"></i>
    <span>Configuration</span>
  </a>
  <div id="collapseMaster" class="collapse <?=($ap == 'module') || ($ap == 'menu') || ($ap == 'eff')  ? 'show':'';?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Configuration:</h6>
      <a class="collapse-item <?=$ap == 'module'? 'active':'';?>" href="../module/module.php">Module</a>
      <a class="collapse-item <?=$ap == 'menu'? 'active':'';?>" href="../menu/menu.php">Menu</a>
      <!-- <a class="collapse-item <?=$ap == 'eff'? 'active':'';?>" href="../effective_date/eff.php">Effective Date</a>
      <a class="collapse-item <?=$ap == 'newpage'? 'active':'';?>" href="../base/newpage.php">Blank</a> -->
      <div class="collapse-divider"></div>
    </div>
  </div>
</li>

<!-- Nav Item - Master -->
<li class="nav-item <?=$ap == 'dep' || ($ap == 'dep_create') ? 'active':'';?>">
  <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Master Data</span>
  </a>
  <div id="collapsePages" class="collapse <?=($ap == 'dep') || ($ap == 'dep_create')  ? 'show':'';?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">ข้อมูลตั้งต้นระบบ:</h6>
      <a class="collapse-item <?=$ap == 'dep' || ($ap == 'dep_create')? 'active':'';?>" href="../department/dep.php">Department</a>
      <div class="collapse-divider"></div>
    </div>
  </div>
</li>



<!-- Divider -->
<hr class="sidebar-divider">
<!-- Heading -->
<div class="sidebar-heading">
  Authentication
</div>

<!-- Nav Item - Pages Configuration -->
<li class="nav-item <?=$ap == ($ap == 'user_profile') || ($ap == 'permission')  ? 'active':'';?>">
  <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true" aria-controls="collapseUser">
    <i class="fas fa-fw fa-folder"></i>
    <span>User Profile</span>
  </a>
  <div id="collapseUser" class="collapse <?=$ap == ($ap == 'user_profile') || ($ap == 'permission')  ? 'show':'';?>" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header ">User Manage:</h6>
      <a class="collapse-item <?=$ap == 'user_profile'? 'active':'';?>" href="../user/user_profile.php">User</a>
      <a class="collapse-item <?=$ap == 'permission'? 'active':'';?>" href="../user_role/permission.php">Permission</a>
      <div class="collapse-divider"></div>
    </div>
  </div>
</li>

<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
  <button class="btn btn-info border-0" id="sidebarToggle"></button>
  <button class="btn btn-info border-0" id="viewless" >
       <i class="fas fa-angle-right"></i>
      </button>
  
</div>

</ul>
<!-- End of Sidebar -->