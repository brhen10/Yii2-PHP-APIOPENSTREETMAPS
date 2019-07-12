<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use Yii; 
use yii\console\Controller;
use yii\console\ExitCode;
use app\models\User;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class HelloController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     * @return int Exit code
     */
    public function actionIndex($message = 'hello world')
    {
        echo $message . "\n";

        return ExitCode::OK;
    }
    
    public function actionPermissoes(){
        $auth = Yii::$app->authManager;

        $auth->removeAll();

        $admin = $auth->createRole('admin');
        $auth->add($admin);
        $root = $auth->createRole('root');
        $auth->add($root);
        $usuario = $auth->createRole('usuario');
        $auth->add($usuario);
        
        $tables = ['agenda, resposta, rua, bairro, setor, postagem'];

        foreach ($tables as $table) {
            echo "table: {$table} \n";
            //cria o objeto que representa a permissão
           $permRW = $auth->createPermission($table.'RW');
           $permR = $auth->createPermission($table.'R');

            //informa ao gerenciador de autenticação/autorização
            //que estas permissões existem
           $auth->add($permRW);
           $auth->add($permR);

           //informa que o admin pode execurtar a permissão RW
           $auth->addChild($admin,$permRW);
           //informa que o usuario pode execurtar a permissão R
           $auth->addChild($usuario,$permR);
        }

         $pessoaRW = $auth->createPermission( 'pessoaRW');
         $pessoaR = $auth->createPermission('pessoaR');
          $auth->add($pessoaRW);
          $auth->add($pessoaR);
          $auth->addChild($usuario,$pessoaRW);
          $auth->addChild($usuario,$pessoaR);

        $usuarioRW = $auth->createPermission( 'usuarioRW');
        $usuarioR = $auth->createPermission('usuarioR');
        $auth->add($usuarioRW);
        $auth->add($usuarioR);
        $auth->addChild($root,$usuarioRW);
        $auth->addChild($root,$usuarioR);

        $auth->addChild($admin,$usuario);
        $auth->addChild($root,$admin);

        $obj = User::findOne(['nameuser'=>'root']);
        if(!$obj) {
            $obj = new User();
            $obj->nameuser = 'root';
            $obj->password = '12345';
            $obj->save();
        }
    
     //associa a permissão de root ao id do usuário root
        //$auth->assign($root,$obj->id);
        echo "sucessoooooooooo!\n";
        
    }
}