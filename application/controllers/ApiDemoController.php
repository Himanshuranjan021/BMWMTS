<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/RestController.php';


use chriskacerguis\RestServer\RestController;
class ApiDemoController extends RestController
{

    public function index_post()
    {
        //$id=$this->input->POST('id'); 
        //$weight=$this->input->POST('weight'); 
        //$mac_id=$this->input->POST('mac_id'); 
        
      
    header('Content-type:application/json');
    $json_data = file_get_contents('php://input');
    $data=json_decode($json_data,true);

   
    date_default_timezone_set("Asia/Kolkata");   //India time (GMT+5:30)
    $id = $data['id'];
    $weight = $data['weight'];
    $mac_id = $data['mac_id'];
    
        $data = [  
            'id'         => $id,
            'weight'     => $weight,
            'mac_id'     => $mac_id,
            'date_time' => date('Y-m-d H:i:s'), 
         ];  
         
       



       $result=$this->db->insert('demo_weight_data',$data); 
       if($result){
        $this->response([
            'status' => true,
            'message' => 'Data inserted Successfully',

        ],RestController::HTTP_OK);
       }else{
        $this->response([
            'status' => false,
            'message' => 'Failed To Insert Data',

        ],RestController::HTTP_BAD_REQUEST);
       }
       
    }



}


?>