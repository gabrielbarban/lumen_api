<?php

namespace App\Http\Controllers;

class MostraDadosController extends Controller
{
    public function __construct()
    {
        //metodo construtor
    }

    public function exibemsg($id)
    {
        // carrego os dados
        $apiKey = "APIKEY";
        $nome = "FICATRANQUILO SERVICOS DE CONTABILIDADE LTDA";
        $cpfCnpj = "10245240000100";
        $email = "contato@ficatranquilo.com.br";

        //pego o cliente
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.asaas.com/api/v3/customers?cpfCnpj=".$cpfCnpj);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "access_token: ".$apiKey
        ));
        $response = curl_exec($ch);
        curl_close($ch);
        $Cliente = json_decode($response);
        $ClienteID = 0;
        foreach($Cliente->data as $cliente){
            echo "Nome do Cliente: ".$cliente->name."<br>";
            echo "ID do Cliente: ".$cliente->id."<br>";
            $ClienteID = $cliente->id;
        }
        echo "<br><Br><br><Br><br><Br>";




        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://www.asaas.com/api/v3/payments");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "{
          \"customer\": \"{$ClienteID}\",
          \"billingType\": \"BOLETO\",
          \"dueDate\": \"2021-07-10\",
          \"value\": 100,
          \"description\": \"bla bla bla qualquer coisa\",
          \"externalReference\": \"056984\",
          \"discount\": {
            \"value\": 10,
            \"dueDateLimitDays\": 0
          },
          \"fine\": {
            \"value\": 1
          },
          \"interest\": {
            \"value\": 2
          },
          \"postalService\": true
        }");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
          "Content-Type: application/json",
          "access_token: ".$apiKey
        ));

        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
