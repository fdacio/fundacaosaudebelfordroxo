<?php
namespace App\Controller\Component;

use Cake\Controller\Component;
use Cake\Utility\Text;
use Cake\Core\Exception\Exception;

/**
 * Upload component
 */
class UploadComponent extends Component
{

    /**
     * $inputFile - input tipo file do HTML
     */
    public function enviarImagem($inputFile, $local)
    {
        if (! empty($inputFile)) {
            
            $filename = ($inputFile['name']);
            $type = $inputFile['type'];
            $size = $inputFile['size'];
            $size = $size / (1024 * 1024 * 1); // Tamanho em megabytes;
            $file_tmp_name = $inputFile['tmp_name'];
            
            $extAllowed = array(
                'image/png',
                'image/jpg',
                'image/jpeg'
            );
            $sizeAllowed = 1; // 1Mb
            $dirUpload = WWW_ROOT . 'img' . DS . $local;
            
            if (! file_exists($dirUpload)) {
                mkdir($dirUpload); // padrão permissao 0777
            }
            
            if (in_array($type, $extAllowed)) {
                if ($size <= $sizeAllowed) {
                    if (is_uploaded_file($file_tmp_name)) {
                        $filename = Text::uuid() . '-' . $filename;
                        if (move_uploaded_file($file_tmp_name, $dirUpload . DS . $filename)) {
                            return "$local/$filename";
                        } else {
                            throw new Exception("Erro ao realizar upload da imagem. Tente novamente.");
                        }
                    } else {
                        throw new Exception("Erro ao realizar upload da imagem. Arquivo em uso.");
                    }
                } else {
                    throw new Exception("Erro ao realizar upload da imagem. Arquivo maior que 1 Megabyte.");
                }
            } else {
                throw new Exception("Tipo de arquivo não é permitido." . $type);
            }
        }
        return NULL;
    }

    public function enviarDocumento($inputFile)
    {
        $tamanhoArq = 1048576; /* 1 MByte */
        $uploadDirDocumentos = 'docs';
        $mimeTypeDocumentos = [
            "application/pdf"
        ];
        
        if (! empty($inputFile['name'])) {
            $uniqueFilename = Text::uuid() . '-' . $inputFile['name'];
            
            if (! file_exists(WWW_ROOT . DS . $uploadDirDocumentos)) {
                mkdir(WWW_ROOT . DS . $uploadDirDocumentos); // padrão permissao 0775
            }
            
            if (in_array($inputFile['type'], $mimeTypeDocumentos)) {
                if (is_uploaded_file($inputFile['tmp_name'])) {
                    if ($inputFile['size'] <= $tamanhoArq) {
                        if (move_uploaded_file($inputFile['tmp_name'], WWW_ROOT . DS . $uploadDirDocumentos . DS . $uniqueFilename)) {
                            return $uploadDirDocumentos . "/" . $uniqueFilename;
                        } else {
                            throw new Exception("Houve um erro durante transferência do arquivo. Tente novamente");
                        }
                    } else {
                        throw new Exception("O tamanho do arquivo é maior que o permitido.");
                    }
                } else {
                    throw new Exception("Houve um erro durante transferência do arquivo. Tente novamente");
                }
            } else {
                throw new Exception("Tipo de arquivo incorreto");
            }
        }
        return NULL;
    }
}

