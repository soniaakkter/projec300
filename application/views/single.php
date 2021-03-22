
    <div id="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                  <!-- post-container -->
                    <div class="post-container">
                        <div class="post-content single-post">
                            <h3><?php echo $postData['title'];  ?></h3>
                            <div class="post-information">
                                <span>
                                    <i class="fa fa-tags" aria-hidden="true"></i>
                                    <?php echo $postData['category_name'];  ?>
                                </span>
                                <span>
                                    <i class="fa fa-user" aria-hidden="true"></i>
                                    <a href='author.php'><?php echo $postData['username'];  ?></a>
                                </span>
                                <span>
                                    <i class="fa fa-calendar" aria-hidden="true"></i>
                                    <?php echo $postData['post_date'];  ?>
                                </span>
                            </div>
                            <img class="single-feature-image" src="<?php echo base_url($postData['post_img']);  ?>" alt=""/>
                            <p class="description">
                            <?php echo $postData['description'];  ?>
                            </p>
                        </div>
                    </div>
                    <!-- /post-container -->
                </div>
                <?php include 'sidebar.php'; ?>
            </div>
        </div>
    </div>
