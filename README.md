# API REST - Vehículos (Laravel + MySQL)

Proyecto desarrollado para la evaluación final de Desarrollo Web. Implementa una API REST completa para la gestión de vehículos conectada a una base de datos MySQL, permitiendo operaciones CRUD con validaciones y respuestas en formato JSON.

---

## 📌 Requisitos Previos

- PHP >= 8.2 (o Laravel Herd)
- Composer
- MySQL 8.0 (local o vía Docker)

---

## 🚀 Configuración y Puesta en Marcha

### 1. Clonar el repositorio
```bash
git clone https://github.com/RogAntonio27/ExamenFinal_DesarrolloWeb.git
cd ExamenFinal_DesarrolloWeb
```

### 2. Instalar dependencias
```bash
composer install
```

### 3. Configurar variables de entorno
Copiar el archivo `.env.example` a `.env` (o editar `.env`):
```bash
cp .env.example .env
php artisan key:generate
```

Asegurarse de tener la configuración de base de datos MySQL en `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=examen_final
DB_USERNAME=root
DB_PASSWORD=root
```

### 4. Ejecutar migraciones
```bash
php artisan migrate
```

### 5. Iniciar el servidor
```bash
php artisan serve
```
La API estará disponible en `http://127.0.0.1:8000/api/vehiculos`.

---

## 📋 Endpoints de la API

| Método | Endpoint | Descripción | Código Éxito |
|---|---|---|---|
| `POST` | `/api/vehiculos` | Crea un nuevo vehículo | `201 Created` |
| `GET` | `/api/vehiculos` | Lista todos los vehículos | `200 OK` |
| `GET` | `/api/vehiculos/{id}` | Consulta un vehículo por su ID | `200 OK` |
| `PUT` | `/api/vehiculos/{id}` | Actualiza los datos de un vehículo | `200 OK` |
| `DELETE` | `/api/vehiculos/{id}` | Elimina un vehículo | `200 OK` |

### Estructura del Modelo (`Vehiculo`)
- `id` (int, autoincremental)
- `marca` (string, obligatorio)
- `modelo` (string, obligatorio)
- `anio` (integer, obligatorio)
- `color` (string, obligatorio)
- `created_at` (timestamp)
- `updated_at` (timestamp)

---

## 🧪 Pruebas de Endpoints (Postman / Thunder Client / Insomnia)

Para todas las peticiones, incluir el encabezado:
```http
Accept: application/json
Content-Type: application/json
```

### 1. POST: Crear registro
- **URL**: `http://127.0.0.1:8000/api/vehiculos`
- **Body**:
```json
{
  "marca": "Toyota",
  "modelo": "Corolla",
  "anio": 2022,
  "color": "Rojo"
}
```
- **Respuesta esperada**: `201 Created`

### 2. GET: Listar registros
- **URL**: `http://127.0.0.1:8000/api/vehiculos`
- **Respuesta esperada**: `200 OK` con un arreglo JSON de vehículos.

### 3. GET: Consultar por ID
- **URL**: `http://127.0.0.1:8000/api/vehiculos/1`
- **Respuesta esperada**: `200 OK` con el objeto del vehículo.

### 4. PUT: Actualizar registro
- **URL**: `http://127.0.0.1:8000/api/vehiculos/1`
- **Body**:
```json
{
  "marca": "Toyota",
  "modelo": "Corolla Altis",
  "anio": 2023,
  "color": "Negro"
}
```
- **Respuesta esperada**: `200 OK` con los datos actualizados.

### 5. POST: Datos inválidos (Prueba de validación)
- **URL**: `http://127.0.0.1:8000/api/vehiculos`
- **Body**:
```json
{
  "marca": "Honda"
}
```
- **Respuesta esperada**: `422 Unprocessable Content` detallando los campos faltantes (`modelo`, `anio`, `color`).

### 6. DELETE: Eliminar registro
- **URL**: `http://127.0.0.1:8000/api/vehiculos/1`
- **Respuesta esperada**: `200 OK` con mensaje de confirmación.
