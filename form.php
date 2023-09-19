<?php
include 'config.php';
// echo "halo";
$min_numb = 1;
$max_numb = 15;

// generate nomor acak
$rand_numb1 = mt_rand($min_numb, $max_numb);
$rand_numb2 = mt_rand($min_numb, $max_numb);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <!-- tampilan formulir -->
    <div class="container">
      <h2 class="text-center">Kontak</h2>
      <hr>
      
      <form id="form" action="validasiCaptcha.php" method="POST">
        <div class="form-group">
          <label for="name">Nama</label>
          <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan nama anda disini" minlength="5" maxlength="10" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" class="form-control" placeholder="Masukkan email anda disini" minlength="10" maxlength="20" required>
        </div>
        <div class="form-group">
          <label for="phone">No. Telepon</label>
          <input type="integer" name="phone" class="form-control" placeholder="Masukkan nomor telepon anda disini" minlength="10" maxlength="15" required>
        </div>
        <div class="form-group">
          <label for="website">Website</label>
          <input type="url" name="website" class="form-control" placeholder="Masukkan halaman website anda disini" required>
        </div>
        <div class="form-group">
          <label for="message">Pesan</label>
          <input type="text" name="message" class="form-control" placeholder="Masukkan pesan anda disini" minlength="10" maxlength="50" required >
          <script>
          </script>
        </div>
        <div class="form-group">
          <label for="captcha">Captcha</label>
          <?php
          echo $rand_numb1 . '+' . $rand_numb2 . '=';
          ?>
          <input name="hasilCaptcha" type="text" size="2" required class="mt-2">
          <input name="angkaPertama" type="hidden" value="<?php echo $rand_numb1 ?>">
          <input name="angkaKedua" type="hidden" value="<?php echo $rand_numb2 ?>">
        </div>
        <button type="submit" class="btn btn-primary mt-2">KIRIM</button>
      </form>
    </div>
    
    <!-- tampilan show -->
  <?php
  $query = mysqli_query($link,"SELECT * FROM info ORDER BY id DESC");
  ?>
  <div class="table">
    <table class="static" align="center" border="1px" rules="all" style="width: 95%;">
        <thead>
        <tr>
            <th class="text-center">No</th>
            <th class="text-center">Name</th>
            <th class="text-center">Email</th>
            <th class="text-center">Phone</th>
            <th class="text-center">Website</th>
            <th class="text-center">Message</th> 
            <th class="">Aksi</th> 
        </tr>
        </thead>
        <?php if(mysqli_num_rows($query)>0){ ?>
        <?php
            $no = 1;
            while($data = mysqli_fetch_array($query)){
        ?>
        <tbody>
        <tr>
            <td class="text-center"><?php echo $no ?></td>
            <td class="text-center"><?php echo $data["name"];?></td>
            <td class="text-center"><?php echo $data["email"];?></td>
            <td class="text-center"><?php echo $data["phone"];?></td>
            <td class="text-center"><?php echo $data["website"];?></td>
            <td class="text-center"><?php echo $data["message"];?></td>
            <td>
                <button class="btn btn-primary center"><a class="edit text-white" style="text-decoration: none;" href="edit.php?id=<?php echo $data['id']; ?>" onclick="return confirm('Anda ingin mengedit data ini?')">EDIT</a> </button>
                <button class="btn btn-danger center"><a href="hapus.php?id=<?php echo $data['id']; ?>" class="text-white" style="text-decoration: none;" onclick="return confirm('Anda yakin ingin menghapus data ini?')" >HAPUS</a></button>
            </td>
        </tr>
        </tbody>
        <?php $no++; } ?>
        <?php } ?>
    </table>
  </div>
        <!-- js -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
        </script>
    </form>
    </div>
</body>
</html>
