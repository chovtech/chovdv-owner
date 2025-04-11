
<?php

        $select_schoolowner = mysqli_query($link, "SELECT * FROM `institution` WHERE `AgencyOrSchoolOwnerID`='$UserID'");
        $select_schoolowner_row = mysqli_fetch_assoc($select_schoolowner);
        $select_schoolowner_row_cnt = mysqli_num_rows($select_schoolowner);

         $groupschoolID_new = $select_schoolowner_row['InstitutionID'];


        $selectverify_campus_new_maincam = mysqli_query($link, "SELECT  * FROM `campus` WHERE   InstitutionID='$groupschoolID_new'");
        $selectverify_campuscnt_new_maincam = mysqli_num_rows($selectverify_campus_new_maincam);
        $selectverify_campuscnt_row_new_maincam = mysqli_fetch_assoc($selectverify_campus_new_maincam);
    
        $tagstatecampusmain = $selectverify_campuscnt_row_new_maincam['TagState'];

?>

<script>
    
    $(document).ready(function() {
            
            var tagstatus = parseInt('<?php echo $tagstate; ?>');
            
            var maincampustag = '<?php echo $tagstatecampusmain; ?>';
            
            if(maincampustag == '')
            {
               var tagstatusmaincampus = '<?php echo $tagstatecampusmain; ?>';   
            }else
            
            {
                var tagstatusmaincampus = parseInt('<?php echo $tagstatecampusmain; ?>');
            }
            
            
            

             
            if(tagstatusmaincampus < 27 || tagstatusmaincampus == '')
            {
                    if( tagstatus < 16)
                    {
                        window.location.href = "../../app/school/";   

                    }
            }
            
           

    });                   
</script>