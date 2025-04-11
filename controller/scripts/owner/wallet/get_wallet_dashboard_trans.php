<?php

    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    include('../../../config/config.php');

    $user_id = $_POST['user_id'];

    $user_type = $_POST['user_type'];

    $select_wallettransactions = mysqli_query($link, "SELECT * FROM `wallettransactions` WHERE UserID='$user_id' AND UserType='$user_type' ORDER BY WalletTransactionID DESC");
    $select_wallettransactions_row_fetch = mysqli_fetch_assoc($select_wallettransactions);
    $select_wallettransactions_row = mysqli_num_rows($select_wallettransactions);

    if ($select_wallettransactions_row > 0) {

        $cnt = 0;

        do{

            $cnt++;
            
            $transaction_id = $select_wallettransactions_row_fetch['WalletTransactionID'];

            $transaction_type= $select_wallettransactions_row_fetch['TransactionType'];

            if($transaction_type == 'Credit')
            {
                $color = 'success';
            }
            else
            {
                $color = 'danger';
            }

            $amount = $select_wallettransactions_row_fetch['Amount'];

            $date = $select_wallettransactions_row_fetch['Date'];

            $time = $select_wallettransactions_row_fetch['Time'];

            $reference = $select_wallettransactions_row_fetch['Reference'];

            echo '<tr>
                <th scope="row">'.$cnt.'</th>
                <td>'.$reference.'</td>
                <td>₦' . number_format($amount).'</td>
                <td class="text-'.$color.'">'.$transaction_type.'</td>
                <td>'.$date.' '.$time.'</td>
                <td><i class="fas fa-eye text-primary prosprintreseceict-transctionbtn" data-id="'.$transaction_id.'"  data-bs-toggle="modal" data-bs-target="#printreceiptcontent-modal" style="cursor:pointer;"></i></td>
            </tr>';
        }while($select_wallettransactions_row_fetch = mysqli_fetch_assoc($select_wallettransactions));
        
    } 
    else {
        echo '<tr><td colspan=5 align="center"><i class="fas fa-exclamation-circle"></i> No Records Found.</td></tr>';
    }

    

    

?>
<!--data-id="'.$transaction_id.'" data-bs-toggle="modal" data-bs-target="#view_transaction_details_Modal"-->