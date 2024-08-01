<?php

namespace App\Services\forms;

use App\Models\forms\FormSponsorshipM;

class FormsSponsorshipServices
{
    static public function AddNew(array $data)
    {
        $create = FormSponsorshipM::create($data);
        // send mail to admin
        // send mail to user
        return $create;
    }
}
