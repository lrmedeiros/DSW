<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <meta charset="UTF-8" />
  <link rel="shortcut icon" href="../../assets/favicon.ico" type="image/x-icon" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.5.0.js"></script>
  <style>
    <?php include './app/view/resources/styles/global.css'; ?>
    <?php include './app/view/resources/pages/Home/styles.css'; ?>
  </style>
  <title>Organizei | Login</title>
</head>

<body>
  <main class="container">
    <header class="mb-3 row">
      <h1>Fazer seu login</h1>
    </header>
    <form id="loginForm" method="post">
      <div class="mb-3 row">
        <label for="email" class="form-label">* E-mail</label>
        <input type="email" name="email" class="form-control" id="email" required />
      </div>
      <div class="mb-5 row">
        <label for="exampleInputPassword1" class="form-label">* Senha</label>
        <input type="password" name="password" class="form-control" minlength="8" id="password" required />
      </div>
      <div class="mb-3 row">
        <button type="submit" class="btn btn-primary">Entrar</button>
      </div>
      <div class="mb-3 row">
        <button type="button" class="btn btn-secondary">
          <a id="register" href="http://localhost/register"> Criar Conta </a>
        </button>
      </div>
    </form>

  </main>
  <script src="./script.js" defer></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>