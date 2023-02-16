<?

    include("../../../../koneksi.php");
    session_start();
    if(!isset($_SESSION["id"])){
        header("Location: ../../../../");
    }
    if(isset($_POST["cetak"])){
        $kode = $_POST["kode"];
    }

    $sql = mysqli_query($db, "SELECT * FROM pengembalian
    INNER JOIN peminjaman ON pengembalian.kode_peminjaman = peminjaman.kode_peminjaman
    INNER JOIN booking ON peminjaman.kode_booking = booking.kode_booking WHERE kode_peminjaman = '$kode'");
    $result = mysqli_fetch_array($sql);

    $var = $result["tgl_peminjaman"];


?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Cetak</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="font-awesome/css/font-awesome.min.css" />

    <script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<!-- Invoice Template - START -->

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 main">
            <div class="col-md-12">
               <div class="row">
                    <div class="col-md-4">
                        <img class="img-responsive" alt="Invoce Template" src="../../../../img/LogoKotak1.png"/>
                    </div>
                </div>
                <br />
                <div class="row">
                    <div class="col-md-12 text-left">
                        <h2>Pembayaran</h2>
                        <h5><?php echo $result["kode_peminjaman"]?></h5>
                        <p><b>Date :</b> <?php echo $result["tgl_pengembalian"]?> </p>
                    </div>
                </div>
                <br />
                <div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th><h5>Item</h5></th>
                                <th><h5>Keterangan</h5></th>
                                <th><h5>Harga</h5></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="col-md-2">APV</td>
                                <td class="col-md-1">1 Hari</td>
                                <td class="col-md-1"><i class="fa fa-usd" aria-hidden="true"></i> 759,00 </td>
                            </tr>
                            <tr>
                                <td class="col-md-2">Keterlambatan Pengembalian</td>
                                <td class="col-md-1">1 Hari</td>
                                <td class="col-md-1"><i class="fa fa-usd" aria-hidden="true"></i> 759,00 </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td class="col-md-2">
                                <p>
                                    <strong>Total Harga: </strong>
                                </p>
							    </td>
                                <td class="col-md-1">
                                <p>
                                    <strong><i class="fa fa-usd" aria-hidden="true"></i> 2569,00 </strong>
                                </p>
							    </td>
                            </tr>
                            <tr style="color: #F81D2D;">
                                <td></td>
                                <td class="col-md-1"><h5><strong>Total Bayar:</strong></h5></td>
                                <td class="col-md-1"><h5><strong><i class="fa fa-usd" aria-hidden="true"></i> 2365,00 </strong></h5></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

	<!-- <script>
		window.print();
	</script> -->

<style>
    .main {
        background: #ffffff;
        border-top: 15px solid #1E1F23;
        margin-top: 30px;
        margin-bottom: 30px;
        padding: 40px 30px !important;
        position: relative;
        box-shadow: 0 1px 21px #808080;
        font-size:10px;
    }

    .main thead {
		background: #1E1F23;
        color: #fff;
		}
</style>
<!-- Invoice Template - END -->

</div>

</body>
</html>