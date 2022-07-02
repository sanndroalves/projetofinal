
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header pb-0">
        <div class="d-flex align-items-center">
          <p class="">Cadastro de funcionário</p>
        </div>
      </div>
      <div class="card-body">
        <p class="text-uppercase text-sm">Informações do usuário</p>
      <form action="" method="post">
        <input type="text" name="id" id="id" value="<?php echo isset($usuario)?$usuario->getId():''?>" hidden="" />
        <div class="row">
          <div class="col-md-6">

            <div class="form-group">
              <label for="example-text-input" class="form-control-label">Login</label>
              <input class="form-control" type="text" name="login" value="<?php echo isset($usuario)?$usuario->getLogin():''?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="example-text-input" class="form-control-label">Permissão</label>
              <select  class="form-control" name="permissao">
                  <option value="A" <?php echo isset($usuario) && $usuario->getPermissao() == 'A'?'seleted':''?>>Administrador</option>
                  <option value="C" <?php echo isset($usuario) && $usuario->getPermissao() == 'C'?'seleted':''?>>Comum</option>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="example-text-input" class="form-control-label">Senha</label>
              <input class="form-control" type="password" name="senha1" value="<?php echo isset($usuario)?$usuario->getSenha():''?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="example-text-input" class="form-control-label">Confirmar senha</label>
              <input class="form-control" type="password" name="senha2">
            </div>
          </div>

          <input type="submit" name="btnSalvar" class="btn btn-icon btn-3 btn-primary" value="Cadastrar">
        </div>
      </form>
      <?php
                          if(isset($_POST['btnSalvar'])){
                          $salvar = call_user_func(array('UsuarioController', 'salvar'));
                              if($salvar){
                                  ?>
                                  <div class="alert alert-success" role="alert">
                                      Usuário cadastrado com sucesso!!!
                                  </div>
                              <?php 
                              }else{
                                  ?>
                                  <div class="alert alert-danger" role="alert">
                                      Senhas não são iguais
                                  </div>
                                  <?php
                              }
                              
                          }   
                      ?>
      </div>
    </div>
  </div>
</div>


<script>
            setTimeout(function(){ 
                var msg = document.getElementsByClassName("alert");
                while(msg.length > 0){
                    msg[0].parentNode.removeChild(msg[0]);
                }
            }, 5000);
        </script>
