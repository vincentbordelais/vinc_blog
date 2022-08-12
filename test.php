<?php

try {
    throw new Exception('mon exception');
    // Un lancé d'exception remonte jusqu'au bloc try et coupe l'excécusion donc le echo "Je continue" ne sera pas exécuté. Ensuite, étant donné qu'une exception a été attrapée, c'est le bloc catch qui  est exécuté, qui affiche via le die le message renseigné au niveau de l'exception. 
    echo "Je continue";
} catch (Exception $exception) {
    die($exception->getMessage());
}
