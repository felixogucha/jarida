<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH.'/libraries/REST_Controller.php';
class Mobile extends REST_Controller {

	/* -------------------------------------------------------------------- user login -------------------------------------------------------------------- */
	public function login_get()
    {
    	if ($this->get('u') && $this->get('p')) {
    		$username = $this->get('u');
    		$password = $this->get('p');
        	$this->load->model('select');
        	$result = $this->select->doLogin($username, $password);
        	if ($result) {
        		$this->response($result, 200);// 200 being the HTTP response code
        	} else {
        		$this->response(array('result' => 'id'), 400);
        	}
    	} else {
    		$this->response(array('result' => 'up'), 400);
    	}
    	
    }
 
    public function login_post()
    {
        if ($this->post('u') && $this->post('p')) {
    		$username = $this->post('u');
    		$password = $this->post('p');
        	$this->load->model('select');
        	$result = $this->select->doLogin($username, $password);
        	if ($result) {
        		$this->response($result, 200);// 200 being the HTTP response code
        	} else {
        		$this->response(NULL, 400);
        	}
        	
    	} else {
    		$this->response(NULL, 400);
    	}
    }

    public function login_put()
    {
        // create a new user and respond with a status/errors
        $this->response(NULL, 400);
    }
 
    public function login_delete()
    {
        // delete a user and respond with a status/errors
        $this->response(NULL, 400);
    }


    /* -------------------------------------------------------------------- all magazines -------------------------------------------------------------------- */

    public function magazines_get()
    {
    	$this->load->model('select');
    	$all_magazines = $this->select->getAll('viewmagazines');
    	if ($all_magazines) {
    		$this->response($all_magazines, 200);// 200 being the HTTP response code
    	} else {
    		$this->response(NULL, 400);// 200 being the HTTP response code
    	}

    }

    public function magazines_post()
    {
    	$this->load->model('select');
    	$all_magazines = $this->select->getAll('viewmagazines');
    	if ($all_magazines) {
    		$this->response($all_magazines, 200);// 200 being the HTTP response code
    	} else {
    		$this->response(NULL, 400);// 200 being the HTTP response code
    	}
    	
    }

    public function magazines_put()
    {
        // create new magazines and respond with a status/errors
        $this->response(NULL, 400);
    }
 
    public function magazines_delete()
    {
        // delete magazines and respond with a status/errors
        $this->response(NULL, 400);
    }

    /* -------------------------------------------------------------------- all issues within a specified range-------------------------------------------------------------------- */

    public function pageRanges_get()
    {
        $this->load->model('select');//issueRange($issue_id, $from, $to)
        $all_issues = $this->select->pageRange($this->get('id'), $this->get('limit'), $this->get('offset'));
        if ($all_issues) {
            $this->response($all_issues, 200);// 200 being the HTTP response code
        } else {
            $this->response(NULL, 400);// 200 being the HTTP response code
        }

    }

    public function pageRanges_post()
    {
        $this->load->model('select');
        $all_magazines = $this->select->pageRange($this->post('id'), $this->post('limit'), $this->post('offset'));
         if ($all_issues) {
            $this->response($all_issues, 200);// 200 being the HTTP response code
        } else {
            $this->response(NULL, 400);// 200 being the HTTP response code
        }
        
    }

    public function pageRanges_put()
    {
        // create new magazines and respond with a status/errors
        $this->response(NULL, 400);
    }
 
    public function pageRanges_delete()
    {
        // delete magazines and respond with a status/errors
        $this->response(NULL, 400);
    }




/* -------------------------------------------------------------------- all issues in a magazine-------------------------------------------------------------------- */

    public function magazineIssues_get()
    {
        $this->load->model('select');//specificMagazine($magazine_id, $limit, $offset)
        $all_issues = $this->select->specificMagazine($this->get('magazine_id'), $this->get('limit'), $this->get('offset'));
        if ($all_issues) {
            $this->response($all_issues, 200);// 200 being the HTTP response code
        } else {
            $this->response(NULL, 400);// 200 being the HTTP response code
        }

    }

    public function magazineIssues_post()
    {
        $this->load->model('select');
        $all_magazines = $this->select->specificMagazine($this->post('magazine_id'), $this->post('limit'), $this->post('offset'));
         if ($all_issues) {
            $this->response($all_issues, 200);// 200 being the HTTP response code
        } else {
            $this->response(NULL, 400);// 200 being the HTTP response code
        }
        
    }

    public function magazineIssues_put()
    {
        // create new magazines and respond with a status/errors
        $this->response(NULL, 400);
    }
 
    public function magazineIssues_delete()
    {
        // delete magazines and respond with a status/errors
        $this->response(NULL, 400);
    }

