<?php

namespace App\Repositories;

use App\Models\Notice;


class NoticRepo
{
    public function delete($id)
    {
        return Notice::destroy($id);
    }
}
