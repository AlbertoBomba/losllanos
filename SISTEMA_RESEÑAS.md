# Sistema de Reseñas de Los Llanos

## Funcionalidades Implementadas

### 1. **Modelo de Reseñas (Review)**
- Calificación de 1 a 5 estrellas
- Información del reseñador (nombre, email, ubicación)
- Tipo de servicio (Alojamiento, Restauración, Actividades)
- Título y contenido de la reseña
- Sistema de aprobación por administrador
- Sistema de destacados (featured)
- Detección automática de spam

### 2. **Página Principal**
- Sección de reseñas que muestra las últimas 5 reseñas aprobadas
- Estadísticas globales (promedio de calificación, total de reseñas)
- Formulario público para que los usuarios envíen nuevas reseñas
- Visualización de estrellas y información del reseñador

### 3. **Panel de Administración**
- Gestión completa de reseñas desde `/admin/reviews`
- Estadísticas detalladas (total, aprobadas, pendientes, destacadas)
- Filtros por estado (todas, aprobadas, pendientes, spam)
- Acciones masivas:
  - Aprobar reseñas
  - Destacar reseñas
  - Analizar spam
- Vista detallada de cada reseña con información completa

### 4. **Sistema de Detección de Spam**
- Análisis automático al enviar reseñas
- Puntuación de spam de 0.0 a 1.0
- Detección de patrones sospechosos
- Palabras clave spam configurables

## Cómo Usar el Sistema

### Para Usuarios Públicos:
1. Visita la página principal del sitio
2. Desplázate hasta la sección "Experiencias de Nuestros Visitantes"
3. Ve las reseñas más recientes y las estadísticas
4. Usa el formulario "Comparte tu Experiencia" para enviar una nueva reseña
5. Las reseñas son revisadas por el administrador antes de publicarse

### Para Administradores:
1. Inicia sesión con tu cuenta de administrador
2. Ve a "Gestión de Reseñas" en el menú de administración
3. Revisa las reseñas pendientes
4. Aprueba, destaca o marca como spam según corresponda
5. Usa los filtros para gestionar eficientemente las reseñas

## Datos de Prueba

Se han creado 7 reseñas de ejemplo con diferentes calificaciones y tipos de servicio:
- 3 reseñas de 5 estrellas (destacadas)
- 2 reseñas de 4 estrellas
- 1 reseña de 3 estrellas
- 1 reseña de 4 estrellas
- Diferentes tipos: Alojamiento, Restauración, Actividades

## Estructura de la Base de Datos

Tabla `reviews`:
- `reviewer_name`: Nombre del reseñador
- `reviewer_email`: Email del reseñador
- `reviewer_location`: Ubicación del reseñador
- `rating`: Calificación (1-5)
- `service_type`: Tipo de servicio
- `title`: Título de la reseña
- `content`: Contenido de la reseña
- `is_approved`: Si está aprobada
- `is_featured`: Si está destacada
- `ip_address`: IP del usuario
- `user_agent`: Navegador del usuario
- `spam_score`: Puntuación de spam
- `spam_reasons`: Razones de detección de spam

## URLs Importantes

- **Página Principal**: `http://localhost:8000/`
- **Panel de Administración**: `http://localhost:8000/admin/reviews`
- **Login de Administrador**: `http://localhost:8000/login`

¡El sistema está completamente funcional y listo para usar!
