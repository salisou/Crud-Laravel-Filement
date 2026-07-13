<?php

namespace App\Enums;


// Enum con backing type string
enum Status: string
{
    //Significa che ogni case ha un valore stringa associato.
    // Esempio: Status::Pending->value    restituisce "pending"
    case Pending = 'pending';
    case InProgress = 'in_progress';
    case Completed = 'completed';

    // Metodo label()
    /**
     * Serve per mostrare un testo leggibile nella UI.
     *  Esempio: Status::InProgress->label() → "In Progress".
     */
    public function label(): string
    {
        return match ($this) {
            self::Pending => 'Pending',
            self::InProgress => 'In Progress',
            self::Completed => 'Completed'
        };
    }

    /**
     * Questi colori sono perfetti per Filament, perché Filament usa proprio:
     *  success
     *  warning
     *  info
     *  danger
     *  primary
     *  secondary
     */
    public function color(): string
    {
        return match ($this) {
            self::Pending => 'warning',
            self::InProgress => 'info',
            self::Completed => 'success'
        };
    }
}
