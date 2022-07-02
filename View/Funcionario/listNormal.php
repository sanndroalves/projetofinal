<div class="row text-center">
    <div class="col-md-12">
        <div class="card">
            <br>
            <h3>Listando os imóveis para alugar/à venda</h3>
            <br>
        </div>
    </div>
</div>
<br>
<?php
    $imoveis = call_user_func(array('ImovelController', 'listar'));

    if(isset($imoveis) && !empty($imoveis)){
        foreach($imoveis as $imovel){
            ?>
                <div class="col-xl-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                        <div class="card-header mx-4 p-3 text-center">
                            <div class="">
                                <?php echo "<img src='model/img/". $imovel->getFoto() ."' alt='Foto de exibição' width='100px'/>"; ?>
                            </div>
                        </div>
                        <div class="card-body pt-0 p-3 text-center">
                            <h6 class="text-center mb-0"><?php echo $imovel->getDescricao(); ?></h6>
                            <span class="text-xs"><?php echo $imovel->getTipo(); ?></span>
                            <hr class="horizontal dark my-3">
                            <h5 class="mb-0">R$<?php echo $imovel->getValor(); ?></h5>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
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