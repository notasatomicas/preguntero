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
      const questions = [
        {
          question:
            "Con respecto al tejido linfoide. Marque la opción CORRECTA:",
          answers: [
            "Está compuesto solo por linfocitos B",
            "Solo se encuentra en el bazo",
            "Participa en la defensa inmune del cuerpo",
            "No se relaciona con ganglios linfáticos",
          ],
          correctIndex: 2,
        },
        {
          question: "¿Cuál es la capital de Francia?",
          answers: ["Madrid", "Berlín", "París", "Londres"],
          correctIndex: 2,
        },
        {
          question: "¿Qué elemento tiene el símbolo 'O'?",
          answers: ["Oro", "Oxígeno", "Osmio", "Oxalato"],
          correctIndex: 1,
        },
      ];

      let currentQuestion = 0;

      function loadQuestion(index) {
        const container = document.getElementById("question-container");
        const q = questions[index];

        let html = `
            <h5 class="card-title">Pregunta</h5>
            <p class="card-text">${q.question}</p>
            <div class="d-grid gap-2">`;

        q.answers.forEach((answer, i) => {
          const correctAttr = i === q.correctIndex ? 'data-correct="true"' : "";
          html += `<button class="btn btn-secondary" type="button" ${correctAttr}>${answer}</button>`;
        });

        html += `</div>`;
        container.innerHTML = html;

        attachButtonEvents();
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

            // Mostrar correcto
            correctButton.classList.remove("btn-secondary");
            correctButton.classList.add("btn-success");

            // Marcar incorrecto si corresponde
            if (button !== correctButton) {
              button.classList.remove("btn-secondary");
              button.classList.add("btn-danger");
            }

            // Esperar 1.5 segundos y cargar la siguiente pregunta
            setTimeout(() => {
              currentQuestion++;
              if (currentQuestion < questions.length) {
                loadQuestion(currentQuestion);
              } else {
                showEndMessage();
              }
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

      // Carga inicial
      document.addEventListener("DOMContentLoaded", () => {
        loadQuestion(currentQuestion);
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
