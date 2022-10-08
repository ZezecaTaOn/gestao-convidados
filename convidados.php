<?php include "conexao.php";?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <title>Bootstrap demo</title>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet"/>
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
  </head>

  <body>
  <div class="container">
    <div class="mt-4 p-5 bg-primary text-white rounded text-center">
      <h1>Lista convidados</h1>
    </div>

    <form class="row g-3 mt-4 col-md-7 offset-md-3" action="#" method="GET">

    <input type="hidden" id="id-convidado" name="id-convidado">
    
      <div class="col-auto">
        <label for="nome" class="visually-hidden">Nome</label> 
        <input type="text" class="form-control pl-auto" placeholder="Nome" id="nome" name="nome"/>
      </div>

      <div class="col-auto">
        <label for="acompanhantes" class="visually-hidden px-auto">Acompanhantes</label>
        <input type="number" class="form-control pl-auto" id="acompanhantes" placeholder="Acompanhantes" name="acompanhantes"/>
      </div>

        <input type="hidden" class="form-control pl-auto" id="id-convidado">
      <div class="col-auto">
        <button type="submit" class="btn btn-primary mb-3">Salvar</button>
      </div>
      </div>
    </form>

    <div class="container mt-3">
      <table class="table">
        <thead>
          <tr>
            <th>Nome Convidados</th>
            <th>Quantidade de Acompanhantes</th>
            <th>Ação</th>
          </tr>
        </thead>
        <tbody>

          <?php foreach($resultado as $convidado) : ?>
          <tr>
            <td id="nome<?php echo $convidado['id_convidado'] ?>"><?php echo $convidado['nome'] ?></td>
            <td id="acomp<?php echo $convidado['id_convidado'] ?>"><?php echo $convidado['acompanhantes'] ?></td>
            <td><button type="button" onClick="atualizar(<?php echo $convidado['id_convidado'] ?>)" class="btn btn-success"> 
                  Atualizar
                </button>
            </td>

            <td>
              <a href="excluir.php?id=<?php echo $convidado['id_convidado'] ?>">
                <button type="button" class="btn btn-danger">
                  Excluir
                </button>
              </a>
            </td>
          </tr>
          <?php endforeach;?>
            
        </tbody>
      </table>
    </div>

    <script>
      function atualizar(id){
        var nome = document.getElementById("nome"+id).innerText;
        var acompanhantes = document.getElementById("acomp"+id).innerText;
        document.getElementById("nome").setAttribute('value', nome);
        document.getElementById("acompanhantes").setAttribute('value', acompanhantes);
        document.getElementById("id-convidado").setAttribute('value', id);

      }
      
      </script>
  </body>
</html>