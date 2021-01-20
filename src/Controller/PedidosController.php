<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Collection\Collection;

class PedidosController extends AppController{

    public function index(){
        $query = $this->Pedidos->find()
                ->contain(['Clientes', 'PedidoStatuses'])
                ->order(['Pedidos.id' => 'DESC']);

        $this->set('pedidos', $this->paginate($query));
    }

    public function view($id){
        $this->viewBuilder()->setLayout('ajax');
        $pedido = $this->Pedidos->get($id, ['contain' => ['Clientes', 'PedidoStatuses', 'PedidosImagens']]);

        $this->set(compact('pedido'));
    }

    public function add(){
        $this->viewBuilder()->setLayout('ajax');
        $pedido = $this->Pedidos->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['data'] = implode('-', array_reverse($data['data'])).' 00:00';

            if(!empty($data['image']['tmp_name'])){
                $data['pedidos_imagens']['imagem'] = $this->ImageTool->_upload($data['image']);
                $data['pedidos_imagens']['capa'] = $this->ImageTool->_upload($data['image'], null, 90, 100);
            }else{
                unset($data['image']);
            }

            $pedido = $this->Pedidos->patchEntity($pedido, $data);
            if ($pedido = $this->Pedidos->save($pedido)) {
                if(isset($data['pedidos_imagens'])){
                    $entity = $this->Pedidos->PedidosImagens->newEntity([
                        'pedido_id' => $pedido->id,
                        'imagem' => $data['pedidos_imagens']['imagem'],
                        'capa' => $data['pedidos_imagens']['capa']
                    ]);

                    $this->Pedidos->PedidosImagens->save($entity);
                }

                $this->Flash->success('Pedido cadastrados com sucesso');
            }else{
                $this->Flash->error('Erro ao cadastrar pedido');
            }

            return $this->redirect($this->referer());
        }

        $clientes = $this->Pedidos->Clientes->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ]);

        $situacoes = $this->Pedidos->PedidoStatuses->find('list', [
            'keyField' => 'id',
            'valueField' => 'descricao'
        ]);

        $this->set(compact('pedido', 'clientes', 'situacoes'));
    }

    public function edit($id){
        $this->viewBuilder()->setLayout('ajax');
        $pedido = $this->Pedidos->get($id, ['contain' => ['PedidoStatuses', 'PedidosImagens']]);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['data'] = implode('-', array_reverse($data['data'])).' 00:00';

            if(!empty($data['image']['tmp_name'])){
                if($pedido->pedidos_imagens){
                    $data['pedidos_imagens']['imagem'] = $this->ImageTool->_upload($data['image'], $pedido->pedidos_imagens[0]->imagem);
                    $data['pedidos_imagens']['capa'] = $this->ImageTool->_upload($data['image'], $pedido->pedidos_imagens[0]->capa, 90, 100);
                }else{
                    $data['pedidos_imagens']['imagem'] = $this->ImageTool->_upload($data['image']);
                    $data['pedidos_imagens']['capa'] = $this->ImageTool->_upload($data['image'], null, 90, 100);
                }
            }else{
                unset($data['image']);
            }

            $entity = $this->Pedidos->patchEntity($pedido, $data);
            if ($pedido = $this->Pedidos->save($entity)) {
                if(isset($data['pedidos_imagens'])){
                    $imagem = $this->Pedidos->PedidosImagens->find()
                                                            ->where(['PedidosImagens.pedido_id' => $pedido->id])
                                                            ->first();

                    if($imagem){
                        $entity = $this->Pedidos->PedidosImagens->patchEntity($imagem, $data['pedidos_imagens']);
                    }else{
                        $data['pedidos_imagens']['pedido_id'] = $pedido->id;
                        $entity = $this->Pedidos->PedidosImagens->newEntity($data['pedidos_imagens']);
                    }

                    $this->Pedidos->PedidosImagens->save($entity);
                }

                $this->Flash->success('Pedido atualizado com sucesso');
            }else{
                $this->Flash->error('Erro ao atualizar pedido');
            }

            return $this->redirect($this->referer());
        }

        $clientes = $this->Pedidos->Clientes->find('list', [
            'keyField' => 'id',
            'valueField' => 'nome'
        ]);

        $situacoes = $this->Pedidos->PedidoStatuses->find('list', [
            'keyField' => 'id',
            'valueField' => 'descricao'
        ]);

        $this->set(compact('pedido', 'clientes', 'situacoes'));
    }

    public function export() {
        $this->response->download("export.csv");
        $this->viewBuilder()->setLayout('ajax');

        $data = [['ID', 'Cliente', 'Produto', 'Situação', 'Valor', 'Data']];
        $fields = ['id', 'Clientes.nome', 'produto', 'PedidoStatuses.descricao', 'valor', 'data'];

        $query = $this->Pedidos->find('all')
                            ->select($fields)
                            ->contain(['Clientes', 'PedidoStatuses'])
                            ->hydrate(false)
                            ->toArray();

        foreach ($query as $row) {
            $data[] = [
                'id' => $row['id'],
                'cliente' => $row['cliente']['nome'],
                'produto' => $row['produto'],
                'situacao' => $row['pedido_status']['descricao'],
                'valor' => $row['valor'],
                'data' => $row['data']
            ];
        }

        $this->set(compact('data'));
        return;
	}

    public function delete($ids){
        if ($this->Pedidos->deleteAll(["id IN ({$ids})"])) {
            $this->Flash->success('Pedido removido com sucesso!');
        } else {
            $this->Flash->error('Erro ao remover pedido');
        }

        return $this->redirect($this->referer());
    }

}
