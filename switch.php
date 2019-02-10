<?php
if (isset($_POST['listings'])){
    $listings = $_POST['listings'];
} else if (isset($_GET['listings'])) {
    $listings = $_GET['listings'];
} else {
    $listings = 'chooseListing';
}

switch ($listings) {
    case 'captivaCondo':
       echo '1';
        break;
    case 'captivaResidential':
    echo '2';
        break;
    case 'sanibelCondo':
    echo '2';
        break;
    case 'sanibelResidential':
    echo '2';
        break;
    case 'choose':
    echo '2';
        break;
}
?>

<select name="listings" class="form-control input-lg">
     <option value="choose">Choose an option</option>
     <option value="captivaCondo" <?php if($listings == "captivaCondo") print('selected="selected"'); ?> >Captiva Condo</option>
     <option value="captivaResidential" <?php if($listings == "captivaResidential") print('selected="selected"'); ?> >Captiva Residential</option>
     <option value="sanibelCondo"  <?php if($listings == "sanibelCondo") print('selected="selected"'); ?> >Sanibel Condo</option>
     <option value="sanibelResidential" <?php if($listings == "sanibelResidential") print('selected="selected"'); ?> >Sanibel Residential</option>
</select>