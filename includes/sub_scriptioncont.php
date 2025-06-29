<!-- Complete Countdown and Subscription Modal Integration -->

<!-- COUNTDOWN DISPLAY SECTION -->
<?php 


        date_default_timezone_set("Africa/Lagos");

        require_once('../../controller/scripts/owner/messaging/wametor/send_wa_msg.php');


        $sql_session = mysqli_query($link, "SELECT * FROM session WHERE sessionStatus = '1'");
        $sessionData = mysqli_fetch_assoc($sql_session);
        $sessionName = $sessionData['sessionName'];

        $sql_term = mysqli_query($link, "SELECT * FROM termorsemester WHERE status = '1'");
        $termData = mysqli_fetch_assoc($sql_term);
        $termName = $termData['TermOrSemesterName'];

        $sql_resumption = mysqli_query($link, "SELECT * FROM default_resumption
         WHERE Session = '$sessionName' AND Term_id = '{$termData['TermOrSemesterID']}'");
        $resumptionData = mysqli_fetch_assoc($sql_resumption);

        $Resumption_Date = $resumptionData['Resumption_date'] ?? '';
        $NoDaysToCount = $resumptionData['num_days_count'] ?? 0;
        $today = date("Y-m-d");

        $countdownStart = '';
        $countdownEnd = '';
        $styleContent = 'style="border-radius: 14px;display:none;"';
        $startCountdown = false;
        $send_message = false;

        $sql_campuses = mysqli_query($link, "SELECT * FROM campus WHERE InstitutionID 
        IN (SELECT InstitutionID FROM institution WHERE AgencyOrSchoolOwnerID = '$UserID')");
        
        while ($campus = mysqli_fetch_assoc($sql_campuses)) {
            $campusID = $campus['CampusID'];
        
            // Count eligible students in campus
            $studentsQuery = mysqli_query($link, "
                SELECT COUNT(DISTINCT student.StudentID) AS totalStudents
                FROM student
                INNER JOIN classordepartmentstudentallocation alloc ON student.StudentID = alloc.StudentID
                WHERE student.CampusID = '$campusID'
                  AND alloc.CampusID = '$campusID'
                  AND alloc.Session = '$sessionName'
                  AND student.StudentTrashStatus = 0
                  AND student.StudentID NOT IN (
                      SELECT UserID FROM deactivateuser
                      WHERE UserType = 'student'
                      AND sessionName = '$sessionName'
                      AND TermOrSemesterName = '{$termData['TermOrSemesterID']}'
                      AND Status = 0
                  )
            ");
            $row = mysqli_fetch_assoc($studentsQuery);
            $totalStudents = (int)$row['totalStudents'];
        
            // Check if the campus has paid
            $paymentQuery = mysqli_query($link, "
                SELECT 1 FROM plantransaction
                WHERE CampusID = '$campusID'
                  AND SessionName = '$sessionName'
                  AND TermOrSemesterName = '{$termData['TermOrSemesterID']}'
                LIMIT 1
            ");
            $hasPaid = mysqli_num_rows($paymentQuery) > 0;
        
            // If campus has students and hasn't paid, and we're past the delay period
            if ($totalStudents > 0 && !$hasPaid && !empty($Resumption_Date)) {
                $daysSinceResumption = (strtotime($today) - strtotime($Resumption_Date)) / 86400;
                $startDelay = 14;
        
                if ($daysSinceResumption >= $startDelay && $NoDaysToCount > 0) {
                    $startCountdown = true;
                    $countdownStart = date("Y-m-d", strtotime("$Resumption_Date + $startDelay days"));
                    $countdownEnd = date("Y-m-d 23:59:59", strtotime("$countdownStart + $NoDaysToCount days"));
                    $styleContent = 'style="border-radius: 14px;display:block;"';




                    $institutionID = $campus['InstitutionID'];

                    // ✅ Check if reminder already sent
                    $reminderCheck = mysqli_query($link, "
                        SELECT 1 FROM subscription_reminder_log 
                        WHERE InstitutionID = '$institutionID' 
                        AND Session = '$sessionName' 
                        AND Term = '{$termData['TermOrSemesterID']}' 
                        LIMIT 1
                    ");

                    if (mysqli_num_rows($reminderCheck) == 0) {
                        $send_message = true;
                    }
            
                    break;
                }
            }
        }


        // pros prepared msg here

        if($send_message)
        {

            $wamentorData = mysqli_fetch_assoc(mysqli_query($link, "SELECT * FROM whatsappapikey WHERE Purpose='Default' AND Api_source='wamentor'"));
            $wamentor_key = $wamentorData['ApiKey'] ?? '';
            $wamentor_userid = $wamentorData['Api_userid'] ?? '';


            // Fetch institution and owner data
			$select_schoolowner = mysqli_query($link, "
            SELECT * FROM `institution` 
            INNER JOIN `agencyorschoolowner` 
            ON `institution`.`AgencyOrSchoolOwnerID` = `agencyorschoolowner`.`AgencyOrSchoolOwnerID` 
            WHERE `institution`.`AgencyOrSchoolOwnerID` = '$UserID'
            ");

            if ($select_schoolowner && mysqli_num_rows($select_schoolowner) > 0):
				$select_schoolowner_row = mysqli_fetch_assoc($select_schoolowner);

				$groupschoolID_new = $select_schoolowner_row['InstitutionID'];
				// $tagstatenew = intval($select_schoolowner_row['TagState']);
				$AgencyOrSchoolOwnerMainPhone = $select_schoolowner_row['AgencyOrSchoolOwnerMainPhone'];
                $AgencyOrSchoolOwnerName = $select_schoolowner_row['AgencyOrSchoolOwnerName'];
                $InstitutionGeneralName = $select_schoolowner_row['InstitutionGeneralName'];



                  if (!empty($AgencyOrSchoolOwnerMainPhone)):
                    sendWhatsAppMsg([
                        "user_id" => $wamentor_userid,
                        "template_id" => "admin-notify",
                        "message" => "Hi {{name}}, your school's subscription for {{school}} is overdue.\n\nTerm: {{term}},\nSession: {{session}}.\n\nPlease renew to avoid service interruption.",
                        "contacts" => [[
                            "number" => $AgencyOrSchoolOwnerMainPhone,
                            "name" => $AgencyOrSchoolOwnerName,
                            "school" => $InstitutionGeneralName,
                            "term" => $termName,
                            "session" => $sessionName
                        ]]
                    ], $wamentor_key);
                endif;

                mysqli_query($link, "
                INSERT IGNORE INTO subscription_reminder_log (InstitutionID, Session, Term) 
                VALUES ('$groupschoolID_new', '$sessionName', '{$termData['TermOrSemesterID']}')
              ");

            endif;
    
        }
        


?>

<?php if ($startCountdown): ?>
<div class="row prosloadcountdowncontentcontent">
    <input type="hidden" id="prosloadstartdate" value="<?php echo $countdownStart; ?>">
    <input type="hidden" id="prosloadenddate" value="<?php echo  $countdownEnd; ?>">

    <div class="col-12">
        <div class="card" id="prosloadcountdowncontent" <?php echo $styleContent; ?> >
            <div class="card-body">
                <button type="button" class="btn-close float-end prosclionhidetimmercontentbtn" data-bs-dismiss="modal" aria-label="Close"></button>
                <h5 class="card-title">EDUMESS Subscription Alert</h5>

                <div class="row">
                    <div class="col-md-4">
                        <h6 class="card-subtitle" style="font-size:14px;">
                            Hello, <b class="prosloadnamecountdown"><?php echo $PrimaryName; ?></b><br>
                            <span class="prosloadcoundes">
                                Your subscription plan is due. <a href="../subscription/" >Click to pay</a>
                            </span>
                        </h6>
                    </div>

                    <div class="col-md-5">
                        <div class="countdown pt-3">
                            <div class="box">
                                <span class="num" id="day-box">00</span>
                                <span class="text">D</span>
                            </div>
                            <div class="box">
                                <span class="num" id="hr-box">00</span>
                                <span class="text">H</span>
                            </div>
                            <div class="box">
                                <span class="num" id="min-box">00</span>
                                <span class="text">M</span>
                            </div>
                            <div class="box">
                                <span class="num" id="sec-box">00</span>
                                <span class="text">S</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 ">
                        <a  href="../subscription/" type="button" class="btn btn-danger btn-rounded mt-4" >Pay Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php endif; ?>

<!-- COUNTDOWN SCRIPT -->
<script>
document.addEventListener("DOMContentLoaded", function() {
    const endDateStr = document.getElementById("prosloadenddate")?.value;
    if (!endDateStr) return;

    const endDate = new Date(endDateStr.replace(/-/g, '/')).getTime();

    const timer = setInterval(function() {
        const now = new Date().getTime();
        const t = endDate - now;

        if (t > 0) {
            const days = Math.floor(t / (1000 * 60 * 60 * 24));
            const hours = Math.floor((t % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const mins = Math.floor((t % (1000 * 60 * 60)) / (1000 * 60));
            const secs = Math.floor((t % (1000 * 60)) / 1000);

            document.getElementById("day-box").innerText = days;
            document.getElementById("hr-box").innerText = hours;
            document.getElementById("min-box").innerText = mins;
            document.getElementById("sec-box").innerText = secs;
        } else {
            clearInterval(timer);
            document.getElementById("prosloadcountdowncontent").style.display = 'none';

            var UserID = '<?php echo $UserID; ?>';

            $.ajax({
                type: "POST",
                url: "../../controller/scripts/owner/edumessssubscription/updateinstitutionstatus.php",
                data: {
                        userID:UserID
                    },
                cache: false,
                success: function(result){
                        
                }
            });
            // alert("Your subscription has expired. You have been moved to the Free plan.");
            // Optional: AJAX call to backend to update subscription to free
        }
    }, 1000);


    $('body').on('click', '.prosclionhidetimmercontentbtn', function () {
        $('.prosloadcountdowncontentcontent').fadeOut();
    });

});
</script>

<!-- COUNTDOWN CSS -->
<style>
    .countdown {
        display: flex;
        justify-content: center;
        gap: 25px;
        position: relative;
    }
    .box {
        width: 10vmin;
        height: 10vmin;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: space-evenly;
        position: relative;
        box-shadow: 15px 15px 30px #cacbcc;
        border-radius: 10px;
    }
    .box:after {
        content: "";
        position: absolute;
        background-color: rgba(255,255,255,0.12);
        height: 100%;
        width: 50%;
        left: 0;
        border-radius: 10px;
    }
    span.num {
        background-color: #f5f5f5;
        height: 100%;
        width: 100%;
        display: grid;
        place-items: center;
        font-weight: 600;
        font-size: 20px;
        border-radius: 10px 10px 0 0;
    }
    span.text {
        font-size: 10px;
        background-color: #007ffb;
        display: block;
        width: 100%;
        text-align: center;
        padding: 0.5em 0;
        font-weight: 400;
        color: #fff;
        border-radius: 0 0 10px 10px;
    }
</style>


