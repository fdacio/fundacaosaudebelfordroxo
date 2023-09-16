<?php
namespace App\Report;

use App\FuncoesGerais;

class InscricaoPdf extends ReportPdf
{

    public function setContent($candidato)
    {
        $funcoesGerais = new FuncoesGerais();
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(170, 5, utf8_decode('Cargo'), 'TLR');
        $this->Cell(20, 5, utf8_decode('Nº Inscrição'), 'TLR');
        $this->Ln();
        $this->Cell(170, 5, utf8_decode($candidato->cargo->nome), 'TLR');
        $this->Cell(20, 5, $candidato->id, 'TLR');
        $this->Ln();
        
        $this->SetFont('Arial', 'B', 12);
        $this->Cell(190, 5, 'Dados do Candidato', 1, 0, 'C');
        $this->Ln();
        
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(40, 5, 'CPF', 'LTR');
        $this->Cell(150, 5, 'Nome', 'LTR');
        $this->Ln();
        $this->SetFont('Arial', '', 10);
        $this->Cell(40, 5, $funcoesGerais->formataCpf($candidato->cpf), 'LBR');
        $this->Cell(150, 5,utf8_decode($candidato->nome), 'LBR');
        $this->Ln();
      
    }
}
?>