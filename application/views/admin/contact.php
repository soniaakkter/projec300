
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
                <table id="table-contact" class="content-table">
                    <thead>
                        <th>S.No.</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Delete</th>
                    </thead>
                    <tbody>
                    <?php if($contact !=false){
                            $i =1;
                            foreach($contact as $value){
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $value->name; ?></td>
                            <td><?php echo $value->email; ?></td>
                            <td><?php echo $value->message; ?></td>
                            <td class='delete'><a href='<?php echo base_url('admin/delete_data/contact/'.$value->contact_id) ?>'><i class='fa fa-trash-o'></i></a></td>
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
    $('#table-contact').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );
</script>
