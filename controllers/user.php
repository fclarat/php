<?php

class User
{

    public function getAll($app)
    {
        $users = $app['database']->selectAll('users');
        return json_encode($users);
    }

    public function getOne($app, $id)
    {
        $user = $app['database']->selectOne('users', $id);
        return json_encode($user);
    }

    public function delete($app, $id)
    {
        $result = $app['database']->delete('users', $id);
        return $result ? 'User Borrado' : 'User no borrado';
    }

    public function update($app, $id, $field, $value)
    {
        $result = $app['database']->update('users', $id, $field, $value);
        return $result ? 'User Actualizado' : 'User no actualizado';
    }

    public function upload($app, $id, $photo)
    {
        $target_url = "https://api.olx.com/v1.0/users/images";
        $result = false;

        if($photo['name'])
        {
            if(!$photo['error'])
            {
                $post['file'] = new CURLFile($photo['tmp_name'], $photo['type'], 'image');
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_SAFE_UPLOAD, true);
                curl_setopt($ch, CURLOPT_URL, $target_url);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $data= json_decode(curl_exec($ch));
                $result = $app['database']->update('users', $id, 'picture', $data->url);
            }

            return $result ? 'Imagen actualizada' : 'Imagen no actualizada';
        }

        return 'Error al subir la imagen';
    }

}

