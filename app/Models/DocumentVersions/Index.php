<?php namespace App\Models\DocumentVersions;

use CodeIgniter\Model;

class Index extends Model
{
        /**
         * Imposto la tabella
         */
        protected $table = 'document_versions';

        /**
         * La chiave primaria per recuperare i dati
         */
        protected $primaryKey = 'id';

        /**
         * Imposta il modo di recuperare i dati.
         * Accetta array o object
         * Si può inoltre lavorare con gli oggetti Entities. Esempio
         * 
         * @protected $returnType = '\App\Entities\Users\User';
         * 
         * In questo modo verranno estratti i risultati come istanza oggetto
         */
        protected $returnType = '\App\Entities\DocumentVersions\Index';

        /** ENGINE=InnoDB DEFAULT CHARSET=utf8;
         * Imposta il metodo di cancellazione leggera
         * Settando su true non viene eseguita la cancellazione ed il dato viene mantenuto
         */
        protected $useSoftDeletes = true;

        /**
         * Vengono indicati i campi su cui possono essere eseguite le operazioni di insert o update
         * In questo modo le operazioni di massa sono più efficaci e senza errori
         */
        protected $allowedFields = ['user_id', 'site_functionality_id', 'document', 'version'];

        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';


        /**
         * false abilita la validazione dei campi
         * true la disabilita
         */
        protected $skipValidation     = true;

}