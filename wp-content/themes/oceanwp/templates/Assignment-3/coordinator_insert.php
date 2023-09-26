<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
</head>

<body>
    <br />
    <form name="myForm" action="coordinator_insert.php" method="post" onsubmit="return validateForm()">
        <div class="form-group">
            <label for="exampleInputNumber">Name:</label>
            <input type="text" name="name" id="exampleInputNumber" placeholder="Enter new coordinator">
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
    <?php

    if(isset($_POST["submit"])){

        include "connection.php";

        $name = $_POST["name"];
    
        $sql = "INSERT INTO coordinator (name)
        VALUES ('$name')";
    
        $insert=mysqli_query($conn, $sql);
        if(!$insert){
            die("Insertion Failed: ".mysqli_error($conn));
        }
    
        mysqli_close($conn);
    
        header("location:display.php");
    }

    ?>

</body>

<script>
function validateForm() {
  let x = document.forms["myForm"]
  if (x["name"].value == "") {
    alert("Name must be filled out");
    return false;
  }
}
</script>

</html>