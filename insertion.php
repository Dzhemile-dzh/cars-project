<?php  
	include 'config.php';
    require 'modules/class.Brands.php';
    require 'modules/class.Models.php';
    require 'modules/class.Bodyworks.php';
    require 'modules/class.Engines.php';
    require 'modules/class.Colors.php';
    require 'modules/class.Vehicles.php';
    $br = new Brands;
    $mo = new Models; 
    $bo = new Bodyworks;
    $en = new Engines;
    $co = new Colors;
    $ve = new Vehicles;
    if(isset($_POST['EDIT_BRAND'])){
      	$br_id = $br->update($_POST);
    }
    if(isset($_POST['ADD_BRAND'])){
      	$br_id = $br->insert($_POST);
      	header("Location: https://dev19.webinteractive.bg/includes/pages/all-brands.php");
    }
    if(isset($_POST['EDIT_MODEL'])){
      	$mo_id = $mo->update($_POST);
    }
    if(isset($_POST['ADD_MODEL'])){
    	  $mo_id = $mo->insert($_POST);
      	header("Location: https://dev19.webinteractive.bg/includes/pages/all-models.php");
    }
    if(isset($_POST['EDIT_BODYWORK'])){
        $bo_id = $bo->update($_POST);
    }
    if(isset($_POST['ADD_BODYWORK'])){
        $bo_id = $bo->insert($_POST);
        header("Location: https://dev19.webinteractive.bg/includes/pages/all-bodyworks.php");
    }
    if(isset($_POST['EDIT_ENGINE'])){
        $en_id = $en->update($_POST);
    }
    if(isset($_POST['ADD_ENGINE'])){
        $en_id = $en->insert($_POST);
        header("Location: https://dev19.webinteractive.bg/includes/pages/all-engines.php");
    }
    if(isset($_POST['EDIT_COLOR'])){
        $co_id = $co->update($_POST);
    }
    if(isset($_POST['ADD_COLOR'])){
        $co_id = $co->insert($_POST);
        header("Location: https://dev19.webinteractive.bg/includes/pages/all-colors.php");
    }
    if(isset($_POST['EDIT_VEHICLE'])){
        $ve_id = $ve->update($_POST);
    }
    if(isset($_POST['ADD_VEHICLE'])){
        $ve_id = $ve->insert($_POST);
        header("Location: https://dev19.webinteractive.bg/includes/pages/all-vehicles.php");
    }
    
?>