     /* -------------------------------------------------------------------- all magazines within a specified range-------------------------------------------------------------------- */

    public function magazineRanges_get()
    {
        $this->load->model('select');//issueRange($issue_id, $from, $to)
        $all_issues = $this->select->magazineRange($this->get('limit'), $this->get('offset'));
        if ($all_issues) {
            $this->response($all_issues, 200);// 200 being the HTTP response code
        } else {
            $this->response(NULL, 400);// 200 being the HTTP response code
        }

    }

    public function magazineRanges_post()
    {
        $this->load->model('select');
        $all_magazines = $this->select->magazineRange($this->post('limit'), $this->post('offset'));
         if ($all_issues) {
            $this->response($all_issues, 200);// 200 being the HTTP response code
        } else {
            $this->response(NULL, 400);// 200 being the HTTP response code
        }
        
    }

    public function magazineRanges_put()
    {
        // create new magazines and respond with a status/errors
        $this->response(NULL, 400);
    }
 
    public function magazineRanges_delete()
    {
        // delete magazines and respond with a status/errors
        $this->response(NULL, 400);
    }

    /* -------------------------------------------------------------------- specific magazine -------------------------------------------------------------------- */
    public function magazine_get()
    {
    	if ($this->get('id')) {
    		$this->load->model('select');
    		$magazine = $this->select->getAllSpecific('viewmagazines', 'magazine_id', $this->get('id'));
	    	if ($magazine) {
	    		$this->response($magazine, 200);// 200 being the HTTP response code
	    	} else {
	    		$this->response(array('result' => 'none'), 400);// 200 being the HTTP response code
	    	}
    	} else {
    		$this->response(array('result' => 'no_id'), 400);// 200 being the HTTP response code
    	}
    	

    }

    public function magazine_post()
    {
    	if ($this->post('id')) {
    		$this->load->model('select');
    		$magazine = $this->select->getAllSpecific('viewmagazines', 'magazine_id', $this->get('id'));
	    	if ($magazine) {
	    		$this->response($magazine, 200);// 200 being the HTTP response code
	    	} else {
	    		$this->response(NULL, 400);// 200 being the HTTP response code
	    	}
    	} else {
    		$this->response(array('result' => 'no_id'), 400);// 200 being the HTTP response code
    	}
    }

    public function magazine_put()
    {
        // create a new magazine and respond with a status/errors
        $this->response(NULL, 400);
    }
 
    public function magazine_delete()
    {
        // delete a magazine and respond with a status/errors
        $this->response(NULL, 400);
    }



    /* -------------------------------------------------------------------- user registration -------------------------------------------------------------------- */

    public function register_get()
    {
    	if ($this->get('email') && $this->get('password')) {
    		$added_on = date('Y-m-d');
    		$user_data = array(
			'salutation_id' => $this->get('salutation_id'),
			'surname' => $this->get('surname'),
			'other_names' => $this->get('other_names'),
			'phone_number' => $this->get('phone_number'),
			'email' => $this->get('email'),
			'sex_id' => $this->get('sex_id'),
			'nationality_id' => $this->get('nationality_id'),
			'city' => $this->get('city'),
			'residence' => $this->get('residence'),
			'username' => $this->get('username'),
			'password' => sha1($this->get('password')),
			'added_on' => $added_on,
			'status_id' => $this->get('status_id')
			);
			$this->load->model('insert');
			$register = $this->insert->createUser($user_data);
			if ($register == 'y') {
				$this->response(array('result' => 'y'), 200);// 200 being the HTTP response code
			} else {
				$this->response(array('result' => 'n'), 400);// 200 being the HTTP response code
			}
			
    	} else {
    		$result = "you require this fields: salutation_id, surname, other_names, phone_number, email, sex_id, nationality_id, city, residence, username, password, status_id";
			$this->response(array('result' => $result), 400);// 200 being the HTTP response code
    	}
    }
    public function register_post()
    {
    	if ($this->post('email') && $this->post('password')) {
    		$added_on = date('Y-m-d');
    		$user_data = array(
			'salutation_id' => $this->post('salutation_id'),
			'surname' => $this->post('surname'),
			'other_names' => $this->post('other_names'),
			'phone_number' => $this->post('phone_number'),
			'email' => $this->post('email'),
			'sex_id' => $this->post('sex_id'),
			'nationality_id' => $this->post('nationality_id'),
			'city' => $this->post('city'),
			'residence' => $this->post('residence'),
			'username' => $this->post('username'),
			'password' => sha1($this->post('password')),
			'added_on' => $added_on,
			'status_id' => $this->post('status_id')
			);
			$this->load->model('insert');
			$register = $this->insert->createUser($user_data);
			if ($register == 'y') {
				$this->response(array('result' => 'y'), 200);// 200 being the HTTP response code
			} else {
				$this->response(array('result' => 'n'), 400);// 200 being the HTTP response code
			}
    	} else {
    		$result = "you require this fields: salutation_id, surname, other_names, phone_number, email, sex_id, nationality_id, city, residence, username, password, status_id";
			$this->response(array('result' => $result), 400);// 200 being the HTTP response code
		}
    	
    }

