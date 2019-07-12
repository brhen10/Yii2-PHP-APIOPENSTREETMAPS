<?php
$this->title = 'API';
?>
<div class="site-index">

    <div class="body-content">

        <h1>CONSUMINDO API</h1>
        	
        <?php foreach($data as $datas) : ?>
            <p>ID: <?= $datas['id'] ?></p>
            <p>Descrição: <?= $datas['descricao'] ?></p>
            <p>Setor: <?= $datas['setor']?>
            <p>Status: <?= $datas['status'] ?></p>
            <p>Latitude: <?= $datas['latitude'] ?></p>
            <p>Longitude: <?= $datas['longitude'] ?></p>
        <?php endforeach; ?>
    </div>
</div>
