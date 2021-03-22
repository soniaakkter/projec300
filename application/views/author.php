
    <div id="main-content">
      <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- post-container -->
                <div class="post-container">
                  <h2 class="page-heading"><?php echo $userData['username']; ?></h2>
                  <?php if($authData!=false){
                      foreach($authData as $value){
                     ?>
                    <div class="post-content">
                        <div class="row">
                            <div class="col-md-4">
                                <a class="post-img" href="<?php echo base_url('post-details/'.$value['post_id']); ?>"><img src="<?php echo base_url($value['post_img']); ?>" alt=""/></a>
                            </div>
                            <div class="col-md-8">
                                <div class="inner-content clearfix">
                                    <h3><a href='<?php echo base_url('post-details/'.$value['post_id']); ?>'><?php echo $value['title']; ?></a></h3>
                                    <div class="post-information">
                                        <span>
                                            <i class="fa fa-tags" aria-hidden="true"></i>
                                            <a href='<?php echo base_url('category/'.$value['category_id']); ?>'><?php echo $value['category_name']; ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-user" aria-hidden="true"></i>
                                            <a href='<?php echo base_url('author/'.$value['author']); ?>'><?php echo $value['username']; ?></a>
                                        </span>
                                        <span>
                                            <i class="fa fa-calendar" aria-hidden="true"></i>
                                            <?php echo $value['post_date']; ?>
                                        </span>
                                    </div>
                                    <p class="description">
                                    <?php echo substr($value['description'],0,200) . '...'; ?>
                                    </p>
                                    <a class='read-more pull-right' href='<?php echo base_url('post-details/'.$value['post_id']); ?>'>read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php }}else{echo '<h4>Data Not Found</h4><br><br>';} ?>
                    <ul class='pagination'>
                        <li class="active"><a href="">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                    </ul>
                </div><!-- /post-container -->
            </div>
            <?php include 'sidebar.php'; ?>
        </div>
      </div>
    </div>

