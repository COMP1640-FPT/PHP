<?php
namespace App\Repositories\Request;

interface RequestRepositoryInterface
{
    public function getModel();
    public function getRequestsByStatus($status);
}
