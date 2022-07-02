
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <div class="card-header pb-0">
        <div class="d-flex align-items-center">
          <p class="">Cadastro imóvel</p>
        </div>
      </div>
      <div class="card-body">
        <p class="text-uppercase text-sm">Informações do imóvel</p>
      <form action="" method="post"  enctype="multipart/form-data">
      <input type="text" name="id" id="id" value="<?php echo isset($imovel)?$imovel->getId():''?>" hidden="" />
        <div class="row">
          <div class="col-md-6">

            <div class="form-group">
              <label for="example-text-input" class="form-control-label">Descrição</label>
              <input class="form-control" type="text" name="descricao" value="<?php echo isset($imovel)?$imovel->getDescricao():''?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="example-text-input" class="form-control-label">Tipo</label>
                <select class="form-control" name="tipo">
                          <option value="C" <?php echo isset($imovel) && $imovel->getTipo() == 'C'?'selected':''?>>Casa</option>
                          <option value="A" <?php echo isset($imovel) && $imovel->getTipo() == 'A'?'selected':''?>>Apartamento</option>
                          <option value="T" <?php echo isset($imovel) && $imovel->getTipo() == 'T'?'selected':''?>>Terreno</option>
                </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="example-text-input" class="form-control-label">Valor</label>
              <input class="form-control" type="number" name="valor" value="<?php echo isset($imovel)?$imovel->getValor():''?>">
            </div>
          </div>
          <div class="col-md-6">
            <?php 
              if(!isset($imovel)){
            ?>
              <div class="form-group">
                <label for="example-text-input" class="form-control-label">Foto</label>
                <input class="form-control" type="file" name="fotos">
              </div>
            <?php 
                }else{
                  ?>
                    <label for="example-text-input" class="form-control-label">Foto atual</label>
                    <div align="center">
                      <img src="model/img/<?php echo $imovel->getFoto();?>" width="100px"> 
                    </div>
                    <br>
                  <?php
                }
            ?>
          </div>

          <input type="submit" name="btnSalvar" class="btn btn-icon btn-3 btn-primary" value="Cadastrar">
        </div>
      </form>
      <?php
          if(isset($_POST['btnSalvar'])){
              ?>
                  <div class="alert alert-success" role="alert">
                      Imóvel cadastrado com sucesso!!!
                  </div>
              <?php
              require_once 'controller/ImovelController.php';
              call_user_func(array('ImovelController', 'salvar'));
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