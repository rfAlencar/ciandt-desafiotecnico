<?php
$input_file = "input.xml";
$output_file = "output.csv";

function fncCloseFile($file) {
    fclose($file) or die("Não foi possível fechar o arquivo!");
    return true;
}

function fncOpenCreateFile($file) {
	$output = fopen($file, 'w') or die("Não foi possível abrir/criar o arquivo!");
    return $output;
}

function getNodes($root) {   
    $output = array();

    if($root->children()) {
        $children = $root->children();   

        foreach($children as $child) {
            if(!($child->children())) {
                $output[] = (array) $child;
            }
            else {
                $output[] = getNodes($child->children());
            } 
        }
    }   
    else {
        $output = (array) $root;
    }   

    return $output;
}  

function fncConvertXmlToCsv($xml, $csv){
    foreach ($xml as $entry) {
        $data = get_object_vars($entry);
        // Decode HTML entities.
        $sanitized_data = array();
        foreach ($data as $key => $datum) {
          $sanitized_data[$key] = html_entity_decode($datum, ENT_COMPAT, 'UTF-8');
        }
        fputcsv($csv, $sanitized_data, ',', '"');
      }
}

function main() {
    global $input_file;
    global $output_file;

    //verifica se o arquivo existe
    if(file_exists($input_file)){

        //carregamento em variável do input (XML) e output (CSV)
        $xml = simplexml_load_file($input_file);
        $out = fncOpenCreateFile($output_file);

        fncConvertXmlToCsv($xml, $output);
        
        //fechamento do arquivo output
        fncCloseFile($out);
    } 
}

main();

?>
