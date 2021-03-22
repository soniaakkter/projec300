
<div id="admin-content">
    <div class="container">
        <div class="row">
        <?php echo $this->session->flashdata('message'); $this->session->unset_userdata('message'); ?>
            <div class="col-md-10">
                <h1 class="admin-heading">All Categories</h1>
            </div>
            <div class="col-md-2">
                <a class="add-new" href="<?php echo base_url('admin/add_category'); ?>">add category</a>
            </div>
            <div class="col-md-12">
                <table id="table-category" class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Category Name</th>
                        <th>No. of Posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php if($category !=false){
                            $i =1;
                            foreach($category as $value){
                                $noOfPost = getPostByCat($value['category_id']);
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $value['category_name']; ?></td>
                            <td><?php echo $noOfPost; ?></td>
                            <td class='edit'><a href='<?php echo base_url('admin/update_category/'.$value['category_id']); ?>'><i class='fa fa-edit'></i></a></td>
                            <td class='delete'><a href='<?php echo base_url('admin/delete_data/category/'.$value['category_id']); ?>'><i class='fa fa-trash-o'></i></a></td>
                        </tr>
                        <?php 
                        }
                    }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('#table-category').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
