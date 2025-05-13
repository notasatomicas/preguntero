<nav class="navbar navbar-expand-md navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?= base_url('/') ?>">📜 Preguntero</a>

    <button
      class="navbar-toggler"
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#navBar"
      aria-expanded="false"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navBar">
      <ul class="navbar-nav ms-auto mb-2 mb-md-0">
        <li class="nav-item"><a class="nav-link active" aria-current="page" href="<?= base_url('/') ?>">🌐 Inicio</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('cargar') ?>">🚀 Cargar</a></li>
        <!-- <li class="nav-item"><a class="nav-link" href="<?= base_url('contacto') ?>">📞 Contacto</a></li>

        <li class="nav-item"><a class="nav-link disabled" aria-disabled="true">Disabled</a></li> -->
      </ul>
    </div>
  </div>
</nav>