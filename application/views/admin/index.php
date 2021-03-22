<!doctype html>
<html>
   <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>ADMIN | Login</title>
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
        <link rel="stylesheet" href="<?php echo base_url('assets/font/font-awesome-4.7.0/css/font-awesome.css'); ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
    </head>

    <body>
        <div id="wrapper-admin" class="body-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-offset-4 col-md-4">
                        <img class="logo" src="<?php echo base_url('assets/images/news.jpg'); ?>">
                        <h3 class="heading">Admin</h3>
                        <?php if($msg =$this->session->userdata('login_failed')){
                            echo '<div class="alert alert-danger">'.$msg.'</div>';
                            $this->session->unset_userdata('login_failed');
                        } ?>
                        <!-- Form Start -->
                        <form  action="<?php echo base_url('login'); ?>" method ="POST">
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" placeholder="" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="" required>
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                        </form>
                        <!-- /Form  End -->
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
