<?php
    include ('../../config/config.php');

    //================================collecting values===================
    $id = $_POST['ID'];
    $Punctuality = $_POST['Punctuality'];
    $Neatness = $_POST['Neatness'];
    $Curiosity = $_POST['Curiosity'];
    $Diligence = $_POST['Diligence'];
    $Creative = $_POST['Creative'];
    $Attentiveness = $_POST['Attentiveness'];
    $ClassParticipation = $_POST['ClassParticipation'];
    $Obedience  = $_POST['Obedience'];
    $Honesty = $_POST['Honesty'];
    $RelationshipWithMates = $_POST['RelationshipWithMates'];
    $Attendance = $_POST['Attendance'];

    $sql = mysqli_query($link,"UPDATE `affectivetraits`
        SET `Punctuality`='$Punctuality',`Attendance`='$Attendance',`Neatness`='$Neatness',`Curiosity`='$Curiosity',`Diligence`='$Diligence',
        `Creative`='$Creative',`Attentiveness`='$Attentiveness',`ClassParticipation`='$ClassParticipation',`Obedience`='$Obedience',`Honesty`='$Honesty',`RelationshipWithMates`='$RelationshipWithMates' 
        WHERE `AffectiveTraitID`='$id'");

?>