<div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0">
              <h6>Listar imóveis</h6>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Descrição</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Foto</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Valor</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tipo</th>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Configurações</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php
                            $imoveis = call_user_func(array('ImovelController', 'listar'));

                            if(isset($imoveis) && !empty($imoveis)){
                                foreach($imoveis as $imovel){
                                    ?>
                                        <tr>
                                            <td><?php echo $imovel->getDescricao(); ?></td>
                                            <td><?php echo "<img src='model/img/". $imovel->getFoto() ."' alt='Foto de exibição' width='100px'/>"; ?></td>
                                            <td><?php echo $imovel->getValor(); ?></td>
                                            <td><?php echo $imovel->getTipo(); ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" onclick="window.location.href='index.php?action=imovelEditar&id=<?php echo $imovel->getId();?>'">Editar</button>
                                                <button type="button" class="btn btn-danger"  onclick="window.location.href='index.php?action=imovelExcluir&id=<?php echo $imovel->getId();?>'">Excluir</button>
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