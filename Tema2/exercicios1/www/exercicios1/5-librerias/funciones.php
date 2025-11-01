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


        /*
---------------------------------------------------------
📘 DIFERENCIAS ENTRE include / require / include_once / require_once
---------------------------------------------------------

🔹 include
   - Inserta y ejecuta el contenido de otro fichero PHP.
   - Si el archivo no existe, muestra un *warning*, pero el script continúa.

🔹 require
   - Igual que include, pero si el archivo no existe, muestra un *error fatal*
     y detiene la ejecución del script.

🔹 include_once / require_once
   - Funcionan igual que los anteriores, pero aseguran que el fichero solo se
     incluya una vez, aunque se llame varias veces en el código.
---------------------------------------------------------
*/

?>