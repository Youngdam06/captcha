<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
<?php
// definisikan file untuk koneksi database
include 'config.php';
$min_numb = 1;
$max_numb = 15;

// generate nomor acak
    $rand_numb1 = mt_rand($min_numb, $max_numb);
    $rand_numb2 = mt_rand($min_numb, $max_numb);
    $id = $_GET['id'];
    $data = mysqli_query($link,"select * from info where id='$id'");
    while($d = mysqli_fetch_array($data)){
      ?>
      <div class="container"> 
        <h2 class="text-center">Edit Data</h2>
        <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $d['id'] ?>">
        <div class="form-group">
          <label for="name">Nama</label>
          <input type="text" name="nama" class="form-control" value="<?php echo$d['name'] ?>" minlength="5" maxlength="10" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" name="email" class="form-control" value="<?php echo$d['email'] ?>" minlength="10" maxlength="20" required>
        </div>
        <div class="form-group">
          <label for="phone">No. Telepon</label>
          <input type="integer" name="phone" class="form-control" value="<?php echo$d['phone'] ?>" minlength="10" maxlength="15" required>
        </div>
        <div class="form-group">
          <label for="website">Website</label>
          <input type="text" name="website" class="form-control" value="<?php echo$d['website'] ?>" required>
        </div>
        <div class="form-group">
          <label for="message">Pesan</label>
          <input type="text" name="message" class="form-control" value="<?php echo$d['message'] ?>" minlength="10" maxlength="50" required>
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
      
      <?php 
    }
?>
</body>
</html>