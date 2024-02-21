<?php

namespace App\Constants;

class ValidationRules
{
    const MAX_STRING_LENGTH = 'required|string|max:255';
    const DATE = ValidationRules::DATE;
    const REQ_INT = ValidationRules::REQ_INT;
}
