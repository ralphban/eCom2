<?php
namespace app\controllers;

//applying the Login condition to the whole class
//#[\app\filters\Login]
class Profile extends \app\core\Controller{

	//#[\app\filters\HasProfile]
	public function index() {
        // Assuming session_start() is called in a global scope or within the Controller constructor
        if (!isset($_SESSION['user_id'])) {
            // If the user is not logged in, redirect to login page
            header('location:/User/login');
            exit;
        }

        $profile = new \app\models\Profile();
        // Attempt to get the profile for the logged-in user
        $profile = $profile->getForUser($_SESSION['user_id']);

        if (!$profile) {
            // If no profile exists for the user, redirect to the profile creation page
            header('location:/Profile/create');
            exit;
        }

        // If a profile exists, show it
        $this->view('Profile/index', $profile);
    }

	public function create() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!isset($_SESSION['user_id'])) {
                // Redirect to login if user_id is not set
                header('location:/User/login');
                exit;
            }

            $profile = new \app\models\Profile();
            $profile->user_id = $_SESSION['user_id'];
            $profile->first_name = $_POST['first_name'];
            $profile->last_name = $_POST['last_name'];

            try {
                $profile->insert();
                header('location:/Profile/index');
                exit;
            } catch (\PDOException $e) {
                // Handle the exception
                echo "An error occurred: " . $e->getMessage();
                exit;
            }
        } else {
            // Show the profile creation form if the request is not POST
            $this->view('Profile/create');
        }
    }

	public function modify(){
		$profile = new \app\models\Profile();
		$profile = $profile->getForUser($_SESSION['user_id']);

		if($_SERVER['REQUEST_METHOD'] === 'POST'){//data is submitted through method POST
			//make a new profile object
			//populate it
			$profile->first_name = $_POST['first_name'];
			$profile->last_name = $_POST['last_name'];
			//update it
			$profile->update();
			//redirect
			header('location:/Profile/index');
		}else{
			$this->view('Profile/modify', $profile);
		}
	}

	public function delete(){
		//present the user with a form to confirm the deletion that is requested and delete if the form is submitted
/*		//make sure that the user is logged in
		if(!isset($_SESSION['user_id'])){
			header('location:/User/login');
			return;
		}
*/
		$profile = new \app\models\Profile();
		$profile = $profile->getForUser($_SESSION['user_id']);

		if($_SERVER['REQUEST_METHOD'] === 'POST'){
			$profile->delete();
			header('location:/Profile/index');
		}else{
			$this->view('Profile/delete',$profile);
		}
	}
}