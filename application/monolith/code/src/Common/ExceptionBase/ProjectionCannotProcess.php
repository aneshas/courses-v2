<?php

declare(strict_types=1);

namespace Galeas\Api\Common\ExceptionBase;

class ProjectionCannotProcess extends DatabaseFailure
{
    /**
     * {@inheritdoc}
     */
    final public static function getErrorIdentifier(): string
    {
        return 'Common_ProjectionCannotProcess';
    }
}
