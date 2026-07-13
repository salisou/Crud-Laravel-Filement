<?php

namespace App\Enums;

use App\Models\Category;

/**
 * Enum Priority
 * ---------------
 * Questo enum rappresenta tre livelli di priorità.
 * Ogni "case" ha un valore stringa associato, utile per salvarlo nel database
 * e per usarlo nelle UI (Filament, Blade, API, ecc.).
 */
enum Priority: string
{
    // Priorità bassa → valore salvato nel DB: "low"
    case Low = 'low';

        // Priorità media → valore salvato nel DB: "medium"
    case Medium = 'medium';

        // Priorità alta → valore salvato nel DB: "high"
    case High = 'high';

    /**
     * Restituisce il colore da usare nella UI (es. Filament BadgeColumn).
     * Il metodo usa "match" per restituire un valore diverso in base al case attuale.
     */
    public function color(): string
    {
        return match ($this) {

            // Per priorità bassa → colore grigio
            self::Low => 'gray',

            // Per priorità media → colore di avviso (giallo)
            self::Medium => 'warning',

            // Per priorità alta → colore rosso (danger)
            self::High => 'danger',
        };
    }
}
