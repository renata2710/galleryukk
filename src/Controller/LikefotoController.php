<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Likefoto Controller
 *
 * @property \App\Model\Table\LikefotoTable $Likefoto
 */
class LikefotoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Likefoto->find()
            ->contain(['Foto', 'User']);
        $likefoto = $this->paginate($query);

        $this->set(compact('likefoto'));
    }

    /**
     * View method
     *
     * @param string|null $id Likefoto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $likefoto = $this->Likefoto->get($id, contain: ['Foto', 'User']);
        $this->set(compact('likefoto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $likefoto = $this->Likefoto->newEmptyEntity();
        if ($this->request->is('post')) {
            $likefoto = $this->Likefoto->patchEntity($likefoto, $this->request->getData());
            if ($this->Likefoto->save($likefoto)) {
                $this->Flash->success(__('The likefoto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The likefoto could not be saved. Please, try again.'));
        }
        $foto = $this->Likefoto->Foto->find('list', limit: 200)->all();
        $user = $this->Likefoto->User->find('list', limit: 200)->all();
        $this->set(compact('likefoto', 'foto', 'user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Likefoto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $likefoto = $this->Likefoto->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $likefoto = $this->Likefoto->patchEntity($likefoto, $this->request->getData());
            if ($this->Likefoto->save($likefoto)) {
                $this->Flash->success(__('The likefoto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The likefoto could not be saved. Please, try again.'));
        }
        $foto = $this->Likefoto->Foto->find('list', limit: 200)->all();
        $user = $this->Likefoto->User->find('list', limit: 200)->all();
        $this->set(compact('likefoto', 'foto', 'user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Likefoto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $likefoto = $this->Likefoto->get($id);
        if ($this->Likefoto->delete($likefoto)) {
            $this->Flash->success(__('The likefoto has been deleted.'));
        } else {
            $this->Flash->error(__('The likefoto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
