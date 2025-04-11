<?php
                include('../../config/config.php');
                $IntitutionID = $_POST['IntitutionID'];
                $UserID = $_POST['UserID'];



                $selectsession = mysqli_query($link,"SELECT * FROM `session`");
                $selectsessioncnt = mysqli_num_rows($selectsession);
                $selectsessioncntrow = mysqli_fetch_assoc($selectsession);

                if($selectsessioncnt > 0)
                {
                       do{


                                $sessionname = $selectsessioncntrow['sessionName'];
                                $sessions_tatus = $selectsessioncntrow['sessionStatus'];

                                if($sessions_tatus == '1')
                                {
                                    $selected = 'selected';

                                }else
                                {
                                     $selected = '';
                                }


                                echo '<option  '.$selected.' value="'.$sessionname.'">'.$sessionname.'</option>';


                       }while($selectsessioncntrow = mysqli_fetch_assoc($selectsession));
                }else
                {

                }

              

?>