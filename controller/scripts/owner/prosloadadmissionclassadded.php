<?php

include('../../config/config.php');

$IntitutionID = $_POST['IntitutionID'];
$UserID = $_POST['UserID'];
$campusID = $_POST['campusID'];


$selectclass = mysqli_query($link, "SELECT * FROM `classtemplate` INNER JOIN `admissionclass` ON `classtemplate`.ClassTemplateID = `admissionclass`.AdmissionDefaultClassID WHERE `admissionclass`.CampusID='$campusID' ORDER BY `classtemplate`.ClassTemplateName ASC");
$selectclasscnt = mysqli_num_rows($selectclass);
$selectclasscntrow = mysqli_fetch_assoc($selectclass);


$selectcampusprefix = mysqli_query($link, "SELECT * FROM `admissionregnumberprifix` WHERE CampusID='$campusID'");
$selectcampuscntprefix = mysqli_num_rows($selectcampusprefix);
$selectcampuscntprefix = mysqli_fetch_assoc($selectcampusprefix);




echo '
    <div class="row">';


        if ($selectcampuscntprefix > 0) {

            $RegNumberPrifix = $selectcampuscntprefix['RegNumberPrifix'];

                    echo '<div class="col-sm-12 col-md-12 col-lg-12">
                                    <div class="pros-geneclass-label" ><label for="schoolName"><b>Enter your prefix below</b><span style="color:red;">*</span></label></div>
                                    <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3;  outline: 1px solid #007bff;" value="' . $RegNumberPrifix . '"  placeholder="e:g;LFSO" class="form-control form-control-sm mb-3" id="prosadmissionprefixinputedit">
                            </div>';

        } else {

                      echo '<div class="col-sm-12 col-md-12 col-lg-12">
                                <div class="pros-geneclass-label" ><label for="schoolName"><b>Enter your prefix below</b><span style="color:red;">*</span></label></div>
                                <input type="text" style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3; outline: 1px solid #007bff;" placeholder="e:g;LFSO" class="form-control form-control-sm mb-3" id="prosadmissionprefixinputedit">
                            </div>';
        }



                if ($selectclasscnt > 0) {


                    $PaymentStatusnew = $selectclasscntrow['PaymentStatus'];

                    echo '<div class="col-sm-12 col-md-12 col-lg-12" id="proshidedatabaseclassifclassreplace">
                                    <div class="row mt-3">';



                    echo ' <div class="pros-geneclass-label" ><label for="schoolName"><b>Admission payment status</b><span style="color:red;">*</span></label></div>
                                    <small>kindly select below if applicant are to pay for for admission below. </small>
                                    <div class="form-floating mb-3 fnamevalidate">
                                    <div class="select-wrapper">
                                    <select style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3;   outline: 1px solid #007bff;" class="form-control form-control-sm " id="getadmissionpaymentstatus">

                                    <option value="0">Select Status</option>';


                    if ($PaymentStatusnew == '1') {


                        echo '<option selected value="1">payment</option>';
                        echo '<option value="0">No payment</option>';

                    } else if ($PaymentStatusnew == '0') {

                        echo '<option  value="1">payment</option>';
                        echo '<option selected value="0">No payment</option>';

                    } else {

                        echo '<option  value="1">payment</option>';
                        echo '<option  value="0">No payment</option>';

                    }



                    echo '</select>
                                    </div>
                                </div>';


                    if ($PaymentStatusnew == '1') {
                        echo '<div  class="col-sm-12 mb-3 proshidegeralamountforallclassdiv">
                                            <div class="pros-geneclass-label" ><label for="schoolName"><b>Use for all(amount)</b></label></div>
                                            <small>kindly input your admission form amount here if you want to use for all classes</small>
                                        <input type="number" style=" box-shadow:0 2px 5px 0 #D3D3D3,0 3px 11px 0 #D3D3D3;outline:1px solid #007bff;"    placeholder="e.g $1000" class="form-control prosgeneralamounteditall">
                        </div>';

                    }


                    echo '
                        <div  class="col-sm-12 mb-3" id="prosloadchangeclassdiv" data-id="exist">
                        <div class="row" >';

                    do {

                        $classnameforpayment = $selectclasscntrow['ClassTemplateName'];
                        $classnameforID = $selectclasscntrow['ClassTemplateID'];
                        $PaymentAmount = $selectclasscntrow['PaymentAmount'];
                        $PaymentStatus = $selectclasscntrow['PaymentStatus'];


                        if ($PaymentStatus == '1') {



                            echo '
                                <div class="col-sm-6 mb-3 prosgeralinputclassname">
                                    <input type="text" disabled style=" box-shadow:0 2px 5px 0 #D3D3D3,0 3px 11px 0 #D3D3D3;outline:1px solid #007bff;" data-id="' . $classnameforID . '"  value="' . $classnameforpayment . '" placeholder="Class name" class="form-control prosgeneralclassnewedit">
                                </div>';

                                echo '<div  class="col-sm-5 mb-3 pros-generalremoveclassnewamount">
                                        <input type="number" style=" box-shadow:0 2px 5px 0 #D3D3D3,0 3px 11px 0 #D3D3D3;outline:1px solid #007bff;"   value="' . $PaymentAmount . '" placeholder="e.g $1000" class="form-control prosgeneralamountedit">
                                </div>
                               
                                <div  class="col-sm-1 mb-3">
                                    <span class="text-danger generalremoveclassbtn" data-loc="server" data-campus="' . $campusID . '"  data-id="' . $classnameforID . '" style="cursor:pointer;"><i class="fa fa-trash"></i></span>
                                </div> ';

                        } else {
                                echo '<div class="col-sm-11 mb-3 prosgeralinputclassname">
                                        <input type="text" disabled style=" box-shadow:0 2px 5px 0 #D3D3D3,0 3px 11px 0 #D3D3D3;outline:1px solid #007bff;"  data-id="' . $classnameforID . '"    value="' . $classnameforpayment . '" placeholder="e.g $1000" class="form-control prosgeneralclassnewedit">
                                </div>';

                                echo '<div  class="col-sm-5 mb-3 pros-generalremoveclassnewamount" style="display:none;">
                                        <input type="number" style=" box-shadow:0 2px 5px 0 #D3D3D3,0 3px 11px 0 #D3D3D3;outline:1px solid #007bff;"   value="' . $PaymentAmount . '" placeholder="e.g $1000" class="form-control prosgeneralamountedit">
                                </div>';
                               

                                echo '<div  class="col-sm-1 mb-3">
                                    <span class="text-danger generalremoveclassbtn" data-loc="server" data-campus="' . $campusID . '"  data-id="' . $classnameforID . '" style="cursor:pointer;"><i class="fa fa-trash"></i></span>
                                </div>';
                        }

                    } while ($selectclasscntrow = mysqli_fetch_assoc($selectclass));

                    echo '</div>


                           </div>';
                                
                        echo '<div class="col-sm-12 col-md-12 col-lg-12 prosdisplayclassnamehere">

                          </div>';
 
                } else {



                    echo '<div class="col-sm-12 col-md-12 col-lg-12">
                            <div class="row mt-3">';
                                    echo ' <div class="pros-geneclass-label" >
                                                <label for="schoolName"><b>Admission payment status</b><span style="color:red;">*</span></label>
                                          </div>
                                        <small>kindly select below if applicant are to pay for for admission below. </small>

                                        <div class="form-floating mb-3 fnamevalidate">
                                            <div class="select-wrapper">
                                                <select style="box-shadow:0 2px 5px 0 #D3D3D3, 0 3px 11px 0 #D3D3D3;   outline: 1px solid #007bff;" class="form-control form-control-sm " id="getadmissionpaymentstatus">
                                                        <option value="0">Select Status</option>
                                                        <option  value="1">payment</option>
                                                        <option  value="0">No payment</option>';
                                                echo '</select>
                                            </div>
                                            </div>
                            </div>';
                            
                            echo '<div  class="col-sm-12 mb-3 proshidegeralamountforallclassdiv" style="display:none;">
                                                    <div class="pros-geneclass-label" ><label for="schoolName"><b>Use for all(amount)</b></label></div>
                                                    <small>kindly input your admission form amount here if you want to use for all classes</small>
                                        <input type="number" style=" box-shadow:0 2px 5px 0 #D3D3D3,0 3px 11px 0 #D3D3D3;outline:1px solid #007bff;"    placeholder="e.g $1000" class="form-control prosgeneralamounteditall" >
                                </div>
                                ';


                        echo '<div class="col-sm-12 col-md-12 col-lg-12 prosdisplayclassnamehere">
                                <center id="prosaddnewcampusimage"><img  class="" style="width:150px;" src="../../assets/images/users/subjectnot-found.png" >
                                        <br><small>No class found click to add new</small>
                                </center> 
                        </div>';

                }


       echo '<div>
                <span class="text-primary" data-bs-toggle="modal" data-bs-target="#prosloadaddnewsubjectmodal" style="cursor:pointer;float:right;"><i class="fas fa-plus"> Add classes </i></span>
         </div>';


echo '</div>

          <input type="hidden" value="0"  id="tractinputappended">
          <input type="hidden" value="'.$campusID.'"  id="pros-campusIDnew">
        ';

       




?>