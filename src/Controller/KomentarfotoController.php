<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Komentarfoto Controller
 *
 * @property \App\Model\Table\KomentarfotoTable $Komentarfoto
 */
class KomentarfotoController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $query = $this->Komentarfoto->find()
            ->contain(['Foto', 'User']);
        $komentarfoto = $this->paginate($query);

        $this->set(compact('komentarfoto'));
    }

    /**
     * View method
     *
     * @param string|null $id Komentarfoto id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $komentarfoto = $this->Komentarfoto->get($id);

        // Mengambil data pengguna berdasarkan user_id dari komentarfoto
        $user = $this->Users->get($komentarfoto->user_id);
        $komentarfoto = $this->Komentarfoto->get($id, contain: ['Foto', 'User']);
        $this->set(compact('komentarfoto'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $komentarfoto = $this->Komentarfoto->newEmptyEntity();
        if ($this->request->is('post')) {
            $komentarfoto = $this->Komentarfoto->patchEntity($komentarfoto, $this->request->getData());
            if ($this->Komentarfoto->save($komentarfoto)) {
                $this->Flash->success(__('The komentarfoto has been saved.'));

                return $this->redirect(['controller'=>'Foto','action' => 'view/'.$komentarfoto->foto_id]);
            }
            $this->Flash->error(__('The komentarfoto could not be saved. Please, try again.'));
        }
        $foto = $this->Komentarfoto->Foto->find('list', limit: 200)->all();
        $user = $this->Komentarfoto->User->find('list', limit: 200)->all();
        $this->set(compact('komentarfoto', 'foto', 'user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Komentarfoto id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $komentarfoto = $this->Komentarfoto->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $komentarfoto = $this->Komentarfoto->patchEntity($komentarfoto, $this->request->getData());
            if ($this->Komentarfoto->save($komentarfoto)) {
                $this->Flash->success(__('The komentarfoto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The komentarfoto could not be saved. Please, try again.'));
        }
        $foto = $this->Komentarfoto->Foto->find('list', limit: 200)->all();
        $user = $this->Komentarfoto->User->find('list', limit: 200)->all();
        $this->set(compact('komentarfoto', 'foto', 'user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Komentarfoto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $komentarfoto = $this->Komentarfoto->get($id);
        if ($this->Komentarfoto->delete($komentarfoto)) {
            $this->Flash->success(__('The komentarfoto has been deleted.'));
        } else {
            $this->Flash->error(__('The komentarfoto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