    public function register_put()
    {
        $this->response(NULL, 400);
    }
 
    public function register_delete()
    {
        $this->response(NULL, 400);
    }


    /* -------------------------------------------------------------------- all issues -------------------------------------------------------------------- */
    public function issues_get()
    {
    	$this->load->model('select');
    	$result = $this->select->getAll('viewallissues');
    	if ($result) {
    		$this->response($result, 200);// 200 being the HTTP response code
    	} else {
    		$this->response(NULL, 400);// 200 being the HTTP response code
    	}

    }

    public function issues_post()
    {
    	
    	$this->load->model('select');
    	$result = $this->select->getAll('viewallissues');
    	if ($result) {
    		$this->response($result, 200);// 200 being the HTTP response code
    	} else {
    		$this->response(NULL, 400);// 200 being the HTTP response code
    	}
    	
    }

    public function issues_put()
    {
        // create new issues and respond with a status/errors
        $this->response(NULL, 400);
    }
 
    public function issues_delete()
    {
        // delete issue and respond with a status/errors
        $this->response(NULL, 400);
    }

    /* -------------------------------------------------------------------- specific issue -------------------------------------------------------------------- */
    public function issue_get()
    {
        $this->load->model('select');
        $result = $this->select->getSpecific('viewallissues', 'issue_id', $this->get('id'));
        if ($result) {
            $title_name = explode('.', $result->issue_url);
            $title_image = $title_name[0];
            $return_data = array(
                'issue_id' => $result->issue_id,
                'added_on' => $result->added_on,
                'description' => $result->description,
                'issue_no' => $result->issue_no,
                'price' => $result->price,
                'title_image' => $result->title_image,
                'added_by' => $result->added_by,
                'mazagine_id' => $result->magazine_id,
                'magazine_name' => $result->magazine_name,
                'status_id' => $result->status_id,
                'status' => $result->status,
                'tag_id' => $result->tag_id,
                'tag_name' => $result->tag_name,
                'published_by' => $result->published_by,
                'suppressed_by' => $result->suppressed_by,
                'created_on' => $result->created_on,
                'published_on' => $result->published_on,
                'suppressed_on' => $result->suppressed_on,
                'issue_url' => $result->issue_url
                );
            $this->response($return_data, 200);// 200 being the HTTP response code
        } else {
            $this->response(NULL, 400);// 200 being the HTTP response code
        }

    }

    public function issue_post()
    {
        
        $this->load->model('select');
        $result = $this->select->getSpecific('viewallissues', 'issue_id', $this->get('id'));
        if ($result) {
            $title_name = explode('.', $result->issue_url);
            $title_image = $title_name[0];
            $return_data = array(
                'issue_id' => $result->issue_id,
                'added_on' => $result->added_on,
                'description' => $result->description,
                'issue_no' => $result->issue_no,
                'price' => $result->price,
                'title_image' => $result->title_image,
                'added_by' => $result->added_by,
                'mazagine_id' => $result->magazine_id,
                'magazine_name' => $result->magazine_name,
                'status_id' => $result->status_id,
                'status' => $result->status,
                'tag_id' => $result->tag_id,
                'tag_name' => $result->tag_name,
                'published_by' => $result->published_by,
                'suppressed_by' => $result->suppressed_by,
                'created_on' => $result->created_on,
                'published_on' => $result->published_on,
                'suppressed_on' => $result->suppressed_on,
                'issue_url' => $result->issue_url
                );
            $this->response($return_data, 200);// 200 being the HTTP response code
        } else {
            $this->response(NULL, 400);// 200 being the HTTP response code
        }
        
    }

    public function issue_put()
    {
        // create a new issue and respond with a status/errors
        $this->response(NULL, 400);
    }
 
    public function issue_delete()
    {
        // delete an issue and respond with a status/errors
        $this->response(NULL, 400);
    }

