<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="Website Icon" type="image/png" href="assets/displayPage_icon.png">
    <link rel="stylesheet" type="text/css" href="assets/displayStyle.css">
    <title>Display Table records</title>
</head>
<body>
    <h1>Registration Records</h1>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>
</html>

<?php 
    
    error_reporting(0);
    include('connection.php');
    

    $query = " SELECT * FROM `stud_info` ";
    $data = mysqli_query($conn, $query);

    $rows = mysqli_num_rows($data);
    if ($rows > 0) {
        ?>

        <div class="table-records">
            <div class="inputBtn">
                <a href="http://localhost/crud/index.php" id="addNew">
                    <ion-icon name="add-outline"></ion-icon>
                    <span>Add</span>
                </a>
            </div>
            <table>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>gender</th>
                    <th>mail ID</th>
                    <th>address</th>
                    <th>phone No</th>
                    <th>course(s)</th>
                    <th>operations</th>
                </tr>

                <?php
                    while ($result = mysqli_fetch_assoc($data)) {
                        echo "
                                <tr>
                                    <td>".$result['id']."</td>
                                    <td>".$result['fname']." ".$result['lname']."</td>
                                    <td>".$result['gender']."</td>
                                    <td>".$result['mailID']."</td>
                                    <td>".$result['city'].", ".$result['state']."</td>
                                    <td>".$result['phoneNo']."</td>
                                    <td>".$result['courses']."</td>
                                    <td>
                                       <a href='editData.php?id=$result[id]' class='updateBtn'>Edit</a>
                                       <a href='deleteData.php?id=$result[id]' class='deleteBtn' onclick='return isSure()'>Delete</a>
                                    </td>
                                </tr>
                            ";
                    }
                } else {
                    echo "No records found!!";
                }
    
?>
            </table>
        </div>

<script type="text/javascript">
    
    function isSure(){
        return confirm('Are you sure to delete this record?')
    }

</script>