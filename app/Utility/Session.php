<?php

namespace App\Utility;

/**
 * Session: classe responsável por gerir as sessões.
 *
 * @since 0.1
 */
class Session {

    /**
     * Delete: exclui o valor de uma chave específica da sessão.
     *
     * @param string $key - valor do tipo string.
     *
     * @return boolean - retorna true|false
     */
    public static function delete($key) : bool {
        if (self::exists($key)) {
            unset($_SESSION[$key]);
            return true;
        }

        return false;
    }

    /**
     * Destroy: exclui a sessão.
     *
     * @return void
     */
    public static function destroy() : void {
        session_destroy();
    }

    /**
     * Exists: verifica se existe uma chave específica de uma sessão.
     *
     * @param string $key
     *
     * @return boolean - retorna true|false.
     */
    public static function exists($key) : bool {
        return(isset($_SESSION[$key]));
    }

    /**
     * Get: retorna o valor de uma chave específica da sessão, se ela existir.
     *
     * @param string $key
     *
     * @return mixed
     */
    public static function get($key) : mixed {
        if (self::exists($key)) {
            return($_SESSION[$key]);
        }

        return false;
    }

    /**
     * Init: inicia a sessão.
     *
     * @return void
     */
    public static function init() : void {
        // Se nenhuma sessão existe, inicie a sessão.
        if (session_id() == "") {
            session_start();
        }
    }

    /**
     * Put: define um valor específico para uma chave específica da sessão.
     *
     * @param string $key
     * @param string $value
     *
     * @return string
     */
    public static function put($key, $value) : string {
        return($_SESSION[$key] = $value);
    }
}
