<?php

include("../../../config/config.php");

$emma_get_category_type_for_budgeting = $_POST['emma_category_id'];
$emma_get_campus_for_budgeting = $_POST['emmacamp'];

$emma_get_category_title_select = "SELECT * FROM `category` WHERE `CategoryType` = '$emma_get_category_type_for_budgeting' ORDER BY `CategoryTitle` ASC";
$emma_get_category_title_query = mysqli_query($link, $emma_get_category_title_select);
$emma_get_category_title_fetch = mysqli_fetch_assoc($emma_get_category_title_query);
$emma_get_category_title_rows = mysqli_num_rows($emma_get_category_title_query);

    if($emma_get_category_title_rows > 0){

     echo '<div class="row">
            <fieldset class="tari-tari_checkbox-group">
                <div class="tari_checkbox">
                    <label for="emma_select_all_checkboxes" class="tari_checkbox-wrapper">
                        <input type="checkbox" value="" id="emma_select_all_checkboxes"  class="tari_checkbox-input" data-id="" data-span=""/>
                        <span class="tari_checkbox-tile">
                        <span class="tari_checkbox-label">Select All <!--- <span id="emma_select_all_checkboxes"></span> --></span>
                        </span>
                    </label>
                </div>
            </fieldset>';
    do{
        $emma_get_category_title = $emma_get_category_title_fetch['CategoryTitle'];
        $emma_get_category_id = $emma_get_category_title_fetch['CategoryID'];

        if ($emma_get_category_id == 27) {
            $select_for_transport = "SELECT * FROM `transportationtable` WHERE `CampusID` = '$emma_get_campus_for_budgeting' AND `DeleteStatus` = 0 ORDER BY `RouteName` ASC ";
            $query_for_transport = mysqli_query($link, $select_for_transport);
        
            if (mysqli_num_rows($query_for_transport) > 0) {
                echo '
                <div class="card mt-3">
                    <div class="card-header">
                        <label for="emma_checkbox_for_category'.$emma_get_category_id.'" class="">
                            <input type="checkbox" value="'.$emma_get_category_title.'" data-id="'.$emma_get_category_id.'" id="emma_checkbox_for_category'.$emma_get_category_id.'" class="tari_checkbox-input emmasubcategorytitle'.$emma_get_category_id.' emmacheckallforcategorytitle">
                            <span class="tari_checkbox-tile">
                                <span class="tari_checkbox-label">'.$emma_get_category_title.'</br></span>
                            </span>
                        </label>
                    </div>
        
                    <div class="card-body">
                        <div class="emmaloadsubcategorytypeforbudgeting"></div>
                        <div class="row">';
                
                while ($fetch_for_transport = mysqli_fetch_assoc($query_for_transport)) {
                    $emma_get_route_id = $fetch_for_transport['RouteID'];
                    $emma_get_route_name = $fetch_for_transport['RouteName'];
        
                    echo '<div class="col-lg-4">
                                <fieldset class="tari-tari_checkbox-group">
                                    <div class="tari_checkbox">
                                        <label for="emma_checkbox_for_sub_category'.$emma_get_route_id.'" class="">
                                            <input type="checkbox" value="'.$emma_get_route_name.'" id="emma_checkbox_for_sub_category'.$emma_get_route_id.'" data-cate="'.$emma_get_category_id.'" data-ide="'.$emma_get_route_id.'" class="tari_checkbox-input emmageneralclassforsubcategorytitle emmacheckall'.$emma_get_category_id.' ">
                                            <span class="tari_checkbox-tile">
                                                <span class="tari_checkbox-label">'.$emma_get_route_name.'</br></span>
                                            </span>
                                        </label>
                                    </div>
                                </fieldset>
                            </div>';
                }
        
                echo '</div>
                    </div>
                </div>';
            } else {
                
            }
        } elseif ($emma_get_category_title == 'HOSTEL') {

            $select_for_hostel = "SELECT * FROM `hosteltable` WHERE `CampusID` = '$emma_get_campus_for_budgeting' AND `DeleteStatus` = 0 ORDER BY `HostelName` ASC ";
            $query_for_hostel = mysqli_query($link, $select_for_hostel);

            if (mysqli_num_rows($query_for_hostel) > 0) {
                echo '
                <div class="card mt-3">
                    <div class="card-header">
                        <label for="emma_checkbox_for_category'.$emma_get_category_id.'" class="">
                            <input type="checkbox" value="'.$emma_get_category_title.'" data-id="'.$emma_get_category_id.'" id="emma_checkbox_for_category'.$emma_get_category_id.'" class="tari_checkbox-input emmasubcategorytitle'.$emma_get_category_id.' emmacheckallforcategorytitle">
                            <span class="tari_checkbox-tile">
                                <span class="tari_checkbox-label">'.$emma_get_category_title.'</br></span>
                            </span>
                        </label>
                    </div>
        
                    <div class="card-body">
                        <div class="emmaloadsubcategorytypeforbudgeting"></div>
                        <div class="row">';
                
                while ($fetch_for_hostel = mysqli_fetch_assoc($query_for_hostel)) {
                    $emma_get_hostel_id = $fetch_for_hostel['HostelID'];
                    $emma_get_hostel_name = $fetch_for_hostel['HostelName'];
        
                    echo '<div class="col-lg-4">
                                <fieldset class="tari-tari_checkbox-group">
                                    <div class="tari_checkbox">
                                        <label for="emma_checkbox_for_sub_category'.$emma_get_hostel_id.'" class="">
                                            <input type="checkbox" value="'.$emma_get_hostel_name.'" id="emma_checkbox_for_sub_category'.$emma_get_hostel_id.'" data-cate="'.$emma_get_category_id.'" data-ide="'.$emma_get_hostel_id.'" class="tari_checkbox-input emmageneralclassforsubcategorytitle emmacheckall'.$emma_get_category_id.' ">
                                            <span class="tari_checkbox-tile">
                                                <span class="tari_checkbox-label">'.$emma_get_hostel_name.'</br></span>
                                            </span>
                                        </label>
                                    </div>
                                </fieldset>
                            </div>';
                }
        
                echo '</div>
                    </div>
                </div>';
            } else {
                
            }

        } else {

            echo '
            <div class="card mt-3">
                <div class="card-header">
                    <label for="emma_checkbox_for_category'.$emma_get_category_id.'" class="">
                        <input type="checkbox" value="'.$emma_get_category_title.'" data-id="'.$emma_get_category_id.'" id="emma_checkbox_for_category'.$emma_get_category_id.'" class="tari_checkbox-input emmasubcategorytitle'.$emma_get_category_id.' emmacheckallforcategorytitle">
                        <span class="tari_checkbox-tile">
                            <span class="tari_checkbox-label">'.$emma_get_category_title.'</br></span>
                        </span>
                    </label>
                </div>

                <div class="card-body">
                    <div class="emmaloadsubcategorytypeforbudgeting"></div>';

                $select_for_sub_category = "SELECT * FROM `subcategory` WHERE `categoryID` = '$emma_get_category_id' ORDER BY `SubcategoryTitle` ASC";
                $select_for_sub_category_query = mysqli_query($link, $select_for_sub_category);
                $select_for_sub_category_fetch = mysqli_fetch_assoc($select_for_sub_category_query);
                $select_for_sub_category_rows = mysqli_num_rows($select_for_sub_category_query);

                if($select_for_sub_category_rows > 0){

                    echo '<div class="row">';

                    do{
                        $emma_get_category_id = $select_for_sub_category_fetch['CategoryID'];
                        $emma_get_sub_category_id = $select_for_sub_category_fetch['SubcategoryID'];
                        $emma_get_sub_category_name = $select_for_sub_category_fetch['SubcategoryTitle'];

                        echo '<div class="col-lg-4">
                                <fieldset class="tari-tari_checkbox-group">
                                    <div class="tari_checkbox">
                                        <label for="emma_checkbox_for_sub_category'.$emma_get_sub_category_id.'" class="">
                                            <input type="checkbox" value="'.$emma_get_sub_category_name.'" id="emma_checkbox_for_sub_category'.$emma_get_sub_category_id.'" data-cate="'.$emma_get_category_id.'" data-ide="'.$emma_get_sub_category_id.'" class="tari_checkbox-input emmageneralclassforsubcategorytitle emmacheckall'.$emma_get_category_id.' ">
                                            <span class="tari_checkbox-tile">
                                                <span class="tari_checkbox-label">'.$emma_get_sub_category_name.'</br></span>
                                            </span>
                                        </label>
                                    </div>
                                </fieldset>
                            </div>';
                    }while($select_for_sub_category_fetch = mysqli_fetch_assoc($select_for_sub_category_query));

                    echo '</div>
                    </div>
                </div>';
                    
                }else{
                    // echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:10%;"/><p class="pt-2 fs-sm text-secondary">No sub-category was found.</p></div>';
                }
        }
    }while($emma_get_category_title_fetch = mysqli_fetch_assoc($emma_get_category_title_query));
        echo '</div>';
    }else{
        echo 'No Records Found';
    }

?>