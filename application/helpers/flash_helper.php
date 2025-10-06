<?php
function show_flash($ci, $tipo = 'erro') {
    $msg = $ci->session->flashdata($tipo);
    if ($msg) {
        // Mapear tipos para classes do Bootstrap
        switch ($tipo) {
            case 'sucesso':
                $classe = 'success';
                break;
            case 'aviso':
                $classe = 'warning';
                break;
            default:
                $classe = 'danger';
        }
        echo "<div class='alert alert-$classe' role='alert'>$msg</div>";
    }
}