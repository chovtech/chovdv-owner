<?php

        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        include('../../../config/config.php');

        $UserID = $_POST['UserID'];
        $UserType = $_POST['UserType'];



        $select_staffsalry = mysqli_query($link,"SELECT * FROM `salaryscheduledate`  WHERE Status='0' AND UserID='$UserID' AND DeleteStatus='0' ORDER BY ScheduleMonth DESC");


        $selectect_staffcnt = mysqli_num_rows($select_staffsalry);
        $selectect_staffcnt_row = mysqli_fetch_assoc($select_staffsalry);



        if($selectect_staffcnt > 0)
        {

            echo '<table class="table" >
            <thead>
                    <tr>
                    <th scope="col">Month</th>
                    <th scope="col">Drop Date</th>
                    <th scope="col">Amount</th>
                    <th scope="col">Action</th>
                    </tr>
            </thead>
            <tbody>';



                do{

                         
                  
                    $ScheduleMonth = $selectect_staffcnt_row['ScheduleMonth'];
                    $ScheduleDate = $selectect_staffcnt_row['ScheduleDate'];
                    $ScheduleAmount = $selectect_staffcnt_row['ScheduleAmount'];
                    $SalaryScheeduleID = $selectect_staffcnt_row['SalaryScheeduleID'];


                    

                        echo' <tr>
                                    <td>'.$ScheduleMonth.'</td>
                                    <td>'.$ScheduleDate.'</td>
                                    <td>₦'.number_format($ScheduleAmount).'</td>

                                    <td> <a style="cursor:pointer;" data-id="'.$SalaryScheeduleID.'" class="prosloaddelet_submit_deletescheuled" data-bs-toggle="modal" data-bs-target="#prosloadeleteschedulemodal">

                                         <img style="width:28px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADCElEQVR4nO2ZT0gUURzHh6AOdSmCDhH9OdbBmp3+HLI/wjzTUi9mSWjNmFjihh7CgxpBBmqrM5awVoegS94sCCK7BKm475kW+IcOii7ue3vpInQoTV+8cbdLW7Tzfu6L2C88Bt5jZ7+f+b15M995mpZVVv+ujKKazQayb+mm9UlH1lIA2Ty9ZtEAstsPlJVtyrj5HFSxQ0fWePqm7V+ajqy2zJs3rYm1P7dnDiG7MAdVbEn3PIZp5yYroWVCwqRhWmd1ZM165k1rQsDInDOQqEJ6PzLtYemym/aYrHnfADqyBv2YPlxQzfMuNfKroT7eORzlLmHSzcivWhULgOZXDqGLEEb8trrel99080qlbwCX0EmVAC6ms77NexXA9JVSAEJHZAEeqq0AeyEF4GLWrBLAIeyxFEA3YRVqAWirbAVOKgXA9IYcwEh8r1qA+AUpgEfv+UaH0O/KIEbjpzVZOYQtKAMYYfvlATAbVgXQg2PbpQFczPrUANDl25xvkAcgrEMFgIMZTA7oHqVBJRXAbBwEwCWxEiUVIOw1CEBXZOGgGgD6FAQgPBjdpmYK0ZAGJRXBxiHsJhiAkmATYZfBAJQEG0zPQAJkPNh0kpgOBqAi2PSMRXeCATiEVWbSvIPpqngTBgPoIuxURgEI+6xB6kEkvg/aZOubKX6xKcxPlNZ7H8XEsby51+t3CJ0GBYAONo3P3vGj566n/MIn+hueDHzUoOUSFoMwf2dg6qf5kmAHb+4nPDQ07x2Lg+1e/5HCmiU9r2oPKABUsBHTJmneTTGehAggqxcUACrYiLkuDLY8H0053tJPEhsbdhQWACjYiBtWGAwNzaUcF/1eBUzrKywAZrUQALnnG/6qAgFkzYMCiEc7BIBYKv90DxRea/2S2BsLa9ByMH0rCyDW+eQqVBxs9674vcF571hU17aa2OFZNMzK3eAA9yMLuxxMZyCeA8eKan+3PbVo5FtIWy+5H+a2uoS1rYHQZb8QdwemeXlTeOV4af2ykV+1YhRUUzFt1uXKZ5XVf6of4pfuW8IzBxkAAAAASUVORK5CYII=">';
                                        // <img style="width:30px;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAADRElEQVR4nO2ZTU8TURSG78rfoUhroVDa6Rft0BZFlFExMdHIn0BAlA8VcanRlUZcqAtXbfg/kijYmWmlUORDUNhAfc1p00bpnbbGkw6LvsmTNHfeOdzndto0QYhWWmmFJbvXR67uDY98/TE8glrsDd/O/rx2WxMnLbvareyedguNsKvdzIiTlt3BG/gXmrYxLC6eQjL5DKlUDqkUmsQqUqmn9Lf/X4AGNW/jOMZTDoFmnjz+Iplc4xCAnQiOrJ72wg4EV1bP+GAHgiu5NgV2INgEziqwA8Em0O6HHQg2AUcAdiC4suYIwoqcI4iVdgUf23xIt/ste2WoQ126J1enyyfgDEFGzhnC53Y/1hfeo7B/AH10GisOv7RLpB2BYoe6a6/fFe+lGVZ9PoFzYchYcQaw/uY9yvl1dAT9zjS+OINVXVqja9QpZ33hXXGG1Xw2gXVXGDKWnH4UDg4qGypLGGPTSJ8LVnr0mtb+3DylsL+PJYcinU3wCXT0QobuCsEYm6naWEliBmlXqEitju4KSWcTfAKdEVihd4Shj05JNliAeW8OxrHHpnJt8hHSHWHLuQSfgDuKWuidvTAmZqWnLD35iVmk6ZTdteeyCeS7VNTDcEekj0rVyd+fg94ZqTsv36UyCnSraASjy1qisnl3pKFZ+W5OAU8fGsHojsIYn7UUyEzNI00CDc4TfAIx1MOgd2D8Qd1HqCQRrTsv74nxCWz0xFEL09NX/FZp9ENMXb1LrTmT4BPwJmCF6YnBvFt98r8KBWSm52FOWF17AsMTs5xL8An4EpBh9sRg3pOfPK0bPbEilp3Jh8h4Y9LZBJvAN6UfMj55VOlPicz9OZjeeKVHr2ntuMThzg6We1TpbIJPwH8eMgxvHPm3H6o370tUdWntuETu+cuSqMV8PoHABcjYCFxA2leSoJ/ImanHMJWEtEtklJLE4c535F68Kt5LM6z6fALBAVixERyAQY+TL45soN+yV4Y6y0ocptJfvLdWl01gMzQAOxBsAuGLsAPBJtA7CDsQXNnqvQQ7EGwCkcuwA8EmEB2CHQg2AfVydksdQjPZjA7x/R9tS9W0bVXLbvdpaAqqltnquzLEJtBKK62IE5vfcDOVrSezq5EAAAAASUVORK5CYII=">

                                    echo '</a>
                                    
                                    </td>
                            </tr>';
                           

                    }while($selectect_staffcnt_row = mysqli_fetch_assoc($select_staffsalry));
                        
                        
                        
                    echo '</tbody>
                    </table>';

        }else{

        }



                






    ?>