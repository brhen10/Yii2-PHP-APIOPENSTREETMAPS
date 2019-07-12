<?php

use yii\helpers\Html;
use yii\widgets\Menu;
use yii\widgets\Breadcrumbs;
use app\themes\adminLTE\components\ThemeNav;

?>
<?php $this->beginContent('@app/themes/adminLTE/layouts/main.php'); ?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">

     <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo Yii::$app->request->baseUrl; ?>/images/user_accounts.png" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p>
                      <?php
                          $info[] = Yii::t('app','Bem Vindo');

                          if(isset(Yii::$app->user->identity->nameruser))
                              $info[] = ucfirst(\Yii::$app->user->identity->nameruser);

                          echo implode(', ', $info);
                      ?>
                    </p>
                    <a><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- sidebar menu: : style can be found in sidebar.less -->
            <?php
                echo Menu::widget([
                  'encodeLabels'=>false,
                  'options' => [
                    'class' => 'sidebar-menu'
                  ],
                  'items' => [
                      ['label'=>Yii::t('app','Menu Administrativo'), 'options'=>['class'=>'header']],
                      ['label' => ThemeNav::link('Usuário', 'glyphicon glyphicon-ok'), 'url' => ['user/index'], 'visible'=>!Yii::$app->user->isGuest],
                      ['label'=>Yii::t('app','Rotina de Trabalho'), 'options'=>['class'=>'header']],
                      ['label' => ThemeNav::link('Dashboard', 'fa fa-dashboard'), 'url' => ['site/index'], 'visible'=>!Yii::$app->user->isGuest],
                      ['label' => ThemeNav::link('Setores', 'glyphicon glyphicon-user'), 'url' => ['setor/index'], 'visible'=>!Yii::$app->user->isGuest],
                      ['label' => ThemeNav::link('Ruas', 'glyphicon glyphicon-book'), 'url' => ['rua/index'], 'visible'=>!Yii::$app->user->isGuest],
                      ['label' => ThemeNav::link('Postagem', 'glyphicon glyphicon-earphone'), 'url' => ['postagem/index'], 'visible'=>!Yii::$app->user->isGuest],
                       ['label' => ThemeNav::link('Resposta', 'glyphicon glyphicon-earphone'), 'url' => ['resposta/index'], 'visible'=>!Yii::$app->user->isGuest],
                      ['label' => ThemeNav::link('Calendário', 'glyphicon glyphicon-calendar'), 'url' => ['event/home1'], 'visible'=>!Yii::$app->user->isGuest],
                      ['label' => ThemeNav::link('Agendamento', 'glyphicon glyphicon-folder-open'), 'url' => ['agenda/index'], 'visible'=>!Yii::$app->user->isGuest],
                      ['label' => ThemeNav::link('API MAPAS', 'glyphicon glyphicon-calendar'), 'url' => ['site/maps'], 'visible'=>!Yii::$app->user->isGuest],
                      
                  ],
                ]);
            ?>

        </section>
  <!-- /.sidebar -->
</aside>

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">

   <!-- Content Header (Page header) -->
   <section class="content-header">
        <h1> <?php echo Html::encode($this->title); ?> </h1>
           <?= Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ]) ?>
    </section>

    <!-- Main content -->
    <section class="content">
        <?php echo $content; ?>
    </section><!-- /.content -->

</div><!-- /.right-side -->
<?php $this->endContent();