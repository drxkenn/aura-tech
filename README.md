# 🚀 Aura Tech Solutions - Sistema de Gestión Escolar (SaaS)

Este documento detalla los pasos para configurar el entorno de desarrollo local. Sigue las instrucciones al pie de la letra para conectar correctamente con la base de datos en la nube (NeonDB).

## 📋 Requisitos Previos

Asegúrate de tener instalado en tu equipo:
* **PHP** >= 8.2
* **Composer** (Última versión)
* **Node.js** & **NPM**
* **Git**

---

## 💻 Stack Tecnológico y Dependencias Clave

Este proyecto utiliza las siguientes tecnologías y librerías principales. Es recomendable revisar su documentación:

* **Framework Backend:** [Laravel 11](https://laravel.com/docs)
* **Base de Datos:** [PostgreSQL](https://www.postgresql.org/) (Alojada en NeonDB)
* **Arquitectura SaaS:** [Stancl Tenancy v3](https://tenancyforlaravel.com/docs/v3)
    * *Nota:* Usamos la estrategia de **Single Database & Multi-Schema** (Esquemas separados por colegio).
* **Frontend:** Blade + [Tailwind CSS](https://tailwindcss.com/) (Vía Vite)

### ⚠️ Requisitos del Sistema (PHP Extensions)
Asegúrate de que tu `php.ini` tenga habilitadas estas extensiones para conectar con Neon:
- `pdo_pgsql`
- `pgsql`
- `fileinfo`

---

## 🛠️ Pasos de Instalación

1.  **Clonar el repositorio:**
    ```bash
    git clone <URL_DEL_REPO>
    cd aura-tech
    ```

2.  **Instalar dependencias de Backend:**
    ```bash
    composer install
    ```

3.  **Instalar dependencias de Frontend:**
    ```bash
    npm install
    ```

4.  **Configurar variables de entorno:**
    * Duplica el archivo `.env.example` y renómbralo a `.env`.
    * O ejecuta: `cp .env.example .env` (en terminal Bash).

5.  **Generar llave de aplicación:**
    ```bash
    php artisan key:generate
    ```

---

## 🔐 Configuración de Base de Datos (.env)

⚠️ **IMPORTANTE:** Estamos usando **NeonDB (PostgreSQL)**. Para evitar errores de conexión en Windows, la configuración debe ser exacta.

Pide las credenciales (`DB_PASSWORD`, etc.) a **Jair** por interno. No las subas al repositorio.

Configura tu archivo `.env` así:

```ini
APP_NAME="Aura Tech"
APP_ENV=local
APP_KEY=base64:.... (Se genera sola)
APP_DEBUG=true
APP_URL=http://localhost

# --- CONFIGURACIÓN NEON DB (LANDLORD) ---
DB_CONNECTION=pgsql
DB_HOST=ep-fancy-waterfall-ad3127wl-pooler.c-2.us-east-1.aws.neon.tech
DB_PORT=5432
DB_DATABASE=neondb
DB_USERNAME=neondb_owner
DB_PASSWORD="<PIDE_LA_CONTRASEÑA_A_JAIR>" 

# --- CRÍTICO: FIX PARA WINDOWS/NEON ---
# Este ID es necesario para que el driver conecte correctamente
DB_ENDPOINT_ID=ep-fancy-waterfall-ad3127wl
DB_SSLMODE=require