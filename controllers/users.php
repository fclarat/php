<?php

class Users {

    public function getAll($app) {
        $users = $app['database']->selectAll('users');
        return json_encode($users);
    }

    public function getOne($app, $id) {
        $user = $app['database']->selectOne('users', $id);
        return json_encode($user);
    }


    public function delete($app, $id) {
        $result = $app['database']->delete('users', $id);
        return $result ? 'User Borrado' : 'User no borrado';
    }

}

