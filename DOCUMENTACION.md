# Proyecto CRM - Gestión de Clientes, Incidencias y Facturas

## Índice

1. [Descripción General](#descripción-general)
2. [Requisitos](#requisitos)
3. [Instalación y Puesta en Marcha](#instalación-y-puesta-en-marcha)
4. [Estructura del Proyecto](#estructura-del-proyecto)
5. [Modelos y Funcionalidades](#modelos-y-funcionalidades)
6. [Roles y Permisos](#roles-y-permisos)
7. [Rutas Principales](#rutas-principales)
8. [APIs y Ejemplos de Endpoints](#apis-y-ejemplos-de-endpoints)
9. [Ejemplo de Migraciones](#ejemplo-de-migraciones)
10. [Ejemplo de Seeders](#ejemplo-de-seeders)
11. [Pruebas](#pruebas)
12. [Despliegue](#despliegue)
13. [Notas y Recomendaciones](#notas-y-recomendaciones)

---

## 1. Descripción General

Este proyecto es un sistema CRM (Customer Relationship Management) desarrollado en Laravel. Permite la gestión de clientes, incidencias y facturas, con control de acceso por roles (admin y usuario).

---

## 2. Requisitos

- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js y npm (para assets)
- Laravel 10+
- Laragon (opcional, recomendado para desarrollo local)

---

## 3. Instalación y Puesta en Marcha

1. **Clona el repositorio:**
   ```sh
   git clone https://github.com/tuusuario/tu-repo.git
   cd tu-repo
   ```

2. **Instala dependencias:**
   ```sh
   composer install
   npm install && npm run dev
   ```

3. **Copia el archivo de entorno:**
   ```sh
   cp .env.example .env
   ```

4. **Configura la base de datos** en `.env`.

5. **Genera la clave de la aplicación:**
   ```sh
   php artisan key:generate
   ```

6. **Ejecuta migraciones y seeders:**
   ```sh
   php artisan migrate --seed
   ```

7. **Inicia el servidor:**
   ```sh
   php artisan serve
   ```
   Accede a [http://localhost:8000](http://localhost:8000)

---

## 4. Estructura del Proyecto

- **app/Models**: Modelos Eloquent (`User`, `Client`, `Incident`, `Invoice`)
- **app/Http/Controllers**: Controladores web y API
- **app/Http/Middleware**: Middlewares de autenticación y roles
- **resources/views**: Vistas Blade
- **routes/web.php**: Rutas web
- **routes/api.php**: Rutas API
- **database/migrations**: Migraciones de base de datos
- **database/seeders**: Seeders para datos de prueba

---

## 5. Modelos y Funcionalidades

### User
- **Campos:** `id`, `name`, `email`, `password`, `role` (`admin` o `user`)
- **Funcionalidad:** Autenticación, gestión de permisos.

### Client
- **Campos:** `id`, `name`, `email`, `phone`, `address`, etc.
- **Funcionalidad:** Gestión de clientes, relación con incidencias y facturas.

### Incident
- **Campos:** `id`, `client_id`, `description`, `status`, `created_at`, etc.
- **Funcionalidad:** Registro y seguimiento de incidencias asociadas a clientes.

### Invoice
- **Campos:** `id`, `client_id`, `amount`, `status`, `issued_at`, etc.
- **Funcionalidad:** Gestión de facturación de clientes.

---

## 6. Roles y Permisos

- **Admin:** Acceso total a clientes, incidencias, facturas y usuarios.
- **User:** Acceso restringido según permisos definidos en middleware.

El middleware `role` controla el acceso a rutas protegidas.

---

## 7. Rutas Principales

### Web (`routes/web.php`)
- `/login`, `/register`: Autenticación
- `/clients`: Gestión de clientes (solo admin)
- `/incidents`: Gestión de incidencias (solo admin)
- `/invoices`: Gestión de facturas (solo admin)

### API (`routes/api.php`)
- `/api/clients`
- `/api/incidents`
- `/api/invoices`

---

## 8. APIs y Ejemplos de Endpoints

Las rutas API permiten gestionar clientes, incidencias y facturas mediante peticiones REST.  
Requieren autenticación (`auth:sanctum` o `auth:api`).

**Ejemplo de endpoints:**

- `GET /api/clients` — Listar clientes
- `POST /api/clients` — Crear cliente
- `GET /api/clients/{id}` — Ver cliente
- `PUT /api/clients/{id}` — Actualizar cliente
- `DELETE /api/clients/{id}` — Eliminar cliente

(Análogo para incidencias y facturas)

**Ejemplo de petición para crear un cliente:**

```json
POST /api/clients
{
  "name": "Empresa Ejemplo",
  "email": "contacto@ejemplo.com",
  "phone": "123456789",
  "address": "Calle Falsa 123"
}
```

---

## 9. Ejemplo de Migraciones

### Migración de la tabla `clients`

````php
// database/migrations/xxxx_xx_xx_create_clients_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};