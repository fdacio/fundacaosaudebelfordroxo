<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\ORM\TableRegistry;

/**
 * Planilha component
 */
class PlanilhaComponent extends Component
{
    private $Planilha;
    
    public function planilha($model, $records = null)
    {
        $this->Planilha = TableRegistry::getTableLocator()->get($model);
        if ($records === null) {
            $database = $this->Planilha->find();
            $dbNumOfLine =$this->Planilha->find()->count();
        } else {
            $database = $records;
            $dbNumOfLine = count($database);
        }
        
        $header = '';
        $data = '';
        
        /**
         * Header
         */
        foreach ($database as $records) {
        }

        foreach ($records as $key => $value) {
            $header .= $key . "\t";
        }
        /**
         * End Header
         */
        
        /**
         * Create content sheet
         */
        $dados = $database;
        
        for($i = 0; $i < $dbNumOfLine; $i++) {
        
            $line = '';
            $row = $dados[$i];
            
            foreach ($row as $key => $value) {
                
                if(!(isset($value)) OR ($value == "")) {
                    $value = "\t";    
                } else {
                    $value = str_replace('"', '""', $value);
                    $value = '"' . $value . '"' . "\t";
                }
                
                $line .= $value; 
            }
            
            $data .= trim($line) . "\r\n";
        }
        
        $data = str_replace("\r", "", $data);
        /**
         * End create content sheet
         */
        
        if($data == "") {
            $data = "\n(0) Records Found!\n";
        } else {
            header("Content-Type: application/x-msdownload; charset=ISO-8859-1");
            header("Content-Disposition: attachment; filename=$model.xls");
            header("Pragma: no-cache");
            header("Expires: 0");
            print "$header\n$data";
            exit();
        }

    }
}
