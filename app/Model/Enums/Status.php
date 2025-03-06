<?php

// Declaração de tipagem forte
declare(strict_types=1);

// Declaração do namespace
namespace Enums;

/**
 * Enumeração de Status de Usuário
 *
 * @author @MarleyS439
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
