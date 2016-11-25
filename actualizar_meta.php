<?php
/**
 * Actualiza una meta especificada por su identificador
 */

require 'Meta.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Decodificando formato Json
    $body = json_decode(file_get_contents("php://input"), true);

    // Actualizar meta
    $retorno = Meta::update(
        $body['idMeta'],
        $body['titulo'],
        $body['descripcion'],
        $body['fechaLim'],
        $body['categoria'],
        $body['prioridad']);

    if ($retorno) {
        // C�digo de �xito
        print json_encode(
            array(
                'estado' => '1',
                'mensaje' => 'Actualizaci�n �xitosa')
        );
    } else {
        // C�digo de falla
        print json_encode(
            array(
                'estado' => '2',
                'mensaje' => 'Actualizaci�n fallida')
        );
    }
}

