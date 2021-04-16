<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {

	public function index()
	{
	   //echo "admin@123"
	      //  session_destroy();
				
	    
			   $data = array();
			   $data['title'] = "Login";
	        // $this->load->view('header');
				$this->load->view('userpage/index', $data);
	}
	public function sendOtp(){
	   $mobile = $_POST['mobile'];
	  
	  // print_R($_POST); die;
	   if($_POST){
	      $checkmobile =  $this->db->get_where('tbl_user_registration',array('mobile_number'=>$mobile,'status_check'=>1))->row();
		$checkmobile_mobile =  $this->db->get_where('tbl_mobile',array('mobile_number'=>$mobile))->row();
	 
	   if(!empty($checkmobile_mobile)) {
	   // echo ($_POST['mobile']); die;
	      $otp = rand(1111,9999);
		  $mobile1 = $_POST['mobile'];
		  //$msg = "hello pankaj";
		  $user = 'duntrf';
		  $pass = 'duntrf';
		  $sender = 'DUNTRF';
		//  $phone = $mobile1;
		 // $otp = $otp;
		  $msg1 = $otp." is your One Time Password";
		  $msg = str_replace(' ', '%20', $msg1);
		  $priority = 'ndnd';
		  $stype = 'normal';
		   $created_at  = date("Y-m-d h:i:s");
		   if(empty($checkmobile)){
		  $insertData = array(
		                 'mobile_number'=>$_POST['mobile'],
						 'name'=>'',
						 'email'=>'',
						 'password'=>'',
						 'status_check'=>1,
		                 'otp'=>$otp,
		                 'created_at'=>$created_at,
		                );
			//print_R($insertData); die;	
       
		  $this->db->insert('tbl_user_registration',$insertData);
		  }
		  else{
			$updateArray=array(
			'otp'=>$otp
			);
			$this->db->where(array('mobile_number'=>$_POST['mobile']));
			$this->db->update('tbl_user_registration',$updateArray);
		  }
        //  file_get_contents("http://trans.websky.in/api/sendmsg.php?user=$user&pass=$pass&sender=$sender&phone=$mobile1&text=$msg&priority=$priority&stype=$stype");	
		   echo "success";
		}else{
		  echo "error";
		}
	   }
	}
	
	public function ResendOtp(){
	      $otpmobilenumber = $this->input->post('otpmobilenumber');
		if($otpmobilenumber !=""){  
		   $checkmobile =  $this->db->get_where('tbl_user_registration',array('mobile_number'=>$otpmobilenumber,'status_check'=>1))->row();
			   if(!empty($checkmobile)) {
				    $otp = rand(1111,9999);
					$user = 'duntrf';
					$pass = 'duntrf';
					$sender = 'DUNTRF';
					//  $phone = $mobile1;
					// $otp = $otp;
					$msg1 = $otp." is your One Time Password";
					$msg = str_replace(' ', '%20', $msg1);
					$priority = 'ndnd';
					$stype = 'normal';
				  $this->db->where('mobile_number',$otpmobilenumber);
				  $this->db->update('tbl_user_registration', array('otp'=>$otp));
				  
				  file_get_contents("http://trans.websky.in/api/sendmsg.php?user=$user&pass=$pass&sender=$sender&phone=$otpmobilenumber&text=$msg&priority=$priority&stype=$stype");	
		  
				 echo "success"; 
				}else{
				   echo "error";
				}
		  
	    }
	}
	   
		public  function UserRegistered(){
			  $otpmobilenumber = $this->input->post('otpmobilenumber');
			  $otpnumber = $this->input->post('otpnumber');
		            $this->db->select('*');
					$this->db->from('tbl_user_registration');
					$this->db->where('mobile_number',$otpmobilenumber);
	    			$this->db->where('otp',$otpnumber);  
	    			$this->db->where('status_check',1);  
					$query = $this->db->get();
						 //	echo $this->db->last_query(); die;
				if($query->num_rows() == 1)
				{
				  unset($_SESSION['user_id']);
				  unset($_SESSION['mobile_number']);
					$data = array();
					$row=$query->row();
					$data=array(
							'user_id'=>$row->user_id,
							'mobile_number'=>$row->mobile_number,
							);
							
					$this->session->set_userdata($data);     
					$this->db->where('mobile_number',$otpmobilenumber);
				$result = 	$this->db->update('tbl_user_registration', array('otp_status'=>'1'));
               if(isset($result)){
			     echo "success";
			   }else{
			     echo "error";
			   }
			   }else{
			     echo "error";
			   }
		}   
		
		    public function login_check()
		{
				if($this->session->userdata('user_id') == "") { 
					  redirect(base_url('user/index'));
				}
		}
		public  function success_page(){
			$this->login_check();
			$this->load->view('userpage/success_page');
		}
		public  function userdashboard(){
		 
		 $this->login_check();
		$user_id = $this->session->userdata('user_id');
			$data = array();
			$data['questionlist']=$this->db->select('*')->get_where('tbl_question',array('show_hide'=>1))->result();
		
			if($_POST){
			//echo "<pre>"; print_R($_POST); die;	
			 
				if(isset($_POST['ans'])) {
					
					foreach($_POST['q1_text'] as $key=>$val){
				     //echo $key;
					 $insertA=array(
					 'user_id'=>$user_id,
						'question_id'=>$key
					 );
				   $this->db->insert('tbl_manage_user_question',$insertA);
					
				    } 
				
				   $str = implode(',',$_POST['ans']);
        /*  if(!empty($_POST['q1_text'])) {			
			foreach($_POST['q1_text'] as $key=>$val){
				  if($val != "") {
					 $q1_text[] = $key.'_'.$val;
					 }
				 }
			} */
				  // $str1 = implode(',',$q1_text); 
				 $insertArray=array(
					
					'user_id'=>$user_id,
					'answer'=>$str,
					//'other_description'=>$str1
					);
					
					$this->db->insert('tbl_users_answer',$insertArray);
					//$this->session->set_flashdata('SuccessMessage', "Records has been added successfully");
					 redirect(base_url('user/user_voting')); 
				 }
				
			}
			$data['title'] = "dashboard";
			$this->load->view('userpage/userdashboard', $data);
		}
		
		
		
		public  function user_voting(){
		
		$this->login_check();
		$user_id = $this->session->userdata('user_id');	
	    $data = array();			//SELECT distinct(position_id)  FROM `tbl_candidate`
		                     $this->db->distinct('position_id');
		                       $this->db->select('distinct(position_id)');
						      $this->db->from('tbl_candidate');
						$data['postlist']=  $this->db->get()->result();
			
	if($_POST) {		
	  
	//  $this->form_validation->set_rules('name', 'candidate name', 'trim|required');
//	 print_R($_POST);
	//print_R($_POST['candidate_id1']);
		 foreach($_POST['candidate_id1'] as $key=>$val){	
			$this->form_validation->set_rules('candidate_id1['.$key.']', 'candidate name', 'trim|required');
		} 
			 if ($this->form_validation->run() == TRUE)
				{
					
					 	 if($this->input->post() !='')
				    {
					    foreach($_POST['candidate_id1'] as $key=>$val){
                                $position_id = $_POST['position_id'][$key];						
                                $candidate_id = $_POST['candidate_id1'][$key];						
							    $created_at     = date("Y-m-d h:i:s");
								
										$Insertdata=array(
										'user_id'=>$user_id,
										'position_id'=>$position_id,
										'candidate_id'=>$candidate_id,
										'created_at'=>$created_at
										);
							$this->db->insert('tbl_uer_positionvoting',$Insertdata);
							
								
						}
					} 
					$this->session->set_flashdata('SuccessMessage', "Records has been added successfully");
					redirect(base_url('user/success_page'));
				}
			}
			
			$data['title'] = "dashboard";
			$this->load->view('userpage/user_voting', $data);
		}
		public function userregistration(){
		
		   // $this->login_check();
		   $data['title'] = "Registration";
			$this->load->view('userpage/userregistration', $data);
		
		} 
		
 		public  function Registered(){
		
		//  print_R($_POST);
		   if($_POST){
		          $name = $_POST['name'];
		            $mobile_number = $_POST['mobile_number'];
		            // $password = $_POST['password'];
		            $created_at     = date("Y-m-d h:i:s");
			 
		      $checkemail =  $this->db->get_where('tbl_user_registration',array('mobile_number'=>$mobile_number))->row();
		            if(empty($checkemail)) {
										$Insertdata=array(
										'name'=>$name,
										'mobile_number'=>$mobile_number,
										'otp'=>0,
										'status_check'=>2,
										'created_at'=>$created_at
										);
								unset($_SESSION['user_id']);
								unset($_SESSION['mobile_number']);
								unset($_SESSION['status_check']);
								/* $data = array();
								$row=$query->row(); */
						$result = $this->db->insert('tbl_user_registration',$Insertdata);
                        $lastID = $this->db->insert_id();						
								$data=array(
								'user_id'=>$lastID,
								'status_check'=>2,
								'mobile_number'=>$mobile_number,
								);
								$this->session->set_userdata($data); 				
					    echo "success";
						
				    }else{
					$updateArray=array(
						'name'=>$name,
						'otp'=>0,
						'status_check'=>2,
					);
					$this->db->where(array('mobile_number'=>$mobile_number));
					$this->db->update('tbl_user_registration',$updateArray);
					unset($_SESSION['user_id']);
					unset($_SESSION['mobile_number']);
					unset($_SESSION['status_check']);
					$data=array(
								'user_id'=>$checkemail->user_id,
								'status_check'=>2,
								'mobile_number'=>$mobile_number,
								);
								$this->session->set_userdata($data); 				
					    echo "success";
					// echo "error";
					}
		  }
		}
		//useremail='+useremail+'&userpassword='+userpassword;
	/* 	 public  function userloginwithemail(){
			  $useremail = $this->input->post('useremail');
			  $userpassword = $this->input->post('userpassword');
		            $this->db->select('*');
					$this->db->from('tbl_user_registration');
					$this->db->where('email',$useremail);
	    			$this->db->where('password',md5($userpassword));  
	    			$this->db->where('status_check',2);  
					$query = $this->db->get();
					//	echo $this->db->last_query(); die;
				if($query->num_rows() == 1)
				{
				  unset($_SESSION['user_id']);
				  unset($_SESSION['email']);
				  unset($_SESSION['status_check']);
					$data = array();
					$row=$query->row();
					$data=array(
							'user_id'=>$row->user_id,
							'status_check'=>$row->status_check,
							'email'=>$row->email,
							);
							
					$this->session->set_userdata($data);     
                 echo "success";
				}else{
					 echo "error";
				}
		}     */
	   
	}

