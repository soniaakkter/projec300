
  <div id="admin-content">
      <div class="container">
          <div class="row">
              <div class="col-md-12">
                  <h1 class="admin-heading">Modify User Details</h1>
              </div>
              <div class="col-md-offset-4 col-md-4">
                  <!-- Form Start -->
                  <?php echo $this->session->flashdata('message'); $this->session->unset_userdata('message'); ?>
                  <form  action="<?php echo base_url('admin/update_user') ?>" method ="POST">
                      <div class="form-group">
                          <input type="hidden" name="user_id"  class="form-control" value="<?php echo $userData['user_id']; ?>" placeholder="" >
                      </div>
                          <div class="form-group">
                          <label>First Name</label>
                          <input type="text" name="fname" class="form-control" value="<?php echo $userData['first_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>Last Name</label>
                          <input type="text" name="lname" class="form-control" value="<?php echo $userData['last_name']; ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Name</label>
                          <input type="text" name="username" class="form-control" value="<?php echo $userData['username'] ?>" placeholder="" required>
                      </div>
                      <div class="form-group">
                          <label>User Role</label>
                          <select class="form-control" name="role" >
                            <?php  if($userData['role']==1){ ?>
                              <option value="0" >normal User</option>
                              <option value="1" selected>Admin</option>
                              <?php }else{ ?>
                                <option value="0" selected>normal User</option>
                              <option value="1" >Admin</option>
                              <?php } ?>
                          </select>
                      </div>
                      <input type="hidden" name="trigger" value="update_user">
                      <input type="submit" name="submit" class="btn btn-primary" value="Update" required />
                  </form>
                  <!-- /Form -->
              </div>
          </div>
      </div>
  </div>
