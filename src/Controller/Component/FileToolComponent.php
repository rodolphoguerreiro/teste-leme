<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Filesystem\File;
use Cake\Filesystem\Folder;

class FileToolComponent extends Component{

	public $components = ['Flash'];

	public function _upload($file){
		if($file['error'] == 0){
			$folder = new Folder(ROOT.'/webroot/files', true);
	        $fileUpload = new File($file['name']);
	        $fileNew = new File($folder->path.DS.$fileUpload->name);

	        if($fileNew->exists()){
	            $filesExists = $folder->find("({$fileNew->name()}).*");
	            $fileCopy = $fileUpload->name().'('.(count($filesExists)+1).').'.$fileUpload->ext();
	            $fileNew = new File($folder->path.DS.$fileCopy);
	        }

            if(move_uploaded_file($file['tmp_name'], $fileNew->path)){
                return 'files/'.$fileNew->name;
            }else{
                $this->Flash->error(__('msg_error_upload_file'));
            }
		}

        return false;
    }

	public function _remove($file){
		$file = new File($file);
		if(!$file->exists()) return false;
		$file->delete();
		return true;
	}

}
