
  <div id="admin-content">
      <div class="container">
          <div class="row">
          <?php echo $this->session->flashdata('message'); $this->session->unset_userdata('message'); ?>
              <div class="col-md-10">
                  <h1 class="admin-heading">All Users</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="<?php echo base_url('admin/add_user'); ?>">add user</a>
              </div>
              <div class="col-md-12">
                  <table id="table-user" class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Full Name</th>
                          <th>User Name</th>
                          <th>Role</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                      <?php if($userData != false){
                          $i =1;
                            foreach($userData as $value){
                          ?>
                          <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $value['first_name'].' '.$value['last_name']; ?></td>
                              <td><?php echo $value['username'] ?></td>
                              <td><?php  if($value['role']==1){echo "Admin";}else{echo "Normal";} ?></td>
                              <td class='edit'><a href='<?php echo base_url('admin/update_user/'.$value['user_id']); ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='<?php echo base_url('admin/delete_data/user/'.$value['user_id']); ?>'><i class='fa fa-trash-o'></i></a></td>
                          </tr>
                          <?php 
                          }
                        } ?>
                      </tbody>
                  </table>
                  
              </div>
          </div>
      </div>
  </div>
  <script>

$(document).ready(function() {
    $('#table-user').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>