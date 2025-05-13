<div class="container mt-5">
    <h2 class="mb-4">Agregar nueva pregunta</h2>

    <?php if (session()->getFlashdata('mensaje')): ?>
        <div class="alert alert-success">
            <?= session()->getFlashdata('mensaje') ?>
        </div>
    <?php endif; ?>

    <form action="<?= base_url('/cargar') ?>" method="post">
        <div class="mb-3">
            <label for="texto_pregunta" class="form-label">Texto de la pregunta</label>
            <textarea class="form-control" id="texto_pregunta" name="texto_pregunta" rows="3" required></textarea>
        </div>

        <?php for ($i = 1; $i <= 4; $i++): ?>
            <div class="mb-3">
                <label for="resp<?= $i ?>" class="form-label">Respuesta <?= $i ?></label>
                <input type="text" class="form-control" id="resp<?= $i ?>" name="resp<?= $i ?>" required>
                <div class="form-check mt-1">
                    <input class="form-check-input" type="radio" name="respuesta_correcta" id="correcta<?= $i ?>" value="<?= $i ?>" required>
                    <label class="form-check-label" for="correcta<?= $i ?>">
                        Marcar como correcta
                    </label>
                </div>
            </div>
        <?php endfor; ?>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-primary">Agregar</button>
            <button type="reset" class="btn btn-secondary">Limpiar campos</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector("form");
        const mensajeContainer = document.createElement("div");
        form.prepend(mensajeContainer);

        form.addEventListener("submit", function (e) {
            e.preventDefault(); // Evita envío normal

            const formData = new FormData(form);

            fetch("<?= base_url('cargar') ?>", {
                method: "POST",
                body: formData,
            })
            .then(res => res.json())
            .then(data => {
                if (data.status === "ok") {
                    mensajeContainer.innerHTML = `
                        <div class="alert alert-success">${data.message}</div>
                    `;
                    form.reset(); // Limpia los campos
                } else {
                    mensajeContainer.innerHTML = `
                        <div class="alert alert-danger">${data.message}</div>
                    `;
                }
            })
            .catch(err => {
                mensajeContainer.innerHTML = `
                    <div class="alert alert-danger">Error al enviar los datos.</div>
                `;
                console.error(err);
            });
        });
    });
</script>
