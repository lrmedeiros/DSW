<!DOCTYPE html>
<html lang="pt-br">

    
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
      integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
      crossorigin="anonymous"
    />
    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
      integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
      integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
      crossorigin="anonymous"
    ></script>
    <style>
      <?php include './app/view/resources/styles/global.css'; ?>
      <?php include './app/view/resources/pages/Kanban/styles.css'; ?>
    </style>   
    <title>Organizei | Kanban</title>
  </head>
  <body>
  <header class="row align-items-center" >
    <div class="col-10">
      <div class="row align-items-center justify-content-start">
        <div class="col-7">
          <h1>Organizei</h1>
        </div>
        <div class="col-5">
          <a id="sub-route" aria-label="Sobre nós" href="http://localhost/sobre">Sobre nós</a>
        </div>
      </div>
    </div>
    <div class="col-2 justify-content-end logout-container">
      <a class="logout" href="http://localhost/">Sair</a>
    </div>
  </header>
  <nav>
    <section>
      <header>
        <h2>Pendente</h2>
        <div>
          <button class="btn-out" type="button" data-toggle="modal" data-target="#exampleModal" id="button-pendings">
            +
          </button>
        </div>
      </header>
      <ul class="dropzone pendings">
        <!-- <li draggable="true" class="card">
            <h4 class="title-card">alo quem</h4>
            <p class="description-card">
              adsjgoaidsjgoadsj sdaiogjadosigjadosij gioadsdsagopads
              adosgkadsopgkdsopag
            </p>
          </li> -->
      </ul>
    </section>
    <section>
      <header>
        <h2>Hoje</h2>
        <div>
          <button class="btn-out" type="button" data-toggle="modal" data-target="#exampleModal" id="button-nows">
            +
          </button>
        </div>
      </header>
      <ul class="dropzone nows">

      </ul>
    </section>
    <section>
      <header>
        <h2>Executando</h2>
        <div>
          <button class="btn-out" type="button" data-toggle="modal" data-target="#exampleModal" id="button-runnings">
            +
          </button>
        </div>
      </header>
      <ul class="dropzone runnings">
        <!-- <li draggable="true" class="card">
            <h4 class="title-card">ixi</h4>
            <p class="description-card">
              adsjgoaidsjgoadsj sdaiogjadosigjadosij gioadsdsagopads
              adosgkadsopgkdsopag
            </p>
          </li> -->
      </ul>
    </section>
    <section>
      <header>
        <h2>Concluído</h2>
        <div>
          <button class="btn-out" type="button" data-toggle="modal" data-target="#exampleModal" id="button-concluded">
            +
          </button>
        </div>
      </header>
      <ul class="dropzone concluded">
        <!-- <li draggable="true" class="card">
            <h4 class="title-card">uhu</h4>
            <p class="description-card">
              adsjgoaidsjgoadsj sdaiogjadosigjadosij gioadsdsagopads
              adosgkadsopgkdsopag
            </p>
          </li> -->
      </ul>
    </section>
  </nav>
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Nova atividade</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form class="container">
            <div class="mb-4 row">
              <label for="title" class="form-label">Título</label>
              <input class="form-control" id="title" required />
            </div>
            <div class="mb-4 row">
              <label for="description" class="form-label">Descrição</label>
              <textarea class="form-control" id="description" required></textarea>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">
            Fechar
          </button>
          <button type="button" id="save-button" class="btn btn-primary">
            Salvar
          </button>
        </div>
      </div>
    </div>
  </div>
</body>

<script defer>
  <?php include './app/view/resources/pages/Kanban/script.js'; ?>
</script>

</html>