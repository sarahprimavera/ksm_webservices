<?php

// require_once dirname(dirname(__FILE__)).'/core/Controller.php';
require_once dirname(__DIR__).'/models/clientModel.php';
require 'C:\Users\sarah\vendor\autoload.php';

    class Translate extends Controller{

        public function index(){
            
            $this->view('home');
        }

        public function __construct(){

            
            $this->model = new clientModel();
            
        }

        public function getInput(){
            if(!isset($_POST['translate'])){
                $this->view('Home');
             }
             else{
                //$this->uploadFile($_FILES["txtFile"]);
                //call api to actually do the translation here
                 $data = [
                    'api_key' => $_SESSION['api_key'],
                    'original_language' => $_POST['original_language'],
                    'target_language' => $_POST['target_language'],
                    'input_file' => $_FILES["txtFile"]['tmp_name'],
                    'output_file' => "wtv the api returns",
                     
                 ];

                var_dump($data);
                //post request to service
                //http://localhost/webservice/ksm_webservices/webservice_finalProject/webservice/api/Conversion/
             }
        }

        public function uploadFile($file){
            //uploading video
            try{
                $s3 = new Aws\S3\S3Client([
                    'region'  => 'us-east-1',
                    'version' => 'latest',
                    'credentials' => [
                        'key'    => "AKIAUTZKO3SNYPVE6ILQ",
                        'secret' => "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",
                    ]
                ]);
                $upload = $s3->upload('cnkbucket', $file['name'], fopen($file['tmp_name'], 'rb'), 'public-read');
                echo $upload;
                /*$key = 'ex.txt';
                
                $result = $s3->putObject([
                    'Bucket' => 'cnkbucket',
                    'Key'    => $key,
                    'Body'   => 'this is the body!',
                    'SourceFile' => $key,
                    'ACL'    => 'public-read'
                ]);
                
                echo "<pre>";
                var_dump($result);*/
            }catch (Exception $e) {
                die("Error: " . $e->getMessage());
            }
            /*try{
                $s3 = new Aws\S3\S3Client([
                    'region'  => 'us-east-1',
                    'version' => 'latest',
                    'credentials' => [
                        'key'    => "AKIAUTZKO3SNYPVE6ILQ",
                        'secret' => "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",
                    ]
                ]);
                
                $keyName = basename($key);
                
                $result = $s3->putObject([
                    'Bucket' => 'cnkbucket',
                    'Key'    => $keyName,
                    'Body'   => 'this is the body!',
                    'ACL'    => 'public-read'
                ]);
                
                echo "<pre>";
                var_dump($result);
            }catch (Exception $e) {
                die("Error: " . $e->getMessage());
              }*/
        }

        public function sendToService(){

        }
    
        
    }
?>