<?php
    include ('../../config/config.php');

    //================================collecting values===================
    $ID=$_POST['ID'];
    $dex=$_POST['dex'];
    $write=$_POST['write'];
    $gym=$_POST['gym'];
    $music=$_POST['music'];
    $exp=$_POST['exp'];
    $hand=$_POST['hand'];

    $sqlUpdatepsycho ="UPDATE `psychomotortraits` SET `Dexterity` = '$dex', `WritingSkills` = '$write', `GymnasticSkills` = '$gym', `MusicalSkills` = '$music', `ExperimentalSkills` = '$exp', `HandlingOfEquipment` = '$hand' WHERE PsychomotorTraitID='$ID'";
	$queryUpdatepsycho = mysqli_query($link, $sqlUpdatepsycho);
?>