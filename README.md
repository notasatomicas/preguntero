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

## 🧩 Estructura del proyecto

app/
├── Controllers/                # Controladores del proyecto
│   ├── Home.php                # Controlador principal, maneja la página de inicio
│   ├── PreguntaController.php  # Controlador encargado del formulario de preguntas y su guardado
│   └── Pregunta.php            # Controlador API para obtener las preguntas almacenadas
├── Models/                     # Modelos que interactúan con la base de datos
│   └── PreguntaModel.php       # Modelo que gestiona la tabla 'preguntas' en la base de datos
├── Views/                      # Archivos de vistas que definen la interfaz de usuario
│   ├── plantilla.php           # Plantilla base (layout) que envuelve todas las vistas
│   ├── cargar_pregunta.php     # Vista que muestra el formulario para cargar nuevas preguntas
│   └── partials/               # Vistas parciales reutilizables
│       ├── navbar.php          # Barra de navegación común en todas las páginas
│       ├── main.php            # Contenido principal de la página
│       └── footer.php          # Pie de página común en todas las páginas
public/
└── css/                        # Archivos de estilo CSS para el diseño visual
    └── styles.css              # Estilos personalizados que definen la apariencia de la aplicación

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