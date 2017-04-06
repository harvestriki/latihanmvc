<?php

/**
 * Description of Anggota
 *
 * @author Riki
 */
require_once "vendor/BaliFramework/Core/Model.php";

class Anggota extends Model {

    public $id;
    public $nama;
    public $email;
    public $user_id;
    public $password;
    public $jenis;
    private $collection;

    public function table() {
        return 'm_anggota';
    }

    public function rules() {
        return [
            [['nama', 'email', 'user_id', 'password'], 'required']
        ];
    }

    public function labels() {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'email' => 'E-Mail',
            'user_id' => 'User ID',
            'password' => 'Password',
            'jenis' => 'Jenis'
        ];
    }

}
