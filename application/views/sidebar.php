<div id="sidebar" class="col-md-4">
    <!-- search box -->
    <div class="search-box-container">
        <h4>Search</h4>
        <form class="search-post" action="<?php echo base_url('search_news');?>" method ="POST">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Search ....." required>
                <span class="input-group-btn">
                    <button type="submit" class="btn btn-danger">Search</button>
                </span>
            </div>
        </form>
    </div>
    <!-- /search box -->
    <!-- recent posts box -->
    <div class="recent-post-container">
        <h4>Recent Posts</h4>
        <?php foreach($sidebar as $value){ ?>
        <div class="recent-post">
            <a class="post-img" href="<?php echo base_url('post-details/'.$value['post_id']); ?>">
                <img src="<?php echo base_url($value['post_img']); ?>" alt=""/>
            </a>
            <div class="post-content">
                <h5><a href="<?php echo base_url('post-details/'.$value['post_id']); ?>"><?php echo $value['title']; ?></a></h5>
                <span>
                    <i class="fa fa-tags" aria-hidden="true"></i>
                    <a href='<?php echo base_url('category/'.$value['category_id']) ?>'><?php echo $value['category_name']; ?></a>
                </span>
                <span>
                    <i class="fa fa-calendar" aria-hidden="true"></i>
                    <?php echo $value['post_date']; ?>
                </span>
                <a class="read-more" href="<?php echo base_url('post-details/'.$value['post_id']); ?>">read more</a>
            </div>
        </div>
        <?php } ?>
    </div>
    <!-- /recent posts box -->
</div>
