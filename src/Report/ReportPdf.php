<?php
namespace App\Report;

use App\Fpdf\Fpdf;

abstract class ReportPdf extends Fpdf
{

    private $isHeader = true;
    
    private $isFooter = true;
    
    private $logo;

    private $titleHeader;

    private $user;

    private $datetime;

    private $pageSize = 'A4';

    public function __construct($title, $isHeader = true, $orientation = 'P')
    {
        parent::__construct($orientation, "mm", $this->pageSize);
        
        $this->setTitleHeader(utf8_decode($title));
        $this->SetAuthor('saude.belfordroxo');
        $this->SetCreator('saude.belfordroxo');
        $this->SetTitle(utf8_decode($title));
        $this->setIsHeader($isHeader);
        $this->AliasNbPages();
        $this->AddPage();
    }

    public function setIsHeader($boolean)
    {
        $this->isHeader = $boolean;
    }
    
    public function getIsHeader()
    {
        return $this->isHeader;
    }
 
    public function setIsFooter($boolean)
    {
        $this->isFooter = $boolean;
    }
    
    public function getIsFooter()
    {
        return $this->isFooter;
    }
    
    public function setLogo($logo)
    {
        $this->logo = $logo;
    }

    public function getLogo()
    {
        return $this->logo;
    }

    public function setTitleHeader($titleHeader)
    {
        $this->titleHeader = $titleHeader;
    }

    public function getTitleHeader()
    {
        return $this->titleHeader;
    }

    public function setUser($user)
    {
        $this->user = $user;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function setDateTime($datetime)
    {
        $this->datetime = $datetime;
    }

    public function getDateTime()
    {
        return $this->datetime;
    }

    public function setPageSize($pageSize)
    {
        $this->pageSize = $pageSize;
    }

    public function getPageSize()
    {
        return $this->pageSize;
    }

    public function filtros($filtros)
    {
        $this->SetFont('times', 'B', 6);
        $this->Cell(0, 5, 'FILTROS', 0, 1);
        $this->SetFont('times', '', 6);
        foreach ($filtros as $key => $value) {
            $this->SetWidths([
                30,
                40
            ]);
            $this->SetAligns([
                'R',
                'L'
            ]);
            $this->Row([
                utf8_decode($key),
                utf8_decode($value)
            ]);
        }
        $this->Ln();
    }

    // Page header
    public function Header()
    {
        if ($this->isHeader) {

            $x1 = $this->GetX();
            $y1 = $this->GetY();
            
            $logo = 'img/logo_prefeitura.png';
            $file_headers = @get_headers($logo);
            if(!($file_headers[0] == 'HTTP/1.1 404 Not Found')) {
                $this->Image($logo, 12, 12, 25, 25);
            }
            
            
            $this->Ln(3);
            $this->SetFont('Arial', 'B', 12);
            

            $this->setX(45);
            $this->Cell(145, 5, utf8_decode('Processo Seletivo Fundação Saúde - 2023'), 0, 1, 'R');
            $this->setX(45);
            $this->Cell(145, 5, utf8_decode('Prefeitura Municipal de Belford Roxo - RJ'), 0, 1, 'R');
            
            if ($this->getTitleHeader() != "") {
                $this->Ln();
                $this->Cell(0, 5, $this->getTitleHeader(), 0, 1, 'C');
                $this->Ln(5);
            }
            
            $y2 = $this->GetY();
            $this->Rect($x1, $y1, 190, $y2-$y1);
            $this->Ln();
        }
    }
    
    public abstract function setContent($dataObject);

    // Page footer
    public function Footer()
    {
        if ($this->isFooter) { 
            $this->SetY(- 15);
            $this->SetFont('times', '', 9);
            
            $this->Cell(95, 10, utf8_decode('Página ') . $this->PageNo() . ' de {nb}', 'T', 0, 'L');
            date_default_timezone_set('America/Sao_Paulo');
            $dataLocal = date('d/m/Y H:i', time());
            $this->setDateTime($dataLocal);
            $this->Cell(95, 10, $this->getDateTime(), 'T', 0, 'R');
        }
    }

    public function download($filename = 'report.pdf')
    {
        ob_end_clean();
        $this->Output('D', $filename);
    }
}
?>