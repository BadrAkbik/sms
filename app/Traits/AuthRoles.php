<?php

namespace App\Traits;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Response;


trait AuthRoles
{
    public function getRoleModel($request)
    {
       $roleName = $this->validateRoleName($request);

        return 'App\Models\\' . ucfirst($roleName);
    }

    public function validateRoleName($request)
    {
        $allowedRoles = ['student', 'teacher', 'admin'];
        
        $roleName = $request->get('role');

        if (!in_array($roleName, $allowedRoles)) {
            throw new HttpResponseException(
                response()->json(['error' => 'This role is not supported'], Response::HTTP_NOT_ACCEPTABLE)
            );
        }
        return $roleName;
    }
}
