<?php 
session_start();
if (!isset($_SESSION["email"])) {
    header("location:index.php");
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';
require 'PHPMailer/src/Exception.php';
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Project — Medicine Donation</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/superfish.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/modernizr-2.6.2.min.js"></script>
</head>
<body>
<?php 
include("navdnr.php");
include("engine.php");

$u_email = $_SESSION['email'];
$sql1 = "SELECT * FROM donor WHERE email='$u_email'";
$query1 = mysqli_query($db, $sql1);

if (mysqli_num_rows($query1) > 0) {
    while ($row = mysqli_fetch_assoc($query1)) {
?>

<section id="contact" class="bg-light">
    <div class="container">
        <div class="form-container">
            <div class="form-box">
                <h3>Donate<span class="text-primary"> Medicine</span></h3>
                <form method="POST" onsubmit="return validateForm();">
                    <div class="form-group">
                        <label>Medicine Name</label>
                        <input type="text" name="medicine_name" id="medicine_name" class="form-control" placeholder="Enter The Medicine's Name" required>
                    </div>

                    <input type="hidden" name="donor_id" value="<?php echo $row['donor_id']; ?>">

                    <div class="form-group">
                        <label>Manufactured By</label>
                        <input type="text" name="manufactured_by" id="manufactured_by" class="form-control" placeholder="Enter Manufactured Company Name" required>
                    </div>

                    <div class="form-group">
                        <label>Donate To
                        <select name="donate_to" id="donate_to" class="form-control" >
                            <option value="">--Select NGO--</option>
                            <?php
                            $sql = "SELECT * FROM receiver";
                            $query = mysqli_query($db, $sql);
                            while ($rows = mysqli_fetch_assoc($query)) {
                                echo "<option>" . htmlspecialchars($rows['ngo_name']) . "</option>";
                            }
                            ?>
                        </select></label>
                    </div>

                    <div class="form-group">
                        <label>Mfg. Date</label>
                        <input type="date" name="mfg_date" id="mfg_date" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label>Exp. Date</label>
                        <input type="date" name="exp_date" id="exp_date" class="form-control" required>
                    </div>

                    <input type="submit" value="Donate" name="donation" class="contact-btn">
                </form>
            </div>
        </div>
    </div>
</section>

<!-- ✅ JavaScript validation -->
<script>
function validateForm() {
    const mfg = new Date(document.getElementById('mfg_date').value);
    const exp = new Date(document.getElementById('exp_date').value);
    const today = new Date();
    
    // Check if Expiry > Mfg
    if (exp <= mfg) {
        alert("Expiry date must be after Manufacturing date.");
        return false;
    }

    // Check if expiry is at least 2 months from today
    const twoMonthsLater = new Date(today);
    twoMonthsLater.setMonth(twoMonthsLater.getMonth() + 2);

    if (exp < twoMonthsLater) {
        alert("Expiry date must be at least 2 months from today.");
        return false;
    }

    return true;
}
</script>

<?php
    if (isset($_POST['donation'])) {
        // ✅ PHP-side expiry check
        $exp_date = new DateTime($_POST['exp_date']);
        $mfg_date = new DateTime($_POST['mfg_date']);
        $today = new DateTime();
        $two_months_later = (clone $today)->modify('+2 months');

        if ($exp_date <= $mfg_date) {
            echo "<script>alert('Expiry date must be after Manufacturing date.');</script>";
            exit;
        }

        if ($exp_date < $two_months_later) {
            echo "<script>alert('Expiry date must be at least 2 months from today.');</script>";
            exit;
        }

        $sql2 = "SELECT * FROM receiver WHERE ngo_name = '" . $_POST['donate_to'] . "'";
        $query2 = mysqli_query($db, $sql2);
        if (mysqli_num_rows($query2) > 0) {
            $ro = mysqli_fetch_assoc($query2);

            // Email to Donor
            $msg = "E-mail: " . $row['email'] . "\nThank you for donating medicine.";
            $recipient = $row['email'];
            $subject = "Donated Successfully";

            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'medicine.donation@gmail.com';
            $mail->Password = 'hywoujvybvqrodxj';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->setFrom('medicine.donation@gmail.com', 'Medicine Donation');
            $mail->addAddress($recipient);
            $mail->Subject = $subject;
            $mail->Body = $msg;

            if ($mail->send()) {
                echo "Mail sent successfully to donor.<br>";
            } else {
                echo "Mailer Error (Donor): " . $mail->ErrorInfo;
            }

            // Email to NGO
            $msg1 = "E-mail: " . $ro['email'] . "\nYou have received a medicine donation.";
            $recipient1 = $ro['email'];
            $subject1 = "Medicine Donation";

            $mail2 = new PHPMailer();
            $mail2->isSMTP();
            $mail2->Host = 'smtp.gmail.com';
            $mail2->SMTPAuth = true;
            $mail2->Username = 'kavitamattihalli29@gmail.com';
            $mail2->Password = 'nragkdhdfjsrjwkb';
            $mail2->SMTPSecure = 'tls';
            $mail2->Port = 587;
            $mail2->setFrom('kavitamattihalli29@gmail.com', 'Medicine Donation');
            $mail2->addAddress($recipient1);
            $mail2->Subject = $subject1;
            $mail2->Body = $msg1;

            if ($mail2->send()) {
                echo "Mail sent successfully to NGO.";
            } else {
                echo "Mailer Error (NGO): " . $mail2->ErrorInfo;
            }
        }
    }
    } // end while
} // end if
?>
</body>
</html>