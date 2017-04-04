<?php 
/*
* Template name: Teste frete
*/

	// Sets the get query.
	$query = array(
		'TIPTRA'	=> '1',
		'CNPJCPF'	=> '19394172000115',
		'MUNORI'	=> 'Sao paulo',
		'ESTORI'	=> 'SP',
		'SEGPROD'	=> '000004', 			// Conforme nota fiscal
		'QTDVOL'	=> '1',					// Quantidade
		'PESO'		=> '160',
		'VALMER'	=> '9312',				// Valor das mercadorias
		'METRO3'	=> '1.5360',		
		'CNPJDES'	=> '11228894000198',
		'FILCOT'	=> '07',				// Filial Jamef
		'CEPDES'	=> '59090000'
	);
	$client = new SoapClient('http://www.jamef.com.br/webservice/JAMW0520.apw?WSDL', array(''));
	$result = $client->__soapCall('JAMW0520_03', array('parameters' => $query));
	$components = $result->JAMW0520_03RESULT->VALFRE->AVALFRE;
	if(!empty($components)){
		foreach($components as $component){
			if($component->COMPONENTE == 'TF-TOTAL DO FRETE'){
				echo number_format(floatval($component->TOTAL), 2 ,',', '.');
			}
		}
	}
?>