    /* -------------------------------------------------------------------- specifiic issue pages -------------------------------------------------------------------- */
    public function issuePages_get()
    {
        $this->load->model('select');//getAllSpecific($db, $column, $id) {
        $result = $this->select->getAllSpecific('issue_pages', 'issue_id', $this->get('id'));
        if ($result) {
            $this->response($result, 200);// 200 being the HTTP response code
        } else {
            $this->response(array('result' => 'n'), 400);// 200 being the HTTP response code
        }
    }

    public function issuePages_post()
    {
        $this->load->model('select');
        $result = $this->select->getAllSpecific('issue_pages', 'issue_id', $this->post('id'));
        if ($result) {
           $this->response($result, 200);// 200 being the HTTP response code
        } else {
            $this->response(array('result' => 'n'), 400);// 200 being the HTTP response code
        }
    }

    public function issuePages_put()
    {
        // create a new salutation and respond with a status/errors
        $this->response(NULL, 400);
    }
 
    public function issuePages_delete()
    {
        // delete a salutation and respond with a status/errors
        $this->response(NULL, 400);
    }

    /* -------------------------------------------------------------------- user status -------------------------------------------------------------------- */
    public function status_get()
    {
    	$this->load->model('select');
		$result = $this->select->getAll('status');
    	if ($result) {
    		$this->response($result, 200);// 200 being the HTTP response code
    	} else {
    		$this->response(array('result' => 'n'), 400);// 200 being the HTTP response code
    	}
    }

    public function status_post()
    {
    	$this->load->model('select');
		$result = $this->select->getAll('status');
    	if ($result) {
    		$this->response($result, 200);// 200 being the HTTP response code
    	} else {
    		$this->response(array('result' => 'n'), 400);// 200 being the HTTP response code
    	}
    }

    public function status_put()
    {
        // create new status and respond with a status/errors
        $this->response(NULL, 400);
    }
 
    public function status_delete()
    {
        // delete a status and respond with a status/errors
        $this->response(NULL, 400);
    }

    /* -------------------------------------------------------------------- specific magazine -------------------------------------------------------------------- */
    public function nationality_get()
    {
    	$this->load->model('select');
		$result = $this->select->getAll('nationality');
    	if ($result) {
    		$this->response($result, 200);// 200 being the HTTP response code
    	} else {
    		$this->response(array('result' => 'n'), 400);// 200 being the HTTP response code
    	}
    }

    public function nationality_post()
    {
    	$this->load->model('select');
		$result = $this->select->getAll('nationality');
    	if ($result) {
    		$this->response($result, 200);// 200 being the HTTP response code
    	} else {
    		$this->response(array('result' => 'n'), 400);// 200 being the HTTP response code
    	}
    }

    public function nationality_put()
    {
        // create a new nationality and respond with a status/errors
        $this->response(NULL, 400);
    }
 
    public function nationality_delete()
    {
        // delete a nationality and respond with a status/errors
        $this->response(NULL, 400);
    }


    /* -------------------------------------------------------------------- gender -------------------------------------------------------------------- */
    public function gender_get()
    {
    	$this->load->model('select');
		$result = $this->select->getAll('sex');
    	if ($result) {
    		$this->response($result, 200);// 200 being the HTTP response code
    	} else {
    		$this->response(array('result' => 'n'), 400);// 200 being the HTTP response code
    	}
    }

    public function gender_post()
    {
    	$this->load->model('select');
		$result = $this->select->getAll('sex');
    	if ($result) {
    		$this->response($result, 200);// 200 being the HTTP response code
    	} else {
    		$this->response(array('result' => 'n'), 400);// 200 being the HTTP response code
    	}
    }

    public function gender_put()
    {
        // create a new gender and respond with a status/errors
        $this->response(NULL, 400);
    }
 
    public function gender_delete()
    {
        // delete a gender and respond with a status/errors
        $this->response(NULL, 400);
    }

    /* -------------------------------------------------------------------- salutation -------------------------------------------------------------------- */
    public function salutations_get()
    {
    	$this->load->model('select');
		$result = $this->select->getAll('salutation');
    	if ($result) {
    		$this->response($result, 200);// 200 being the HTTP response code
    	} else {
    		$this->response(array('result' => 'n'), 400);// 200 being the HTTP response code
    	}
    }

    public function salutations_post()
    {
    	$this->load->model('select');
		$result = $this->select->getAll('salutation');
    	if ($result) {
    		$this->response($result, 200);// 200 being the HTTP response code
    	} else {
    		$this->response(array('result' => 'n'), 400);// 200 being the HTTP response code
    	}
    }

    public function salutations_put()
    {
        // create a new salutation and respond with a status/errors
        $this->response(NULL, 400);
    }
 
    public function salutations_delete()
    {
        // delete a salutation and respond with a status/errors
        $this->response(NULL, 400);
    }

}