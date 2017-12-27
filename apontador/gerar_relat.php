<?php  
  require_once "conexao.php";  
  require_once "../pdf/mpdf.php";  

  class reportCliente extends mpdf{  

    // Atributos da classe  
    private $pdo  = null;  
    private $pdf  = null;
    private $css  = null;  
    private $titulo = null; 
 
    /*  
    * Construtor da classe  
    * @param $css  - Arquivo CSS  
    * @param $titulo - Título do relatório   
    */  
    public function __construct($css, $titulo) {  
      $this->pdo  = Conexao::getInstance();  
      $this->titulo = $titulo;  
      $this->setarCSS($css);  
    }
  
    /*  
    * Método para setar o conteúdo do arquivo CSS para o atributo css  
    * @param $file - Caminho para arquivo CSS  
    */  
    public function setarCSS($file){  
     if (file_exists($file)):  
       $this->css = file_get_contents($file);  
     else:  
       echo 'Arquivo inexistente!';  
     endif;  
    }  

    /*  
    * Método para montar o Cabeçalho do relatório em PDF  
    */  
    protected function getHeader(){  
       $data = date('j/m/Y');  
       $retorno = "<table class=\"tbl_header\" width=\"1000\">  
               <tr>  
                 <td align=\"left\">Biblioteca mPDF</td>  
                 <td align=\"right\">Gerado em: $data</td>  
               </tr>  
             </table>";  
       return $retorno;  
     }  

     /*  
     * Método para montar o Rodapé do relatório em PDF  
     */  
     protected function getFooter(){  
       $retorno = "<table class=\"tbl_footer\" width=\"1000\">  
               <tr>  
                 <td align=\"left\"><a href=''>devwilliam.blogspot.com</a></td>  
                 <td align=\"right\">Página: {PAGENO}</td>  
               </tr>  
             </table>";  
       return $retorno;  
     }  

    /*   
    * Método para construir a tabela em HTML com todos os dados  
    * Esse método também gera o conteúdo para o arquivo PDF  
    */  
    private function getTabela(){  
      $color  = false;  
      $retorno = "";  

      $retorno .= "<h2 style=\"text-align:center\">{$this->titulo}</h2>";  
      $retorno .= "<table border='1' width='1000' align='center'>  
           <tr class='header'>  
             <th>Nome</td>  
             <th>Telefone</td>  
             <th>Idade</td>  
             <th>Profissão</td>  
             <th>E-mail</td>  
             <th>Endereço</td>  
             <th>Cidade</td>  
             <th>Estado</td>  
           </tr>";  
<div style="clear:both; margin-top:0em; margin-bottom:1em;"><a href="http://www.devwilliam.com.br/php/corrigir-charset-em-paginas-php" target="_blank" rel="nofollow" class="ue6df31f4a408f3f3c4a2a27443a85bd9"><!-- INLINE RELATED POSTS 1/3 //--><style> .ue6df31f4a408f3f3c4a2a27443a85bd9 , .ue6df31f4a408f3f3c4a2a27443a85bd9 .postImageUrl , .ue6df31f4a408f3f3c4a2a27443a85bd9 .centered-text-area { min-height: 80px; position: relative; } .ue6df31f4a408f3f3c4a2a27443a85bd9 , .ue6df31f4a408f3f3c4a2a27443a85bd9:hover , .ue6df31f4a408f3f3c4a2a27443a85bd9:visited , .ue6df31f4a408f3f3c4a2a27443a85bd9:active { border:0!important; } .ue6df31f4a408f3f3c4a2a27443a85bd9 .clearfix:after { content: ""; display: table; clear: both; } .ue6df31f4a408f3f3c4a2a27443a85bd9 { display: block; transition: background-color 250ms; webkit-transition: background-color 250ms; width: 100%; opacity: 1; transition: opacity 250ms; webkit-transition: opacity 250ms; background-color: #2980B9; box-shadow: 0 1px 2px rgba(0, 0, 0, 0.17); -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.17); -o-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.17); -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, 0.17); } .ue6df31f4a408f3f3c4a2a27443a85bd9:active , .ue6df31f4a408f3f3c4a2a27443a85bd9:hover { opacity: 1; transition: opacity 250ms; webkit-transition: opacity 250ms; background-color: #D35400; } .ue6df31f4a408f3f3c4a2a27443a85bd9 .centered-text-area { width: 100%; position: relative; } .ue6df31f4a408f3f3c4a2a27443a85bd9 .ctaText { border-bottom: 0 solid #fff; color: #ECF0F1; font-size: 16px; font-weight: bold; margin: 0; padding: 0; text-decoration: underline; } .ue6df31f4a408f3f3c4a2a27443a85bd9 .postTitle { color: #FFFFFF; font-size: 16px; font-weight: 600; margin: 0; padding: 0; width: 100%; } .ue6df31f4a408f3f3c4a2a27443a85bd9 .ctaButton { background-color: #3498DB!important; color: #ECF0F1; border: none; border-radius: 3px; box-shadow: none; font-size: 14px; font-weight: bold; line-height: 26px; moz-border-radius: 3px; text-align: center; text-decoration: none; text-shadow: none; width: 80px; min-height: 80px; background: url(http://www.devwilliam.com.br/wp-content/plugins/intelly-related-posts/assets/images/simple-arrow.png)no-repeat; position: absolute; right: 0; top: 0; } .ue6df31f4a408f3f3c4a2a27443a85bd9:hover .ctaButton { background-color: #E67E22!important; } .ue6df31f4a408f3f3c4a2a27443a85bd9 .centered-text { display: table; height: 80px; padding-left: 18px; top: 0; } .ue6df31f4a408f3f3c4a2a27443a85bd9 .ue6df31f4a408f3f3c4a2a27443a85bd9-content { display: table-cell; margin: 0; padding: 0; padding-right: 108px; position: relative; vertical-align: middle; width: 100%; } .ue6df31f4a408f3f3c4a2a27443a85bd9:after { content: ""; display: block; clear: both; } </style><div class="centered-text-area"><div class="centered-text" style="float: left;"><div class="ue6df31f4a408f3f3c4a2a27443a85bd9-content"><span class="ctaText">Post relacionado:</span>  <span class="postTitle">Corrigir charset em páginas PHP</span></div></div></div><div class="ctaButton"></div></a></div>
      $sql = "SELECT * FROM TAB_CLIENTE";  
      foreach ($this->pdo->query($sql) as $reg):  
         $retorno .= ($color) ? "<tr>" : "<tr class=\"zebra\">";  
         $retorno .= "<td class='destaque'>{$reg['nome']}</td>";  
         $retorno .= "<td>{$reg['fone']}</td>";  
         $retorno .= "<td>{$reg['idade']}</td>";  
         $retorno .= "<td>{$reg['profissao']}</td>";  
         $retorno .= "<td>{$reg['email']}</td>";  
         $retorno .= "<td>{$reg['endereco']}</td>";  
         $retorno .= "<td>{$reg['cidade']}</td>";  
         $retorno .= "<td>{$reg['uf']}</td>";  
       $retorno .= "<tr>";  
       $color = !$color;  
      endforeach;  

      $retorno .= "</table>";  
      return $retorno;  
    } 

    /*   
    * Método para construir o arquivo PDF  
    */  
    public function BuildPDF(){  
     $this->pdf = new mPDF('utf-8', 'A4-L');  
     $this->pdf->WriteHTML($this->css, 1);  
     $this->pdf->SetHTMLHeader($this->getHeader());  
     $this->pdf->SetHTMLFooter($this->getFooter());  
     $this->pdf->WriteHTML($this->getTabela());   
    }   

    /*   
    * Método para exibir o arquivo PDF  
    * @param $name - Nome do arquivo se necessário grava-lo  
    */  
    public function Exibir($name = null) {  
     $this->pdf->Output($name, 'I');  
    }  
  }   