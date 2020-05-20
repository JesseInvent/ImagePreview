<?php namespace App\Controllers;

class Form extends BaseController
{
	public function index()
	{
		return view('form');
    }
    
    public function store() {

        helper(['form', 'url']);
        $db = \Config\Database::connect();
        $builder = $db->table('file');

       $files = $this->request->getFiles();

        foreach($files['images'] as $file) {

            if($file->isValid() && !$file->hasMoved()){

                $name[] = $file->getName();
                $ext = strtolower($file->getExtension());

                if(in_array($ext, ['jpg', 'jpeg', 'png'])){

                    $newName = uniqid('GCMI-',true).'.'.$ext;
                
                    $file->move(WRITEPATH . 'uploads', $newName);

                    $data = [

                        'name' => $file->getClientName(),
                        'type' => $file->getExtension()
                    ];

                    $builder->insert($data);
                }
           }
        }
            
        $msg = "Images successfully uploaded";

            return redirect()->to(base_url('form'))->with('msg', $msg);
    
        }
        
    

	//--------------------------------------------------------------------

}
