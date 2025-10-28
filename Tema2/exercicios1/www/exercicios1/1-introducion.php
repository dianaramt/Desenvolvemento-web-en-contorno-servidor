<html>
    <head>
        <title>Exercicio 1</title>
        <meta charset="utf8">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="containerfluid">
        
        <!TAREA 1. Localizar errores. >

        <?php #aqui o php non estaba ao lado de ?
        echo '¿Cómo estás? <br>'; # podemos facer salto de linha
        echo "Estoy bien, gracias."; 
        ?> <!había un ? de máis>

        <! TAREA 2 Variable, declaración. >
<?php
        $valor;  #faltaballe o dolar
        $_N; #ben
        $valor_actual; #ben
        $n; #ben
        $datos; #non pode ir o hashtag
        $valorInicial0; #ben
        $probavalor; #non pode ir a coma 
        $saldo2; #non pode ir o numero despois do dolar xa
        $n; #ben 
        $meuProblema; #ben
        $meuProblema; #non pode ir separado
        $echo; #palabra reservada (?)
        $mandm; #non pode ir o ampersand
        $registro; #ben
        $ABC; #ben
        $Nome85; #non pode ir un numero despois do dolar xa
        $AAAAAAAAA; #ben
        $nome_apelidos; #ben
        $saldoActual; #ben
        $noventae2; #non poden ir numeros solo
        $idade1234; #non pode ir un asterisco

        ?>

        <!--TAREA 3. Funciones para trabajar con tipos de datos-->

        <?php

        $a = "true"; // imprime el valor devuelto por is_bool($a)...
        print("<br>".is_bool($a)); //é false ("") xa que "true" non é un booleano
        $b = 0; // imprime el valor devuelto por is_bool($b)...; y se entra dentro de if($b) {...}
        print("<br>".is_bool($b)); //non é booleano, imprime cadea vacía
        if($b){
            print("entrou");
        }else{
            print("non entrou"); //non é, imprime non entrou
        }
        $c = "false"; // imprime el valor devuelto por gettype($c);
        print("<br>".gettype($c)); //devolve string
        
        $d = ""; // el valor devuelto por empty($d);
        print("<br>".empty($d)); //devolve 1 xa que é empty xa que unha cadea vacía considerase empty
        $e = 0.0; // el valor devuelto por empty($e);
        print("<br>".empty($e)); //o 0.0 tamén se considera empty, devolve 1
        $f = 0; // el valor devuelto por empty($f);
        print("<br>".empty($f)); // o 0 tamén se considera empty, devolve 1
        $g = false; // el valor devuelto por empty($g);
        print("<br>".empty($g)); //o false tamén se considera empty, devolve 1
        $h; // el valor devuelto por empty($h);
        print("<br>".empty($h));//que non esté inicializado o valor tamén se considera empty, devolve 1
        $i = "0"; // el valor devuelto por empty($i);
        print("<br>".empty($i)); //tamén se considera empty, devolve 1


        $k = true; // el valor devuelto por isset($k);
        print("<br>".isset($k)); //devolve 1
        $l = false; // el valor devuelto por isset($l);
        print("<br>".isset($l)); //devolve 1


        $m = true; // el valor devuelto por is_numeric($m);
        print("<br>".is_numeric($m)); //devolve cadea vacia, porque non é numerico
        $n = ""; // el valor devuelto por is_numeric($n);
        print("<br>".is_numeric($n)); //devolve cadea vacia, porque non é numerico

        
        ?>

        <!--TAREA 4. Variables globales. -->

        <?php
         phpinfo();

        ?>

        <!--TAREA 5. Operadores -->

        <?php

        function fahrenheit_a_celsius($graos){
            return $resultado= (($graos-32)*5)/9;
            
        }

        echo fahrenheit_a_celsius(100);

        ##################################################
        function suma($a, $b){
            return $a + $b;
        }

        function resta($a, $b){
            return $a - $b;
            
        }

        function multiplicacion($a, $b){
            return $a * $b;
        }


        function division($a, $b){
            return $a/$b;
        }
        function modulo($a, $b){
            return $a%$b;
        }

        $x=20; $y =10;
        print("<br>".suma($x, $y));
        print("<br>".resta($x, $y));
        print("<br>".multiplicacion($x, $y));
        print("<br>".division($x, $y));
        print("<br>".modulo($x, $y));

        ##################################3

        $x=1;
        while($x<=30){
            print("<br>". $x **2);

            $x = $x +1;
        }

    
        ###################################

        function area_rectangulo($base, $altura){
            return $base*$altura;
        }

        function perimetro_rectangulo($base, $altura){
            return 2*$base+2*$altura;
        }

        $base=20; $altura=10;
        print("<br> Base do rectangulo: ".area_rectangulo($base, $altura));
        print("<br> Perímetro do rectangulo: ".perimetro_rectangulo($base, $altura));

        ?>
        <!--TAREA 6. Cadenas -->
        <?php
        echo "<br> <i> Hola, Mundo!<i>";

        ##################

        $nome="Diana";
        echo "<br> Bienvenida <strong>{$nome} <strong> ";

        ?>
        </div>  
    </body>
</html>
