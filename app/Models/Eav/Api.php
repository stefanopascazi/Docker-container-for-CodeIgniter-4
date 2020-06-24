<?php namespace App\Models\Eav;

use CodeIgniter\Model;

class Api extends Model
{
        /**
         * Imposto la tabella
         */
        protected $table = 'eav';

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
        protected $returnType = 'array';

        /** ENGINE=InnoDB DEFAULT CHARSET=utf8;
         * Imposta il metodo di cancellazione leggera
         * Settando su true non viene eseguita la cancellazione ed il dato viene mantenuto
         */
        protected $useSoftDeletes = false;

        /**
         * Vengono indicati i campi su cui possono essere eseguite le operazioni di insert o update
         * In questo modo le operazioni di massa sono più efficaci e senza errori
         */
        protected $allowedFields = ['document_id', 'site_functionality_id'];

        protected $useTimestamps = false;

        /**
         * Array contenente tutti i tipi di validazione richesti.
         * Vedi la sezione avilable rules di CodeIgniter: https://codeigniter4.github.io/userguide/libraries/validation.html#available-rules
         */
        protected $validationRules    = [];

        /**
         * Array contenente i messaggi per le validazioni.
         * In questo modo vengono sovrascritti i regolari messaggi di Default del framework
         */
        protected $validationMessages = [];


        /**
         * false abilita la validazione dei campi
         * true la disabilita
         */
        protected $skipValidation     = false;

}