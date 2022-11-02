<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="<?= base_url(); ?>templog/style.css">
  <!-- Bootstrap Core Css -->
  <title>Sign in & Sign up Form</title>
  <link rel="icon" href="<?= base_url(); ?>templog/img/logo.png" type="image/gif" sizes="25x12">

</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form class="sign-in-form" action="<?= site_url('Auth/login') ?>" method="post" method="POST">
          <!-- Alert -->
          <?php
          if (validation_errors() || $this->session->flashdata('result_login')) {
          ?>
            <div class="alert ">
              <button type="button" class="close" data-dismiss="alert">&times;</button>
              <strong style="background: #99ffff; padding: 5px 5px;">Warning!</strong>
              <?php echo validation_errors(); ?>

              <?php echo $this->session->flashdata('result_login'); ?>
            </div>
          <?php } ?>

          <?php
          $data = $this->session->flashdata('sukses');
          if ($data != "") { ?>
            <div class="alert alert-success"><strong>Sukses! </strong> <?= $data; ?></div>
          <?php } ?>
          <!-- Akhir Alert -->

          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" required autofocus />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" id="password" name="password" required autofocus />
          </div>
          <input type="submit" value="Login" class="btn solid " />
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
        <form action="#" class="sign-up-form">
          <h2 class="title">Soryy !!!!</h2>
          <p class="social-text">Untuk Membuat akun baru Silahkan Hubungi Admin</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
      </div>
    </div>
    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Belum Punya Akun ?</h3>
          <p>
            Please klik Sign up untuk membuat akun baru !!!
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="<?= base_url('templog/'); ?>img/log.svg" class="image" alt="" />

      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3> Sudah Punya Akun</h3>
          <p>
            Silahkan Klik Sign in Untuk Masuk Ke System
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="<?= base_url('templog/'); ?>img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="<?= base_url(); ?>templog/app.js"></script>
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</body>

</html>