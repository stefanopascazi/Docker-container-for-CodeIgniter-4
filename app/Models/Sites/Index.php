<?php namespace App\Models\Sites;

use CodeIgniter\Model;

class Index extends Model
{
        /**
         * Imposto la tabella
         */
        protected $table = 'sites';

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
        protected $returnType = '\App\Entities\Sites\Index';

        /** ENGINE=InnoDB DEFAULT CHARSET=utf8;
         * Imposta il metodo di cancellazione leggera
         * Settando su true non viene eseguita la cancellazione ed il dato viene mantenuto
         */
        protected $useSoftDeletes = true;

        /**
         * Vengono indicati i campi su cui possono essere eseguite le operazioni di insert o update
         * In questo modo le operazioni di massa sono più efficaci e senza errori
         */
        protected $allowedFields = ['title', 'site_functionality_id', 'user_id', 'url'];

        protected $useTimestamps = true;
        protected $createdField  = 'created_at';
        protected $updatedField  = 'updated_at';
        protected $deletedField  = 'deleted_at';

        /**
         * Array contenente tutti i tipi di validazione richesti.
         * Vedi la sezione avilable rules di CodeIgniter: https://codeigniter4.github.io/userguide/libraries/validation.html#available-rules
         */
        protected $validationRules    = [
                "title"             => "required|min_length[3]|max_length[255]",
        ];

        /**
         * Array contenente i messaggi per le validazioni.
         * In questo modo vengono sovrascritti i regolari messaggi di Default del framework
         */
        protected $validationMessages = [
                "title" => [
                        "required"   => "Il nome è obbligatorio",
                        "min_length" => "Il nome è troppo corto",
                        "max_length" => "il nome è troppo lungo",
                ],
        ];


        /**
         * false abilita la validazione dei campi
         * true la disabilita
         */
        protected $skipValidation     = false;

}