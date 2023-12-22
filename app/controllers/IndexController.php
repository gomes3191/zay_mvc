<?php

/*
 *  Este é o controlador de página. Ele retorna uma visualização para páginas na estrutura,
 *  é onde você adiciona uma view para quaisquer páginas adicionais que possam ser adicionadas posteriormente.
 */
namespace App\Controllers;

use App\{Utility\Auth, Utility\Session, Core\App};

class IndexController
{
    /*
     *  Retorna a view inicial.
     */
    public function index()
    {
       /*  Auth::checkAuthenticated();

        $userID = Session::get(App::get("config")['session_config']['session_user']);

        if (!$User = Model\User::getInstance($userID)) {
            redirect('');
        } */

        return view('index');
    }

    /*
     *  Retorna a view about e passa a variável para que possa ser extraída pela view.
     */
    public function about()
    {
        $link = "#";
        return view('about', compact('link'));
    }

    /*
     *  Retorna a view contato.
     */
    public function contact()
    {
        $title = "Meu Contato";
        $email = "gomes.tisystem@gmail.com";
        $website = "#";
        return view('contact', compact('title', 'email', 'website'));
    }
}
