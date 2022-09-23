<?php

namespace App\Services;

use App\Post;

class PostService extends CrudService
{
    public function __construct()
    {
        $this->model(Post::class);
    }

    public function get()
    {
        return $this->_all(null, ['users']);
    }

    public function create($request)
    {
        return $this->_create($request);
    }

    public function show($id)
    {
        return $this->_find($id);
    }

    public function update($post_id,$request)
    {
        return $this->_update($post_id,$request);
    }
    public function delete($id)
    {
        return $this->_delete($id);
    }
}
