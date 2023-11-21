<div class="sidebar" id="sidebar">
  <div class="sidebar-inner slimscroll">
    <div id="sidebar-menu" class="sidebar-menu">
      <ul>
        <?php $pg_name = basename($_SERVER['PHP_SELF']); ?>

        <?php
            $dasboard_link ="website.php";
         ?>
         <li class="<?php if($pg_name=='index.php'){echo('active');} ?>" >
           <a href="index.php" ><img src="assets/img/icons/Calculator.svg" alt="img"><span> Dashboard</span> </a>
         </li>
        <li class="<?php if($pg_name==$dasboard_link){echo('active');} ?>" >
          <a href="<?= $dasboard_link ?>" ><img src="assets/img/icons/Calculator.svg" alt="img"><span> Request a Quote</span> </a>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/flight.svg" alt="img"><span> Air Freight Data</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a class="<?php if($pg_name=='a_f_o_charge.php'){echo('active');} ?>" href="a_f_o_charge.php">AIRFREIGHT ORGIN CHARGES</a></li>
            <li><a class="<?php if($pg_name=='a_f_charge.php'){echo('active');} ?>" href="a_f_charge.php">AIRFREIGHT CHARGES</a></li>
            <li><a class="<?php if($pg_name=='a_f_d_charge.php'){echo('active');} ?>" href="a_f_d_charge.php">AIRFREIGHT DESTINATION CHARGES</a></li>
            <li><a class="<?php if($pg_name=='air_lines.php'){echo('active');} ?>" href="air_lines.php">Air lines</a></li>
            <li><a class="<?php if($pg_name=='air_vendors.php'){echo('active');} ?>" href="air_vendors.php">Vendors</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/ship.svg" alt="img"><span> Sea Freight Data</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a class="<?php if($pg_name=='s_f_o_charge.php'){echo('active');} ?>" href="s_f_o_charge.php">Sea FREIGHT ORGIN CHARGES</a></li>
            <li><a class="<?php if($pg_name=='s_f_charge.php'){echo('active');} ?>" href="s_f_charge.php">Sea FREIGHT CHARGES</a></li>
            <li><a class="<?php if($pg_name=='s_f_d_charge.php'){echo('active');} ?>" href="s_f_d_charge.php">Sea FREIGHT DESTINATION CHARGES</a></li>
            <li><a class="<?php if($pg_name=='sea_vendors.php'){echo('active');} ?>" href="sea_vendors.php">Sea Vendors</a></li>
            <li><a class="<?php if($pg_name=='containers.php'){echo('active');} ?>" href="containers.php">Containers</a></li>
          </ul>
        </li>
        <li class="submenu">
          <a href="javascript:void(0);"><img src="assets/img/icons/truck.svg" alt="img"><span> Land Freight Data</span> <span class="menu-arrow"></span></a>
          <ul>
            <li><a class="<?php if($pg_name=='l_f_o_charge.php'){echo('active');} ?>" href="l_f_o_charge.php">Land FREIGHT ORGIN CHARGES</a></li>
            <li><a class="<?php if($pg_name=='l_f_charge.php'){echo('active');} ?>" href="l_f_charge.php">Land FREIGHT CHARGES</a></li>
            <li><a class="<?php if($pg_name=='l_f_d_charge.php'){echo('active');} ?>" href="l_f_d_charge.php">Land FREIGHT DESTINATION CHARGES</a></li>
          </ul>
        </li>
        <li class="<?php if($pg_name=='warehousing_data.php'){echo('active');} ?>" >
          <a href="warehousing_data.php"><img src="assets/img/icons/warehouse.svg" alt="img"><span>Warehousing Data </span></a>
        </li>
        <li class="<?php if($pg_name=='location.php'){echo('active');} ?>" >
          <a href="location.php"><img src="assets/img/icons/places.svg" alt="img"><span> Locations</span></a>
        </li>
        <li class="<?php if($pg_name=='staff_managment.php'){echo('active');} ?>" >
          <a href="staff_managment.php" ><i class="fa fa-user" data-bs-toggle="tooltip" title=""></i><span> Staff Management</span> </a>
        </li>

      </ul>
    </div>
  </div>
</div>
