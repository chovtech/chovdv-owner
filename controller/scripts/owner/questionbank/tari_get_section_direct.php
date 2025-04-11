<?php
include('../../../config/config.php');

$tari_get_stored_instituion_id = $_POST['tari_get_stored_instituion_id'];
$campus_id = $_POST['campus_id'];

    // get total parent
    $check_class = ("SELECT * FROM `section` WHERE `CampusID` = '$campus_id' ORDER BY `SectionName` ASC");
    $query_class = mysqli_query($link,$check_class);
    $fetch_class = mysqli_fetch_assoc($query_class);
    $row_class= mysqli_num_rows($query_class);

    if($row_class > 0)
    {
        echo '<label>Section</label>
            <select class="form-control question_card select_direct pro" id = "select_direct">
            <option value="0">Please Select Section</option>';
        do{

            $sectionID = $fetch_class['SectionID'];
            $sectionName = $fetch_class['SectionName'];

            echo '<option value="'.$sectionID.'"> '.$sectionName.' </option>';

        }while($fetch_class = mysqli_fetch_assoc($query_class));

        echo'</select>';
    }else{
        echo '<img src="err.png" width="70" class="img-fluid mx-auto d-block" alt="...">
                    <figure class="text-center">
                        <blockquote class="blockquote">
                        <p style="font-size:18px;">Opps, No Section Added to this Campus.</p>
                        </blockquote>
                    </figure>';
    }
?>
