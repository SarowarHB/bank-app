<?php

namespace App\Library\Services;

use Exception;
use App\Models\User;
use App\Library\Helper;
use Illuminate\Support\Facades\DB;

class UserService extends BaseService
{
    public function createUser(array $data): bool
    {
        try {
            User::create($data);
            return $this->handleSuccess('User Created Successfully');
        } catch (Exception $e) {
            return $this->handleException($e);
        }
    }
}
