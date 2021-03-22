

<?php 
if(!$this->session->userdata('username')){
    redirect(base_url('admin'));
}

?>
<div id="admin-content">
  <div class="container">
  <div class="row">
    <div class="col-md-12">
        <h1 class="admin-heading">Update Post</h1>
    </div>
    <div class="col-md-offset-3 col-md-6">
        <!-- Form for show edit-->
        <?php echo $this->session->flashdata('message'); $this->session->unset_userdata('message'); ?>
        
        <form action="<?php echo base_url('admin/update_post'); ?>" method="POST" enctype="multipart/form-data" autocomplete="off">
            <div class="form-group">
                <input type="hidden" name="post_id"  class="form-control" value="<?php echo $postData['post_id']; ?>" placeholder="">
            </div>
            <div class="form-group">
                <label for="exampleInputTile">Title</label>
                <input type="text" name="post_title"  class="form-control" id="exampleInputUsername" value="<?php echo $postData['title']; ?>">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1"> Description</label>
                <textarea name="postdesc" class="form-control"  required rows="5">
                <?php echo $postData['description']; ?>
                </textarea>
            </div>
            <div class="form-group">
                <label for="exampleInputCategory">Category</label>
                <select class="form-control" name="category">
                <?php foreach($category as $value){
                    if($postData['category']==$value['category_id']){
                        echo '<option value="'.$value['category_id'].'" selected>'.$value['category_name'].'</option>';
                    }
                    else{
                        echo '<option value="'.$value['category_id'].'">'.$value['category_name'].'</option>';
                    }
                    
                }?>
                </select>
            </div>
            <div class="form-group">
                <label for="">Post image</label>
                <input type="file" name="new-image">
                <img  src="<?php echo base_url($postData['post_img']); ?>" height="150px">
                <input type="hidden" name="old-image" value="<?php echo $postData['post_img']; ?>">
            </div>
            <input type="hidden" name="trigger" value="update_post">
            <input type="submit" name="submit" class="btn btn-primary" value="Update" />
        </form>
        <!-- Form End -->
      </div>
    </div>
  </div>
</div>

