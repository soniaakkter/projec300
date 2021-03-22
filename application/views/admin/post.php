
  <div id="admin-content">
      <div class="container">
          <div class="row">
          <?php echo $this->session->flashdata('message'); $this->session->unset_userdata('message'); ?>
              <div class="col-md-10">
                  <h1 class="admin-heading">All Posts</h1>
              </div>
              <div class="col-md-2">
                  <a class="add-new" href="<?php echo base_url('admin/add_post'); ?>">add post</a>
              </div>
              <div class="col-md-12">
                  <table id="table-post" class="content-table">
                      <thead>
                          <th>S.No.</th>
                          <th>Title</th>
                          <th>Category</th>
                          <th>Date</th>
                          <th>Author</th>
                          <th>Edit</th>
                          <th>Delete</th>
                      </thead>
                      <tbody>
                         <?php if($postData!=false){
                             $i=1;
                             foreach($postData as $value){
                         ?>
                          <tr>
                              <td><?php echo $i++; ?></td>
                              <td><?php echo $value['title']; ?></td>
                              <td><?php echo $value['category_name']; ?></td>
                              <td><?php echo $value['post_date']; ?></td>
                              <td><?php echo $value['username']; ?></td>
                              <td class='edit'><a href='<?php echo base_url('admin/update_post/'.$value['post_id']); ?>'><i class='fa fa-edit'></i></a></td>
                              <td class='delete'><a href='<?php echo base_url('admin/delete_data/post/'.$value['post_id']); ?>'><i class='fa fa-trash-o'></i></a></td>
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
    $('#table-post').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
