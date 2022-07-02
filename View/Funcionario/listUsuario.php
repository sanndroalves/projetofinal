<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Listar usuários</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Login</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Permissão</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Configurações</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                    $usuarios = call_user_func(array('UsuarioController', 'listar'));

                            if(isset($usuarios) && !empty($usuarios)){
                                foreach($usuarios as $usuario){
                                    ?>
                                        <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                            <div>
                                                <span style="margin-right: 15px">★</span>    
                                            </div>
                                            <div class="d-flex flex-column justify-content-center">
                                                <h6 class="mb-0 text-sm"><?php echo $usuario->getLogin(); ?></h6>
                                            </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0"><?php echo $usuario->getPermissao() == 'A'?'Administrador':'Comum'; ?></p>
                                        </td>
                                        <td class="align-middle">
                                                <button type="button" class="btn btn-primary" onclick="window.location.href='index.php?action=usuarioEditar&id=<?php echo $usuario->getId();?>'">Editar</button>
                                                <button type="button" class="btn btn-danger"  onclick="window.location.href='index.php?action=usuarioExcluir&id=<?php echo $usuario->getId();?>'">Excluir</button>
                                                
                                        </td>
                                        </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                    <tr>
                                        <td colspan="5">Nenhum registro encontrado</td>
                                    </tr>
                                <?php
                            }
                        ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>