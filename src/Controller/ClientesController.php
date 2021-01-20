<?php
namespace App\Controller;

use App\Controller\AppController;

class ClientesController extends AppController{

    public function index(){
        $query = $this->Clientes->find()->order(['Clientes.id' => 'DESC']);

        $this->set('clientes', $this->paginate($query));
    }

    public function view($id){
        $this->viewBuilder()->setLayout('ajax');
        $cliente = $this->Clientes->get($id);

        $this->set(compact('cliente'));
    }

    public function add(){
        $this->viewBuilder()->setLayout('ajax');
        $cliente = $this->Clientes->newEntity();

        if ($this->request->is('post')) {
            $data = $this->request->data;
            $data['data_nascimento'] = implode('-', array_reverse($data['data_nascimento'])).' 00:00';
            $entity = $this->Clientes->patchEntity($cliente, $data);
            if ($this->Clientes->save($entity)) {
                $this->Flash->success('Cliente cadastrado com sucesso!');
            }else{
                $this->Flash->error('Houve um erro ao cadastrar o novo cliente.');
            }

            return $this->redirect($this->referer());
        }

        $this->set(compact('cliente'));
    }

    public function edit($id){
        $this->viewBuilder()->setLayout('ajax');
        $cliente = $this->Clientes->get($id);

        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->data;
            $data['data_nascimento'] = implode('-', array_reverse($data['data_nascimento'])).' 00:00';
            $entity = $this->Clientes->patchEntity($cliente, $data);
            if ($this->Clientes->save($entity)) {
                $this->Flash->success('Cliente atualizado com sucesso!');
            }else{
                $this->Flash->error('Houve um erro ao atualizar o cliente.');
            }

            return $this->redirect($this->referer());
        }

        $this->set(compact('cliente'));
    }

    public function delete($ids){
        if ($this->Clientes->deleteAll(["id IN ({$ids})"])) {
            $this->Flash->success('Cliente removido com sucesso!');
        } else {
            $this->Flash->error('Erro ao remover cliente');
        }

        return $this->redirect($this->referer());
    }

}
