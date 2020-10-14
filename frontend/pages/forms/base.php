<?php
  class Base {

    public function __construct($nomeDaTabela, $nomeCrud, $valorInputs){
      
    $url = "http://localhost:8000/api/" . $nomeDaTabela;
?> 

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $nomeCrud; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <style>
    .btn-opcoes-edicao {
      margin-right: 5%;
    }
    .fa-wrench {
      color: orange;
    }
    .fa-trash-alt {
      color: red;
    }
    .table {
      text-align: center;
    }
    .btn-modal {
      float: right;
    }
  </style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user1-128x128.jpg" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user8-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-item dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  
  <!-- Slidebar -->
  <?php 
    include('slidebar.html');

    if($nomeCrud[strlen($nomeCrud) - 1] == 's' || $nomeCrud[strlen($nomeCrud) - 1] == 'S')
      $nameCrud = substr($nomeCrud, 0, -1);

    else if($nomeDaTabela[strlen($nomeDaTabela) - 1] == 's' || $nomeDaTabela[strlen($nomeDaTabela) - 1] == 'S')
      $nameCrud = substr($nomeDaTabela, 0, -1);
      
    else
      $nameCrud = $nomeCrud;
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1><?php echo $nomeCrud; ?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="../">Início</a></li>
              <li class="breadcrumb-item active"><?php echo $nomeCrud; ?></li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            

            <!-- Modal -->
            <div class="modal fade" id="<?php echo "modal-" . $nomeDaTabela; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo $nameCrud; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                  <?php 

                    $count = count($valorInputs);

                    for($i=0; $i<$count; $i++){                       
                      if($valorInputs[$i]['tipo'] == 'password'){
                      ?> 
                        
                        <div class="form-group">
                          <label for="<?php echo $valorInputs[$i]['campo']; ?>"><?php echo $valorInputs[$i]['titulo']; ?></label>
                          <input type="password" class="form-control" id="<?php echo $valorInputs[$i]['campo'] . '-input'; ?>" name="<?php echo $valorInputs[$i]['campo']; ?>" placeholder="<?php echo $valorInputs[$i]['titulo']; ?>">
                        </div>
                        
                      <?php   
                      } else if($valorInputs[$i]['tipo'] == 'string'){
                      ?> 
                        
                        <div class="form-group">
                          <label for="<?php echo $valorInputs[$i]['campo']; ?>"><?php echo $valorInputs[$i]['titulo']; ?></label>
                          <input type="text" class="form-control" id="<?php echo $valorInputs[$i]['campo'] . '-input'; ?>" name="<?php echo $valorInputs[$i]['campo']; ?>" placeholder="<?php echo $valorInputs[$i]['titulo']; ?>">
                        </div>
                        <?php   
                      } else if($valorInputs[$i]['tipo'] == 'number'){
                      ?> 
                        
                        <div class="form-group">
                          <label for="<?php echo $valorInputs[$i]['campo']; ?>"><?php echo $valorInputs[$i]['titulo']; ?></label>
                          <input type="number" class="form-control" id="<?php echo $valorInputs[$i]['campo'] . '-input'; ?>" name="<?php echo $valorInputs[$i]['campo']; ?>" placeholder="<?php echo $valorInputs[$i]['titulo']; ?>">
                        </div>
                          
                      <?php   
                      } else if($valorInputs[$i]['tipo'] == 'date'){
                      ?>  
                        
                        <div class="form-group">
                          <label for="<?php echo $valorInputs[$i]['titulo']; ?>"><?php echo $valorInputs[$i]['titulo']; ?></label>
                          <input type="date" class="form-control" id="<?php echo $valorInputs[$i]['campo'] . '-input'; ?>" name="<?php echo $valorInputs[$i]['campo']; ?>">
                        </div>
                        
                      <?php   
                      }
                    }
                  ?>
                  </div>
                  <div class="modal-footer">
                  <div onclick="postAPI()" class="btn btn-primary">Gravar</div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Modal Edição -->
            <div class="modal fade" id="<?php echo "modal-edicao-" . $nomeDaTabela; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><?php echo 'Edição ' . $nameCrud; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">

                    <input type="hidden" id="<?php echo 'id_' . $nomeDaTabela . '-input-edicao'; ?>" name="<?php echo 'id_' . $nomeDaTabela; ?>">

                  <?php 

                    $count = count($valorInputs);

                    for($i=0; $i<$count; $i++){                       
                      if($valorInputs[$i]['tipo'] == 'password'){
                      ?> 
                        
                        <div class="form-group">
                          <label for="<?php echo $valorInputs[$i]['campo']; ?>"><?php echo $valorInputs[$i]['titulo']; ?></label>
                          <input type="password" class="form-control" id="<?php echo $valorInputs[$i]['campo'] . '-input-edicao'; ?>" name="<?php echo $valorInputs[$i]['campo']; ?>" placeholder="<?php echo $valorInputs[$i]['titulo']; ?>">
                        </div>
                        
                      <?php   
                      } else if($valorInputs[$i]['tipo'] == 'string'){
                      ?> 
                        
                        <div class="form-group">
                          <label for="<?php echo $valorInputs[$i]['campo']; ?>"><?php echo $valorInputs[$i]['titulo']; ?></label>
                          <input type="text" class="form-control" id="<?php echo $valorInputs[$i]['campo'] . '-input-edicao'; ?>" name="<?php echo $valorInputs[$i]['campo']; ?>" placeholder="<?php echo $valorInputs[$i]['titulo']; ?>">
                        </div>
                        <?php   
                      } else if($valorInputs[$i]['tipo'] == 'number'){
                      ?> 
                        
                        <div class="form-group">
                          <label for="<?php echo $valorInputs[$i]['campo']; ?>"><?php echo $valorInputs[$i]['titulo']; ?></label>
                          <input type="number" class="form-control" id="<?php echo $valorInputs[$i]['campo'] . '-input-edicao'; ?>" name="<?php echo $valorInputs[$i]['campo']; ?>" placeholder="<?php echo $valorInputs[$i]['titulo']; ?>">
                        </div>
                          
                      <?php   
                      } else if($valorInputs[$i]['tipo'] == 'date'){
                      ?>  
                        
                        <div class="form-group">
                          <label for="<?php echo $valorInputs[$i]['titulo']; ?>"><?php echo $valorInputs[$i]['titulo']; ?></label>
                          <input type="date" class="form-control" id="<?php echo $valorInputs[$i]['campo'] . '-input-edicao'; ?>" name="<?php echo $valorInputs[$i]['campo']; ?>">
                        </div>
                        
                      <?php   
                      }
                    }
                  ?>
                  </div>
                  <div class="modal-footer">
                  <div onclick="updateAPI()" class="btn btn-primary">Salvar</div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Lista de <?php echo $nomeCrud; ?></h3>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary btn-modal" data-toggle="modal" data-target="<?php echo "#modal-" . $nomeDaTabela; ?>">
                  <?php echo "Cadastrar " . $nameCrud; ?>
                </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="<?php echo "table-" . $nomeDaTabela; ?>" class="table table-bordered table-hover">
                  <thead>
                    <tr>
                      <?php
                        $count = count($valorInputs);

                        for($i=0; $i<$count; $i++){ 
                          if($valorInputs[$i]['visualizar']){
                      ?>
                      <th><?php echo $valorInputs[$i]['titulo']; ?></th>
                      <?php
                          }
                      }
                    ?>
                      <th>Opções</th>
                    </tr>
                  </thead>
                  <tbody id="<?php echo "tbody-" . $nomeDaTabela; ?>"></tbody>
                  <tfoot>
                    <tr>
                      <?php
                        $count = count($valorInputs);

                        for($i=0; $i<$count; $i++){ 
                          if($valorInputs[$i]['visualizar']){
                      ?>
                      <th><?php echo $valorInputs[$i]['titulo']; ?></th>
                      <?php
                          }
                      }
                    ?>
                      <th>Opções</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

          </div>
          <!--/.col (left) -->
          
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
      <b>Versão</b> 1.0
    </div>
    <strong>&copy; 2020 NIPE - CAMPUS MUZAMBINHO.</strong> Todos os direitos reservados.</footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<script>
  const apiURL = "<?php echo $url; ?>";
  const nomeTabela = "<?php echo $nomeDaTabela; ?>";
  const id_tbody = "<?php echo "#tbody-" . $nomeDaTabela; ?>";
  const tbody = document.querySelector(id_tbody);
  const valorGet = getAPI();

  valorGet.then(resultado => {
    //console.log(resultado);
    resultado.forEach(value => {
      //console.log(value);

      const tr = document.createElement('tr');
      let tds = '';

      <?php
        $countAux = count($valorInputs);

        for($j=0; $j<$countAux; $j++){ 
          if($valorInputs[$j]['visualizar']){
        ?>

            const campo = "<?php echo $valorInputs[$j]['campo']; ?>";

            tds += `<td>${value[campo]}</td>`; 
         
        <?php
          }
        }
        ?>

        tr.innerHTML += tds;

        const tdOpcoes = document.createElement('td');
        const divOpcoes = document.createElement('div');
        const botaoEditar = document.createElement('i');
        const botaoExcluir = document.createElement('i');

        botaoEditar.className = 'fas fa-wrench btn-opcoes-edicao';
        botaoEditar.title = "<?php echo "Alterar " . $nameCrud; ?>";
        botaoEditar.setAttribute('data-toggle', 'modal');
        botaoEditar.setAttribute('data-target', "<?php echo "#modal-edicao-" . $nomeDaTabela; ?>");

        botaoExcluir.className = 'fas fa-trash-alt btn-opcoes-delete';
        botaoExcluir.title = "<?php echo "Deletar " . $nameCrud; ?>";

        divOpcoes.appendChild(botaoEditar);
        divOpcoes.appendChild(botaoExcluir);
      
        botaoEditar.onclick = async () => {
          const nomeInputId = "<?php echo 'id_' . $nomeDaTabela; ?>";
          document.querySelector(`#${nomeInputId}-input-edicao`).value = value[nomeInputId];

          <?php
            for($i=0; $i<$countAux; $i++){ 
          ?>
              const nomeInput = "<?php echo $valorInputs[$i]['campo']; ?>";
              document.querySelector(`#${nomeInput}-input-edicao`).value = value[nomeInput];
          <?php  
            }
          ?>
        }

        botaoExcluir.onclick = async () => {
          if(confirm('Deseja realmente deletar o elemento?')){
            try {
              await delete_api(value[`id_${nomeTabela}`]);
          
              alert('Valor excluído!');

              document.location.reload(true);
            } catch (error) {
              console.log(error);
            }
          }
        }

        tdOpcoes.appendChild(divOpcoes);
        tr.appendChild(tdOpcoes);
        tbody.appendChild(tr);
    });
  });

  async function getAPI(){
    try {
      const chamada = await get_api();

      return chamada;
    } catch (error) {
      console.log(error);
    }
  }

  async function postAPI(){
    let valuesCreate = {};
    
    <?php
      $count = count($valorInputs);

        for($i=0; $i<$count; $i++){ 
  ?>
          const nomeInput = "<?php echo $valorInputs[$i]['campo']; ?>";
          const dadosInput = document.querySelector(`#${nomeInput}-input`).value;
  
          if(!dadosInput){
            alert('Campo <?php echo $valorInputs[$i]['campo']; ?> vazio!');
            return;
          }
          
          valuesCreate[nomeInput] = dadosInput;
    <?php 
        }
    ?>     
    
      //console.log(valuesCreate);
    
      try {
        const valor = await create_api(valuesCreate);
    
        alert('Valor criado!');

        document.location.reload(true);
      } catch (error) {
        console.log(error);
      }
  }

  async function updateAPI(){
    let valuesUpdate = {};

    const nomeInputId = "<?php echo 'id_' . $nomeDaTabela; ?>";
    valuesUpdate[nomeInputId] = document.querySelector(`#${nomeInputId}-input-edicao`).value;
    
    <?php
      $count = count($valorInputs);

      for($i=0; $i<$count; $i++){ 
    ?>
        const nomeInput = "<?php echo $valorInputs[$i]['campo']; ?>";
        valuesUpdate[nomeInput] = document.querySelector(`#${nomeInput}-input-edicao`).value;

        if(!valuesUpdate[nomeInput]){
          alert('Campo <?php echo $valorInputs[$i]['campo']; ?> vazio!');
          return;
        }
    <?php        
      }
    ?>     
    
    //console.log(valuesUpdate);
    
    try {
      const valor = await update_api(valuesUpdate[nomeInputId], valuesUpdate);
  
      alert('Valor alterado!');

      document.location.reload(true);
    } catch (error) {
      console.log(error);
    }
  }

  function get_api(id) {
    return new Promise(async (next, reject) => {
      try {
        const chamada = await fetch(`${apiURL}/${id ? `/${id}` : ''}`, {
          method: 'GET',
          headers: {
            'Content-Type': 'application/json'
          }
        });
        const dados = await chamada.json();
    
        next(dados);
      } catch(erro) {
        console.log(erro);
      }
    });
  }
  
  function create_api(dadosParaCadastro){
    return new Promise(async (next, reject) => {
      const body = JSON.stringify(dadosParaCadastro);

      try {
        const chamada = await fetch(apiURL, {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
          },
          body
        });

        const dados = await chamada.json();

        next(dados);
      } catch(erro) {
        console.log(erro);
      }
    });
  }

  function update_api(id, dadosParaEdicao){
    return new Promise(async (next, reject) => {
      
      const body = JSON.stringify(dadosParaEdicao);

      try {
        const chamada = await fetch(`${apiURL}/${id}`, {
          method: 'PUT',
          headers: {
            'Content-Type': 'application/json'
          },
          body
        });

        const dados = await chamada.json();

        next(dados);
      } catch(erro) {
        console.log(erro);
      }
    });
  }
  
  function delete_api(id){
    return new Promise(async (next, reject) => {
      try {
        const chamada = await fetch(`${apiURL}/${id}`, {
          method: 'DELETE',
          headers: {
            'Content-Type': 'application/json'
          }
        });

        const dados = await chamada.json();

        next();
      } catch(erro) {
        console.log(erro);
      }
    });
  }
</script>

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- bs-custom-file-input -->
<script src="../../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- DataTables -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
</body>
</html>

<?php
    }
  }
?>