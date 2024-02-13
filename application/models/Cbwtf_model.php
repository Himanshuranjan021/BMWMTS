<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cbwtf_model extends CI_Model
{



    public function  fetch_plant_details()
    {
        $query = $this->db->select('*')->where('remove', NULL)->get('treatment_plant_mster');
        return $query->result_array();
    }

    public function  cbwtf_vehicle_data()
    {

        $cbwtf_id  =   $this->session->userdata('bmw_plant_id');
        $query = $this->db->select('*')->where('remove', NULL)->where('plant_id', $cbwtf_id)
            ->where_not_in('assetUid', '')
            ->get('org_vehicle_mster');
        return $query->result_array();
    }


    //insert issue receive 

    public function insert_issue_receive()
    {

        $barcodes = $this->input->post('issue_code[]');
        $categories = $this->input->post('category[]');
        $weights = $this->input->post('weight[]');
        $org_ids = $this->input->post('org_id[]');
        $reason = $this->input->post('reason[]');
        $weight_cbwtf = $this->input->post('weight_cbwtf[]');

        $cbwtf_id = $this->session->userdata('bmw_plant_id');

        $this->db->select('session_id')->where('id', $cbwtf_id);
        $query = $this->db->get('treatment_plant_mster');
        $result9 = $query->row_array();
        $plant_session_id = $result9['session_id'];

        $number = count($barcodes);
        date_default_timezone_set('Asia/Kolkata');

        ///Issue_receive_insertion
        if ($number != 0) {
            for ($i = 0; $i < $number; $i++) {

                $query =  $this->db->select('vehicle_number')->where('issue_code', $barcodes[$i])->get('issue_collection');
                $result = $query->row_array();
                $vc_no[$i] = $result['vehicle_number'];
                if ($vc_no[$i] == NULL) {
                    $this->session->set_flashdata('error', 'The Waste Does not issued Yet! Please Scan A valid Waste Bag.');
                    return    redirect('index.php/Cbwtf/receive_waste_collection');
                } else {

                    $data[] = [
                        'organization_master_id'  => $org_ids[$i],
                        'treatment_code' => $barcodes[$i],
                        'waste_category' => $categories[$i],
                        'weight' => $weights[$i],
                        'date_time' => date('Y-m-d H:i:s'),
                        'vc_no' => $vc_no[$i],
                        'plant_id' => $cbwtf_id,
                        'plant_session_id' => $plant_session_id,
                        'reason' => $reason[$i],
                        'cbwtf_weight' => $weight_cbwtf[$i],
                    ];
                }
            }
            $this->db->insert_batch('treatment_plant_collect', $data);


            //verify_table_insertion

            if ($number != 0) {

                for ($i = 0; $i < count($barcodes); $i++) {

                    $data2[] = [
                        'treatment_code' => $barcodes[$i],
                        'collection_code' => $barcodes[$i],
                        'treatment_date' =>  date('Y-m-d H:i:s'),
                        'plant_id' => $cbwtf_id,
                        'weight_at_plant' => $weight_cbwtf[$i],
                        'category_at_plant' => $categories[$i],
                        'reason' => $reason[$i],
                    ];
                }

                $res = $this->db->update_batch('verify_barcode', $data2, 'collection_code');
                return $res;
            }
        }
    }

    //cbwtf dashboard


    public function cbwtf_fetch_today_data()
    {
        $emp_id  =   $this->session->userdata('bmw_plant_id');

        $this->db->select("waste_category");
        $this->db->from("treatment_plant_collect");
        $this->db->where('DATE(date_time)', date('Y-m-d'));
        $this->db->where('plant_id', $emp_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function  cbwtf_fetch_total_data()
    {
        $emp_id  = $this->session->userdata('bmw_plant_id');

        $this->db->select("waste_category");
        $this->db->from("treatment_plant_collect");
        $this->db->where('plant_id', $emp_id);
        $query = $this->db->get();
        return $query->result_array();
    }



    public function cbwtf_daily_report()
    {
        $emp_id  =   $this->session->userdata('bmw_plant_id');

        $this->db->select("*,om.org_name as org_name,a.treatment_code");
        $this->db->from("treatment_plant_collect as a")
            ->join('treatment_plant_mster as t', 't.id=a.plant_id')
            ->join('waste_disposal as w', 'a.treatment_code=w.treatment_code', 'left')
            ->join('organization_master as om', 'a.organization_master_id=om.id', 'left')
            ->where('DATE(a.date_time)', date('Y-m-d'))
            ->where('t.id', $emp_id);
        $query = $this->db->get();
        return $query->result_array();
    }



    public function cbwtf_pdf_report()
    {
        $emp_id = $this->session->userdata('bmw_plant_id');
        $start_date = $this->input->post('start');
        $end_date = $this->input->post('end');
        $this->db->select("*,a.treatment_code,a.date_time as rec_time, wd.date_time as dis_time");
        $this->db->from("treatment_plant_collect as a")
            ->join('organization_master as om', 'om.id=a.organization_master_id')
            ->join('treatment_plant_mster as t', 't.id=a.plant_id')
            ->join('waste_disposal as wd', 'a.treatment_code=wd.treatment_code', 'left');
        // $this->db->where('date',date('Y-m-d'));
        $this->db->where('DATE(a.date_time) BETWEEN"' . date('Y-m-d', strtotime($start_date)) . '" and "' . date('Y-m-d', strtotime($end_date)) . '"');
        $this->db->where('a.plant_id', $emp_id);
        $query = $this->db->get();
        return $query->result_array();
    }



    public function send_password()
    {
        require_once("smtp/class.phpmailer.php");
        require 'smtp/PHPMailerAutoload.php';
        require 'smtp/class.smtp.php';

        function generateRandomString($length = 8)
        {
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ@#*&';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }


        $password = generateRandomString();
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $user_name = $this->input->post('user_name') ? htmlspecialchars(strip_tags($this->input->post('user_name'))) : '';

        $this->db->select('*')->where('user_name', $user_name);
        $query =  $this->db->get('treatment_plant_access');

        $num = $query->num_rows();
        if ($num == 0) {

            $data['error'] = "User not Found.";
            $this->load->view('user/forgot.php', $data);
        } else {

            $row = $query->row_array();
            $id = $row['session_id'];
            $role = $row['role'];
            if ($role == 2) {
                $this->db->select('*')->where('Session_id', $id);
                $query2 =  $this->db->get('cbwtf_user');
                $row2 = $query2->row_array();
                $email = $row2['Email'];
            } else {
                $this->db->select('*')->where('session_id', $id);
                $query2 =  $this->db->get('treatment_plant_mster');
                $row2 = $query2->row_array();
                $email = $row2['email'];
            }

            $data = ['password'  => $hash,];

            $this->db->select('*');
            $this->db->where('session_id', $id);
            $this->db->update('treatment_plant_access', $data);



            $html = "Your Password is " . $password;
            $to = $email;
            $subject = "Password Reset";
            $msg = $html;

			// Load the email library
			$this->load->library('email');
			// Sender's email address
			$this->email->from('info@bmwodisha.in', 'BMW ODISHA');
			// Recipient's email address
			$this->email->to($to);
			// Email subject
			$this->email->subject($subject);
			// Email message
			$this->email->message($html);
			// Send the email
			if ($this->email->send()) {
                echo '<script> alert("Password Sent Successfully To Your registered Email");</script>';
			} else {
				echo 'Email sending failed.';
				//exit;
			}
            return    redirect('index.php/user');
        }
    }


    public function fetch_weight()
    {
        $emp_id = $this->session->userdata('bmw_emp_id');

        $this->db->select('*')->where('id', $emp_id)->where('remove', NULL);
        $query = $this->db->get('org_staff');
        $result3 = $query->row_array();
        $name = $result3['name'];


        $this->db->select('*')->where('user_name', $name);
        $query = $this->db->get('machine_link');
        $result5 = $query->row_array();
        $mac_id = $result5['machine_id'];




        $this->db->select('*');
        $this->db->where('mac_id', $mac_id);
        $this->db->where('status', NULL);
        $this->db->order_by('table_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('demo_weight_data');
        $result = $query->row_array();
        if ($result == NULL) {

            $result2['info'] = "No Input Data Or Device is Not Registered";
            return $result2;
        } else {
            return $result;
        }
    }





    public function update_password()
    {
        $id = $this->session->userdata('bmw_plant_id');
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $hash = password_hash($new_password, PASSWORD_DEFAULT);

        $result = $this->db->select('*')->where('plant_master_id', $id)->get('treatment_plant_access')->row_array();
        $old_hash = $result['password'];


        if ($result) {

            if (password_verify($old_password, $old_hash)) {

                $data = ['password'  => $hash,];

                $this->db->select('*');
                $this->db->where('plant_master_id', $id);
                $this->db->update('treatment_plant_access', $data);

                $data['error'] = "<script>alert('Password Changed successfully')</script>";
                $this->load->view('cbwtf/update_password.php', $data);
            } else {
                $data['error'] = "<script>alert('Incorrect Old Password')</script>";
                $this->load->view('cbwtf/update_password.php', $data);
            }
        } else {
            $data['error'] = "<script>alert('Incorrect Old Password')</script>";
            $this->load->view('cbwtf/update_password.php', $data);
        }
    }


    public function delete_dummy_waste_receive($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('dummy_issue_receive');
    }
    public function  fetch_vehicle3()
    {
        $master_id = $this->session->userdata('bmw_plant_id');
        $query = $this->db->select('*')->where('plant_id', $master_id)
            ->where('remove', NULL)->get('org_vehicle_mster');
        return $query->result_array();
    }

    public function  fetch_cbwtf_user()
    {
        $master_id = $this->session->userdata('bmw_plant_id');
        $query = $this->db->select('*')->where('plant_id', $master_id)
            ->where('remove', NULL)->get('cbwtf_user');
        return $query->result_array();
    }

    public   function upload_image()
    {
        $uploadPath = 'upload/cbwtf';
        $new_name = time() . $_FILES["image"]['name'];
        $config = [
            'upload_path' => $uploadPath,
            'allowed_types' => 'jpg|jpeg|png',
            'file_name' => $new_name,
            'encrypt_name' => TRUE,
        ];

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('image')) {
            $error = array('error' => $this->upload->display_errors());
            echo 'Image: ' . json_encode($error);
        } else {
            $data = array('upload_data' => $this->upload->data());
            echo json_encode($data);
        }
    }

    public function insert_create_user()
    {
        $plant_id = $this->session->userdata('bmw_plant_id');
        date_default_timezone_set('Asia/Kolkata');
        $session_id = substr(md5(microtime()), rand(0, 26), 6);


        $name = $this->input->post('name') ? htmlspecialchars(strip_tags($this->input->post('name'))) : '';
        $mobile = $this->input->post('mobile') ? htmlspecialchars(strip_tags($this->input->post('mobile'))) : '';
        $email = $this->input->post('email') ? htmlspecialchars(strip_tags($this->input->post('email'))) : '';
        $designation = $this->input->post('designation') ? htmlspecialchars(strip_tags($this->input->post('designation'))) : '';
        $address = $this->input->post('address') ? htmlspecialchars(strip_tags($this->input->post('address'))) : '';
        $remarks = $this->input->post('remarks') ? htmlspecialchars(strip_tags($this->input->post('remarks'))) : '';



        $this->upload_image();
        $image = $this->upload->data();
        $image_name = $image['file_name'];



        $data = [

            'Name'          => $name,
            'Mobile'        => $mobile,
            'Email'         => $email,
            'Designation'   => $designation,
            'Address'       => $address,
            'Remark'       => $remarks,
            'Photo'            => $image_name,
            'plant_id'       => $plant_id,
            'Session_id'    => $session_id,
            'Date'       => date('Y-m-d'),


        ];
        $this->db->insert('cbwtf_user', $data);



        //user access

        function generateRandomString($length = 8)
        {
            $characters = '0123456789abcdefghjkmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ@#*&';
            $charactersLength = strlen($characters);
            $randomString = '';
            for ($i = 0; $i < $length; $i++) {
                $randomString .= $characters[rand(0, $charactersLength - 1)];
            }
            return $randomString;
        }


        $username = substr($name, 0, 4) . '@' . rand(1111, 9999);
        //$password = generateRandomString();
        $password = $username;
        $hash = password_hash($password, PASSWORD_DEFAULT);


        //$this->db->select('*');
        //$this->db->where('Session_id', $session_id);
        //$query = $this->db->get('cbwtf_user');
        //$row = $query->row_array();
        //$emp_id = $row['id'];

        $data = [

            'plant_name'       => '',
            'plant_master_id'        => $plant_id,
            'user_name'         => $username,
            'password' =>       $hash,
            'session_id'    => $session_id,
            'date'       => date('Y-m-d'),
            'role'     => 2,
            'reg_mobile' => '',

        ];

        $res = $this->db->insert('treatment_plant_access', $data);



        //Sending mail
        $html = "Your UserName: " . $username . '<br>' . "And Password: " . $password;

        $to = $email;
        $subject = "User Registration";
        $msg = $html;


		// Load the email library
		$this->load->library('email');
		// Sender's email address
		$this->email->from('info@bmwodisha.in', 'BMW ODISHA');
		// Recipient's email address
		$this->email->to($to);
		// Email subject
		$this->email->subject($subject);
		// Email message
		$this->email->message($html);
		// Send the email
		if ($this->email->send()) {
			//echo 'Email sent successfully.';
		} else {
			//echo 'Email sending failed. Error: ' . $this->email->print_debugger();
			//exit;
		}
        return $res;
    }


    public function  edit_user($id)
    {

        $query = $this->db->select('*')->where('Id', $id)
            ->where('remove', NULL)->get('cbwtf_user');
        return $query->row_array();
    }

    public function update_user($id)
    {

        date_default_timezone_set('Asia/Kolkata');
        $name = $this->input->post('name') ? htmlspecialchars(strip_tags($this->input->post('name'))) : '';
        $mobile = $this->input->post('mobile') ? htmlspecialchars(strip_tags($this->input->post('mobile'))) : '';
        //$email = $this->input->post('email')?htmlspecialchars(strip_tags($this->input->post('email'))):'';
        $designation = $this->input->post('designation') ? htmlspecialchars(strip_tags($this->input->post('designation'))) : '';
        $address = $this->input->post('address') ? htmlspecialchars(strip_tags($this->input->post('address'))) : '';
        $remarks = $this->input->post('remarks') ? htmlspecialchars(strip_tags($this->input->post('remarks'))) : '';

        $data = [

            'Name'          => $name,
            'Mobile'        => $mobile,
            'Designation'   => $designation,
            'Address'       => $address,
            'Remark'       => $remarks,


        ];

        if (!empty($_FILES['image']['name'])) {
            $this->upload_image();
            $image = $this->upload->data();
            $image_name = $image['file_name'];
            $data['Photo'] =  $image_name;
        }

        $this->db->where('Id', $id)->update('cbwtf_user', $data);
    }

    public function delete_user($id)
    {

        $this->db->where('id', $id);
        $this->db->delete('cbwtf_user');
    }

    public function remove_user($id)
    {
        $data = ['remove' => 1];
        $this->db->where('Session_id', $id);
        $this->db->update('cbwtf_user', $data);

        $this->db->where('session_id', $id);
        $res =  $this->db->update('treatment_plant_access', $data);
        return $res;
    }

    public function  fetch_weight_machine_master()
    {

        $org_id = $this->session->userdata('bmw_plant_id');
        $query = $this->db->select('*')->where('remove', NULL)->where('cbwtf_master_id', $org_id)->get('cbwtf_weight_machine_master');
        return $query->result_array();
    }


    public function insert_weight_machine_master()
    {
        $org_id = $this->session->userdata('bmw_plant_id');
        $session_id = $this->session->userdata('bmw_cbwtf_session_id');

        $machine_no = $this->input->post('machine_no') ? htmlspecialchars(strip_tags($this->input->post('machine_no'))) : '';
        $machine_ip = $this->input->post('machine_ip') ? htmlspecialchars(strip_tags($this->input->post('machine_ip'))) : '';

        date_default_timezone_set('Asia/Kolkata');
        $data = [
            'machine_no'                   => $machine_no,
            'machine_ip'                  => $machine_ip,
            'cbwtf_master_id'               =>  $org_id,
            'date'              => date('Y-m-d'),
            'session_id'         => $session_id,
        ];
        $res =  $this->db->insert('cbwtf_weight_machine_master', $data);
        return $res;
    }



    // public function fetch_weight_data(){
    //     $plant_id = $this->session->userdata('bmw_plant_id');
    //     $emp_id = $this->session->userdata('bmw_plant_user');

    //   //fetch by plant
    //     // $this->db->select('machine_id')->where('cbwtf_master_id', $plant_id);
    //     // $query = $this->db->get('cbwtf_weight_machine_master');
    //     // $result5= $query->row_array();
    //     // $mac_id= $result5['machine_id'];

    //     //fetch by user
    //     $this->db->select('machine_name')->where('user_id', $emp_id);
    //     $query = $this->db->get('cbwtf_machine_link');
    //     $result5= $query->row_array();
    //     $mac_id= $result5['machine_name'];
    //     var_dump($mac_id); die();



    //        $this->db->select('*');
    //        $this->db->where('mac_id',$mac_id);
    //        $this->db->where('status',NULL);
    //        $this->db->order_by('table_id','DESC');
    //        $this->db->limit(1);
    //        $query=$this->db->get('demo_weight_data');
    //        $result = $query->row_array();
    //        if($result==NULL){

    //           // $result2['info']="No Input Data Or Device is Not Registered" ;
    //           // return $result2;
    //        }
    //        else{

    //     //     $del = ['status' => 1,];
    //     //    $quer= $this->db->where('mac_id',$mac_id)->update('demo_weight_data',$del);
    //     //       var_dump($quer); die();
    //        return $result;

    //        }

    //        // $id2=$result['table_id'];

    //        // $data = [  'status'  => 1, ];  

    //        // $this->db->select('*');
    //        // $this->db->where('id',$id2); 
    //        // $this->db->update('demo_weight_data',$data);

    // }

    public function insert_waste_disposal()
    {
        date_default_timezone_set('Asia/Kolkata');
        $org_id = $this->session->userdata('bmw_plant_id');
        $session_id = $this->session->userdata('bmw_cbwtf_session_id');

        $dispose = $this->input->post('dispose[]');
        $method = $this->input->post('method');

        $number = count($dispose);
        if ($number != 0) {
            for ($i = 0; $i < $number; $i++) {


                $data[] = [
                    'method'               => $method,
                    'plant_master_id'     =>  $org_id,
                    'date_time'              => date('Y-m-d H:i:s'),
                    'treatment_code'         => $dispose[$i],
                    'session_id'  => $session_id
                ];
            }
            $this->db->insert_batch('waste_disposal', $data);
        }

        //verify table insert
        if ($number != 0) {
            for ($i = 0; $i < $number; $i++) {


                $data2[] = [

                    'disposal_method'     =>  $method,
                    'collection_code' => $dispose[$i],
                    'disposal_date'              => date('Y-m-d H:i:s'),
                ];
            }

            $res = $this->db->update_batch('verify_barcode', $data2, 'collection_code');
            //var_dump($res);
        }

        //treatment plant collect insert
        if ($number != 0) {
            for ($i = 0; $i < $number; $i++) {


                $data3[] = [

                    'remove'     =>  1,
                    'treatment_code'   => $dispose[$i],

                ];
            }

            $res = $this->db->update_batch('treatment_plant_collect', $data3, 'treatment_code');
            return $res;
        }
    }


    public function  fetch_disposal_method()
    {

        $query = $this->db->get('disposal_method');
        return $query->result_array();
    }

    public function fetch_collected_data()
    {

        $query = $this->db
            ->select('*,om.org_name as org_name')
            ->join('organization_master as om', 'a.organization_master_id=om.id', 'left')
            ->where('a.remove', NULL)->get('treatment_plant_collect as a');
        return $query->result_array();
    }


    public function fetch_barcode_data()
    {

        $scan = $this->input->post('scan');

        $query =  $this->db->select('org_master_id,barcode,category,weight,o.org_name as organization')
            ->join('organization_master as o ', 'w.org_master_id=o.id')
            ->where('barcode', $scan)->get('waste_collection as w');
        return $query->row_array();
    }



    public function remove_weight_machine_master($id)
    {
        $data = ['remove'  => 1,];

        $this->db->select('*');
        $this->db->where('id', $id);
        $res = $this->db->update('cbwtf_weight_machine_master', $data);
        return $res;
    }


    public function delete_weight_machine_master($id)
    {

        $this->db->where('id', $id);
        $res = $this->db->delete('cbwtf_weight_machine_master');
        return $res;
    }


    public function fetch_barcode_weight()
    {

        $session_id = $this->session->userdata('bmw_cbwtf_session_id');

        //fetch by plant
        // $this->db->select('machine_no')->where('cbwtf_master_id', $plant_id);
        // $query = $this->db->get('cbwtf_weight_machine_master');
        // $result5= $query->row_array();
        // $mac_id= $result5['machine_no'];


        $this->db->select('Id')->where('Session_id', $session_id);
        $query = $this->db->get('cbwtf_user');
        $result5 = $query->row_array();
        $emp_id = $result5['Id'];


        //fetch by user
        $this->db->select('machine_name')->where('user_id', $emp_id);
        $query = $this->db->get('cbwtf_machine_link');
        $result5 = $query->row_array();
        $mac_id = $result5['machine_name'];


        $this->db->select('weight');
        $this->db->where('mac_id', $mac_id);
        $this->db->where('status', NULL);
        $this->db->order_by('table_id', 'DESC');
        $this->db->limit(1);
        $query = $this->db->get('demo_weight_data');
        $result = $query->row_array();
        if ($result == NULL) {

            $result2['info'] = "No Input Data Or Device is Not Registered";
            return $result2;
        } else {
            $quer = $this->db->where('mac_id', $mac_id)->delete('demo_weight_data');
            return $result;
        }
    }

    public function  fetch_machine_link_data()
    {

        $plant_id = $this->session->userdata('bmw_plant_id');
        $query = $this->db->select('*,cu.name as user_name,cml.id as link_id')
            ->join('cbwtf_user as cu', 'cml.user_id=cu.id')
            ->where('cml.remove', NULL)->where('cml.plant_id', $plant_id)->get('cbwtf_machine_link as cml');
        return $query->result_array();
    }

    public function  machine_ajax($mc_no)
    {

        $this->db->select("machine_ip");
        $this->db->from("cbwtf_weight_machine_master");
        $this->db->where('machine_no', $mc_no)->where('remove', NULL);
        $query = $this->db->get();

        $output = '<option value="">--Select--</option>';
        foreach ($query->result() as $row) {
            $output = '<option value="' . $row->machine_ip . '">' . $row->machine_ip . '</option>';
        }
        echo  $output;
    }

    public function insert_register_machine()
    {
        $org_id = $this->session->userdata('bmw_plant_id');
        $machine_no = $this->input->post('machine_no') ? htmlspecialchars(strip_tags($this->input->post('machine_no'))) : '';
        $machine_ip = $this->input->post('machine_ip') ? htmlspecialchars(strip_tags($this->input->post('machine_ip'))) : '';
        $id = $this->input->post('name') ? htmlspecialchars(strip_tags($this->input->post('name'))) : '';

        $data = [
            'machine_name'         => $machine_no,
            'machine_id'           => $machine_ip,
            'plant_id'               =>  $org_id,
            'user_id'              => $id,

        ];

        $res = $this->db->insert('cbwtf_machine_link', $data);
        return $res;
    }

    public function weight_machine_register_delete($id)
    {

        $this->db->where('id', $id);
        $res = $this->db->delete('cbwtf_machine_link');
        return $res;
    }
}
