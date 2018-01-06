<?php

namespace NathanDunn\Chargebee\Exceptions;

use Http\Client\Exception\HttpException;

class ApiRequestLimitExceededException extends HttpException
{
}
