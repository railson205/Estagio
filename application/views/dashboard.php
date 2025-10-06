<!doctype html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h1>Bem-vindo, <?= $this->session->userdata('usuario_nome') ?>!</h1>
    <a href="<?= site_url('login/sair') ?>" class="btn btn-danger mt-3">Sair</a>
  </div>
</body>
</html>
