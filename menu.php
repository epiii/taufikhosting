<?php 
	// session_start(); 
	require_once'lib/koneks.php';
	/*$sql = "select id_level from tb_peg where id_peg = $_SESSION[id_userMUX]";
	//var_dump($sql);exit();
	$exe = mysql_query($sql);
	//var_dump($exe);exit();
	$res = mysql_fetch_assoc($exe);
	//var_dump($res);exit();
	*/
	?>
<div id="sidebar" class="">
  <div class="scrollbar">
    <div class="track">
      <div class="thumb">
        <div class="end"></div>
      </div>
    </div>
  </div>
  <div class="viewport ">
    <div class="overview collapse">
      <div class="search row-fluid container">
    </div>
 
	<ul id="sidebar_menu" class="navbar nav nav-list container full">
        <li class="accordion-group  color_18"> 
        	<a class="menu"  href="?hlm=<?php echo enkrip('home');?>">
            	<img src="img/menu_icons/dashboard.png">
                <span>Home</span>
			</a> 
		</li>
		<?php
			function enkrip($hlm){
            	$acak = base64_encode($hlm);
				return $acak;
			}
			function dekrip($hlm){
            	$acak = base64_decode($hlm);
				return $acak;
			}?>
        <?php
		if (($_SESSION['leveluserMUX']=='admin') or ($_SESSION['leveluserMUX']=='user') && (!empty($_SESSION['leveluserMUX']))){
		?>
        <li class="accordion-group color_25"> 
        	<a class="accordion-toggle widgets collapsed " data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse1"> 
        		<img src="img/menu_icons/forms.png">
        		<span>Master Data </span>
			</a>
           
            <ul id="collapse1" class="accordion-body collapse">
                <li><a class="menu"href="?hlm=<?php echo enkrip('mpeg')?>">Pegawai</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('muser')?>">User (Pelanggan)</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('mper')?>">Perangkat</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('mlinka')?>">Link A</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('mlinkb')?>">Link B</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('msistra')?>">Sistem Transmisi</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('mback')?>">Backbone</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('mloker')?>">Lokasi Kerja</a></li>
            </ul>
        </li>
		<?php  } ?>
        
        <li class="accordion-group color_14"> 
        	<a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse2"> 
            	<img src="img/menu_icons/others.png">
                <span>Input Data</span>
			</a>
            <ul id="collapse2" class="accordion-body collapse">
	            <li><a class="menu" href="?hlm=<?php echo enkrip('tggn')?>">Gangguan</a></li>
	            <li><a class="menu" href="?hlm=<?php echo enkrip('tsirkit')?>">Sirkit</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('mkoord')?>">Koordinasi</a></li>
                <li><a class="menu"href="?hlm=<?php echo enkrip('malat')?>">Alat Ukur</a></li>
        	</ul>
        </li>
        
        <li class="accordion-group color_8"> 
        	<a class="accordion-group" href="?hlm=<?php echo enkrip('timport')?>"> 
            	<img src="img/menu_icons/grid.png">
                <span>Import</span>
			</a>
        </li> 
        
        <li class="accordion-group color_2"> 
        	<a class="accordion-toggle widgets collapsed" data-toggle="collapse" data-parent="#sidebar_menu" href="#collapse3"> 
            	<img src="img/menu_icons/statistics.png">
                <span>Report</span>
			</a>
            <ul id="collapse3" class="accordion-body collapse"> 
            	<li><a class="menu" href="?hlm=<?php echo enkrip('ldapot')?>">Data Potensil Kanal (DAPOT)</a></li>
    		    <li><a class="menu" href="?hlm=<?php echo enkrip('lsirkit')?>">Sirkit</a></li>
    		</ul>
        </li> 
        
        <?php
    if (($_SESSION['leveluserMUX']=='admin') && (!empty($_SESSION['leveluserMUX']))){
		?>
        
        <?php } ?>
         <li class="accordion-group  color_23"> 
        	<a class="menu"  href="logout.php">
            	<img src="img/menu_icons/calendar.png">
                <span>Logout</span>
			</a> 
		</li>
        
 		<!--=============================== end of via php request ====================================-->       
        
      </ul>
      
      <div class="menu_states row-fluid container ">
        <h2 class="pull-left">Menu Settings</h2>
        <div class="options pull-right">
          <button id="menu_state_1" class="color_4" rel="tooltip" data-state ="sidebar_icons" data-placement="top" data-original-title="Icon Menu">1</button>
          <button id="menu_state_2" class="color_4 active" rel="tooltip" data-state ="sidebar_default" data-placement="top" data-original-title="Fixed Menu">2</button>
          <button id="menu_state_3" class="color_4" rel="tooltip" data-placement="top" data-state ="sidebar_hover" data-original-title="Floating on Hover Menu">3</button>
        </div>
      </div>
      <!-- End sidebar_box --> 
      
    </div>
  </div>
</div>	