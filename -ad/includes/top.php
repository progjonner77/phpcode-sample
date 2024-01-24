<nav class="layout-navbar container-xxl navbar navbar-expand-xl
            navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">

  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3
              me-xl-0 d-xl-none ">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="bx bx-menu bx-sm"></i>
    </a>
  </div>


  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

    <!-- Search -->
    <div class="navbar-nav align-items-center">
      <div class="nav-item d-flex align-items-center">
       
      </div>
    </div>
    <!-- /Search -->


    <ul class="navbar-nav flex-row align-items-center ms-auto">



      <!-- Place this tag where you want the button to render. -->
      <!--<li class="nav-item lh-1 me-3">-->
      <!--  <a class="github-button" href="https://github.com/themeselection/sneat-html-admin-template-free" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star-->
      <!--              themeselection/sneat-html-admin-template-free on GitHub">Star</a>-->
      <!--</li>-->

 <?php
      
            $data = array(
              'id' => $_SESSION['Account_id'],
            );
            
        $result = qFields($con, "account", "*", $data);
        $i = 0;
        if (!$result) {
        } else {
          while ($row_pro = mysqli_fetch_assoc($result)) {
            ++$i;
            $Image_Name = $row_pro['Image_Name'];
            $Account_Name = $row_pro['Account_Name'];
          }
        }
        ?>

      <!-- User -->
      <li class="nav-item navbar-dropdown dropdown-user dropdown">
        <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
          <div class="avatar avatar-online">
            <?php
            if (@$Image_Name != NULL && @$Image_Name != "") {
            ?>
              <img alt="user-avatar" class="w-px-40 h-auto rounded-circle" src="includes/data/images/<?php echo @$Image_Name ?>">

            <?php
            } else {
            ?>
              <img src="../assets/img/elements/12.jpg" alt="user-avatar" class="w-px-40 h-auto rounded-circle">
            <?php

            }
            ?>
          </div>
        </a>
        <ul class="dropdown-menu dropdown-menu-end">
          <li>
            <a class="dropdown-item" href="#">
              <div class="d-flex">
                <div class="flex-shrink-0 me-3">
                  <div class="avatar avatar-online">
                    <?php
                    if (@$Image_Name != NULL && @$Image_Name != "") {
                    ?>
                      <img alt="user-avatar" class="w-px-40 h-auto rounded-circle" src="includes/data/images/<?php echo @$Image_Name ?>">

                    <?php
                    } else {
                    ?>
                      <img src="../assets/img/elements/12.jpg" alt="user-avatar" class="w-px-40 h-auto rounded-circle">
                    <?php

                    }
                    ?>
                  </div>
                </div>
                <div class="flex-grow-1">
                  <span class="fw-semibold d-block"><?php echo $Account_Name?></span>
                  <small class="text-muted">Admin</small>
                </div>
              </div>
            </a>
          </li>
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a class="dropdown-item" href="profile.php">
              <i class="bx bx-user me-2"></i>
              <span class="align-middle">My Profile</span>
            </a>
          </li>
          <li>
            <a class="dropdown-item" href="password.php">
              <i class="bx bx-cog me-2"></i>
              <span class="align-middle">Password Settings</span>
            </a>
          </li>
         <!-- <li>
            <a class="dropdown-item" href="card.php">
              <span class="d-flex align-items-center align-middle">
                <i class="flex-shrink-0 bx bx-credit-card me-2"></i>
                <span class="flex-grow-1 align-middle">Billing</span>
                <span class="flex-shrink-0 badge badge-center
                            rounded-pill bg-danger w-px-20 h-px-20">4</span>
              </span>
            </a>
          </li>-->
          <li>
            <div class="dropdown-divider"></div>
          </li>
          <li>
            <a class="dropdown-item" href="logout.php">
              <i class="bx bx-power-off me-2"></i>
              <span class="align-middle">Log Out</span>
            </a>
          </li>
        </ul>
      </li>
      <!--/ User -->


    </ul>
  </div>

</nav>