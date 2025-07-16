<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Registration</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/superfish.css">
    <link rel="stylesheet" href="css/contact.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="js/modernizr-2.6.2.min.js"></script>
</head>
<body>
    <?php include("navbar.php"); ?>

    <div class="container-fluid">
        <h1><center>Register</center></h1>
        <div class="row">
            <!-- Donor Form -->
            <div class="col-lg-6">
                <section id="contact">
                    <div class="form-box">
                        <h3>For <span class="text-primary">Donor</span></h3>
                        <form method="POST" action="engine.php" onsubmit="return validateForm(this);">
                            <div class="form-group">
                                <label for="first-name">First Name</label>
                                <input type="text" name="first_name" placeholder="Enter Your First Name" required>
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name</label>
                                <input type="text" name="last_name" placeholder="Enter Your Last Name" required>
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" placeholder="Enter Your Address" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Enter Your Email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter Your Password" required
                                pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}"
                                title="Minimum 8 characters with uppercase, lowercase, number & special character">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password2" placeholder="Confirm Password" required>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" name="phone" placeholder="Enter Your Phone Number" required>
                            </div>
                            <input type="submit" value="Sign Up" name="donor_sign_up" class="contact-btn">
                        </form>
                    </div>
                </section>
            </div>

            <!-- Receiver Form -->
            <div class="col-lg-6">
                <section id="contact">
                    <div class="form-box">
                        <h3>For <span class="text-primary">Receiver</span></h3>
                        <form method="POST" action="engine.php" onsubmit="return validateForm(this);">
                            <div class="form-group">
                                <label for="ngo-name">NGO Name</label>
                                <input type="text" name="ngo_name" placeholder="Enter Your NGO Name" required>
                            </div>
                            <div class="form-group">
                                <label for="first-name">Registration No.</label>
                                <input type="text" name="ngo_regd_no" placeholder="Enter Your Registration Number" required>
                            </div>
                            <div class="form-group">
                                <label for="last-name">Address</label>
                                <input type="text" name="address" placeholder="Enter Your Address" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="email" placeholder="Enter Your Email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" placeholder="Enter Your Password" required
                                pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}"
                                title="Minimum 8 characters with uppercase, lowercase, number & special character">
                            </div>
                            <div class="form-group">
                                <label>Confirm Password</label>
                                <input type="password" name="password2" placeholder="Confirm Password" required>
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" name="phone" placeholder="Enter Your Phone Number" required>
                            </div>
                            <input type="submit" value="Sign Up" name="receiver_sign_up" class="contact-btn">
                        </form>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- Password Match Validation -->
    <script>
    function validateForm(form) {
        const password = form.querySelector('input[name="password"]').value;
        const confirmPassword = form.querySelector('input[name="password2"]').value;
        const pattern = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*]).{8,}$/;

        if (!pattern.test(password)) {
            alert("Password must be at least 8 characters long and include uppercase, lowercase, number, and special character.");
            return false;
        }

        if (password !== confirmPassword) {
            alert("Passwords do not match.");
            return false;
        }

        return true;
    }
    </script>
</body>
</html>
