<?php
    $pros_get_plans = mysqli_query($link, "SELECT * FROM `edumesplan` 
    WHERE `PlanID` IN(5,4,3,2) ORDER BY 
    `Amount` ASC");
    $pros_get_plans_cnt =  mysqli_num_rows($pros_get_plans);



        $pros_max = 0;
        $pros_nextmax = 0;
        $plans = array();

        while($pros_get_plans_cnt_row =  mysqli_fetch_assoc($pros_get_plans)):
        $PlanID = $pros_get_plans_cnt_row['PlanID'];
        $PlanName = $pros_get_plans_cnt_row['PlanName'];
        $Amount = $pros_get_plans_cnt_row['Amount'];
        $plan_style = $pros_get_plans_cnt_row['plan_style'];


        $plans[] = array("amount" =>  $Amount, "plan_name" => $PlanName,"plan_id" => $PlanID,"plan_style" => $plan_style, );
        if($Amount > $pros_max):
            $pros_nextmax = $pros_max;
            $pros_max = $Amount;
        elseif($Amount > $pros_nextmax && $Amount != $pros_max):
            $pros_nextmax =  $Amount;
        endif;
        endwhile;  
?>

    <?php
    foreach($plans as $plan):

        if($plan['amount'] < $pros_nextmax):
        ?>
    
        <div class="pricing-card <?php echo ( $pros_menuData['school_plan'] == $plan['plan_id']) ? 'current-plan' : ''; ?>">
        <?php if ($pros_menuData['school_plan'] == $plan['plan_id']): ?>
            <div class="current-plan-badge">Current Plan</div> 

            <?php endif; ?>
        <div class="title"><?php echo $plan['plan_name']; ?></div>

        <div class="subtitle"><?php echo $plan['plan_style']; ?></div>
        <div class="price">₦ <?php echo number_format($plan['amount']); ?><small>/<?php echo $pricing_page_per_student; ?></small></div>

        <?php 
            elseif($plan['amount'] == $pros_nextmax):

        ?>  

                <!-- Professional Plan -->
                <div class="pricing-card professional <?php echo ($pros_menuData['school_plan'] == $plan['plan_id']) ? 'current-plan' : ''; ?>">
                <?php if ($pros_menuData['school_plan'] == $plan['plan_id']): ?>
                    <div class="current-plan-badge">Current Plan</div>
                <?php endif; ?>
                <div class="title"><?php echo $plan['plan_name']; ?></div>
                <div class="subtitle"><?php echo $plan['plan_style']; ?></div>
                <div class="price">₦<?php echo number_format($plan['amount']); ?><small>/<?php echo $pricing_page_per_student; ?></small></div>
        <?php 
            elseif($plan['amount'] == $pros_max):

        ?> 



            <div class="pricing-card <?php echo ($pros_menuData['school_plan'] == $plan['plan_id']) ? 'current-plan' : ''; ?>">
            <?php if ($pros_menuData['school_plan'] == $plan['plan_id']): ?>
                <div class="current-plan-badge">Current Plan</div>
            <?php endif; ?>
            <div class="title"><?php echo $plan['plan_name']; ?></div>
            <div class="subtitle"><?php echo $plan['plan_style']; ?></div>
            <div class="price">₦<?php echo number_format($plan['amount']); ?><small>/<?php echo $pricing_page_per_student; ?></small></div>
            
        <?php 
            endif;
        ?> 

    <ul class="pricing-features">
    <!-- PROS SUB MENNU CONTENT HERE -->
            <?php
                $plan_id = $plan['plan_id'];
                $plan_amount = $plan['amount'];
                $plan_name = $plan['plan_name'];

            // Step 1: Find the previous (lower) plan by amount
            $previous_plan = null;
            foreach ($plans as $p) {
                if ($p['amount'] < $plan_amount) {
                    if ($previous_plan === null || $p['amount'] > $previous_plan['amount']) {
                        $previous_plan = $p; // closest lower plan
                    }
                }
            }

            // Step 2: Get submenu features assigned to current plan
            $pros_get_menus = mysqli_query($link, "SELECT * FROM `submenu` ORDER BY SubmenuName ASC");

            $current_features = [];
            $previous_features = [];

            while ($row = mysqli_fetch_assoc($pros_get_menus)) {
                $submenu_name = $row['SubmenuName'];
                $plan_ids = explode(',', $row['PlanID']);

                // Check if belongs to current plan
                if (in_array($plan_id, $plan_ids)) {
                    $current_features[] = $submenu_name;
                }

                // Check if belongs to previous plan
                if ($previous_plan && in_array($previous_plan['plan_id'], $plan_ids)) {
                    $previous_features[] = $submenu_name;
                }
            }

            // Step 3: Remove inherited features from current_features
            $unique_current_features = array_diff($current_features, $previous_features);

            // Step 4: Display
            if ($previous_plan) {
                echo '<li><i class="bx bx-check-circle"></i>All from '.$previous_plan['plan_name'].'</li>';
            }

            foreach ($unique_current_features as $feature) {
                echo '<li><i class="bx bx-check-circle"></i>'.$feature.'</li>';
            }
        ?>
       <!-- PROS SUB MENNU CONTENT END HERE -->
    </ul>
    <button data-id="<?php echo $plan['plan_id']; ?>" class="pricing-button">Upgrade Now</button>
</div>
<?php
endforeach;
?>