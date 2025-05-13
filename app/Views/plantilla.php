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
    <?= view('partials/navbar') ?>

    <!-- Main Content -->
    <main>
      <?= $main ?? '' ?>
    </main>

    <!-- Footer -->
    <?= view('partials/footer') ?>

    <!-- Bootstrap JS + Popper -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      crossorigin="anonymous"
    ></script>

    <!-- Lógica para cargar preguntas -->
    <script>
      let currentId = null;

      function loadQuestion(id = null) {
        const url = id ? `api/pregunta/${id}` : `api/pregunta`;

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
            buttons.forEach((btn) => (btn.disabled = true));

            const correctButton = document.querySelector(
              '[data-correct="true"]'
            );
            correctButton.classList.replace("btn-secondary", "btn-success");

            if (button !== correctButton) {
              button.classList.replace("btn-secondary", "btn-danger");
            }

            setTimeout(() => {
              loadQuestion(currentId);
            }, 2500);
          });
        });
      }

      function showEndMessage() {
        const container = document.getElementById("question-container");
        container.innerHTML = `
        <h5 class="card-title text-center">¡Has completado todas las preguntas!</h5>
        <p class="text-center">Gracias por participar.</p>`;
      }

      document.addEventListener("DOMContentLoaded", () => {
        loadQuestion();
      });
    </script>
  </body>
</html>
