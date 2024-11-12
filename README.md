# Vitafy Challenge

## Resumen
El propósito de este desafío es poder verificar los conocimientos relativos a la abstracción de estructuras de datos, desacople y escalabilidad de una aplicación.

### Proyecto
El proyecto es un CRUD de leads, donde se podrá registrar un lead junto con un cliente, actualizarlo y eliminarlo. Cada lead debe conectar con un servicio de scoring para obtener el score de un cliente.
Está realizado en Laravel 11 y PHP 8.3, incluye migraciones, factories, rutas API y tests.

### Tests
Los tests están escritos de tal manera que pueda verificarse si el desarrollo de la aplicación está completo y no hay ninguna falla en el camino.

### Desarrollo
- Crear un LeadController encargado de realizar las operaciones CRUD necesarias.
- Un cliente debe crearse luego de crear un lead.
- Obtener el score luego de crear o actualizar un lead.
- Crear un trait HasUuid para que cada modelo se cree con un UUID por defecto, como se puede ver en las migraciones.
- Crear un servicio LeadScoringService con un método getLeadScore.

## Plazos
48 horas desde la recepción del desafío.

## Entrega
- El desafío debe ser entregado a traves de un repositorio en GitHub con el siguiente formato:
vitafy-challenge-<nombre-apellido>
- Se pueden realizar tantos commits como se quieran.
- Detallar instrucciones a seguir para poner en marcha el proyecto y realizar pruebas necesarias.
- Explicar la implementación y desarrollo de la solución, así como las decisiones de diseño tomadas para llevar a cabo el desafío y cualquier otra información relevante que amerite describir.
