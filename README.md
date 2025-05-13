# Preguntero 🧠

**Preguntero** es una aplicación web desarrollada con **CodeIgniter 4** para la gestión y presentación de preguntas tipo test. Permite cargar nuevas preguntas mediante un formulario y mostrarlas de forma secuencial al usuario, validando sus respuestas de forma interactiva.

Repositorio oficial: [https://github.com/notasatomicas/preguntero](https://github.com/notasatomicas/preguntero)

---

## 🚀 Características

- Formulario para agregar preguntas con 4 opciones y una respuesta correcta.
- Visualización interactiva de preguntas y evaluación de respuestas en tiempo real.
- Interfaz responsive utilizando **Bootstrap 5**.
- Backend simple con **CodeIgniter 4**, sin autenticación.

---

## 🗃️ Base de Datos

La base de datos usa una única tabla llamada `preguntas`. Su estructura es la siguiente:

### Tabla: `preguntas`

| Campo               | Tipo         | Descripción                        |
|--------------------|--------------|------------------------------------|
| `id`               | INT, PK, AI  | Identificador único                |
| `texto`            | TEXT         | Enunciado de la pregunta           |
| `opcion_1`         | VARCHAR(255) | Primera opción de respuesta        |
| `opcion_2`         | VARCHAR(255) | Segunda opción de respuesta        |
| `opcion_3`         | VARCHAR(255) | Tercera opción de respuesta        |
| `opcion_4`         | VARCHAR(255) | Cuarta opción de respuesta         |
| `respuesta_correcta` | TINYINT     | Número (1-4) que indica la correcta|

> ⚠️ `respuesta_correcta` debe contener un valor del 1 al 4 según la opción correcta.

---

## 🧩 Estructura del Proyecto

La estructura de este proyecto sigue una convención estándar de CodeIgniter 4 (CI4) y se organiza de la siguiente manera:

### **app/**
- **Controllers/**: Controladores del proyecto.
  - `Home.php`: Controlador principal, maneja la página de inicio.
  - `PreguntaController.php`: Controlador encargado del formulario de preguntas y su guardado.
  - `Pregunta.php`: Controlador API para obtener las preguntas almacenadas.
  
- **Models/**: Modelos que interactúan con la base de datos.
  - `PreguntaModel.php`: Modelo que gestiona la tabla `preguntas` en la base de datos.

- **Views/**: Archivos de vistas que definen la interfaz de usuario.
  - `plantilla.php`: Plantilla base (layout) que envuelve todas las vistas.
  - `cargar_pregunta.php`: Vista que muestra el formulario para cargar nuevas preguntas.
  
  - **partials/**: Vistas parciales reutilizables.
    - `navbar.php`: Barra de navegación común en todas las páginas.
    - `main.php`: Contenido principal de la página.
    - `footer.php`: Pie de página común en todas las páginas.

### **public/**
- **css/**: Archivos de estilo CSS para el diseño visual.
  - `styles.css`: Estilos personalizados que definen la apariencia de la aplicación.

---

### Descripción de Componentes:

- **Controllers/**: Contiene la lógica del negocio, donde se gestionan las solicitudes HTTP y se retornan las respuestas adecuadas.
    - `Home.php`: Controlador para la página de inicio de la aplicación.
    - `PreguntaController.php`: Controlador responsable de manejar el formulario de carga de preguntas y guardarlas en la base de datos.
    - `Pregunta.php`: Controlador de la API para proporcionar acceso a las preguntas almacenadas.

- **Models/**: Se encarga de la lógica de acceso a datos, interactuando con la base de datos.
    - `PreguntaModel.php`: Modelo que gestiona la tabla `preguntas`, interactuando directamente con la base de datos para obtener y almacenar preguntas.

- **Views/**: Contiene los archivos de vista que definen la interfaz de usuario.
    - `plantilla.php`: La estructura básica del diseño de la aplicación que se reutiliza en diferentes vistas.
    - `cargar_pregunta.php`: Vista para mostrar el formulario donde los usuarios pueden enviar preguntas.
    - `partials/`: Carpeta que almacena vistas parciales reutilizables, como la barra de navegación y el pie de página.

- **public/**: Contiene los archivos públicos accesibles desde el navegador, como los estilos CSS y recursos estáticos.
    - `styles.css`: Archivo CSS con los estilos personalizados para la apariencia de la aplicación.

---

## 🧪 Uso

1. Clona el repositorio:
   ```bash
   git clone https://github.com/notasatomicas/preguntero.git

2. Configura tu entorno local (XAMPP, Laragon, etc.).

3. Crea la base de datos y la tabla preguntas.

4. Ajusta la base URL en .env o en app/Config/App.php.

5. Accede a:

    / para comenzar a responder preguntas.

    /cargar para agregar nuevas preguntas.

## 📬 Rutas clave

| Ruta                 | Método | Descripción                       |
| -------------------- | ------ | --------------------------------- |
| `/`                  | GET    | Página principal con preguntas    |
| `/cargar`            | GET    | Formulario para agregar pregunta  |
| `/cargar`            | POST   | Guardado de nueva pregunta (AJAX) |
| `/api/pregunta`      | GET    | Primera pregunta disponible       |
| `/api/pregunta/{id}` | GET    | Siguiente pregunta (por ID)       |

## 🛠️ Requisitos

- PHP 8.x
- MySQL
- CodeIgniter 4
- Composer (opcional)
- Bootstrap 5 (via CDN)

---

## 📄 Licencia

Este proyecto es libre para uso educativo o personal. Puedes adaptarlo a tus necesidades.

---