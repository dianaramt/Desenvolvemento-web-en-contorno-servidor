<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funcións</title>
</head>
<body>
    <?php
        function funcion1($caracter){
            if (is_numeric($caracter)){
                if ($caracter>=0&&$caracter<=9){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            
            }
        }


        echo funcion1(2);
        echo funcion1("2");
        echo funcion1("olaa");

        echo "<br>";

        function funcion2($cadea){
            return strlen($cadea);

        }

        echo funcion2("ola"); 
        echo funcion2(23); #tamen funciona con numeros (!)
        echo "<br>";

        function funcion3($a, $b){
            return ($a ** $b);
        }

        echo funcion3(3,2);

         echo "<br>";
        
        function funcion4($caracter){
            if(strlen($caracter)==1){
                $lower = strtolower($caracter);
                switch ($lower) {
                    case 'a':
                        return true;
                    case 'e':
                        return true;
                    case 'i':
                        return true;
                    case 'o':
                        return true;
                    case 'u':
                        return true;
                    default:
                        return false;
              
                }

            }else{
                return false;
            }
        }

        echo funcion4("ola");
        echo funcion4(6);
        echo funcion4("a");

        echo "<br>";

        function funcion5($num){
            if ($num%2==0){
                return "é par";
            }else{
                return "é impar";
            }
        }

        echo funcion5(3);
        echo funcion5(2);
        echo "<br>";

        function funcion6($cadea){
            return strtoupper($cadea);
        }

        echo funcion6("Ola");

        function funcion7() {
            $zona = date_default_timezone_get();
            echo "La zona horaria por defecto es: <strong>$zona</strong><br>";
        }

        funcion7();

        date_default_timezone_set('Europe/Madrid'); #importante para que sea UTC+1 

         function funcion8($latitud = 42.8782, $longitud = -8.5448) //imprimir salida sol
                {
                    $info = date_sun_info(time(), $latitud, $longitud);
                
                    echo 'Hora de salida del sol: ' . date("H:i:s", $info['sunrise']) . '<br>';
                    echo 'Hora de puesta del sol: ' . date("H:i:s", $info['sunset']) . '<br>';
                }

                funcion8();
            ?>

    <!--TAREA 2- PROGRAMA MDO DNI -->

    <?php
        function comprobarDni($comprobar){

            if (strlen($comprobar)!=9){
                return false;
        
          
            }else{
                $numero = substr($comprobar, 0, 8);
                $letra = substr($comprobar, 8, 1);
                $resto = $numero%23;
                $letraTeoria;

                switch ($resto) {
                    case 0:  $letraTeoria = "T"; break;
                    case 1:  $letraTeoria = "R"; break;
                    case 2:  $letraTeoria = "W"; break;
                    case 3:  $letraTeoria = "A"; break;
                    case 4:  $letraTeoria = "G"; break;
                    case 5:  $letraTeoria = "M"; break;
                    case 6:  $letraTeoria = "Y"; break;
                    case 7:  $letraTeoria = "F"; break;
                    case 8:  $letraTeoria = "P"; break;
                    case 9:  $letraTeoria = "D"; break;
                    case 10: $letraTeoria = "X"; break;
                    case 11: $letraTeoria = "B"; break;
                    case 12: $letraTeoria = "N"; break;
                    case 13: $letraTeoria = "J"; break;
                    case 14: $letraTeoria = "Z"; break;
                    case 15: $letraTeoria = "S"; break;
                    case 16: $letraTeoria = "Q"; break;
                    case 17: $letraTeoria = "V"; break;
                    case 18: $letraTeoria = "H"; break;
                    case 19: $letraTeoria = "L"; break;
                    case 20: $letraTeoria = "C"; break;
                    case 21: $letraTeoria = "K"; break;
                    case 22: $letraTeoria = "E"; break;
                     default: $letraTeoria = "?"; 
                    break;
                }
                if ($letra==$letraTeoria){
                    return true;
                }else{
                    return false;
                }
            }

        }
        echo comprobarDni("49665037A"); 
    ?>
    
</body>
</html>