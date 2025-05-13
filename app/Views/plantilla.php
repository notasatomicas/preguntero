<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= esc($title) ?></title>

    <!-- Bootstrap 5 CSS (última versión desde CDN) -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="<?= base_url('css/styles.css') ?>" />
  </head>
  <body>
    <!-- Navbar -->
    <?= $navbar ?>

    <!-- Main Content -->
    <main>
      <?= $main ?>
    </main>

    <!-- Footer -->
    <?= $footer ?>

    <!-- Bootstrap JS + Popper (CDN) -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>

    
    <script>
      let currentId = null;

      function loadQuestion(id = null) {
        const url = id
          ? `http://localhost/preguntero/public/api/pregunta/${id}`
          : `http://localhost/preguntero/public/api/pregunta`;

        fetch(url)
          .then((response) => response.json())
          .then((data) => {
            if (data.fin) {
              showEndMessage();
              return;
            }

            currentId = data.id;

            const container = document.getElementById("question-container");
            let html = `
                    <h5 class="card-title">Pregunta</h5>
                    <p class="card-text">${data.texto}</p>
                    <div class="d-grid gap-2">`;

            data.opciones.forEach((opcion, i) => {
              const correctAttr =
                i === data.correcta ? 'data-correct="true"' : "";
              html += `<button class="btn btn-secondary" type="button" ${correctAttr}>${opcion}</button>`;
            });

            html += `</div>`;
            container.innerHTML = html;

            attachButtonEvents();
          });
      }

      function attachButtonEvents() {
        const buttons = document.querySelectorAll("#question-container .btn");
        buttons.forEach((button) => {
          button.addEventListener("click", () => {
            // Desactivar todos
            buttons.forEach((btn) => (btn.disabled = true));

            const correctButton = document.querySelector(
              '[data-correct="true"]'
            );

            correctButton.classList.remove("btn-secondary");
            correctButton.classList.add("btn-success");

            if (button !== correctButton) {
              button.classList.remove("btn-secondary");
              button.classList.add("btn-danger");
            }

            setTimeout(() => {
              loadQuestion(currentId);
            }, 1500);
          });
        });
      }

      function showEndMessage() {
        const container = document.getElementById("question-container");
        container.innerHTML = `
            <h5 class="card-title text-center">¡Has completado todas las preguntas!</h5>
            <p class="text-center">Gracias por participar.</p>
        `;
      }

      document.addEventListener("DOMContentLoaded", () => {
        loadQuestion();
      });
    </script>


    <script>
      document.addEventListener("DOMContentLoaded", function () {
        const buttons = document.querySelectorAll(".card .btn");

        buttons.forEach((button) => {
          button.addEventListener("click", () => {
            // Evita múltiples clics
            buttons.forEach((btn) => (btn.disabled = true));

            const correctButton = document.querySelector(
              '[data-correct="true"]'
            );

            // Marcar correcto
            correctButton.classList.remove("btn-secondary");
            correctButton.classList.add("btn-success");

            // Si el clic fue en el incorrecto, marcarlo
            if (button !== correctButton) {
              button.classList.remove("btn-secondary");
              button.classList.add("btn-danger");
            }
          });
        });
      });
    </script>


  </body>
</html>
