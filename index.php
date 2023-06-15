 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/formStyle.css">
    <link rel="Website Icon" type="image/png" href="assets/mainPage_icon.png">
    <title>Registration Form</title>
</head>
<body>
    <section>
        <header>
            <h1>Registration Form</h1>
        </header>
        <main>
            <form action="" method="POST" autocomplete="off" onsubmit="return validateForm()">
                <div class="container">
                    <div class="inputBox">
                        <i class="fa-solid fa-user symbol"></i>
                        <input type="text" name="firstName" id="firstName" placeholder="first name">
                        <p id="errFname"></p>
                    </div>
                    <div class="inputBox">
                        <i class="fa-solid fa-user symbol"></i>
                        <input type="text" name="lastName" id="lastName" placeholder="last name">
                        <p id="errLname"></p>
                    </div>
                    <div class="inputBox">
                        <i class="fa-solid fa-key symbol"></i>
                        <input type="password" name="password" id="password" placeholder="password">
                        <span id="showBtn"></span>
                        <p id="errPasswrd"></p>
                        <div class="keypoints">
                            <ul>
                                <li id="upper">At least one uppercase letter</li>
                                <li id="lower">At least one lowercase letter</li>
                                <li id="number">At least one number</li>
                                <li id="special">At least one special character</li>
                                <li id="length">Minimum 8 characters long</li>
                            </ul>
                        </div>
                    </div>
                    <div class="inputBox">
                        <i class="fa-solid fa-phone symbol"></i>
                        <input type="number" name="phoneNum" id="phoneNum" placeholder="phone number">
                        <p id="errPhNum"></p>
                    </div>
                    <div class="inputBox">
                        <i class="fa-solid fa-envelope symbol"></i>
                        <input type="email" name="email" id="mailId" placeholder="mail Id">
                        <p id="errMail"></p>
                    </div>
                    <div class="selectionBox">
                        <span>Gender :</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gender" id="Male" value="Male">
                            <label class="form-check-label" for="Male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gender" id="Female" value="Female">
                            <label class="form-check-label" for="Female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gender" id="Others" value="Others">
                            <label class="form-check-label" for="Others">Others</label>
                        </div>
                        <p id="errGender"></p>
                    </div>
                    <div class="selectionBox">
                        <span>Courses :</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="courseNames[]" id="bca" value="BCA">
                            <label class="form-checkbox-label" for="bca">BCA</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="courseNames[]" id="mca" value="MCA">
                            <label class="form-checkbox-label" for="mca">MCA</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="courseNames[]" id="bsc" value="BSc">
                            <label class="form-checkbox-label" for="bsc">BSc</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="courseNames[]" id="btech" value="BTech">
                            <label class="form-checkbox-label" for="btech">BTech</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="courseNames[]" id="mtech" value="Mtech">
                            <label class="form-checkbox-label" for="mtech">Mtech</label>
                        </div>
                        <p id="errCourses"></p>
                    </div>
                    <div class="inputBox">
                        <i class="fa-solid fa-location-dot symbol"></i>
                        <input type="text" name="city" id="city" placeholder="City">
                        <p id="errCity"></p>
                    </div>
                    <div class="inputBox">
                        <label for="selectState">State</label>
                        <select class="form-state" name="state" id="selectState">
                            <option value="" selected disabled>State</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Andaman & Nicobar">Andaman and Nicobar Islands</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chattisgarh">Chattisgarh</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Daman & Diu">Dadra and Nagar Haveli</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Jammu & Kashmir">Jammu & Kashmir</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Ladakh">Ladakh</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="West Bengal">West Bengal</option>
                        </select>
                        <p id="errState"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="submit" class="btn btn-primary" value="Register" name="submit" id="RegisterBtn">
                    </div>
                    <div class="reset">
                        <a href="#" id="resetBtn">Reset All</a>
                    </div>
                </div>
            </form>
        </main>
        <footer>
            <h4>&#169;CrossOriGenes</h4>
        </footer>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <!-- js file for validation -->
    <script src="assets/formValidation.js"></script>
</body>
</html>

<?php 
    
    include('connection.php');

    if (isset($_POST['submit'])) {
        
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $gen = $_POST['Gender'];
        $passwd = $_POST['password'];
        $email = $_POST['email'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $phoneNo = $_POST['phoneNum'];
        $courses = implode(", ",$_POST['courseNames']);

        $query = "INSERT INTO `stud_info`(`fname`, `lname`, `gender`, `password`, `mailID`, `city`, `state`, `phoneNo`, `courses`) VALUES ('$fname','$lname','$gen','$passwd','$email','$city','$state','$phoneNo','$courses')";

        $data = mysqli_query($conn,$query);
        if ($data) {
            ?>
                <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/display.php"/>
            <?php
            echo '<script>alert("data inserted successfully...")</script>';
            
        } else {
            echo '<script>alert("Failed!!")</script>';
            return;
        } 
    }
?>