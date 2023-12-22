<?php

/**
 * Classe responsavel pelo gerenciamento manual
 * de erro do sistema.
 *
 * @since 0.2
 **/
class ErrorControl
{
    private $_adminMail = 'gomes.tisystem@gmail.com';
    protected $log_notices = 'log_notices.log';
    protected $log_warnings = 'log_warnings.log';
    protected static $log_errors = 'log_errors.log';
    private  $code = 0;
    protected $message = '';
    protected $file = '';
    protected $line = 0;
    protected $dateTime;

    function __construct($code, $message, $file, $line)
    {
        $this->code = $code;
        $this->message = $message;
        $this->file = $file;
        $this->line = $line;
        $this->dateTime = date('d/m/Y H:m:s');
    }

    /**
     * Método responsável por controlar os erros simples que
     * acontecem no sistema.
     *
     * @param int $code - código do erro
     * @param string $message - mensagem de erro
     * @param string $file - nome do arquivo que originou o erro
     * @param int $line - linha do erro
     * @return bool
     *
     **/
    public static function simpleError($code, $message, $file, $line) : bool {

        date_default_timezone_set('America/Sao_Paulo');

        $self = new self( $code, $message, $file, $line);

        switch ($code) {
            case E_USER_NOTICE:
            case E_NOTICE:
                $self->controlar_notices();
                break;

            case E_USER_WARNING:
            case E_WARNING:
                $self->controlar_warning();
                break;

                // um erro desconhecido...
            default:
                // retornar false, faz com que o PHP
                // se encarregue de controlar esse erro.
                return false;
        }

        return false;
    }

    public static function criticalError()
    {
        date_default_timezone_set('America/Sao_Paulo');

        $err = error_get_last();

        if ($err !== null && ($err['type'] & E_ERROR | E_USER_ERROR)) {
            self::controlar_errors($err['type'], $err['message'], $err['file'], $err['line'], date('d/m/Y H:m:s'));
        }

        // type : Type of error (error code)
        // message : Error Message
        // file : Path of file in which error occurred
        // line : Line number at error occurred in above file
    }

    protected function controlar_notices()
    {
        $content = <<<EOT
            -------- $this->dateTime --------
            Código: $this->code
            Arquivo: $this->file
            Linha: $this->line
            Mensagem: $this->message

        EOT;

        error_log($content . "\n", 3, '../logs/' . $this->log_notices);
    }

    protected function controlar_warning()
    {
        $content = <<<EOT
            -------- $this->dateTime --------
            Código: $this->code
            Arquivo: $this->file
            Linha: $this->line
            Mensagem: $this->message
        EOT;

        // enviando mensagem de erro ao admin do sistema
        //return error_log($content, 1, $this->_adminMail, 'E_Warning no Sistema');
        error_log($content . "\n", 3, '../logs/' . $this->log_warnings);
    }

    public static function controlar_errors($code, $message, $file, $line, $dateTime)
    {
        // guardando a saida em buffer...
        ob_start();
        // joga no buffer funcoes chamadas,
        // e arquivos solicitados pelo script
        //debug_print_backtrace();
        // retorna o buffer como uma string e
        // desliga a funcao ob_start()
        //$backtrace = ob_get_flush();
        // gerando mensagem de erro com EOT, para que o
        // arquivo de log fique alinhado a esquerda sem
        // espacos
        $content = <<<EOT
            -------- $dateTime --------
            Código: $code
            Arquivo: $file
            Linha: $line
            Mensagem: $message
        EOT;

        //Backtrace: $backtrace
        //$headers = "From: someone@something.com\r\n";
        //$headers .= "MIME-Version: 1.0\r\n";
        //$headers .= "Content-Type: text/html; charset=utf8\r\n";

        // enviando mensagem por email ao admin
        //error_log($content, 1, $this->_adminMail, $headers);

        error_log("\n".$content . "\n", 3, "logs/" . self::$log_errors);
    }
}

set_error_handler(array('ErrorControl', 'simpleError'));

register_shutdown_function(array('ErrorControl', 'criticalError'));
