<header class="main-header">
  <!-- Logo -->
  <a href="<?php echo base_url("Home"); ?>" class="logo">
    <!-- mini logo for sidebar mini 50x50 pixels -->
    <span class="logo-mini"><center><b>S</b></center></span>
    <!-- logo for regular state and mobile devices -->
    <span class="logo-lg"><b>SIKES</b> Admin</span>
  </a>
  <!-- Header Navbar: style can be found in header.less -->
  <nav class="navbar navbar-static-top" role="navigation">
    <div class="navbar-custom-menu">
      <ul class="nav navbar-nav">
        <!-- User Account: style can be found in dropdown.less -->
        <li class="dropdown user user-menu">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
            <i class="fa fa-user"></i>
            <span class="hidden-xs">Sikes Admin</span>
          </a>
          <ul class="dropdown-menu">
            <li class="user-header">
              <p>
                <?php echo $this->session->userdata('username'); ?>
                <small><?php echo $this->session->userdata('tipe'); ?></small>
              </p>
            </li>
            <!-- Menu Footer-->
            <li class="user-footer">
              <div class="pull-right">
                <a href="<?php echo base_url()."Login/logout"; ?>" class="btn btn-default btn-flat">Sign out</a>
              </div>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </nav>
</header>
