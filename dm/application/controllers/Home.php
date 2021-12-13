<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller 
{
	
	/**
	* @var stirng
	* @access Public
	*/
	public $selected_tab = '';
	
	/** 
	* Controller constructor
	* 
	* @access public 
	*/
	public function __construct()
	{
		parent::__construct();
		$this->selected_tab = 'home';
		$this->layout = 'publicsite';
		$this->load->model('post_api_model', 'post_api');
	}
	
	public function index()
	{
		$data = [];
		$this->load->view('home/index', $data);
	}

	public function thank_you()
	{
		if(!$this->session->userdata('thank_you')){
			redirect('home/'); exit;
		}
		if($this->session->userdata('emailData')){
			$email = json_decode($this->session->userdata('emailData'));
			$message = '';
			if(isset($email->debt)){
        		$message .= '<p><strong>How much unsecured debt do you have?</strong></p>';
        		$message .= '<p>'.$email->debt.'</p>';
        	}
        	if(isset($email->debttypes)){
        		$message .= '<p><strong>What types of debt do you have?</strong></p>';
        		$message .= '<p>'.$email->debttypes.'</p>';
        	}
        	if(isset($email->creditor)){
        		$message .= '<p><strong>How many creditors do you have?</strong></p>';
        		$message .= '<p>'.$email->creditor.'</p>';
        	}
        	if(isset($email->status)){
        		$message .= '<p><strong>What is your employment status?</strong></p>';
        		$message .= '<p>'.$email->status.'</p>';
        	}
        	if(isset($email->income)){
        		$message .= '<p><strong>Do you have monthly income of £700 or more?</strong></p>';
        		$message .= '<p>'.$email->income.'</p>';
        	}
        	if(isset($email->live)){
        		$message .= '<p><strong>Where do you live?</strong></p>';
        		$message .= '<p>'.$email->live.'</p>';
        	}
        	if(isset($email->first_name)){
        		$message .= '<p><strong>First Name</strong></p>';
        		$message .= '<p>'.$email->first_name.'</p>';
        	}
        	if(isset($email->last_name)){
        		$message .= '<p><strong>Last Name</p></strong>';
        		$message .= '<p>'.$email->last_name.'</p>';
        	}
        	if(isset($email->email)){
        		$message .= '<p><strong>Email</strong></p>';
        		$message .= '<p><strong>'.$email->email.'</strong></p>';
        	}
        	if(isset($email->phone_no)){
        		$message .= '<p><strong>Phone No</strong></p>';
        		$message .= '<p>'.$email->phone_no.'</p>';
        	}
        	if(isset($email->timecall)){
        		$message .= '<p><strong>Preffered time to call you?</strong></p>';
        		$message .= '<p>'.$email->timecall.'</p>';
        	}
            send_email_to('Dear',$message,'New Lead');
		}
		$this->session->unset_userdata('emailData');
		$this->session->unset_userdata('thank_you');
		$this->load->view('home/thank_you');
	}

	public function process_add()
	{
		$data = array();
		$this->layout = " ";
		if(!$this->input->is_ajax_request()){
		   exit('No direct script access allowed');
		}
		$data['response'] = false;
		$data['first_name_error'] = '';
		$data['last_name_error'] = '';
		$data['email_error'] = '';
        $data['phone_no_error'] = '';
		$data['fds_offer_error'] = '';
		$data['privacy_policy_error'] = '';
		$data['timecall_error'] = '';
		$this->form_validation->set_rules('first_name','first name','required|trim');
		$this->form_validation->set_rules('last_name','last name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email');
		$this->form_validation->set_rules('phone_no','phone no','required|trim|numeric|min_length[11]|max_length[11]');
		if($this->form_validation->run()===true){
			$inData = $this->input->post();
			$inData['debt'] = 'Above £5,000';
			if(!$this->input->post('fds_offer') || !$this->input->post('privacy_policy') || !$this->input->post('timecall')){
				if(!$this->input->post('fds_offer')){
                    $data['fds_offer_error'] = 'Please select';
				}
				if(!$this->input->post('privacy_policy')){
                    $data['privacy_policy_error'] = 'Please select';
				}
				if(!$this->input->post('timecall')){
                    $data['timecall_error'] = 'Please select';
				}
			}
			else{
				$arr = ['debt'=>'How much unsecured debt do you have?','debttypes'=>'What types of debt do you have?','creditor'=>'How many creditors do you have?','status'=>'What is your employment status?','income'=>'Do you have monthly income of £700 or more?','live'=>'Where do you live?','livuk'=>'Have you Living in the UK for 5 years or more?'];
				$formData = $this->input->post();
				$formData['debt'] = 'Above £5,000';

				$this->session->set_userdata('emailData', json_encode($formData));
				$counter = 1;
				$tags = '';
				$tags2 = '';
				foreach($formData as $key => $value){
		            if($counter<=4){
		            	$tags .= $arr[$key]." ";
		                $tags .= $value;
		                $tags .= "|";
		                unset($formData[$key]);
		            } else if($counter<=7){
		                $tags2 .= $arr[$key]." ";
		                $tags2 .= $value;
		                ($counter<7)?$tags2 .= "|":'';
		                 unset($formData[$key]);
		            }
					$counter++;
				}
				$tags2 .= '|Preffered time to call you?'.$formData['timecall'];
                unset($formData['fds_offer'],$formData['privacy_policy'],$formData['timecall']);
				$formData['lead_info'] = $tags;
				if($id = $this->post_api->save($formData)){
					$url = 'https://seasidemedia.api-us1.com';
					$params = array(
					    'api_key' => 'a544e3a9c628cf1c447ffcdef2aabf99d0bac140877a42f4fe51e3a81ad8c26971e857bb',
					    'api_action' => 'contact_add',
					    'api_output' => 'json'
					);
					$post = array(
					    'email' => $formData['email'],
					    'first_name' => $formData['first_name'],
					    'last_name' => $formData['last_name'],
					    'phone' => $formData['phone_no'],
					    'customer_acct_name' => 'Acme, Inc.',
					    'p[181]' => 181,
					    'status[181]' => 1,
					    'instantresponders[181]' => 1
					);
					//debug($post,true);
			        $post_data = http_build_query($post);
					$query = http_build_query($params);

					$api = $url . '/admin/api.php?' . $query;

					$ch = curl_init();
					curl_setopt( $ch, CURLOPT_URL, $api);
					curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
					curl_setopt( $ch, CURLOPT_POSTFIELDS,  $post_data);
					curl_setopt( $ch, CURLOPT_HTTPHEADER ,  array("Content-Type:application/x-www-form-urlencoded"));
					$response = curl_exec( $ch );
					curl_close( $ch );

					$update = ['api_response'=>$response];
					$this->post_api->update_by('id',$id,$update);
					$this->session->set_userdata('thank_you','thank_you');
					
					$decode_data = json_decode($response);

					$params = array(
					    'api_key' => 'a544e3a9c628cf1c447ffcdef2aabf99d0bac140877a42f4fe51e3a81ad8c26971e857bb',
					    'api_action' => 'contact_tag_add',
					    'api_output' => 'json'
					);
					
				//	echo "<pre>";
				//	print_r($decode_data);
					

					$decoded = json_decode(json_encode($decode_data), true);
						//echo "<pre>";
					//	print_r($decoded);
					//debug($decoded,true);
    //'id' => $decoded[0]['subscriberid'],
					$post = array(
					    'id' => $decoded['subscriber_id'],
					    'tags' => array($tags,$tags2)
					);
			        $post_data = http_build_query($post);
					$query = http_build_query($params);

					$api = $url . '/admin/api.php?' . $query;

					$ch = curl_init();
					curl_setopt( $ch, CURLOPT_URL, $api);
					curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
					curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
					curl_setopt( $ch, CURLOPT_POSTFIELDS,  $post_data);
					curl_setopt( $ch, CURLOPT_HTTPHEADER ,  array("Content-Type:application/x-www-form-urlencoded"));
					$response = curl_exec( $ch );
					
					$data['response'] = true;
				}
			}		
		}
		else{
			$data['first_name_error'] = form_error('first_name');
			$data['last_name_error'] = form_error('last_name');
			$data['email_error'] = form_error('email');
            $data['phone_no_error'] = form_error('phone_no');
		}
		//$data['regenerate_token'] = $this->security->get_csrf_hash();
		echo json_encode($data);
	}

	public function process_add_loan()
	{
		$data = array();
		$this->layout = " ";
		if(!$this->input->is_ajax_request()){
		   exit('No direct script access allowed');
		}
		$data['response'] = false;
		$data['first_name_error'] = '';
		$data['loan_amount_error'] = '';
		$data['email_error'] = '';
        $data['phone_no_error'] = '';
		$this->form_validation->set_rules('first_name','name','required|trim');
		$this->form_validation->set_rules('loan_amount','loan amount','required|trim|numeric');
		$this->form_validation->set_rules('email','email','required|trim|valid_email');
		$this->form_validation->set_rules('phone_no','phone no','required|trim|numeric|min_length[11]|max_length[11]');
		if($this->form_validation->run()===true){
			$inData = $this->input->post();
			$formData = $this->input->post();

			$this->session->set_userdata('emailData', json_encode($formData));
            
            $tags = 'Debt Amount?Less than £5,000';
            $tags .= '|Loan Amount?'.$formData['loan_amount'];
		    $tags .= '|Preffered time to call you?'.$formData['timecall'];
			$formData['lead_info'] = $tags;
			unset($formData['loan_amount'],$formData['timecall']);
			//debug($formData,true);

			if($id = $this->post_api->save($formData)){
				$url = 'https://seasidemedia.api-us1.com';
				$params = array(
				    'api_key' => 'a544e3a9c628cf1c447ffcdef2aabf99d0bac140877a42f4fe51e3a81ad8c26971e857bb',
				    'api_action' => 'contact_add',
				    'api_output' => 'json'
				);
				$post = array(
				    'email' => $formData['email'],
				    'first_name' => $formData['first_name'],
				    'phone' => $formData['phone_no'],
				    'customer_acct_name' => 'Acme, Inc.',
				    'tags'=>$tags,
				    'p[181]' => 181,
				    'status[181]' => 1,
				    'instantresponders[181]' => 1
				);
				//debug($post,true);
		        $post_data = http_build_query($post);
				$query = http_build_query($params);
				$api = $url . '/admin/api.php?' . $query;
				$ch = curl_init();
				curl_setopt( $ch, CURLOPT_URL, $api);
				curl_setopt( $ch, CURLOPT_CUSTOMREQUEST, 'POST' );
				curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
				curl_setopt($ch,CURLOPT_SSL_VERIFYPEER, false);
				curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
				curl_setopt( $ch, CURLOPT_POSTFIELDS,  $post_data);
				curl_setopt( $ch, CURLOPT_HTTPHEADER ,  array("Content-Type:application/x-www-form-urlencoded"));
				$response = curl_exec( $ch );
				curl_close( $ch );
				//debug($response,true);
				$update = ['api_response'=>$response];
				$this->post_api->update_by('id',$id,$update);
				//$this->session->set_userdata('thank_you','thank_you');
				$data['response'] = true;
			}	
		}
		else{
			$data['first_name_error'] = form_error('first_name');
			$data['loan_amount_error'] = form_error('loan_amount');
			$data['email_error'] = form_error('email');
            $data['phone_no_error'] = form_error('phone_no');
		}
		echo json_encode($data);
	}

}