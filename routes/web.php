<?php

use App\Models\Tenant;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/crear-colegio', function () {
    
    // Crear el inquilino con datos reales de Perú
    $colegio = Tenant::create([ 
        // Columna 'name' (según script de tu equipo)
        'name' => 'Colegio demo',

        // TUS NUEVAS COLUMNAS:
        'business_name' => 'Colegio demo S.A.C.',
        'ruc' => '20123456789',
        'address' => 'Av. Los Laureles 123, Huaral, Lima',
        'contact_phone' => '999-888-777',
        'logo_url' => null, // Por ahora vacío
        
        'status' => 'active',
        
        // Configuración para NeonDB (Misma BD física)
        'tenancy_db_name' => 'neondb',
    ]);

    $colegio->domains()->create([
        'domain' => 'sanjose.localhost'
    ]);

    return "¡Éxito! Se creó el Tenant 'sanjose' con RUC 20123456789 y su esquema en NeonDB.";
});
