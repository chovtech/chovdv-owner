<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    include('../../config/config.php');

    $abba_campus_id = $_POST['abba_campus_id'];
    
    $abba_display_result_class = $_POST['abba_display_result_class'];
    
    $abba_display_session = $_POST['abba_display_session'];
    
    $abba_result_display_term = $_POST['abba_result_display_term'];
    
    $abba_get_instituion_id = $_POST['abba_get_instituion_id'];
    
    $abba_result_type = $_POST['abba_result_type'];

    $usertype = $_POST['usertype'];

    $abba_sql_student = "SELECT DISTINCT student.StudentID, StudentFirstName, StudentMiddleName, StudentLastName, userlogin.UserRegNumberOrUsername, student.CampusID, parent.ParentEmail, parent.ParentMainPhoneNumber, parent.ParentWhatsappNumber,
    student.StudentPhoto 
    FROM student 
    INNER JOIN classordepartmentstudentallocation ON student.StudentID=classordepartmentstudentallocation.StudentID AND student.CampusID=classordepartmentstudentallocation.CampusID 
    INNER JOIN userlogin ON student.StudentID=userlogin.UserID AND student.CampusID=userlogin.InstitutionIDOrCampusID 
    LEFT JOIN parent ON student.ParentID=parent.ParentID 
    WHERE student.CampusID=$abba_campus_id AND userlogin.InstitutionIDOrCampusID=$abba_campus_id AND userlogin.UserType='student' AND classordepartmentstudentallocation.CampusID=$abba_campus_id AND classordepartmentstudentallocation.Session='$abba_display_session' AND classordepartmentstudentallocation.ClassOrDepartmentID='$abba_display_result_class' AND StudentTrashStatus = 0 ORDER BY StudentLastName ASC";
    $abba_result_student = mysqli_query($link, $abba_sql_student);
    $abba_row_student = mysqli_fetch_assoc($abba_result_student);
    $abba_row_cnt_student = mysqli_num_rows($abba_result_student);
    
    if($abba_row_cnt_student > 0)
    {
        
        // Plain text to encrypt
        $plain_text = 'class=' . $abba_display_result_class . '&term=' . $abba_result_display_term . '&session=' . $abba_display_session . '&camp=' . $abba_campus_id . '&studentid=0&usertype='.$usertype.'&result_type='.$abba_result_type.'';

        // Secret key (32 bytes for AES-256, adjust as per the encryption algorithm)
        $secret_key = "16-character-secret"; // Replace with your secure secret key

        // Encryption algorithm and mode (AES-256 CBC)
        $encryption_algo = "AES-256-CBC";

        // Initialization vector (IV) - random bytes for each encryption
        $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length($encryption_algo));

        // Perform encryption
        $encrypted_data = openssl_encrypt($plain_text, $encryption_algo, $secret_key, OPENSSL_RAW_DATA, $iv);

        // Combine IV and cipher text for storage/transfer
        $encrypted_message = base64_encode($iv . $encrypted_data);

        // Create the URL with the encrypted data and encryption algorithm
        $encoded_message = urlencode($encrypted_message);
        $encrypted_url = $defaultUrl."app/academics/check-result/?const=" . $encoded_message;

        echo '<div class="row g-4 mt-1 maincard selectBox-cont">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <span id="abba_stud_stat_span">
                    <div class="d-flex">

                        <button type="button" class="btn btn-sm bg-light text-primary rounded-3 btn-outline-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample"><i class="fas fa-sync"> Action for all</i></button>

                        <div class="collapse" id="collapseExample">
                            <div class="card card-body">
                                <div class="d-flex">
                                    <span class="abba_tooltip">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAE2ElEQVR4nO2W2VNbVRzH+V8kS2f0seRmoVC10lC2li4M0E1boOioVGxHHR33GWdsdcYZpsNDpzhqH2xtoWUrSym0Og17AgmEkHtvAgRoEkMaHvSBr3POJRhoTshysQ/mN/N5yr3nfD9n+eVmZKQrXelKV7rStV7OhstVwvmza+KxPCz/2IjVYBCrq6vPl2CQZhGP5oFkc/xwuSqDVWLd2TWhJBdh5i/UIijyzy18UORphshMwrtn1tgCR/ZtfrgkF2L5Afh7O/7z8P7eDjr3M3kO7wNTwHXqEITinKgsfv81Qn7fjgcP+X10LlYOkpG9A+9XQyghD+6JivtcOVaslh0Lv2K10DlY85Ns42+dZAvY8rVw1p2BUGYEX7QnKkLpK3hy42eshkLyhQ+F6JhkbOa8ZUaM1FTi5u4XYgtY8znYKgogvnkcfFE2k/mP3sbTeXfK4Z96FrDwaX3MucRzFegtzsGt3Zn4LR4Bq5GDxaiFo74GfHEO+MLsqIgVhfjzUV/S4QOm3yGeKGGOzxflwHG+Cnf0atzOyqTcyopTgDCWlwVrWwvE10vBFxqiU5SNpYZvEVoJxH9RSW9vuiIdD8a44skSODpb0axR4LYmU4JKJCAwadRgdnYWww8HIH52AXyBnsncO6ex4rBvGz4ozGLuvaqYY7k+roN10ASLxYIWjQLNmkyJZATcbjeVGBwchOOXa+BLX2ZOLBx+Fd7mX5nhfd3tEI6+xn7/0F6ITY2YmJjY4I5GgRZNpkSWJJGwQFhiaGgIlu5OuGorwR/QMfF8+QFCT5b/PTI+LzzffBLzHVd1GWYe9GBycnITdzVKKhGGiCQlQHA4HBgeHsaoyQTx0hfSyrECnTqIwIgJAfMo3G8ciRne/dWHmLaYYbVan6GVU+Iup5CgEikIREoQ7DevQzy2H3y+NipCUTaF9btI3m25AZvNxkR2AcLMzAxGRkaohPnRAFwXa8Hncwnhrq+GY8iEqampmLRxSrRyCgkNkZBBgGC326kEZXgY/NUG2rudRi4mtMtc+Q7TNhump6e3pZ1Too1TSGiIhAwCLpeLQiRGR0c3mOpshXj6IJxGTVSE44XgezrjCj69TodWiXatQmJdJCWBcHiWhNn0GK7PL8K5P2sTpLfPjI/R5xOhQ6uiEhROSSWSFtgaPgxZqbGxsU04r18DX0I+xLLhbmqk9yYZOuUSYIWPlBgfH9+E/WE/+Md/0M6VLPe0KnRqlRIckUhQYLvgWyXMZjOFdBDy55cqXToV7umUElRkBwXCEmTrnU6nLHTrVOjSKSW0RGIHBebm5uDz+TA/Pw+e52Whe4tA104JeDwe+P3+DYiEIAgp06NTUwmKVkUlZBdYXl6mKx8pEJYQRTElevVq9OhVElRERgHSnaIFj2RhYSHhe+SK4L5ejV69SkJHJGQSIKsbK/hWCdYniXsb+vRq3NerJHREQgaBxcXFuMOHIXeEXPJE6ZNbwOv1JhyeQI4akSA7lwgPDGr0GVQSVCSWQFE2U4BsZzLBo0mQIxUv/YZdVIKiV6M/90W2gL32hDeaABkoEAikLBApES8Dhl3oN6gl9GqYasr+ZgrwDZe4qdpKr7XAsCGwtLQkS/BkJQbWBQb2voTBmvK/pn66WswUSFe60pWudP3v6h+RtafaVijGwAAAAABJRU5ErkJggg==" width="22px" height="22px" style="cursor:pointer;">
                                        <span class="abba_tooltiptext">Send Result Via Email</span>
                                    </span>
                                    <!--- &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="abba_tooltip">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEe0lEQVR4nO2Y21ITWRSGc61oEjAHISYRlHFGRYWXGGteYMrRsWreZXA8EOSUAeQcgjggGUQQZ5TbeQQDpnPqdMJBjt7A1Zpau7vT23Q6e9tSKVKVVbVu0jff/9e//toVi6U61alOdapTHWraVvZ/alvZy7St7EHre9xduPVuF279uws3/8HdgRtvd+DG8g60LG9Dy5ttaFnahuu4i5/g2mt5ry58gquvtuAH3Pkt+P7vTbJXIptwZW4Tvnu5QbZ5dgOaZzbg8sw6XP5rHS69wM1B03QOmp7noBF3Kgv+cFb0TWZvW1jT+n5PbCPge9CqgMvwO3DzLQWP4G8o8EUKfIEG3/oSfI4Cn6XAFXgCPq2BX8QNZ8E/mQVfSErzCJDBGa4T8KVtY/B5CjyC4IWurzNdR/CLkwgvgT8kgW9CArYAlutm4mLk+osS4IrrBFyB945n2ALYcfka183HxU+5rsJ7xzgEcMXFyPWI0ZFyxiVsDH4Bd5RDgOGRGsbla440p3c9bBwXXBXcMyqCZ0RkCzAfF9n15pcU+IwWl0vTlOtTWcMj9elcl8FxG4Z5BJSh03VxCRm4ToE3DKWhfijNFlCuTkd4nwF43vVhCv6ZvEwBx97pUznTcWlQXEfw84O4KbaAcna6t8iREvBhPbh7IAXufg4B5ez0C4y4IPj5AQ3e9WeSQwBvp6PbEwlomohD0/NskSeABL6RGPiGY+Abz+jjgm73r8k7lC4alzx4f5LAO4McAvjikoPflpOQ+3wE2c9HcH8pCY1hSYtLSIL7rxPy94MjuPtKAO+YSLVLGu7NC+Rb9uAQ7kQEqEe3adf7NdddQRne2ZdgCzDsdCoujeNxAq6OdHAE/lEhf6ToOsJp3w/BM/gxHxd0HcHVyewfgrt3VRcX1XVnXxIcfQlw9HII4On0xjG9AIyLeqTeIb0AhFaPtD64Sn6jBbh6okpcUhp4UAM/h9vDIYDrSMMS/LqYICIQ/t5CHHwTdM5FuKtEBEF/iQjgwZyrRzqYgjtzAkj7hwT+59kYuBXHv3C9V4HvScC57jjUdcc5BPB2eoh1pOnSRzqQJK67uqPgCiaKxoWA9yQIeF1XHGq7OAQce6eXbJdU0bgUuk7gn+IKbAHl7HSXoet6cHunAPYAhwCz73TWE6BYpzsZccmDdwpgCwhg64ixBXzbE0DUwDk63cGIi+q6LRAj8NYnPAK+5eH1jD5SE3HpKgQX8uC4Zx9/ZAswfKebikvpTq8rAK/tpOA7NNetj2X4s484BPDExdSRmoiL9YkGfgb3IYcAU+907riwj9TaURy85o81skwB5ex0OyMuCH7moQxe82ANTj/gETCaEY+100vGRSgZF9V1BD/dvgqn2qPsvxYbxsTbnpG0WI5Ot+bjUsL1dgX+92j6VHv0R8txDU+n1z4VPjh6E27LSRwno9PtJxkep1Sn2ztjHxyPTjA8jtGRVgQ8TrEjtVUKPE5hNVYUPA7d6bZAhcHjqJ1urUR4HHtAeGcNxP6r6VpzkB+qYzE1/wPD0CDpNOBYFAAAAABJRU5ErkJggg==" width="22px" height="22px" style="cursor:pointer;">
                                        <span class="abba_tooltiptext">Send Result Via SMS</span>
                                    </span>-->
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="abba_tooltip">
                                        <svg xmlns="http://www.w3.org/2000/svg" style="cursor:pointer;"  viewBox="0 0 48 48" width="22px" height="22px" fill-rule="evenodd" clip-rule="evenodd"><path fill="#fff" d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z"/><path fill="#fff" d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z"/><path fill="#cfd8dc" d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z"/><path fill="#40c351" d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z"/><path fill="#fff" fill-rule="evenodd" d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z" clip-rule="evenodd"/></svg>
                                        <span class="abba_tooltiptext">Send Result Via WhatsApp</span>
                                    </span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="abba_tooltip">
                                        <a href="'.$encrypted_url.'" target="_blank"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAABPklEQVR4nO2XMW7CQBBF9xQgJOi8orcPYM0UPsesb0CTc/gSFCAkbpFELnOOBAWkFFSLHIwEimAXcHY2ZJ70Gwr4z/MRQilBEP4PVb21IaJE4AxygVomdB8yoZppQohom4S6ALafJwJ/9gJENCKiBRFtjDGWM7TvsCzLcnxN+Q/u4uZnVk03H4FFBGXtmcx9BNhnY9r0Xie2/zI5fm3tFOAubY7SlO8/nwi4v9jcpY0jImDkAkYmdJHDz3isUS64C6II4ANOKE1Tq7W2SZIEidbaZlnWncChPE6/giRpJToTaJ7G9xsGEtBdX4DrHxneKLCJVQAAPp0CALC8RmDw9HZ3Kv8LzHwExoi4ik0AAN7zPB8qH4qiGCHiHADW3BOCfYeZd/lLhBJQv0VXExKBW3nICVUisA13AUEQVHTsABN3zNX4tTuWAAAAAElFTkSuQmCC" width="22px" height="22px" style="cursor:pointer;"></a>
                                        <span class="abba_tooltiptext">Print Result</span>
                                    </span>
                                    &nbsp;&nbsp;&nbsp;&nbsp;
                                    <span class="abba_tooltip">
                                        <a href="'.$encrypted_url.'" target="_blank"><i class="fas fa-eye text-primary" style="cursor:pointer;font-size:17px;"></i></a>
                                        <span class="abba_tooltiptext">View Result</span>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                
                </span>
            </div>';

            do{


                $abba_get_student_id = $abba_row_student['StudentID'];

                // Plain text to encrypt
                $plain_text_student = 'class=' . $abba_display_result_class . '&term=' . $abba_result_display_term . '&session=' . $abba_display_session . '&camp=' . $abba_campus_id . '&studentid='.$abba_get_student_id.'&usertype='.$usertype.'&result_type='.$abba_result_type.'';

                // Secret key (32 bytes for AES-256, adjust as per the encryption algorithm)
                $secret_key_student = "16-character-secret"; // Replace with your secure secret key

                // Encryption algorithm and mode (AES-256 CBC)
                $encryption_algo_student = "AES-256-CBC";

                // Initialization vector (IV) - random bytes for each encryption
                $iv_student = openssl_random_pseudo_bytes(openssl_cipher_iv_length($encryption_algo_student));

                // Perform encryption
                $encrypted_data_student = openssl_encrypt($plain_text_student, $encryption_algo_student, $secret_key_student, OPENSSL_RAW_DATA, $iv_student);

                // Combine IV and cipher text for storage/transfer
                $encrypted_message_student = base64_encode($iv_student . $encrypted_data_student);

                // Create the URL with the encrypted data and encryption algorithm
                $encoded_message_student = urlencode($encrypted_message_student);
                $encrypted_url_student = $defaultUrl."app/academics/check-result/?const=" . $encoded_message_student;

                $abba_get_campus = $abba_row_student['CampusID'];

                $abba_get_student_image = $abba_row_student['StudentPhoto'];

                if($abba_get_student_image === '' || $abba_get_student_image === 0)
                {
                    $abba_get_student_image_final = '../../assets/images/adminImg/default-img.png';
                }
                else
                {
                    $abba_get_student_image_final = $abba_get_student_image;
                }

                
                $abba_get_student_name = '<b>'.$abba_row_student['StudentLastName'].'</b>, '.substr($abba_row_student['StudentMiddleName'], 0, 1).'. '.$abba_row_student['StudentFirstName'];

                $abba_get_student_name_string_length = strlen($abba_get_student_name);

                if($abba_get_student_name_string_length > 23)
                {
                    $abba_get_student_name_shortened_or_not = substr($abba_get_student_name, 0, 23).'..';
                }
                else
                {
                    $abba_get_student_name_shortened_or_not = $abba_get_student_name;
                }

                $abba_get_parent_email = strtolower($abba_row_student['ParentEmail']);

                $abba_get_parent_email_string_length = strlen($abba_get_parent_email);

                if($abba_get_parent_email == 0 || $abba_get_parent_email == '')
                {
                    $abba_get_parent_email_shortened_or_not = 'Nil';
                }
                else
                {
                    if($abba_get_parent_email_string_length > 23)
                    {
                        $abba_get_parent_email_shortened_or_not = substr($abba_get_parent_email, 0, 23).'..';
                    }
                    else
                    {
                        $abba_get_parent_email_shortened_or_not = $abba_get_parent_email;
                    }
                }

                $abba_get_parent_whats_app_number = $abba_row_student['ParentWhatsappNumber'];

                $abba_get_parent_main_number = $abba_row_student['ParentMainPhoneNumber'];

                if($abba_get_parent_whats_app_number == 0 || $abba_get_parent_whats_app_number == '')
                {
                    if($abba_get_parent_main_number == 0 || $abba_get_parent_main_number == '')
                    {
                        $abba_get_parent_phone_number = '<i class="fas fa-phone"></i> Nil';
                    }
                    else
                    {
                        $abba_get_parent_phone_number = '<a href="tel:'.$abba_get_parent_main_number.'" target="_blank" style="text-decoration:none;"><i class="fas fa-phone"></i> '.$abba_get_parent_main_number.'</a>';
                    }
                }
                else
                {
                    $abba_get_parent_phone_number = '<a href="https://wa.me/'.$abba_get_parent_main_number.'" target="_blank" style="text-decoration:none;"><i class="fab fa-whatsapp"></i> '.$abba_get_parent_whats_app_number.'</a>';

                }
                
                $abba_sql_status = ("SELECT deactivateuser.Status FROM `deactivateuser` WHERE UserID = '$abba_get_student_id' AND UserType = 'student' AND InstitutionIDOrCampusID = '$abba_get_campus' AND sessionName = '$abba_display_session' AND (TermOrSemesterName = $abba_result_display_term OR TermOrSemesterName = '')");
                $abba_result_status = mysqli_query($link, $abba_sql_status);
                $abba_row_status = mysqli_fetch_assoc($abba_result_status);
                $abba_row_cnt_status = mysqli_num_rows($abba_result_status);

                if($abba_row_cnt_status < 1)
                {
                    echo '<div class="col-sm-3 col-md-6 col-lg-3 carditems card_search_get student_delete_'.$abba_get_student_id.'">
                        <div class="topSecCards" style="width: 100%; ">
                            
                            <div align="center" style="margin-top: 18px;">
                                <label for="abba_insert_student_image" style="cursor:pointer;">
                                    <img class="student'.$abba_get_student_id.'" data-studimgclass="student'.$abba_get_student_id.'" id="abba_get_student_image" data-id="'.$abba_get_student_id.'" data-campusid="'.$abba_get_campus.'" src="'.$abba_get_student_image_final.'" style="width: 30%; border-radius: 50%;" alt=""><br>
                                    <input type="file" style="display:none;" class="abba_update_student_image" name="abba_insert_student_image" id="abba_insert_student_image" accept="image/*">
                                </label>
                                
                                <h6 class="abba_tooltip" style="font-weight: 600; margin-top: 5px;font-size:14px;"><i class="fa fa-circle text-success"></i> '.$abba_get_student_name_shortened_or_not.'<span class="abba_tooltiptext">'.$abba_get_student_name.'</span></h6>
                                <p style="font-weight: 500; color: #b8b8b8;">'.$abba_row_student['UserRegNumberOrUsername'].'</p>
                            </div>
                            <div style="padding: 7px;">
                                <div style="width: 100%; border-radius: 5px; background-color: #e8ebf1;">
                                    
                                    <div style="padding: 5px;" align="center">
                                        
                                        <span class="abba_tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="cursor:pointer;" viewBox="0 0 48 48" width="18px" height="18px"><linearGradient id="6769YB8EDCGhMGPdL9zwWa" x1="15.072" x2="24.111" y1="13.624" y2="24.129" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#e3e3e3"/><stop offset="1" stop-color="#e2e2e2"/></linearGradient><path fill="url(#6769YB8EDCGhMGPdL9zwWa)" d="M42.485,40H5.515C4.126,40,3,38.874,3,37.485V10.515C3,9.126,4.126,8,5.515,8h36.969	C43.874,8,45,9.126,45,10.515v26.969C45,38.874,43.874,40,42.485,40z"/><linearGradient id="6769YB8EDCGhMGPdL9zwWb" x1="26.453" x2="36.17" y1="25.441" y2="37.643" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#f5f5f5"/><stop offset=".03" stop-color="#eee"/><stop offset="1" stop-color="#eee"/></linearGradient><path fill="url(#6769YB8EDCGhMGPdL9zwWb)" d="M42.485,40H8l37-29v26.485C45,38.874,43.874,40,42.485,40z"/><linearGradient id="6769YB8EDCGhMGPdL9zwWc" x1="3" x2="45" y1="24" y2="24" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#d74a39"/><stop offset="1" stop-color="#c73d28"/></linearGradient><path fill="url(#6769YB8EDCGhMGPdL9zwWc)" d="M5.515,8H8v32H5.515C4.126,40,3,38.874,3,37.485V10.515C3,9.126,4.126,8,5.515,8z M42.485,8	H40v32h2.485C43.874,40,45,38.874,45,37.485V10.515C45,9.126,43.874,8,42.485,8z"/><linearGradient id="6769YB8EDCGhMGPdL9zwWd" x1="24" x2="24" y1="8" y2="38.181" gradientUnits="userSpaceOnUse"><stop offset="0" stop-opacity=".15"/><stop offset="1" stop-opacity=".03"/></linearGradient><path fill="url(#6769YB8EDCGhMGPdL9zwWd)" d="M42.485,40H30.515L3,11.485v-0.969C3,9.126,4.126,8,5.515,8h36.969	C43.874,8,45,9.126,45,10.515v26.969C45,38.874,43.874,40,42.485,40z"/><linearGradient id="6769YB8EDCGhMGPdL9zwWe" x1="3" x2="45" y1="17.73" y2="17.73" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#f5f5f5"/><stop offset="1" stop-color="#f5f5f5"/></linearGradient><path fill="url(#6769YB8EDCGhMGPdL9zwWe)" d="M43.822,13.101L24,27.459L4.178,13.101C3.438,12.565,3,11.707,3,10.793v-0.278	C3,9.126,4.126,8,5.515,8h36.969C43.874,8,45,9.126,45,10.515v0.278C45,11.707,44.562,12.565,43.822,13.101z"/><linearGradient id="6769YB8EDCGhMGPdL9zwWf" x1="24" x2="24" y1="8.446" y2="27.811" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#e05141"/><stop offset="1" stop-color="#de4735"/></linearGradient><path fill="url(#6769YB8EDCGhMGPdL9zwWf)" d="M42.485,8h-0.3L24,21.172L5.815,8h-0.3C4.126,8,3,9.126,3,10.515v0.278	c0,0.914,0.438,1.772,1.178,2.308L24,27.459l19.822-14.358C44.562,12.565,45,11.707,45,10.793v-0.278C45,9.126,43.874,8,42.485,8z"/></svg>
                                            <span class="abba_tooltiptext">Send Result Via Email</span>
                                        </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <!---<span class="abba_tooltip">
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAEe0lEQVR4nO2Y21ITWRSGc61oEjAHISYRlHFGRYWXGGteYMrRsWreZXA8EOSUAeQcgjggGUQQZ5TbeQQDpnPqdMJBjt7A1Zpau7vT23Q6e9tSKVKVVbVu0jff/9e//toVi6U61alOdapTHWraVvZ/alvZy7St7EHre9xduPVuF279uws3/8HdgRtvd+DG8g60LG9Dy5ttaFnahuu4i5/g2mt5ry58gquvtuAH3Pkt+P7vTbJXIptwZW4Tvnu5QbZ5dgOaZzbg8sw6XP5rHS69wM1B03QOmp7noBF3Kgv+cFb0TWZvW1jT+n5PbCPge9CqgMvwO3DzLQWP4G8o8EUKfIEG3/oSfI4Cn6XAFXgCPq2BX8QNZ8E/mQVfSErzCJDBGa4T8KVtY/B5CjyC4IWurzNdR/CLkwgvgT8kgW9CArYAlutm4mLk+osS4IrrBFyB945n2ALYcfka183HxU+5rsJ7xzgEcMXFyPWI0ZFyxiVsDH4Bd5RDgOGRGsbla440p3c9bBwXXBXcMyqCZ0RkCzAfF9n15pcU+IwWl0vTlOtTWcMj9elcl8FxG4Z5BJSh03VxCRm4ToE3DKWhfijNFlCuTkd4nwF43vVhCv6ZvEwBx97pUznTcWlQXEfw84O4KbaAcna6t8iREvBhPbh7IAXufg4B5ez0C4y4IPj5AQ3e9WeSQwBvp6PbEwlomohD0/NskSeABL6RGPiGY+Abz+jjgm73r8k7lC4alzx4f5LAO4McAvjikoPflpOQ+3wE2c9HcH8pCY1hSYtLSIL7rxPy94MjuPtKAO+YSLVLGu7NC+Rb9uAQ7kQEqEe3adf7NdddQRne2ZdgCzDsdCoujeNxAq6OdHAE/lEhf6ToOsJp3w/BM/gxHxd0HcHVyewfgrt3VRcX1XVnXxIcfQlw9HII4On0xjG9AIyLeqTeIb0AhFaPtD64Sn6jBbh6okpcUhp4UAM/h9vDIYDrSMMS/LqYICIQ/t5CHHwTdM5FuKtEBEF/iQjgwZyrRzqYgjtzAkj7hwT+59kYuBXHv3C9V4HvScC57jjUdcc5BPB2eoh1pOnSRzqQJK67uqPgCiaKxoWA9yQIeF1XHGq7OAQce6eXbJdU0bgUuk7gn+IKbAHl7HSXoet6cHunAPYAhwCz73TWE6BYpzsZccmDdwpgCwhg64ixBXzbE0DUwDk63cGIi+q6LRAj8NYnPAK+5eH1jD5SE3HpKgQX8uC4Zx9/ZAswfKebikvpTq8rAK/tpOA7NNetj2X4s484BPDExdSRmoiL9YkGfgb3IYcAU+907riwj9TaURy85o81skwB5ex0OyMuCH7moQxe82ANTj/gETCaEY+100vGRSgZF9V1BD/dvgqn2qPsvxYbxsTbnpG0WI5Ot+bjUsL1dgX+92j6VHv0R8txDU+n1z4VPjh6E27LSRwno9PtJxkep1Sn2ztjHxyPTjA8jtGRVgQ8TrEjtVUKPE5hNVYUPA7d6bZAhcHjqJ1urUR4HHtAeGcNxP6r6VpzkB+qYzE1/wPD0CDpNOBYFAAAAABJRU5ErkJggg==" width="18px" height="18px" style="cursor:pointer;">
                                            <span class="abba_tooltiptext">Send Result Via SMS</span>
                                        </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;-->
                                        <span class="abba_tooltip">
                                            <svg xmlns="http://www.w3.org/2000/svg" style="cursor:pointer;"  viewBox="0 0 48 48" width="18px" height="18px" fill-rule="evenodd" clip-rule="evenodd"><path fill="#fff" d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z"/><path fill="#fff" d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z"/><path fill="#cfd8dc" d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z"/><path fill="#40c351" d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z"/><path fill="#fff" fill-rule="evenodd" d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z" clip-rule="evenodd"/></svg>
                                            <span class="abba_tooltiptext">Send Result Via WhatsApp</span>
                                        </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="abba_tooltip">
                                            <a href="'.$encrypted_url_student.'" target="_blank"><img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAABPklEQVR4nO2XMW7CQBBF9xQgJOi8orcPYM0UPsesb0CTc/gSFCAkbpFELnOOBAWkFFSLHIwEimAXcHY2ZJ70Gwr4z/MRQilBEP4PVb21IaJE4AxygVomdB8yoZppQohom4S6ALafJwJ/9gJENCKiBRFtjDGWM7TvsCzLcnxN+Q/u4uZnVk03H4FFBGXtmcx9BNhnY9r0Xie2/zI5fm3tFOAubY7SlO8/nwi4v9jcpY0jImDkAkYmdJHDz3isUS64C6II4ANOKE1Tq7W2SZIEidbaZlnWncChPE6/giRpJToTaJ7G9xsGEtBdX4DrHxneKLCJVQAAPp0CALC8RmDw9HZ3Kv8LzHwExoi4ik0AAN7zPB8qH4qiGCHiHADW3BOCfYeZd/lLhBJQv0VXExKBW3nICVUisA13AUEQVHTsABN3zNX4tTuWAAAAAElFTkSuQmCC" width="18px" height="18px" style="cursor:pointer;">
                                            <span class="abba_tooltiptext">Print Result</span></a>
                                        </span>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="abba_tooltip">
                                            <a href="'.$encrypted_url_student.'" target="_blank"><i class="fas fa-eye text-primary" style="cursor:pointer;font-size:17px;"></i></a>
                                            <span class="abba_tooltiptext">View Result</span>
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>';
                    
                }
                else
                {
                    
                }
                    
            }while($abba_row_student = mysqli_fetch_assoc($abba_result_student));

        echo '</div>';
    }
    else
    {
        echo '<div align="center" class="mt-2"><img src="../../assets/images/adminImg/err.png" style="width:15%;"/><p class="pt-2 fs-6 text-secondary">We couldn\'t find any record.</p></div>';
    }
    
?>