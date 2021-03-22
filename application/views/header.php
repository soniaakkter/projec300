<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>News</title>
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome.css');?>">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?> ">
    
</head>
<body>
<!-- HEADER -->
<div id="header">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <!-- LOGO -->
            <div class=" col-md-offset-4 col-md-4">
                <a href="index.php" id="logo"><img src="<?php echo base_url('assets/images/news.jpg'); ?>"></a>
            </div>
            <!-- /LOGO -->
        </div>
    </div>
</div>
<!-- /HEADER -->
<!-- Menu Bar -->
<div id="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class='menu'>
                    <li class="<?php if(isset($active) && $active=='home'){echo 'active';} ?>"><a href='<?php echo base_url(); ?>'>Home</a></li>
                    <li class="cat-menu <?php if(isset($active) && $active=='category'){echo 'active';} ?>"><a >Category</a>
                        <ul class="cat_list">
                        <?php foreach($category as $value){
                            echo '<li><a href="'.base_url('category/'.$value['category_id']).'">'.$value['category_name'].'</a></li>';
                        }?>
                            
                            
                        </ul>
                    </li>
                    <li class="<?php if(isset($active) && $active=='about'){echo 'active';} ?>"><a href='<?php echo base_url('about'); ?>'>About</a></li>
                    <li class="<?php if(isset($active) && $active=='contact'){echo 'active';} ?>"><a href='<?php echo base_url('contact'); ?>'>Contact</a></li>
                    
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- /Menu Bar -->
