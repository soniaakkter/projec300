<?php 
if(!$this->session->userdata('username')){
    redirect(base_url('admin'));
}?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>ADMIN Panel</title>
        <!-- Bootstrap -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
        <!-- Font Awesome Icon -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.css'); ?>">
        <!-- Custom stlylesheet -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>  
           <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>            
           <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" />  
          


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>
    </head>
    <body>
        <!-- HEADER -->
        <div id="header-admin">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-2">
                        <a href="post.php"><img class="logo" src="<?php echo base_url('assets/images/news.jpg'); ?>"></a>
                    </div>
                    <!-- /LOGO -->
                      <!-- LOGO-Out -->
                    <div class="col-md-offset-9  col-md-1">
                        <a href="<?php echo base_url('admin/logout');  ?>" class="admin-logout" ><?php echo $this->session->userdata('username'); ?> logout</a>
                    </div>
                    <!-- /LOGO-Out -->
                </div>
            </div>
        </div>
        <!-- /HEADER -->
        <!-- Menu Bar -->
        <div id="admin-menubar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                       <ul class="admin-menu">
                            <li class="<?php if(isset($active) && $active=='post'){echo 'active';} ?>">
                                <a href="<?php echo base_url('admin/post'); ?>">Post</a>
                            </li>
                            <li class="<?php if(isset($active) && $active=='category'){echo 'active';} ?>">
                                <a href="<?php echo base_url('admin/category'); ?>">Category</a>
                            </li>
                            <li class="<?php if(isset($active) && $active=='user'){echo 'active';} ?>">
                                <a href="<?php echo base_url('admin/user'); ?>">Users</a>
                            </li>
                            <li class="<?php if(isset($active) && $active=='contact'){echo 'active';} ?>">
                                <a href="<?php echo base_url('admin/contact'); ?>">Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Menu Bar -->
