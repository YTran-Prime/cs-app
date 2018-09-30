<?php

namespace App\Customer\Base;

use Symfony\Component\HttpFoundation\Request;

abstract class BaseFormRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
