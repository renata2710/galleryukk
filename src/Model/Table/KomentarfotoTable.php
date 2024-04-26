<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Komentarfoto Model
 *
 * @property \App\Model\Table\FotoTable&\Cake\ORM\Association\BelongsTo $Foto
 * @property \App\Model\Table\UserTable&\Cake\ORM\Association\BelongsTo $User
 *
 * @method \App\Model\Entity\Komentarfoto newEmptyEntity()
 * @method \App\Model\Entity\Komentarfoto newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Komentarfoto> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Komentarfoto get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Komentarfoto findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Komentarfoto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Komentarfoto> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Komentarfoto|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Komentarfoto saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Komentarfoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Komentarfoto>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Komentarfoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Komentarfoto> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Komentarfoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Komentarfoto>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Komentarfoto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Komentarfoto> deleteManyOrFail(iterable $entities, array $options = [])
 */
class KomentarfotoTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('komentarfoto');
        $this->setDisplayField('isi_komentar');
        $this->setPrimaryKey('id');

        $this->belongsTo('Foto', [
            'foreignKey' => 'foto_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('User', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('foto_id')
            ->notEmptyString('foto_id');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

        $validator
            ->scalar('isi_komentar')
            ->maxLength('isi_komentar', 255)
            ->requirePresence('isi_komentar', 'create')
            ->notEmptyString('isi_komentar');

        $validator
            ->dateTime('tgl_komentar')
            ->requirePresence('tgl_komentar', 'create')
            ->notEmptyDateTime('tgl_komentar');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn(['foto_id'], 'Foto'), ['errorField' => 'foto_id']);
        $rules->add($rules->existsIn(['user_id'], 'User'), ['errorField' => 'user_id']);

        return $rules;
    }
}
