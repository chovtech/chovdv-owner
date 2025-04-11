<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../../config/config.php');

    $abba_campus_id = $_POST['campus_id'];

    $abba_display_section = $_POST['abba_display_section'];
    
    $abba_display_session = $_POST['abba_display_session'];

    $abba_display_term = $_POST['abba_display_term'];
    
    $abba_display_term_name = $_POST['abba_display_term_name'];
    
    $abba_get_instituion_id = $_POST['abba_instituion_id'];

    $abba_sql_classordepartment = "SELECT 
            classordepartment.ClassOrDepartmentID,
            classordepartment.ClassOrDepartmentName,
            SUM(CASE WHEN chargestructure.status = 0 THEN chargestructure.Amount ELSE 0 END) AS OptionalAmount,
            SUM(CASE WHEN chargestructure.status = 1 THEN chargestructure.Amount ELSE 0 END) AS CompulsoryAmount,
            classordepartment.CampusID
        FROM 
            classordepartment
        INNER JOIN 
            chargestructure ON classordepartment.ClassOrDepartmentID = chargestructure.ClassOrDepartmentID AND classordepartment.CampusID = chargestructure.CampusID
        WHERE 
            (classordepartment.CampusID = $abba_campus_id OR $abba_campus_id IS NULL) 
            AND (classordepartment.SectionID = $abba_display_section OR $abba_display_section IS NULL) 
            AND (chargestructure.InstitutionID = $abba_get_instituion_id OR $abba_get_instituion_id IS NULL) 
            AND (chargestructure.CampusID = $abba_campus_id OR $abba_campus_id IS NULL) 
            AND chargestructure.Session = '$abba_display_session' 
            AND (chargestructure.TermOrSemesterID = $abba_display_term OR $abba_display_term IS NULL)
        GROUP BY 
            classordepartment.ClassOrDepartmentID
        ORDER BY 
            ClassOrDepartmentName ASC;
