<?php
    // require_once "Database.php";
    // $conn = new Database();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../res/jquery-3.7.1.min.js"></script>
</head>
<body>
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-center text-light">
                <h3>Registration</h3>
            </div>
            <div class="card-body">
                <form action="RegisterFunction.php" method="POST">
                    <div class="mb-3">
                        <label for="fname" class="form-label">First Name</label>
                        <input type="text" class="form-control" id="fname" name="fname" require>
                    </div>
                    <div class="mb-3">
                        <label for="mnane" class="form-label">Middle Name</label>
                        <input type="text" class="form-control" id="mname" name="mname" require>
                    </div>
                    <div class="mb-3">
                        <label for="lname" class="form-label">Last Name</label>
                        <input type="text" class="form-control" id="lname" name="lname" require>
                    </div>
                    <div class="mb-3">
                        <label for="nickname" class="form-label">Nickname</label>
                        <input type="text" class="form-control" id="nickname" name="nickname" require>
                    </div>
                    <div class="mb-3">
                        <label for="age" class="form-label">Age</label>
                        <input type="text" class="form-control" id="age" name="age" require>
                    </div>
                    <div class="mb-3">
                        <label for="sex" class="form-label">Sex</label>
                        <select class="form-control" id="sex" name="sex" require>
                            <option value="" Selected disabled>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="skintone" class="form-label">Skin Tone</label>
                        <select class="form-control" id="skintone" name="skintone" require>
                            <option value="" Selected disabled>Select</option>
                            <option value="black">Black</option>
                            <option value="white">White</option>
                            <option value="green">Green</option>
                        </select>
                    </div>
                    <hr>
                    <h3 class="text-center">Login Credential</h3>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username" require>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" aria-describedby="passhelp" require>
                        <div id="passhelp" class="form-text text-center">Diko yan pag-kakalat.</div>
                    </div>
                    <div class="text-center">
                        <input type="submit" id="register-btn" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("#register-btn").click(function(){



                // const data = [
                //     username = $("#username").text,
                //     password = $("#password").text,
                //     fname = $("#fname").text,
                //     mname = $("#mname").text,
                //     lname = $("#lname").text,
                //     age = $("#age").text,
                //     sex = $("#sex").val,
                //     skin_tone = $("#skin_tone").val,
                //     nickname = $("#nickname").text,
                // ]

                // $.ajax({
                //     url: 'crud.php',
                //     method: 'POST',
                //     data:{
                //         order: JSON.stringify(order)
                //     },
                //     success: function(response){
                //         alert(response);
                //         try{
                //             const data = JSON.parse(response);
                //             alert(data.message);
                //         }
                //         catch(error){
                //             alert(error);
                //         }
                //     },
                //     error: function(xhr, status, error){
                //         alert("Error:", error);
                //     }
                // })
            });
        });
    </script>
</body>
</html>