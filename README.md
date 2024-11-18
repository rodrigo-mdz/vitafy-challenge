# Vitafy Challenge-<Rodrigo.L>

Requisitos
PHP: 8.3
Laravel: 11.x
MySQL: 8.x

Instrucciones para poner en marcha el proyecto
1. Clonar el repositorio
git clone git@github.com:rodrigo-mdz/vitafy-challenge.git
cd vitafy-challenge

2. Instalar dependencias
composer install

3. Configurar las variables de entorno
Renombrar el archivo .env.example a .env y configurar las variables de entorno.

Generar la clave de la aplicación:

php artisan key:generate

4. Configurar la base de datos
Crear la base de datos vitafy en MySQL:
sql
CREATE DATABASE vitafy;

Migrar las tablas y ejecutar las seeders
php artisan migrate --seed

5. Ejecutar el servidor
Iniciar el servidor local de Laravel:


php artisan serve
La API estará disponible en http://127.0.0.1:8000.

Pruebas Unitarias
Para ejecutar los tests del proyecto, utiliza el siguiente comando:

php artisan test

Decisiones de Diseño
1. Separación de responsabilidades
La lógica de negocio está encapsulada en servicios (por ejemplo, LeadService) para mantener los controladores ligeros y enfocados en la orquestación de procesos.
2. Uso del patrón Repository
Este patrón permite desacoplar la lógica de acceso a datos de la lógica de negocio, facilitando pruebas unitarias y posibles cambios en la fuente de datos en el futuro.
3. Eventos y Listeners
Se implementaron eventos (LeadUpdatedOrCreated) y listeners (UpdateLeadScore) para calcular el score de forma independiente después de la creación o actualización de un lead.
4. Uso de interfaces
Se implementaron interfaces (LeadRepositoryInterface, LeadScoringServiceInterface) para garantizar el desacoplamiento entre los servicios y los repositorios. Esto facilita el mantenimiento y la posibilidad de cambiar implementaciones en el futuro sin afectar otras capas del sistema.
5. Validaciones centralizadas
Las reglas de validación están definidas en clases de request (StoreLeadRequest y UpdateLeadRequest) para mantener la lógica clara y reutilizable.

Endpoints de la API
1. Crear un Lead

POST /api/leads
Body:
json

{
    "name": "John Doe",
    "email": "johndoe@example.com",
    "phone": "123-456-7890"
}
2. Actualizar un Lead

PUT /api/leads/{uuid}
Body:
json

{
    "name": "John Doe",
    "email": "johndoe@example.com",
    "phone": "987-654-3210"
}
3. Obtener un Lead
GET /api/leads/{uuid}

4. Eliminar un Lead
DELETE /api/leads/{uuid}