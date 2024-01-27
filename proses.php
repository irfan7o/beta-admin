<style>
@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');
@import url('https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css');
body {
  font-family: "Roboto", sans-serif;
  padding: 0;
  margin: 0;
  background-color: #F0F0F0;
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
}

.cookiesContent {
  width: 320px;
  display: flex;
  flex-direction: column;
  align-items: center;
  background-color: #fff;
  color: #000;
  text-align: center;
  border-radius: 20px;
  padding: 30px 30px 70px;

}

.close {
  width: 30px;
  font-size: 20px;
  color: #c0c5cb;
  align-self: flex-end;
  background-color: transparent;
  border: none;
  margin-bottom: 10px;
  cursor: pointer;
  padding-left: 500%;
}

img {
  width: 82px;
  margin-bottom: 15px;
}

p {
  margin-bottom: 40px;
  font-size: 18px;
  font-family: 'Poppins', sans-serif;
}

.accept {
  background-color: #289cfc;
  border: none;
  border-radius: 5px;
  width: 300px;
  font-family: 'Poppins', sans-serif;
  padding: 15px;
  font-size: 16px;
  color: white;
  cursor: pointer;
}

#link{
    text-decoration: none;
    color: #289cfc;
}

#icon{
    padding-right: 10px;
}
</style>

<!-- Sukses alert menampilkan info ketika berhasil insert -->
<?php
include 'connection.php';
$indonesia = ucwords ($_POST['indonesia']);
$sumbawa = ucwords ($_POST['sumbawa']);
$keterangan = ucfirst ($_POST['keterangan']);

$query = mysqli_query($con, "INSERT INTO translate(indonesia, sumbawa, keterangan) VALUES ('$indonesia', '$sumbawa', '$keterangan')");

if($query){ ?>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>

    <div class="container">
        <div class="cookiesContent" id="cookiesPopup">
        <a href="home.php"><button class="close">✖</button></a>
        <img src="https://cdn-icons-png.flaticon.com/512/1828/1828640.png" alt="cookies-img" />
        <p><strong>Sukses.</strong> Kata berhasil di input ke database <a id="link" href="http://localhost/beta-translate/" target="_blank">beta translate</a></p>
        <a href="home.php"><button class="accept"><i id="icon" class="fi fi-br-arrow-left"></i> Kembali</button></a>
        </div>
    </div>
<?php
}else{
    echo 'Data gagal tersimpan.';
}
?>
