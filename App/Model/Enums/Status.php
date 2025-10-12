<?php

declare(strict_types=1);

namespace App\Model\Enums;

/**
 * Enumeração de Status de Usuário
 *
 * @package Enums
 * @author Marley de S. Santos (MarleyS439) <marleysantos439@gmail.com>
 * @version 1.0.1
 * @since 12/10/2025
 */
enum Status: string
{
    /**
     * Usuário está Ativo e pode acessar o sistema
     */
    case Active = "Active";

    /**
     * Usuário está Inativo e não possui acesso o sistema
     */
    case Inactive = "Inactive";

    /**
     * Usuário está Bloqueado por alguma restrição
     */
    case Blocked = "Blocked";
}