";
    $abba_result_classordepartment = mysqli_query($link, $abba_sql_classordepartment);
    $abba_row_classordepartment = mysqli_fetch_assoc($abba_result_classordepartment);
    $abba_row_cnt_classordepartment = mysqli_num_rows($abba_result_classordepartment);
    
    if($abba_row_cnt_classordepartment > 0)
    {
        echo '<div class="row g-4 mt-1 maincard selectBox-cont">';
            
            do{

                $class_id = $abba_row_classordepartment['ClassOrDepartmentID'];

                $class_name = $abba_row_classordepartment['ClassOrDepartmentName'];

                $class_amount = $abba_row_classordepartment['CompulsoryAmount'];

                $campus_id = $abba_row_classordepartment['CampusID'];
                
                $totopt = $abba_row_classordepartment['OptionalAmount'];
                
                echo '<div class="col-sm-3 col-md-6 col-lg-3 carditems card_search_get">
                    <div class="topSecCards" style="width: 100%; ">
                        
                        <div align="center" style="margin-top: 18px;padding-top:20px;">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAGQAAABkCAYAAABw4pVUAAAACXBIWXMAAAsTAAALEwEAmpwYAAAE3UlEQVR4nO2cW4hVVRjHf03NGJqmPWiUaeFohCT2EiUUU5SQUG/RBclL0kOKlFCklfMWBBEERfXSg10oJCgwgiCosSAlrKnpqcHKSanQxqjIsWzHgv+B1WHOnn22Z2ZdzveDxTln7/3t863zP2utb+11AcMwDMMwDMMwDMMwDMMwDMMwDKNTfAoUGaf9qf1Vii5ISZGk0znnLUmnc85bmdMjEVQ3RcU0AXwALKmYt2hJ0ulJ6AN2SpSk8jYPeBI4BPzhOb0JOJe0maWSkowgK4GxkmJ/ELiItClSEeRC4Ds5+AkwAMwG5gL3AqM6dyDxklKkIsguOfeVinYzCz1RNpIuX6ciyCE5d0fJNXd5pSQHipgF+VPOuZLQioW6xl2bA0XqgizSNS76yoEi9Srrbl3zGXlQ5NKobyBdRlMRZJ4X9rpH7jcDc3R8PXA4cNg7oEc1XRP2NjqGP5R0DF1VtSCQGL/otWvC3gauI/g48Dnwu+e063v0JC5GM0kIEpPTA9MgRjJtSCtCOX0D8LPask6SVBtyDTAIfKi2pNE3celj4Blg7QxUXQPTXE1FL8iNGuyvOtjjxHpYYwwpiRG9IC58fRY4I8dOAM8Bt2tkbbauuQS4CXgMGPYy8i1wa0JiRC3IecCb3vDmbglQBVevfyHbf4Gngd4ExIg67N0tZ8aBNTXsezQk+rc3hnJx5GI0E40g/SoVZzoQxawBjihjPwLXRi5GlGHvU3JkT4fut0hRmLvnXxp/j7VkRNmGfClHXHTVKXqB56eIzv5RHb42cDUVnSDjcmR+TfuPFG25zlszm4FfpxDGVZXHA4gRrSCTOTJaw95FWC+3IWyfQudCgoYgGUGKGvan9HoMuLONh5chh4GzFuQqYMj7vE8RXFkJ2RV4okTWgjjOAe5Tm1C0kW4jDNkL0sB1Cl8BjpaIMKFBrlBidJUgqWCCRIYJEhkmSAKCBF/82ck2ZMSbnuOvqBpJcLVVMLq5UY8yPybI/zFBIiO4IBNywJ+kYFVWQA5KgJ2eKHUEyS0FY91ZOlRkmIYIzDo9cZ0oEWR/i/g8+D8qd1r9wO0eNyIWZDXwup7+ntb695eAyyv6FNo+K0E2aBTxQeBSTYBYph0ifqow2zG0fVaCrFKml7c4f53OL43UPjtBXgUeqjBr8sVI7bMT5KiWxpXRrxn0MdpnJ8hpLRYtY5ZmrMRo37Ul5HCk9tkJsqdCHT6oaacx2mcnyNWKYq5scf56nV8cqX2W/ZD7Nb93qzLep2piUPuk3DKFP5sD22clyBV6Rjak6mNMDairs1/Q8aGSfsBS75rpsj/QLf2QZfoB3ILQMnZoG4/Lmo67z9/PkP2Y/jzZCnK+JjJsq/id27VOpbE2sVcz4mfSfrjFRjtZCPIE8E6b3/su8IjePxrI3m0jkp0gc7Trwoo2v7dfdnMD2rtVXBeQmSDrtRShDu8DewPb30NmgrwGbKn53Q/oXiHtO7X4tWP8pkwtbopYipLjJ71j3+ixdx1W634h7f3NBKLgbWVqn358l97zBJnsuKsmGpzURsx1WKD7hbR3i2CjYkWLFVDHlJqPn2haujZ8FjsE9WjBaUj7UAtQS3FDnW+p+nL/mDe0Ac0SvR/Xub1TrCM0DMMwDMMwDMMwDMMwDMMwDMMwyI//AL3f8vGA9s/eAAAAAElFTkSuQmCC" width="50px"><br>
                            
                            <h6 class="class_name" style="font-weight: 600; margin-top: 5px;font-size:14px;"> '.$class_name.'</h6>
                            <p style="font-weight: 500; color: #b8b8b8;">Comp. Fee: ₦'.number_format($class_amount).'<br>Opt. Fee: ₦'.number_format($totopt).'</p>
                        </div>

                        <div style="padding: 7px;">
                            <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                                
                                <div style="padding: 5px;" align="center">
                                    
                                    <span class="abba_tooltip">
                                        <i class="fas fa-plus-circle abba_add_fee" data-campus="'.$campus_id.'" data-class="'.$class_id.'" data-session="'.$abba_display_session.'" data-term="'.$abba_display_term.'" data-inst="'.$abba_get_instituion_id.'" style="cursor:pointer;font-size:17px;color:#17A2B8;" data-bs-toggle="modal" data-bs-target="#financeaddModal"></i>
                                        <span class="abba_tooltiptext">Add Fee</span>
                                    </span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="abba_tooltip">
                                        <i class="fas fa-download view_fee_structure" style="cursor:pointer;font-size:17px;color:#28A745;" data-campus="'.$campus_id.'" data-class="'.$class_id.'" data-session="'.$abba_display_session.'" data-term="'.$abba_display_term.'" data-termname="'.$abba_display_term_name.'" data-inst="'.$abba_get_instituion_id.'" data-btn="0"></i>
                                        <span class="abba_tooltiptext">Download Fees</span>
                                    </span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="abba_tooltip">
                                        <i class="fas fa-eye text-primary view_fee_structure" style="cursor:pointer;font-size:17px;" data-bs-toggle="modal" data-bs-target="#viewprintModal" data-campus="'.$campus_id.'" data-class="'.$class_id.'" data-session="'.$abba_display_session.'" data-term="'.$abba_display_term.'" data-termname="'.$abba_display_term_name.'" data-inst="'.$abba_get_instituion_id.'" data-btn="1"></i></a>
                                        <span class="abba_tooltiptext">View Fees</span>
                                    </span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>';
                    
            }while($abba_row_classordepartment = mysqli_fetch_assoc($abba_result_classordepartment));

        echo '</div>';
    }
    else
    {
        echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">We couldn\'t find any record.</p></div>';
    }
    
?>