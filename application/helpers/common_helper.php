<?php 
function getPostByCat($cat){
    $CI = get_instance();
    $CI->load->model('admin_model');
    //call
    $noOfrows = $CI->admin_model->getPostByCat($cat);

    return $noOfrows;

   
    
}



?>