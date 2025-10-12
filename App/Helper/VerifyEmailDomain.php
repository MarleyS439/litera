<?php

declare(strict_types=1);

namespace App\Helper;

use App\Model\Email;

/**
 * Classe responsável por verificar se o Domínio de um E-mail é válido
 *
 * @package Helper
 * @author Marley de S. Santos (MarleyS439) <marleysantos439@gmail.com>
 * @version 1.0.0
 * @since 12/10/2025
 */
class VerifyEmailDomain
{
    /**
     * @var Email $email Email
     */
    private Email $email;

    /**
     * Método para verificar existência de registros do domínio do e-mail no Mail Exchange
     *
     * @param Email $email Email
     * @return bool
     */
    public static function verify(Email $email): bool
    {
        $domain = substr(strrchr($email->getEmail(), "@"), 1);
        return !empty($domain) && checkdnsrr($domain, "MX");
    }
}
