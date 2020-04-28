<?php

    function calcular($val1, $val2, $opt){

        $opt = $opt;
        $val1 = $val1;
        $val2 = $val2;

        global $chkSomar;
        global $chkSubtrair;
        global $chkMultiplicar;
        global $chkDividir;

        switch ($opt) {
            case "SOMAR":
                $resultado = $val1 + $val2;
                $chkSomar = "checked";
            break;
            
            case "SUBTRAIR":
                $resultado = $val2 - $val1;
                $chkSubtrair = "checked";
            break;

            case "MULTIPLICAR":
                $resultado = $val1 * $val2;        
                $chkMultiplicar = "checked";
            break;

            case "DIVIDIR":
                // tratement of division by zero(0)
                if($val2==0){
                    echo(ERRO_DIV_ZERO);
                }else{
                    $resultado = $val1 / $val2;   
                    $chkDividir = "checked";
                }
            break;
        default:
                echo("selecione uma opção!");
        };
        return $resultado;
    }

//  Stating of varialbe
$val1 = (float) 0;
$val2 = (float) 0;
$opt = (String) "";
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
    $val1 = $_POST['txtValor1'];
    $val2 = $_POST['txtValor2'];
    $opt = $_POST['rdOperacao'];


    //strtupper() - transform the write in uppercase
    //strtupper() - transform the write in lowercase


    if($val1=="" || $val2=="" || isset($_POST['rdOperacao'])==false)
        echo(ERRO_VAZIO);
    elseif(!is_numeric($val1) || !is_numeric($val2)){

        // strstr ou strchr - localize a character inside of a string
        // tratament for entry only of (.) instead of (,)
         if(strstr($val1,",")!="" || strstr($val2, ",")!= "")
            echo(ERRO_VIRGULA);
        else
            echo(ERRO_NAN);
    }else{
            $opt = strtoupper($_POST['rdOperacao']);
            // we create a function to realize a calculations 
            $result = calcular($val1, $val2,$opt);
        }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Calculadora</title>
</head>
<body>
    <header class="align_center">
        <h1 class="title" >Calculadora Simples</h1>
        <h2>Com function</h2>
    </header>
    <section id="box_calc" class="align_center">
        
        <form action="index.php" name="calculadora" method="post" id="frm_calc" class="align_center">
        <!-- top side of calculator (where the number inputs are in) -->
            <div id="frm_top">
                <div class="input_val align_center">
                    <div>
                        <label class="subtitle" for="txtValor1">Valor 1</label>
                    </div>
                    <input type="text" id="txtValor1" name="txtValor1" value="<?=$val1?>">
                </div>
                <div class="input_val align_center">
                    <div>
                        <label class="subtitle" for="txtValor2">Valor 2</label>
                    </div>
                    <input type="text" id="txtValor2" name="txtValor2" value="<?=$val2?>">
                </div>
            </div>
            <!-- bottom side (where the calc options are in) -->
            <div id="frm_bottom">

                <div class="rd_opt align_center">
                    <input type="radio" id="rd_sum" name="rdOperacao" value="somar"<?=$chkSomar?>>
                    <label class="subtitle" for="rd_sum">Somar</label>
                </div>

                <div class="rd_opt align_center">  
                    <input type="radio" id="rd_sub" name="rdOperacao" value="subtrair" <?=$chkSubtrair?>>
                    <label class="subtitle" for="rd_sub">Subtrair</label>
                </div>

                <div class="rd_opt align_center">
                    <input type="radio" id="rd_multi" name="rdOperacao" value="multiplicar" <?=$chkMultiplicar?>>
                    <label class="subtitle" for="rd_multi">Multiplicar</label>
                </div>

                <div class="rd_opt align_center">
                    <input type="radio" id="rd_split" name="rdOperacao" value="dividir" <?=$chkDividir?>>
                    <label class="subtitle" for="rd_split">Dividir</label>
                </div>
                <div id="box_btn" class="align_center">
                    <button type="submit" id="btn_calc" name="btnCalcular" value="">calcular</button>
                </div>
            </div>
        </form>
        
        <div id="result_part" class="align_center">
            <div id="box_result" class="align_center">
                <h1 name="txtResultado"> <?= round($result,2) ?></h1>
            </div>
        </div>
    </section>
    <footer class="align_center"></footer>
</body>
</html>