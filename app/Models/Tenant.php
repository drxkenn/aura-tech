<?php

namespace App\Models;

use Stancl\Tenancy\Database\Models\Tenant as BaseTenant;
use Stancl\Tenancy\Contracts\TenantWithDatabase;
use Stancl\Tenancy\Database\Concerns\HasDatabase;
use Stancl\Tenancy\Database\Concerns\HasDomains;

class Tenant extends BaseTenant implements TenantWithDatabase
{
    use HasDatabase, HasDomains;

    /**
     * IMPORTANTE: Aquí listamos las columnas "reales" de tu tabla.
     * Si no las pones aquí, Laravel intentará meterlas en la columna 'data' (JSON).
     */
    public static function getCustomColumns(): array
    {
        return [
            'id',
            // OJO: Tu equipo usó 'name' en el script original, así que mantenemos 'name'
            'name', 
            
            // Aquí van las nuevas que acabamos de agregar en SQL:
            'ruc',
            'business_name',
            'address',
            'contact_phone',
            'logo_url',
            
            // Las que ya tenías antes:
            'status',
            'plan_id',
            'trial_ends_at',
        ];
    }
}