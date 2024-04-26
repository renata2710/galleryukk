<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Foto Model
 *
 * @property \App\Model\Table\AlbumTable&\Cake\ORM\Association\BelongsTo $Album
 * @property \App\Model\Table\UserTable&\Cake\ORM\Association\BelongsTo $User
 * @property \App\Model\Table\KomentarfotoTable&\Cake\ORM\Association\HasMany $Komentarfoto
 * @property \App\Model\Table\LikefotoTable&\Cake\ORM\Association\HasMany $Likefoto
 *
 * @method \App\Model\Entity\Foto newEmptyEntity()
 * @method \App\Model\Entity\Foto newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Foto> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Foto get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Foto findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Foto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Foto> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Foto|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Foto saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Foto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Foto>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Foto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Foto> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Foto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Foto>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Foto>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Foto> deleteManyOrFail(iterable $entities, array $options = [])
 */
class FotoTable extends Table
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

        $this->setTable('foto');
        $this->setDisplayField('judul_foto');
        $this->setPrimaryKey('id');

        $this->belongsTo('Album', [
            'foreignKey' => 'album_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('User', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('Komentarfoto', [
            'foreignKey' => 'foto_id',
        ]);
        $this->hasMany('Likefoto', [
            'foreignKey' => 'foto_id',
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
            ->scalar('judul_foto')
            ->maxLength('judul_foto', 255)
            ->requirePresence('judul_foto', 'create')
            ->notEmptyString('judul_foto');

        $validator
            ->scalar('deskripsi')
            ->maxLength('deskripsi', 255)
            ->requirePresence('deskripsi', 'create')
            ->notEmptyString('deskripsi');

        $validator
            ->dateTime('tgl_unggahan')
            ->requirePresence('tgl_unggahan', 'create')
            ->notEmptyDateTime('tgl_unggahan');

        $validator
            ->scalar('lokasi_foto')
            ->maxLength('lokasi_foto', 255)
            ->requirePresence('lokasi_foto', 'create')
            ->notEmptyString('lokasi_foto');

        $validator
            ->allowEmptyFile('img')
            ->requirePresence('img', 'create')
            ->uploadedFile('img', [
                'type' => [
                    'image/png',
                    'image/jpeg',
                    'image/jpg'
                ],
            ], 'Hanya Dapat berupa Format Gambar');    

        $validator
            ->integer('album_id')
            ->notEmptyString('album_id');

        $validator
            ->integer('user_id')
            ->notEmptyString('user_id');

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
        $rules->add($rules->existsIn(['album_id'], 'Album'), ['errorField' => 'album_id']);
        $rules->add($rules->existsIn(['user_id'], 'User'), ['errorField' => 'user_id']);

        return $rules;
    }
    
}
