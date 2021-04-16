<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/* public function send_link_msg(){
	
	      $mobile1 = $_POST['mobile'];
		  $user = 'duntrf';
		  $pass = 'duntrf';
		  $sender = 'DUNTRF';
		 // $msg1 = "http://g1tech.in/evoting is the evoting link.";
		  $msg = str_replace(' ', '%20', $msg1);
		  $priority = 'ndnd';
		  $stype = 'normal';
		  
	 //file_get_contents("http://trans.websky.in/api/sendmsg.php?user=$user&pass=$pass&sender=$sender&phone=$mobile1&text=$msg&priority=$priority&stype=$stype");
	} */
	public function index()
	{
				/* echo "pankaj";
			   die; */
			   $data = array();
			   $data['title'] = "Login";
	        // $this->load->view('header');
				$this->load->view('admin/index', $data);
	}
	public function status()
	{
		$this->login_check();
		$question_id=base64_decode($_GET['qid']);
		$status_id=$_GET['st'];		
		$table = 'tbl_question';
		$this->db->where(array('question_id'=>$question_id));
		$this->db->update($table,array('show_hide'=>$status_id));
		redirect(base_url('admin/questionlist'));
	}
	public function vstatus()
	{
		$this->login_check();
		$position_id=base64_decode($_GET['pid']);
		$status_id=$_GET['st'];		
		$table = 'tbl_position';
		$this->db->where(array('position_id'=>$position_id));
		$this->db->update($table,array('status'=>$status_id));
		redirect(base_url('admin/post_listing'));
	}
	public function login(){
			//print_r($_POST); die;
			 $this->form_validation->set_rules('user_loginname', 'Email', 'trim|required');
			 $this->form_validation->set_rules('user_password', 'Password', 'trim|required');
			
			 if ($this->form_validation->run() == TRUE)
				{
					
					 	 if($this->input->post() !='')
					    {
					          $email =  $this->input->post('user_loginname');
						      $password =  $this->input->post('user_password');
							  
							$this->db->select('*');
							$this->db->from('admin_login');
							$this->db->where('email_id',$email);
							$this->db->where('password',$password);  
							$query = $this->db->get();
						 //	echo $this->db->last_query(); die;
							if($query->num_rows() == 1)
							{
								$data = array();
								$row=$query->row();
								
										$data=array(
										'admin_id'=>$row->admin_id,
										'email_id'=>$row->email_id,
										);
										
								$this->session->set_userdata($data);           
							    redirect(base_url('admin/dashboard'));
							}
							else
							{
							  $this->session->set_flashdata('message', 'Your email and password is wrong.');
							} 
					    } 
				}	   
		    $data['title'] = "Login";
			$this->load->view('admin/index', $data);
		}
		function logout()
		{
			
			  $newdata = array(
						'admin_id'  =>'',
						'email_id' => '',
						); 
					   
			$this->session->unset_userdata($newdata);
			$this->session->sess_destroy(); 
			redirect(base_url('admin/index'));
		}
		
        public function login_check()
		{
				if($this->session->userdata('email_id') == "" && $this->session->userdata('email_id') =="") { 
					  			redirect(base_url('admin/index'));
				}
		}
		 public function dashboard(){
		    $this->login_check();
			$data =array();
			
			// echo $this->db->last_query(); die;
			//echo "<pre>";  print_r($data); 
		    $data['title'] = "Dashboard";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/dashboard', $data);
			$this->load->view('admin/admin_footer', $data);
		 }
		 public function edit_profile(){
		   $this->login_check();
		   //Array ( [name] => dfkdjf [old_password] => dmdkfm [password] => kdmd,m,df ) 
		    $this->form_validation->set_rules('name', 'Name', 'trim|required');
		    $this->form_validation->set_rules('old_password', 'current Password', 'trim|required');
		    $this->form_validation->set_rules('password', 'new Password', 'trim|required');
			
			 if ($this->form_validation->run() == TRUE)
				{
					
					 	 if($this->input->post() !='')
					    {
						
						}
				}
		  // print_r($_POST);
		   $data['title'] = "User Profile";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/edit_profile', $data);
			$this->load->view('admin/admin_footer', $data);
		 }
		  public function questionlist(){
		   $this->login_check();
		   // print_r($_SESSION); 
		   $data['questionlist'] = $this->db->get('tbl_question')->result();
			  $data['title'] = "Question  Managment";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/userprofile', $data);
			$this->load->view('admin/admin_footer', $data);
		 }
		 
		  public function edit_question(){
		   $this->login_check();
				if(isset($_GET['question_id'])){
					   $question_id = base64_decode($_GET['question_id']);
					   $data['questiondata'] = $this->db->get_where('tbl_question',array('question_id'=>$question_id))->row();
					}
			
			  $this->form_validation->set_rules('question', 'Question', 'trim|required');
			 
			 if ($this->form_validation->run() == TRUE)
				{
					
					 	 if($this->input->post() !='')
					    {
					          $question_id =  $this->input->post('question_id');
					          $question =  $this->input->post('question');
							  
							  $this->db->where('question_id',$question_id);
									$this->db->update('tbl_question',array('question'=>$question));	
									$this->session->set_flashdata("SuccessMessage", 'Question has been updated successfully.');
			                  redirect(base_url('admin/questionlist'));
					    }
				}		
			  $data['title'] = "Question Managment";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/edit_question', $data);
			$this->load->view('admin/admin_footer', $data);
		 }
		 public function user_details(){
		   $this->login_check();
		   // print_r($_SESSION); 
		   $data['mobilelist'] = $this->db->get('tbl_mobile')->result();
			  $data['title'] = "User Managment";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/user_details', $data);
			$this->load->view('admin/admin_footer', $data);
		 }
		 
		 public function deletelesendLink(){
			
			if(isset($_POST['mobileID'])){
			$data=array();
			$mobileID = $_POST['mobileID']; 
			//$this->db->where('student_id',$studentid);
			 $this->db->delete('tbl_mobile',array('mobile_id'=>$mobileID));
			  $data['mobilelist'] = $this->db->get('tbl_mobile')->result();
			//  print_r($data); die;
			  $this->load->view('includes/getuserlist',$data);
			}
		} 
		
		 public function deleteleAddQuestion(){
			
			if(isset($_POST['questionID'])){
				$data=array();
				$questionID = $_POST['questionID']; 
				$this->db->delete('tbl_question',array('question_id'=>$questionID));
				$data['questionlist'] = $this->db->get('tbl_question')->result();
				$this->load->view('includes/getQuestiondata',$data);
			}
		} 
		
		public function deleteleCandidate(){
			
			if(isset($_POST['candidateid'])){
				$data=array();
				$candidateid = $_POST['candidateid']; 
				$this->db->delete('tbl_candidate',array('candidate_id'=>$candidateid));
				$data['candidatelist'] = $this->db->get('tbl_candidate')->result();
				$this->load->view('includes/getcandidatedata',$data);
			}
		} 
		
		public function deletelePostListing(){
			
			if(isset($_POST['positionid'])){
				$data=array();
				$positionid = $_POST['positionid']; 
				$checkPositionID = $this->db->get_where('tbl_candidate',array('position_id'=>$positionid))->row();
			if(empty($checkPositionID)){	
				$this->db->delete('tbl_position',array('position_id'=>$positionid));
				$data['positionlist'] = $this->db->get('tbl_position')->result();
				$formHtml = $this->load->view('includes/getpositiondata',$data);
			 }else{
			   echo "error";
			 }
			}
		} 
		 
		 public function post_listing(){
		   $this->login_check();
		   // print_r($_SESSION); 
		   $data['positionlist'] = $this->db->get('tbl_position')->result();
			  $data['title'] = "Position For";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/post_listing', $data);
			$this->load->view('admin/admin_footer', $data);
		 }
		 public function candidate_listing(){
		   $this->login_check();
		   // print_r($_SESSION); 
		   $data['candidatelist'] = $this->db->get('tbl_candidate')->result();
			  $data['title'] = "Candidate Managment";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/candidate_listing', $data);
			$this->load->view('admin/admin_footer', $data);
		 }
		 public function send_link(){
		   $this->login_check();
		   $data['candidatelist'] = $this->db->get('tbl_candidate')->result();
			  $data['title'] = "User Managment";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/send_link', $data);
			$this->load->view('admin/admin_footer', $data);
		 }
		 
		 public function edit_send_link(){
		    $this->login_check();
			if(isset($_GET['mobile_id'])){
			   $mobile_id = base64_decode($_GET['mobile_id']);
	           $data['mobileadata'] = $this->db->get_where('tbl_mobile',array('mobile_id'=>$mobile_id))->row();
			}
			
			  $this->form_validation->set_rules('mobile_number', 'Mobile number', 'trim|required');
			 
			 if ($this->form_validation->run() == TRUE)
				{
					
					 	 if($this->input->post() !='')
					    {
					          $mobile_id =  $this->input->post('mobile_id');
					          $mobile_number =  $this->input->post('mobile_number');
							  
							  $this->db->where('mobile_id',$mobile_id);
									$this->db->update('tbl_mobile',array('mobile_number'=>$mobile_number));	
									$this->session->set_flashdata("message", 'Mobile number has been updated successfully.');
			                  redirect(base_url('admin/user_details'));
					    }
				}		
			
		    $data['title'] = "User Managment";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/edit_send_link', $data);
			$this->load->view('admin/admin_footer', $data);
		 }
		 
		 public function add_post(){
		    $this->login_check();
			$data = array();
			
			if(isset($_GET['position_id'])){
			   $positionid = base64_decode($_GET['position_id']);
			
	           $data['positiondata'] = $this->db->get_where('tbl_position',array('position_id'=>$positionid))->row();
			}
			
		     $this->form_validation->set_rules('position_name', 'Position name', 'trim|required');
			 
			 if ($this->form_validation->run() == TRUE)
				{
					
					 	 if($this->input->post() !='')
					    {
					          $position_id =  $this->input->post('position_id');
					          $position_name =  $this->input->post('position_name');
							   $created_at  = date("Y-m-d h:i:s");
										  $insertData =  array(
																 'position_name'=>$position_name,
																 'created_at'=>$created_at
																 );
							 if($position_id =="") {									 
									 $this->db->insert('tbl_position',$insertData);	
									 $this->session->set_flashdata("message", 'Add position Name has been added successfully.');
									redirect(base_url('admin/post_listing'));
								}elseif($position_id != ""){
								   $this->db->where('position_id',$position_id);
								   $this->db->update('tbl_position',$insertData);	
								   $this->session->set_flashdata("message", 'position Name has been updated successfully.');
								  redirect(base_url('admin/post_listing'));
                              }
							  
                        }
							
							  
				}
						
		
		    $data['title'] = "Position For";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/add_post', $data);
			$this->load->view('admin/admin_footer', $data);
		 }
		 public function add_candidate(){
		    $this->login_check();
			$data = array();
			if(isset($_GET['candidate_id'])){
			   $candidateid = base64_decode($_GET['candidate_id']);
	           $data['CandidateData'] = $this->db->get_where('tbl_candidate',array('candidate_id'=>$candidateid))->row();
			}
			
		    $data['positionlist'] = $this->db->get('tbl_position')->result();
			
			 $this->form_validation->set_rules('candidate_name', 'Candidate name', 'trim|required');
			 $this->form_validation->set_rules('position_id', 'Position name', 'trim|required');
			 
			 if ($this->form_validation->run() == TRUE)
				{
					
					 	 if($this->input->post() !='')
					    {
					          $candidate_id =  $this->input->post('candidate_id');
					          $candidate_name =  $this->input->post('candidate_name');
					          $position_id =  $this->input->post('position_id');
							   $created_at  = date("Y-m-d h:i:s");
										$insertData =  array(
													 'candidate_name'=>$candidate_name,
													 'position_id'=>$position_id,
													 'created_at'=>$created_at
												 );
							if($candidate_id == "")	{							 
										$this->db->insert('tbl_candidate',$insertData);	
										$this->session->set_flashdata("message", 'Add candidate Name has been added successfully.');
			           redirect(base_url('admin/candidate_listing'));
								}elseif($candidate_id != ""){
									$this->db->where('candidate_id',$candidate_id);
									$this->db->update('tbl_candidate',$insertData);	
									$this->session->set_flashdata("message", 'candidate Name has been updated successfully.');
			           redirect(base_url('admin/candidate_listing'));
								}
                        }
							
							  
				}
		
			  $data['title'] = "Candidate Managment";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/add_candidate', $data);
			$this->load->view('admin/admin_footer', $data);
		 }
		 public function add_question(){
		    $this->login_check();
			$data = array();
		
			  $data['title'] = "Question  Managment";
			$this->load->view('admin/admin_header', $data);
			$this->load->view('admin/add_question', $data);
			$this->load->view('admin/admin_footer', $data);
		 }
		 public  function addquestiondata(){
  //print_r($_POST); die;
            $errors = array();
		     
					 if($_POST)	 {
						foreach($_POST['question'] as $key=>$val) {
								if(empty($_POST['question'][$key])){
										$errors['question'.$key] = 'Add question ';				
								}
                        }
						
					 if(count($errors) > 0){
							//This is for ajax requests:
								if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
									echo json_encode($errors);
									exit;
								 }
							//This is when Javascript is turned off:
							//print_r($errors);
									   echo "<ul>";
									   foreach($errors as $key => $value){
									  echo "<li>" . $value . "</li>";
									   }
									   echo "</ul>";exit;
					}else{
								
								foreach($_POST['question'] as $key=>$val) {
                                     $question = $_POST['question'][$key];
										 $show_hide = '1';
										  $created_at  = date("Y-m-d h:i:s");
										  $insertData =  array(
																 'question'=>$question,
																 'show_hide'=>$show_hide,
																 'created_at'=>$created_at
																 );
										$this->db->insert('tbl_question',$insertData);	
                                }
							$this->session->set_flashdata("SuccessMessage", 'Add Question has been added successfully.');
	                          if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
									$errors['done']='success';
									//$errors['MSG']='Work order has been added successfully.';
									echo json_encode($errors);
									//redirect('masterForm/raw_material_master');
									exit;
								}							
                    }
            }
					
		      // print_r($_POST); die;
		}
		public  function addmobilenumberdata(){
            $errors = array();
		     
					 if($_POST)	 {
						foreach($_POST['mobile'] as $key=>$val) {
						
						   $resultdata = $this->db->get_Where('tbl_mobile', array('mobile_number'=>$_POST['mobile'][$key]))->row();	
								if(!empty($resultdata)){
											$errors['mobile'.$key] = 'Mobile Number  already exist';	
								}else 
								{
									if(empty($_POST['mobile'][$key])){
											$errors['mobile'.$key] = 'Please enter mobile number ';				
									}else if(strlen($_POST['mobile'][$key]) != 10){
										$errors['mobile'.$key] = 'Plese enter  mobile number 10 digit';	
									}
                                }
						}
						 $dupes = array_diff_key( $_POST['mobile'], array_unique($_POST['mobile'])); 	
								   if(!empty($dupes)) { 				  
									  foreach($dupes as $value=>$dupvalue){
										 $errors['mobile'.$value] = "Duplicate mobile number"; 
									 }  	
									}	
						
					 if(count($errors) > 0){
							//This is for ajax requests:
								if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
									echo json_encode($errors);
									exit;
								 }
							//This is when Javascript is turned off:
							//print_r($errors);
									   echo "<ul>";
									   foreach($errors as $key => $value){
									  echo "<li>" . $value . "</li>";
									   }
									   echo "</ul>";exit;
					}else{
								
								foreach($_POST['mobile'] as $key=>$val) {
                                     $mobile = $_POST['mobile'][$key];
										 $show_hide = '1';
										  $created_at  = date("Y-m-d h:i:s");
										  $insertData =  array(
																 'mobile_number'=>$mobile,
																 'created_at'=>$created_at
																 );
										$this->db->insert('tbl_mobile',$insertData);	
                                }
							$this->session->set_flashdata("SuccessMessage", 'Add Mobile Number has been added successfully.');
	                          if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&  strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
									$errors['done']='success';
									//$errors['MSG']='Work order has been added successfully.';
									echo json_encode($errors);
									//redirect('masterForm/raw_material_master');
									exit;
								}							
                    }
            }
					
		      // print_r($_POST); die;
		}
		 
		 
		 public function addnewquestion(){
		 
		    $data = array();
			$data['divsize']=$_POST['divSize'];
			$this->load->view('includes/addnewquestion',$data);
		 }
		  public function addmobilenumber(){
		 
		    $data = array();
			$data['divsize']=$_POST['divSize'];
			$this->load->view('includes/addmobilenumber',$data);
		 }
		 public function registrationprocess(){
		 
		    $data = array();
		   if(isset($_GET['statusID'])) {
		   
		      $statusID = $_GET['statusID'];
			  if($_GET['statusID'] == '0'){
			    $statusid12 = 1;
			  }else{
			   $statusid12 = 0;
			  }
			  $this->db->where('id',1);
			$result = 	$this->db->update('tbl_registrationprocess',array('status'=>$statusid12));
          if($result){			 
			// $this->session->set_flashdata("message", 'Registration process has been Status change successfully.');	
			}
		}
				
				
		       $data['registrationStatus'] = $this->db->get_where('tbl_registrationprocess',array('id'=>1))->row();
                
				
		   
		 
		  
		    $data['title'] = "Registration Process";
		    $this->load->view('admin/admin_header', $data);
			$this->load->view('admin/registrationprocess', $data);
			$this->load->view('admin/admin_footer', $data);
		}
			/*  public function voterlist(){
			 
				$data = array();
				 $data['answerlist'] = $this->db->select('distinct(user_id),created_at')->from('tbl_uer_positionvoting')->get()->result();
				 
				$data['title'] = "Voter List";
				$this->load->view('admin/admin_header', $data);
				$this->load->view('admin/voterlist', $data);
				$this->load->view('admin/admin_footer', $data);
			 } */
}
