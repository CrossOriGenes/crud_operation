
<?php

	include('connection.php');

	$Id = $_GET['id'];
	$query = " SELECT * FROM `stud_info` WHERE id='$Id' ";
    $data = mysqli_query($conn, $query);
    $result = mysqli_fetch_assoc($data);

    $getGen = $result['gender'];
    $getState = $result['state'];
    $getCourse = explode(", ",$result['courses']);


    if (isset($_POST['update'])) {
        
        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $gen = $_POST['Gender'];
        $pswd = $_POST['password'];
        $mailID = $_POST['email'];
        $city = $_POST['city'];
        $state = $_POST['state'];
        $phoneNo = $_POST['phoneNum'];
        $courses = implode(", ",$_POST['courseNames']);

        $query = "UPDATE `stud_info` SET `fname`='$fname',`lname`='$lname',`gender`='$gen',`password`='$pswd',`mailID`='$mailID',`city`='$city',`state`='$state',`phoneNo`='$phoneNo',`courses`='$courses' WHERE id='$Id' ";

        $data = mysqli_query($conn,$query);
        if ($data) {
            ?>
                <meta http-equiv = "refresh" content = "0; url = http://localhost/crud/display.php"/>
            <?php
            echo '<script>alert("Data updated successfully...")</script>';
            
        } else {
            echo '<script>alert("Failed!!")</script>';
            return;
        }
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/formStyle.css">
    <link rel="Website Icon" type="image/png" href="assets/editPage_icon.png">
    <title>Update Record</title>
</head>
<body>
    <section>
        <header>
            <h1>Update Record</h1>
        </header>
        <main>
            <form action="" method="POST" autocomplete="off" onsubmit="return validateForm()">
                <div class="container">
                    <div class="inputBox">
                        <i class="fa-solid fa-user symbol"></i>
                        <input type="text" name="firstName" id="firstName" placeholder="first name" value="<?php echo $result['fname']; ?>">
                        <p id="errFname"></p>
                    </div>
                    <div class="inputBox">
                        <i class="fa-solid fa-user symbol"></i>
                        <input type="text" name="lastName" id="lastName" placeholder="last name" value="<?php echo $result['lname']; ?>">
                        <p id="errLname"></p>
                    </div>
                    <div class="inputBox">
                        <i class="fa-solid fa-key symbol"></i>
                        <input type="password" name="password" id="password" placeholder="password" value="<?php echo $result['password']; ?>">
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
                        <input type="number" name="phoneNum" id="phoneNum" placeholder="phone number" value="<?php echo $result['phoneNo']; ?>">
                        <p id="errPhNum"></p>
                    </div>
                    <div class="inputBox">
                        <i class="fa-solid fa-envelope symbol"></i>
                        <input type="email" name="email" id="mailId" placeholder="mail Id" value="<?php echo $result['mailID']; ?>">
                        <p id="errMail"></p>
                    </div>
                    <div class="selectionBox">
                        <span>Gender :</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gender" id="Male" value="Male"
                            <?php if ($getGen == 'Male') { 
                                echo "checked"; 
                            } ?> >
                            <label class="form-check-label" for="Male">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gender" id="Female" value="Female"
                            <?php if ($getGen == 'Female') { 
                                echo "checked"; 
                            } ?> >
                            <label class="form-check-label" for="Female">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="Gender" id="Others" value="Others" 
                            <?php if ($getGen == 'Others') { 
                                echo "checked"; 
                            } ?> >
                            <label class="form-check-label" for="Others">Others</label>
                        </div>
                        <p id="errGender"></p>
                    </div>
                    <div class="selectionBox">
                        <span>Courses :</span>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="courseNames[]" id="bca" value="BCA"
                            <?php 
                                if(in_array('BCA',$getCourse)){ echo "checked"; }
                            ?>>
                            <label class="form-checkbox-label" for="bca">BCA</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="courseNames[]" id="mca" value="MCA"
                            <?php 
                                if(in_array('MCA',$getCourse)){ echo "checked"; }
                            ?>>
                            <label class="form-checkbox-label" for="mca">MCA</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="courseNames[]" id="bsc" value="BSc"
                            <?php 
                                if(in_array('BSc',$getCourse)){ echo "checked"; }
                            ?>>
                            <label class="form-checkbox-label" for="bsc">BSc</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="courseNames[]" id="btech" value="BTech"
                            <?php 
                                if(in_array('BTech',$getCourse)){ echo "checked"; }
                            ?>>
                            <label class="form-checkbox-label" for="btech">BTech</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="courseNames[]" id="mtech" value="Mtech"
                            <?php 
                                if(in_array('Mtech',$getCourse)){ echo "checked"; }
                            ?>>
                            <label class="form-checkbox-label" for="mtech">Mtech</label>
                        </div>
                        <p id="errCourses"></p>
                    </div>
                    <div class="inputBox">
                        <i class="fa-solid fa-location-dot symbol"></i>
                        <input type="text" name="city" id="city"  placeholder="City" value="<?php echo $result['city']; ?>">
                        <p id="errCity"></p>
                    </div>
                    <div class="inputBox">
                        <label for="selectState">State</label>
                        <select class="form-state" name="state" id="selectState">
                            
                            <option value="" selected disabled>State</option>
                            <option value="Andhra Pradesh"<?php if($getState == 'Andhra Pradesh'){ echo "selected"; } ?> >Andhra Pradesh</option>
                            <option value="Arunachal Pradesh"<?php if($getState == 'Arunachal Pradesh'){ echo "selected"; } ?>>Arunachal Pradesh</option>
                            <option value="Assam"<?php if($getState == 'Assam'){ echo "selected"; } ?>>Assam</option>
                            <option value="Andaman & Nicobar"<?php if($getState == 'Andaman & Nicobar'){ echo "selected"; } ?>>Andaman and Nicobar Islands</option>
                            <option value="Bihar"<?php if($getState == 'Bihar'){ echo "selected"; } ?>>Bihar</option>
                            <option value="Chattisgarh"<?php if($getState == 'Chattisgarh'){ echo "selected"; } ?>>Chattisgarh</option>
                            <option value="Chandigarh"<?php if($getState == 'Chandigarh'){ echo "selected"; } ?>>Chandigarh</option>
                            <option value="Delhi"<?php if($getState == 'Delhi'){ echo "selected"; } ?>>Delhi</option>
                            <option value="Daman & Diu"<?php if($getState == 'Daman & Diu'){ echo "selected"; } ?>>Dadra and Nagar Haveli</option>
                            <option value="Goa"<?php if($getState == 'Goa'){ echo "selected"; } ?>>Goa</option>
                            <option value="Gujarat"<?php if($getState == 'Gujarat'){ echo "selected"; } ?>>Gujarat</option>
                            <option value="Haryana"<?php if($getState == 'Haryana'){ echo "selected"; } ?>>Haryana</option>
                            <option value="Himachal Pradesh"<?php if($getState == 'Himachal Pradesh'){ echo "selected"; } ?>>Himachal Pradesh</option>
                            <option value="Jharkhand"<?php if($getState == 'Jharkhand'){ echo "selected"; } ?>>Jharkhand</option>
                            <option value="Jammu & Kashmir"<?php if($getState == 'Jammu & Kashmir'){ echo "selected"; } ?>>Jammu & Kashmir</option>
                            <option value="Karnataka"<?php if($getState == 'Karnataka'){ echo "selected"; } ?>>Karnataka</option>
                            <option value="Kerala"<?php if($getState == 'Kerala'){ echo "selected"; } ?>>Kerala</option>
                            <option value="Lakshadweep"<?php if($getState == 'Lakshadweep'){ echo "selected"; } ?>>Lakshadweep</option>
                            <option value="Ladakh"<?php if($getState == 'Ladakh'){ echo "selected"; } ?>>Ladakh</option>
                            <option value="Madhya Pradesh"<?php if($getState == 'Madhya Pradesh'){ echo "selected"; } ?>>Madhya Pradesh</option>
                            <option value="Maharashtra"<?php if($getState == 'Maharashtra'){ echo "selected"; } ?>>Maharashtra</option>
                            <option value="Manipur"<?php if($getState == 'Manipur'){ echo "selected"; } ?>>Manipur</option>
                            <option value="Meghalaya"<?php if($getState == 'Meghalaya'){ echo "selected"; } ?>>Meghalaya</option>
                            <option value="Mizoram"<?php if($getState == 'Mizoram'){ echo "selected"; } ?>>Mizoram</option>
                            <option value="Nagaland"<?php if($getState == 'Nagaland'){ echo "selected"; } ?>>Nagaland</option>
                            <option value="Odisha"<?php if($getState == 'Odisha'){ echo "selected"; } ?>>Odisha</option>
                            <option value="Punjab"<?php if($getState == 'Punjab'){ echo "selected"; } ?>>Punjab</option>
                            <option value="Rajasthan"<?php if($getState == 'Rajasthan'){ echo "selected"; } ?>>Rajasthan</option>
                            <option value="Sikkim"<?php if($getState == 'Sikkim'){ echo "selected"; } ?>>Sikkim</option>
                            <option value="Tamil Nadu"<?php if($getState == 'Tamil Nadu'){ echo "selected"; } ?>>Tamil Nadu</option>
                            <option value="Telangana"<?php if($getState == 'Telangana'){ echo "selected"; } ?>>Telangana</option>
                            <option value="Tripura"<?php if($getState == 'Tripura'){ echo "selected"; } ?>>Tripura</option>
                            <option value="Uttarakhand"<?php if($getState == 'Uttarakhand'){ echo "selected"; } ?>>Uttarakhand</option>
                            <option value="Uttar Pradesh"<?php if($getState == 'Uttar Pradesh'){ echo "selected"; } ?>>Uttar Pradesh</option>
                            <option value="West Bengal"<?php if ($getState == 'West Bengal'){ echo "selected"; } ?>>West Bengal</option>
                        </select>
                        <p id="errState"></p>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="col-sm-10">
                      <input type="submit" class="btn btn-primary" value="Update" name="update" id="UpdateBtn">
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
