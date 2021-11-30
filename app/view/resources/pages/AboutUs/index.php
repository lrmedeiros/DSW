<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet" />
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="../../assets/favicon.ico" type="image/x-icon" />

  <script src="./script.js" defer></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous" />
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  <style>
    <?php include './app/view/resources/styles/global.css'; ?><?php include './app/view/resources/pages/AboutUs/styles.css'; ?>
  </style>
    <title>Organizei | Sobre nós</title>
  </head>
  <body>
    <header class="row align-items-center" >
      <div class="col-10">
        <div class="row align-items-center justify-content-start">
          <div class="col-7">
            <h1>Organizei</h1>
          </div>
          <div class="col-5">
            <a id="sub-route" aria-label="Kanban" href="http://localhost/kanban">Kanban</a>
          </div>
        </div>
      </div>
      <div class="col-2 justify-content-end logout-container">
        <a id="logout" href="http://localhost/">Sair</a>
      </div>
    </header>
    <main id="page">
      <div class="row">
        <div class=" col-md-2 col-sm-6">
          <div class="integrante">
            <div class="row">
              <h4 class="nome">Leonardo Fonseca</h4>
            </div>
            <div class="row">
              <div class="col-10 card">
                <h5>Desenvolvedor FullStack</h5>
                <ul>
                  <li>Estagiário na MentorApp - 2017 à 2019</li>
                  <li>Desenvolvedor FullStack Wefit - 2019 à 2021</li>
                  <li>Desenvolvedor Frontend Ssr MercadoLivre - 2021 à 2021</li>
                  <li>Desenvolvedor FullStack Wefit - 2021</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class=" col-md-2 col-sm-6">
        <div class="integrante">
          <div class="row">
            <h4 class="nome">Lucas Medeiros</h4>
          </div>
          <div class="row">
            <div class="col-10 card">
              <h5>Desenvolvedor Frontend</h5>
              <ul>
                <li>Desenvolvedor Frontend Wefit - 2021</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class=" col-md-2 col-sm-6">
        <div class="integrante">
          <div class="row">
            <h4 class="nome">João Jamas</h4>
          </div>
          <div class="row">
            <div class="col-10 card">
              <h5>Desenvolvedor FullStack</h5>
              <ul>
                <li>Estagiário na Kruzer - 2019 à 2020</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class=" col-md-2 col-sm-6">
        <div class="integrante">
          <div class="row">
            <h4 class="nome">Jonathan Ribeiro</h4>
          </div>
          <div class="row">
            <div class="col-10 card">
              <h5>Desenvolvedor Backend</h5>
              <ul>
                <li>Estagiário suporte técnico na CETESB - 2020 à 2021</li>
                <li>Estagiário DevOps na Think IT - 2021</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class=" col-md-2 col-sm-6">
        <div class="integrante">
          <div class="row">
            <h4 class="nome">Leonardo Akira</h4>
          </div>
          <div class="row">
            <div class="col-10 card">
              <h5>Desenvolvedor Backend</h5>
              <ul>
                <li>Desenvolvedor na Zenvia - 2021</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class=" col-md-2 col-sm-6">
        <div class="integrante">
          <div class="row">
            <h4 class="nome">Nathan Ruiz</h4>
          </div>
          <div class="row">
            <div class="col-10  card">
              <h5>UI/UX</h5>
              <ul>
                <li>Estagiário na Bradesco - 2021</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>

</html>