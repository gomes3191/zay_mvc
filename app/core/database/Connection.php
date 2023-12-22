<?php
namespace App\Core\Database;
use App\Core\App;
use PDO;
use PDOException;

class Connection
{

    // Cria uma conexão com o BD persistente para a aplicação.
    public static function make($config)
    {
        try {
            return new PDO(
                $config['connection'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        }
        catch (PDOException $e) {
            App::logError('Houve uma exceção de PDO. Detalhes: ' . $e);
            if (App::get('config')['options']['debug']) {
                return view('error', ['error' => $e->getMessage()]);
            }
            return view('error');
        }
    }
}
