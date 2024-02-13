<?php
defined('BASEPATH') or exit('No direct script access allowed');

class VehicleController extends CI_Controller
{


	public function track()
	{

		$url = "https://api-aertrak-india.aeris.com/login";
		$body = ["username" => "mindtrackodisha@gmail.com", "password" => "Mtpl@123"];
		$options = array(
			'http' => array(
				'method'  => 'POST',
				'content' => json_encode($body),
				'header' =>  "Content-Type: application/json"
			)
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		$response = json_decode($result, true);
		$token =  $response['token'];;

		// $url2 = "https://api-aertrak-india.aeris.com/api/fleet/assets";
		// $options2 = array(
		// 	'http' => array(
		// 		'method'  => 'GET',
		// 		'header' =>  "Content-Type: application/json\r\n" . "token:$token"
		// 	)
		// );
		// $context  = stream_context_create($options2);
		// $result = file_get_contents($url2, false, $context);
		// $response = json_decode($result, true);
		// echo '<pre>';
		// var_dump($response);
		$assetUid = $this->input->post('vehicle');
		if ($assetUid != '') {

			$body =  ["timePeriod" => 600, "vehicleSclId" => $assetUid];
			$url3 = "https://api-aertrak-india.aeris.com/api/users/share/location";

			$options3 = array(
				'http' => array(
					'method'  => 'POST',
					'content' => json_encode($body),
					'header' =>  "Content-Type: application/json\r\n" . "token:$token"
				)
			);
			$context  = stream_context_create($options3);
			$result = file_get_contents($url3, false, $context);
			$response = json_decode($result, true);


			$locationShareID = $response['locationShareID'];
			//return redirect('https://aertrak-india.aeris.com/live-location-sharing/' . $locationShareID);

			$data['id'] = $locationShareID;

			$this->load->view('admin/track_individual_vehicle', $data);
		} else {
			echo 'Invalid Vehicle';
		}
	}




	public function track2()
	{

		$url = "https://api-aertrak-india.aeris.com/login";
		$body = ["username" => "mindtrackodisha@gmail.com", "password" => "Mtpl@123"];
		$options = array(
			'http' => array(
				'method'  => 'POST',
				'content' => json_encode($body),
				'header' =>  "Content-Type: application/json"
			)
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		$response = json_decode($result, true);
		$token =  $response['token'];



		$assetUid = $this->input->post('vehicle');

		if ($assetUid != '') {

			$body =  ["timePeriod" => 600, "vehicleSclId" => $assetUid];
			$url3 = "https://api-aertrak-india.aeris.com/api/users/share/location";

			$options3 = array(
				'http' => array(
					'method'  => 'POST',
					'content' => json_encode($body),
					'header' =>  "Content-Type: application/json\r\n" . "token:$token"
				)
			);
			$context  = stream_context_create($options3);
			$result = file_get_contents($url3, false, $context);
			$response = json_decode($result, true);


			$locationShareID = $response['locationShareID'];
			//return redirect('https://aertrak-india.aeris.com/live-location-sharing/' . $locationShareID);

			$data['id'] = $locationShareID;

			$this->load->view('cbwtf/track_individual_vehicle', $data);
		} else {
			echo 'Invalid Vehicle';
		}
	}






	public function viewVehicles()
	{


		$url = "https://api-aertrak-india.aeris.com/login";
		$body = ["username" => "mindtrackodisha@gmail.com", "password" => "Mtpl@123"];
		$options = array(
			'http' => array(
				'method'  => 'POST',
				'content' => json_encode($body),
				'header' =>  "Content-Type: application/json"
			)
		);
		$context  = stream_context_create($options);
		$result = file_get_contents($url, false, $context);
		$response = json_decode($result, true);
		$token =  $response['token'];

		$url2 = "https://api-aertrak-india.aeris.com/api/fleet/assets";
		$options2 = array(
			'http' => array(
				'method'  => 'GET',
				'header' =>  "Content-Type: application/json\r\n" . "token:$token"
			)
		);
		$context  = stream_context_create($options2);
		$result = file_get_contents($url2, false, $context);
		$response['get_vehicle_data'] = json_decode($result, true);

		$this->load->view('admin/vehicle_list', $response);
	}
}
?>