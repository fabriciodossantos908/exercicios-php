<?php

/*
    Tipos de dados 

    String - String
    int/integer - integer
    float - real 
    Double - Real with more space
    bool / boolean - true / false
    array - matriz de dados
    object - object

    $variável = (tipe of the data) ""

    gettype() - return the variable type

    settype() - change data type to variable

    $valor1 = (int) 0;

    gettype($valor1); // return variable as integer

    settype($valor1, "double"); // change a integer variable to double(real)
*/

// Use the command round() to format of qtd of decimal after the doc
//Ex: round($resultado,2)

//  Stating of varialbe
$valor1 = (float) 0;
$valor2 = (float) 0;
$operacao = (String) "";
$resultado = (double) 0;

$chkSomar = (String)  "";
$chkSubtrair = (String)  "";
$chkMultiplicar = (String)  "";
$chkDividir = (String)  "";

// constants
define("ERRO_VAZIO", "Por favor preencha a todos os valores!");
define("ERRO_NAN", "Por favor entre apenas com números!");
define("ERRO_VIRGULA", "Por favor substituir o caracter vírgula(,) pelo ponto(.) !");

const ERRO_DIV_ZERO = "Impossível fazer divisão por (0)";

// validate if the botton was clicked
if(isset($_POST['btnCalcular']))
{
    // rescue values digited by user
    $valor1 = $_POST['txtValor1'];
    $valor2 = $_POST['txtValor2'];
    $operacao = $_POST['rdOperacao'];


    //strtupper() - transform the write in uppercase
    //strtupper() - transform the write in lowercase


    if($valor1=="" || $valor2=="" || isset($_POST['rdOperacao'])==false)
        echo(ERRO_VAZIO);
    elseif(!is_numeric($valor1) || !is_numeric($valor2)){

        // strstr ou strchr - localize a character inside of a string
        // tratament for entry only of (.) instead of (,)
         if(strstr($valor1,",")!="" || strstr($valor2, ",")!= "")
            echo(ERRO_VIRGULA);
        else
            echo(ERRO_NAN);
    }else{
            $operacao = strtoupper($_POST['rdOperacao']);

            // Verify which the operation will be realized
            if($operacao=="SOMAR"){
                $resultado = $valor1 + $valor2;
                $chkSomar = "checked";
            }
            elseif ($operacao=="SUBTRAIR"){
                $resultado = $valor2 - $valor1;
                $chkSubtrair = "checked";
            }
            elseif ($operacao=="MULTIPLICAR"){
                $resultado = $valor1 * $valor2;        
                $chkMultiplicar = "checked";
            }
            elseif ($operacao=="DIVIDIR"){
                if($valor2==0){
                    echo(ERRO_DIV_ZERO);
                }else{
                    $resultado = $valor1 / $valor2;   
                    $chkDividir = "checked";
                }
                }
        }
}

?>