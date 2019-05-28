<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Buku Telephon</title>
</head>
<body>
    <div class="container">
        <div class="kotak">
        <br>
        <h1 class="text-center">Buku Telepon</h1>
        <hr>
        <?php if(isset($_GET['berhasil'])){ ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Berhasil !!!</strong> Kontak Berhasil Ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php }else if(isset($_GET['gagal'])){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>GAGAL!!!</strong> Kontak Tidak berhasil Ditambahkan
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php } ?>
        <button type="button" class="btn btn-primary mb-2 mt-2" data-toggle="modal" data-target="#exampleModal">
        Tambah Kontak
        </button>
        <table class="table">
            <thead class="thead-light">
                <tr>
                <th scope="col">No</th>
                <th scope="col">Nama</th>
                <th scope="col">Email</th>
                <th scope="col">No Telepon</th>
                <th scope="col">Alamat</th>
                </tr>
            </thead>
            <tbody>
            <?php
            $koneksi = mysqli_connect("localhost","root","","buku_telphon");
            $query = 'SELECT * FROM kontak group by nama ASC';
            $hasil= mysqli_query($koneksi,$query);
            $no = 1;
            while($kontak = mysqli_fetch_array($hasil)){
            ?>
                <tr>
                    <td> <?= $no ?> </td>
                    <td> <?= $kontak['nama'] ?> </td>
                    <td> <?= $kontak['no_tlpn'] ?> </td>
                    <td> <?= $kontak['email'] ?> </td>
                    <td> <?= $kontak['alamat'] ?> </td>
                </tr>
                <?php
            $no++;
            } 
            ?>
            </tbody>
        </table>
        </div>
        <div class="footer text-center"><small>copyright &copy 2019 || Mulyadih</small></div>
    </div>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Kontak</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <form action="insert.php" method="post">
        <div class="modal-body">
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Nama</span>
                </div>
                <input type="text" name="nama" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span  class="input-group-text" id="inputGroup-sizing-sm">Email</span>
                </div>
                <input type="text" name="email" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">No Telepon</span>
                </div>
                <input type="text" name="no_tlpn"  class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            </div>
            <div class="input-group input-group-sm mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-sm">Alamat</span>
                </div>
                <input type="text" name="alamat" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
        </div>
    </div>
    </div>
    
    <!-- Bagian JavaScript -->
    <script src="js/jquery-3.3.1.min.js" ></script>
    <script src="js/bootstrap.js"></script>
    <script>
        $(".alert").alert();
    </script>
</body>
</html>
    
    