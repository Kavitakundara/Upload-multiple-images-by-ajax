<?php
 defined('BASEPATH') OR exit ("No direct scripts are allowed");

 class Ajax extends CI_Controller   {
     public function __construct(){
         parent:: __construct();
     }
     public function ajax_file(){
         $this->load->view('ajax_upload');
     }
   public function upload_images(){
          $_FILES['img']['name']= $_FILES['image']['name']; 
          $countfiles = count($_FILES['img']['name']);
       
       for($i=0; $i < $countfiles; $i++){
       if(!empty ($_FILES['img']['name'][$i])){
          $_FILES['img']['name']= $_FILES['image']['name'][$i];
          $_FILES['img']['tmp_name']= $_FILES['image']['tmp_name'][$i]; 
          $_FILES['img']['error']= $_FILES['image']['error'][$i]; 
          $_FILES['img']['size']= $_FILES['image']['size'][$i]; 

      $pref = array(
          'upload_path'=> './resources/data',
          'allowed_types'=> 'png|jpg|jpeg',
          'overwrite'=> false
      );
      $this->load->library('upload', $pref);
      $arr =  array('msg'=> 'Something went wrong', 'success' => false);
      if($this->upload->do_upload('img')){

          $arr= array('msg'=> 'Image has been uploaded succesfully ', 'success' => true);
      }     
       }    
       }
      echo json_encode($arr);
   }  
 }


