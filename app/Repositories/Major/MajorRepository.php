<?php
namespace App\Repositories\Major;

use App\Repositories\EloquentRepository;
use App\Models\Major;

class MajorRepository extends EloquentRepository implements MajorRepositoryInterface
{

    public function getModel()
    {
        return Major::class;
    }

    public function getMajorCode()
    {
        return $this->model->pluck('code');
    }
}
