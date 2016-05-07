<?php
$flow = null;

if(isset($_REQUEST['flow'])){
  $flow = $_REQUEST['flow'];
}

?>
<div id="sidebar-collapse" class="col-sm-3 col-lg-3 sidebar">
  <ul class="nav menu">
    <li class="active">
      <a href="index.php">
        <svg class="glyph stroked dashboard-dial">
          <use xlink:href="#stroked-dashboard-dial"></use>
        </svg> Utama
      </a>
    </li>

    <li class="parent ">
      <a data-toggle="collapse" href="#organization">
        <span>
          <i class="fa fa-building-o" aria-hidden="true"></i>
        </span> Organisasi
      </a>
      <ul class="children collapse" id="organization">
        <li class="">
          <a class="<?php if(isset($flow)) { if($flow == 'organization_list') echo 'active-nav'; }?>" href="?flow=organization_list">
            <i class="fa fa-bars" aria-hidden="true"></i> Mengenai Organisasi
          </a>
        </li>
        <li>
          <a class="" href="#">
            <i class="fa fa-bars" aria-hidden="true"></i> Carta Organisasi
          </a>
        </li>
        <li>
          <a class="" href="#">
            <i class="fa fa-bars" aria-hidden="true"></i> Kakitangan
          </a>
        </li>
      </ul>
    </li>

    <li class="parent ">
      <a data-toggle="collapse" href="#vehicle">
        <span>
          <i class="fa fa-car" aria-hidden="true"></i>
        </span> Kenderaan
      </a>
      <ul class="children collapse" id="vehicle">

        <?php if(rolesAllowed($user_roles, [01,02])) /* admin, staff, user */ {?>

        <li>
          <a class="<?php if(isset($flow)) { if($flow == 'vehicle_carryOnList') echo 'active-nav'; }?>" href="?flow=vehicle_carryOnList">
            <svg class="glyph stroked notepad ">
              <use xlink:href="#stroked-notepad"/>
            </svg> Senarai Pegangan Kenderaan
          </a>
        </li>
        <li>
          <a class="" href="#">
            <svg class="glyph stroked notepad ">
              <use xlink:href="#stroked-notepad"/>
            </svg> Senarai Kenderaan Rosak
          </a>
        </li>
        <li>
          <a class="" href="#">
            <svg class="glyph stroked clipboard with paper">
              <use xlink:href="#stroked-clipboard-with-paper"/>
            </svg> Pemeriksaan Tenikal Bulanan
          </a>
        </li>

        <?php } ?>

        <?php if(rolesAllowed($user_roles, [01])) /* admin, staff, user */ {?>

          <li>
            <a class="" href="#">
              <svg class="glyph stroked notepad ">
                <use xlink:href="#stroked-notepad"/>
              </svg> Senarai Kakitangan Staf
            </a>
          </li>
          <li>
            <a class="" href="#">
              <svg class="glyph stroked sound on">
                <use xlink:href="#stroked-sound-on"/>
              </svg> Perintah Harian Staf
            </a>
          </li>

        <?php } ?>

        <?php if(rolesAllowed($user_roles, [01,03])) /* admin, staff, user */ {?>
          <li>
            <a class="" href="#">
              <svg class="glyph stroked bag">
                <use xlink:href="#stroked-bag"></use>
              </svg> Tempah Kenderaan
            </a>
          </li>
        <?php } ?>

        <li>
          <a class="" href="#">
            <svg class="glyph stroked calendar">
              <use xlink:href="#stroked-calendar"/>
            </svg> Jadual Harian
          </a>
        </li>
      </ul>
    </li>

    <?php if(rolesAllowed($user_roles, [01])) /* admin, staff, user */ {?>

      <li class="parent ">
        <a data-toggle="collapse" href="#admin">
          <span>
            <i class="fa fa-user" aria-hidden="true"></i>
          </span> Pentadbir
        </a>
        <ul class="children collapse" id="admin">

          <li>
            <a class="<?php if(isset($flow)) { if($flow == 'staff_list') echo 'active-nav'; }?>" href="?flow=staff_list">
              <i class="fa fa-user-secret"></i> Senarai Staff
            </a>
          </li>

        </ul>

      </li>

    <?php } ?>

  </ul>

</div>