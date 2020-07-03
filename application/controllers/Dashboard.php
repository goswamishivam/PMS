<?php 
class Dashboard extends MY_Controller{
	public function index(){
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name','username','required');
		$this->form_validation->set_rules('password','password','required');
		$this->form_validation->set_error_delimiters('<div class="text-danger">','</div>');

		if($this->form_validation->run()){
			$name=$this->input->post('name');
			$password=$this->input->post('password');
			$this->load->model('loginmodel');
			$name=$this->loginmodel->isvalidate($name,$password);
			if($name){
				$this->load->library('session');
				$this->session->set_userdata('name',$name);
				return redirect('Dashboard/welcome');
				return redirect('Dashboard/userdashboard');
				return redirect('Dashboard/criticalindex');


			}
			else{
				  echo '
                    <!DOCTYPE html>
                    <html>
                    <head>
                    <script>
                    alert("Username and Password not matched !");
                    </script>
                    </head>
                    <body>
                    </body>
                    </html>';
                    $this->load->view('login');
			}
		}
		else{
			$this->load->view('login');
		}
		
	}



	public function registration(){
		$this->load->view('registration');
	}

	public function userdashboard(){
		$this->load->model('loginmodel');
		$d=$this->loginmodel->userdata();
		$this->load->view('user',['d'=>$d]);
	}

	public function criticalindex(){
		$this->load->model('loginmodel');
		$d=$this->loginmodel->userdata();
		$this->load->view('criticalindex',['d'=>$d]);
	}
	
	public function welcome(){
	
		$this->load->model('loginmodel');
		$d=$this->loginmodel->userdata();
		$this->load->view('dashboard',['d'=>$d]);

	}

}


 ?>
