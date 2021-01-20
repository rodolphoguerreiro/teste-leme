<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Utility\Text;
use Cake\Mailer\Email;


class EmailToolComponent extends Component{

	private $email;

	public function __construct(){
        $this->email = new Email();
    }

	public function _template($template){
		$this->email->template($template, 'default')
					->emailFormat('html');

		return $this;
	}

	public function _parameters($param = []){
		if(!empty($param)){
			$this->email
					->from($param['from'])
					->to($param['to'])
					->subject($param['subject']);

			if(isset($param['attachments']) && !empty($param['attachments'][0]['tmp_name'])){

				foreach($param['attachments'] as $attachment){
					$attachments[$attachment['name']] = [
						'file' => $attachment['tmp_name'],
				        'mimetype' => $attachment['type'],
					];
				}

				$this->email->attachments($attachments);
			}

			$variables = [
				'url_facebook' 	=> $param['setting']['URL_FACEBOOK'],
				'url_linkedin' 	=> $param['setting']['URL_LINKEDIN'],
				'url_youtube' 	=> $param['setting']['URL_YOUTUBE'],
				'url_instagran' => $param['setting']['URL_INSTAGRAN'],
				'phone' 		=> $param['setting']['PHONE'],
			];

			if(isset($param['variables'])){
				$variables = array_merge($variables, $param['variables']);
			}

			$this->email
				->setViewVars($variables)
				->send();
		}

		return $this;
	}

}
