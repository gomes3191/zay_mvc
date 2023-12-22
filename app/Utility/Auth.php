<?php

namespace App\Utility;

use App\{Core\App};

class Auth
{
    /**
     * checkAuthenticated: verifica se o usuário está autenticado,
     * destruindo a sessão e redirecionando para um local específico se o usuário
     * não existir
     * @access public
     * @param string $redirect
     * @since 1.0.2
     */
    public static function checkAuthenticated($redirect = "login")
    {
        Session::init();
        if (!Session::exists(App::get("config")['session_config']['session_user'])) {
            Session::destroy();
            redirect($redirect);
        }
    }

    /**
     * CheckUnauthenticated: verifica se o usuário não é autenticado,
     * redirecionando para um local específico se a sessão do usuário existir.
     * @access public
     * @param string $redirect
     * @since 1.0.2
     */
    public static function checkUnauthenticated($redirect = "")
    {
        Session::init();
        // if (Session::exists(Config::get("SESSION_USER"))) {
        //     //Redirect::to(APP_URL . $redirect);
        // }
    }
}