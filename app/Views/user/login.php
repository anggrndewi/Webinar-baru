<!DOCTYPE html>
<html lang="en">
<head>
<title>Lampung Cerdas</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <link href="<?= base_url('css/style.css') ?>" rel="stylesheet">
  <link href="img/lampung cerdas.webp" rel="icon">
</head>

<body class="bg-login-user">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center my-5">
            <div class="col-xl-5 col-lg-12 col-md-9">
                <div class="card o-hidden border-0 shadow-lg">
                    <img class="rounded-circle img-thumbnail" src="<?= base_url().'/img/logo.png' ?>">

                    <div class="card-body pt-5">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col">
                                <div class="mt-5 p-5 pb-0">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Lampung Cerdas</h1>
                                        <?php
                                            if (session()->getFlashdata('message')) {
                                                echo "<div class='alert alert-warning'><marquee>".session()->getFlashdata('message')."</marquee></div>";
                                            }
                                        ?>
                                    </div>
                                    <form method="POST" class="user" action="/inputloginuser" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control form-control-user" name="email" aria-describedby="emailHelp">
                                        </div>
                                        <div class="form-group mb-2">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control form-control-user" name="password">
                                        </div>
                                        <div class="mb-2">
                                            <p>Belum punya Akun ? <a class="text-primary text-decoration-none" href="/registrasi">Daftar</a></p>
                                        </div>
                                        <div class="d-grid gap-2">
                                        <button class="btn btn-login-user d-block btn-block" type="submit">Login</button>
                                        </div>
                                    </form>
                                    <hr>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="<?base_url('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>