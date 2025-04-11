<?php

include('../../config/config.php');

$userID = $_POST['UserID'];
 $IntitutionID = $_POST['InstitutionID'];


        $verifyupdatequerysettings = mysqli_query($link, "SELECT * FROM `webadmissionsetting` WHERE  `InstitutionID`='$IntitutionID'");
        $verifyupdatequerysettingscnt = mysqli_num_rows($verifyupdatequerysettings);
        $verifyupdatequerysettingscntrow = mysqli_fetch_assoc($verifyupdatequerysettings);


        if( $verifyupdatequerysettingscnt > 0)
        {


                                                                                
                                        $benefitone = $verifyupdatequerysettingscntrow['FirstBenefit'];
                                        $benefit_two = $verifyupdatequerysettingscntrow['SecondBenefit'];
                                        $benefit_three = $verifyupdatequerysettingscntrow['ThirdBenefit'];
                                        $benefit_forth = $verifyupdatequerysettingscntrow['FourthBenefit'];
                                        $benefit_fifth = $verifyupdatequerysettingscntrow['FifthBenefit'];



                                        if($benefitone  == '' ||   $benefit_two == '')
                                        {
                                                echo '<div class="pros-geneclass-label" style=""><label for="schoolName">Benefit One<span style="color:red;">*</span></label></div>
                                                <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here" value="Academic Excellence: Renowned faculty, state-of-the-art resources, and a rigorous curriculum ensure top-notch education."  class="form-control  prosgeneralbenefitedit mb-2" id="prosbenefitedit1">
        
        
                                                <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit Two<span style="color:red;">*</span></label></div>
                                                <input type="text" style=" box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here" value="Holistic Development: Access to diverse extracurricular activities fosters personal growth and character development." class="form-control  prosgeneralbenefitedit  mb-2" id="prosbenefitedit2">
        
        
        
        
                                                <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit Three<span style="color:red;">*</span></label></div>
                                                <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here" value="Supportive Community: A close-knit, inclusive environment where students feel valued and encouraged."   class="form-control  prosgeneralbenefitedit  mb-2" id="prosbenefitedit3">
        
        
        
                                                <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit Four<span style="color:red;">*</span></label></div>
                                                <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here" value="Cutting-Edge Facilities: Modern classrooms and advanced labs for a future-ready learning experience"  class="form-control  prosgeneralbenefitedit  mb-2" id="prosbenefitedit4">
        
        
        
                                                <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit Five<span style="color:red;">*</span></label></div>
                                                <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here" value="Global Perspective: Embracing diversity, international programs, and cultural exchanges for a broader worldview."  class="form-control  prosgeneralbenefitedit  mb-2" id="prosbenefitedit5">';    
                                        }else
                                        {


                                                                        echo '<div class="pros-geneclass-label" style=""><label for="schoolName">Benefit One<span style="color:red;">*</span></label></div>
                                                                <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here" value="'.$benefitone.'"  class="form-control  prosgeneralbenefitedit mb-2" id="prosbenefitedit1">


                                                                <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit Two<span style="color:red;">*</span></label></div>
                                                                <input type="text" style=" box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here" value="'.$benefit_two.'" class="form-control  prosgeneralbenefitedit  mb-2" id="prosbenefitedit2">




                                                                <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit Three<span style="color:red;">*</span></label></div>
                                                                <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here" value="'.$benefit_three.'"   class="form-control  prosgeneralbenefitedit  mb-2" id="prosbenefitedit3">



                                                                <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit Four<span style="color:red;">*</span></label></div>
                                                                <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here" value="'.$benefit_forth.'"  class="form-control  prosgeneralbenefitedit  mb-2" id="prosbenefitedit4">



                                                                <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit Five<span style="color:red;">*</span></label></div>
                                                                <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here" value="'.$benefit_fifth.'"  class="form-control  prosgeneralbenefitedit  mb-2" id="prosbenefitedit5">';

                                        }


                                        



        }else
        {


         

                                        echo '<div class="pros-geneclass-label" style=""><label for="schoolName">Benefit One<span style="color:red;">*</span></label></div>
                                        <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here" value="Academic Excellence: Renowned faculty, state-of-the-art resources, and a rigorous curriculum ensure top-notch education."  class="form-control  prosgeneralbenefitedit mb-2" id="prosbenefitedit1">


                                        <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit Two<span style="color:red;">*</span></label></div>
                                        <input type="text" style=" box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here" value="Holistic Development: Access to diverse extracurricular activities fosters personal growth and character development." class="form-control  prosgeneralbenefitedit  mb-2" id="prosbenefitedit2">




                                        <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit Three<span style="color:red;">*</span></label></div>
                                        <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here" value="Supportive Community: A close-knit, inclusive environment where students feel valued and encouraged."   class="form-control  prosgeneralbenefitedit  mb-2" id="prosbenefitedit3">



                                        <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit Four<span style="color:red;">*</span></label></div>
                                        <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here" value="Cutting-Edge Facilities: Modern classrooms and advanced labs for a future-ready learning experience"  class="form-control  prosgeneralbenefitedit  mb-2" id="prosbenefitedit4">



                                        <div class="pros-geneclass-label" style=""><label for="schoolName">Benefit Five<span style="color:red;">*</span></label></div>
                                        <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; border-radius:3px; outline: 1px solid #007bff;" placeholder="enter your benefit here" value="Global Perspective: Embracing diversity, international programs, and cultural exchanges for a broader worldview."  class="form-control  prosgeneralbenefitedit  mb-2" id="prosbenefitedit5">';



        }







?>