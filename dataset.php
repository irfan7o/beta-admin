<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <!-- Sweetalert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.15.7/dist/sweetalert2.all.min.js"></script>

    <title>Dataset | List Kata</title>

    <style>
        @import url('https://cdn-uicons.flaticon.com/uicons-bold-rounded/css/uicons-bold-rounded.css');
        @import url('https://cdn-uicons.flaticon.com/uicons-bold-straight/css/uicons-bold-straight.css');

        body{
            background-color: #F0F0F0;
        }
        .table-wrapper{
            padding: 20px;
        }
        .back{
            background-color: #289cfc;
            color: #fff;
            border-radius: 50%;
            border: none;
            cursor: pointer;
            padding: 11px 14px;
            margin-bottom: 20px;
        }
        .back:focus{
            outline: none;
        }
    </style>
</head>

<!-- Menampilkan list kata pada tabel -->
<body>
<section class="py-2 my-3">
	<div class="container">
	<div class="bg-white" style="border-radius: 10px;">
        <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
            <div><h2>Dataset <b>List Kata</b></h2></div>

            <br>
            <table id="example" class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Indonesia</th>
                        <th>Sumbawa</th>
                        <th>Keterangan</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'connection.php';
                    $translate = mysqli_query($con, "SELECT * FROM translate");
                    while($row = mysqli_fetch_array($translate))
                    { ?>
                        <tr>
                            <td><?php echo $row['indonesia'] ?></td>
                            <td><?php echo $row['sumbawa'] ?></td>
                            <td><?php echo $row['keterangan'] ?></td>
                            <td><a href="delete.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger alert_notif">Delete <i class="fi fi-bs-trash"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            </div>
        </div>  
        </div> 		
	</div>
	</div>
</section>

<!-- Pesan sukses sweetalert -->
<?php if(@$_SESSION['sukses']){ ?>
    <script>
        Swal.fire({            
            icon: 'success',                   
            title: 'Sukses',    
            text: 'data berhasil dihapus',                        
            timer: 3000,                                
            showConfirmButton: false
        })
    </script>
<?php unset($_SESSION['sukses']); } ?>

<!-- Script konfirmasi hapus data dengan sweetalert -->
<script>
    $('.alert_notif').on('click',function(){
        var getLink = $(this).attr('href');
        Swal.fire({
        title: "Yakin hapus data?",            
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        confirmButtonText: 'Ya',
        cancelButtonColor: '#3085d6',
        cancelButtonText: "Batal"
                
        }).then(result => {
                    //Jika klik ya maka arahkan ke delete.php
            if(result.isConfirmed){
                window.location.href = getLink
                }
            })
            return false;
        });
</script>

<!-- Script untuk datatable -->
<script>
    $(document).ready(function () {
        $('#example').DataTable();
    });
</script>

<center>
<a href="home.php"><button class="back"><i class="fi fi-br-arrow-left"></i></button></a>
</center>
    
</body>
</html>