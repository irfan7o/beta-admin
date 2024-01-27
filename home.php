<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM usertable WHERE email = '$email'";
    $run_Sql = mysqli_query($con, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: login-user.php');
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title><?php echo $fetch_info['name'] ?> | Home</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="home.css">

  <style>
    @import url('https://cdn-uicons.flaticon.com/uicons-solid-rounded/css/uicons-solid-rounded.css');

    h3{
      padding-bottom: 7px;
    }

    #set{
      color: #939393;
    }

    #set:hover{
      background: #EFEFF0;
      color: #289cfc;
    }

    .form-control{
      height: 50px;
    }

    #capz{
      text-transform: capitalize;
      height: 50px;
      font-family: 'Poppins', sans-serif;
    }

    #capx{
      text-transform: capitalize;
      height: 50px;
      font-family: 'Poppins', sans-serif;
    }

    .datas{
      position: absolute;
      top: 45px;
      background-color: #FDFDFD;
      border-radius: 8px;
      border-width: 0;
      color: #A0A0A0;
      cursor: pointer;
      display: inline-block;
      font-family: "Poppins", sans-serif;
      font-size: 14px;
      font-weight: 500;
      line-height: 20px;
      list-style: none;
      margin: 0;
      padding: 10px 12px;
      text-align: center;
      transition: all 200ms;
      vertical-align: baseline;
      white-space: nowrap;
      user-select: none;
      -webkit-user-select: none;
      touch-action: manipulation;
    }

    .datas:hover{
      color: #A0A0A0;
      text-decoration: none;
    }

    .ket-text {
      text-transform: none; 
      width: 100%; 
      max-width: 800px; 
      height: 200px; 
      outline: none; 
      border: none; 
      padding-left: 15px;
      padding-top: 10px;
      font-family: 'Poppins', sans-serif;
    }

    .ket-text::placeholder {
      color: #A0A0A0;

    }
  </style>

</head>

<body style="background-color: #F0F0F0; padding: 2em;">

  <!-- Button untuk dirrect ke dataset.php -->
  <a class="datas" href="dataset.php"><i class="fi fi-sr-flame"></i> Dataset</a>

  <!-- Form untuk input kata ke database -->
  <div style="margin-top: 3%;" class="container">
  <form name="translateBeta" method="post" action="proses.php">
    <h3 class="text-center">Beta Translate</h3>
      <div class="wrapper">
        <div class="text-input">
          <textarea id="capz" spellcheck="false" name="indonesia" class="from-text" placeholder="Indonesia" required></textarea>
          <textarea id="capx" spellcheck="false" name="sumbawa" class="to-text" placeholder="Sumbawa" required></textarea>
        </div>
          <textarea id="" spellcheck="false" name="keterangan" class="ket-text" placeholder="Keterangan"></textarea>
      </div>
    <button type="submit" style="background-color: #289cfc; padding: 1em; font-family: Poppins, sans-serif;">Insert Kata</button>
  </form>
  </div>
  
  <!-- Navigasi -->
  <nav class="navbar fixed-bottom navbar-light bg-light">
  <button type="button" id="set" class="btn" data-toggle="modal" data-target="#exampleModalCenter"><i class="fi fi-sr-following"></i></button>
  <form class="form-inline">
  <a href="logout-user.php"><button type="button" class="btn btn-danger my-2 my-sm-0" type="submit">Logout</button></a>
  </form>
  </nav>

  <!--Modal info akun -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
		  <div class="modal-dialog modal-dialog-centered" role="document">
		    <div class="modal-content">
		      <div class="modal-body p-4 py-4 p-md-4">
		      	<h3 class="text-center mb-3">Account</h3>

		      	<form action="#" class="signup-form">
		      		<div class="form-group mb-2">
		      			<label for="name">Nama</label>
		      			<input type="text" class="form-control" value="<?php echo $fetch_info['name'] ?>" disabled>
		      		</div>
		      		<div class="form-group mb-2">
		      			<label for="email">Email</label>
		      			<input type="text" class="form-control" value="<?php echo $fetch_info['email'] ?>" disabled>
		      		</div>
              &nbsp;
	            <div class="form-group d-md-flex">
	            	<button style="background: #289cfc;" type="button" class="form-control btn btn-primary rounded submit px-3" data-dismiss="modal" aria-label="Close">Close</button>	            </div>
	          </form>

		      </div>
		    </div>
		  </div>
	</div>

  <!-- Script membuat form wajib input sebelum di insert -->
  <script>
      function validateForm() {
        if (document.forms["translateBeta"]["indonesia"].value == "") {
              alert("Masukan kata bahasa indonesia");
              document.forms["translateBeta"]["indonesia"].focus();
              return false;
          }
        if (document.forms["translateBeta"]["sumbawa"].value == "") {
              alert("Masukan kata bahasa sumbawa");
              document.forms["translateBeta"]["sumbawa"].focus();
              return false;
          }
        // if (document.forms["translateBeta"]["keterangan"].value == "") {
        //       alert("Masukan kata bahasa sumbawa");
        //       document.forms["translateBeta"]["keterangan"].focus();
        //       return false;
        //   }         
        }
  </script>

  <!-- Script pop up info akun -->
  <script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>
  <script src="js/sweetalert.min.js"></script>

</body>

</html>