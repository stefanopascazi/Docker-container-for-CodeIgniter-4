<?php

namespace App\Models\Users;

use CodeIgniter\Model;

class User extends Model
{
    /**
     * Imposto la tabella
     */
    protected $table = 'users';

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
    protected $returnType = '\App\Entities\Users\User';

    /** ENGINE=InnoDB DEFAULT CHARSET=utf8;
     * Imposta il metodo di cancellazione leggera
     * Settando su true non viene eseguita la cancellazione ed il dato viene mantenuto
     */
    protected $useSoftDeletes = true;

    /**
     * Vengono indicati i campi su cui possono essere eseguite le operazioni di insert o update
     * In questo modo le operazioni di massa sono più efficaci e senza errori
     */
    protected $allowedFields = ['name', 'surname', 'email', 'password', 'enable', 'role'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    /**
     * Array contenente tutti i tipi di validazione richesti.
     * Vedi la sezione avilable rules di CodeIgniter: https://codeigniter4.github.io/userguide/libraries/validation.html#available-rules
     */
    protected $validationRules    = [
        "name"             => "required|min_length[3]|max_length[255]",
        "surname"          => "required|min_length[3]|max_length[255]",
        "email"            => "required|valid_email|is_unique[users.email,id,{id}]",
        "password"         => "required|min_length[6]",
        "repeat_password"  => "matches[password]"
    ];

    /**
     * Array contenente i messaggi per le validazioni.
     * In questo modo vengono sovrascritti i regolari messaggi di Default del framework
     */
    protected $validationMessages = [
        "name" => [
            "required"   => "Il nome è obbligatorio",
            "min_length" => "Il nome è troppo corto",
            "max_length" => "il nome è troppo lungo",
        ],
        "surname" => [
            "required"   => "Il cognome è obbligatorio",
            "min_length" => "Il cognome è troppo corto",
            "max_length" => "il cognome è troppo lungo",
        ],
        "email" => [
            "required"    => "La email è obbligatoria",
            "valid_email" => "L'indirizzo email non è valido",
            "is_unique"   => "La mail inserita esiste nei nostri archivi",
        ],
        "password" => [
            "required"   => "La password è obbligatoria",
            "min_length" => "La password è troppo breve. Utilizza minimo 6 caratteri",
        ],
        "repeat_password" => [
            "matches" => "Le due password devono coincidere",
        ]
    ];


    /**
     * false abilita la validazione dei campi
     * true la disabilita
     */
    protected $skipValidation     = false;

    protected $beforeInsert = ['hashPassword'];
    protected $beforeUpdate = ['hashPassword'];


    protected function hashPassword(array $data)
    {
        if (! isset($data['data']['password']) ) return $data;

        $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);

        return $data;
    }

}