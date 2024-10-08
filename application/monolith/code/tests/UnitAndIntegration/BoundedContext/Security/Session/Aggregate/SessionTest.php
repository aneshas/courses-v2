<?php

declare(strict_types=1);

namespace Tests\Galeas\Api\UnitAndIntegration\BoundedContext\Security\Session\Aggregate;

use Galeas\Api\BoundedContext\Security\Session\Aggregate\Session;
use Galeas\Api\BoundedContext\Security\Session\ValueObject\SessionDetails;
use Galeas\Api\BoundedContext\Security\Session\ValueObject\SessionIsSignedOut;
use Galeas\Api\Common\Id\Id;
use PHPUnit\Framework\Assert;
use Tests\Galeas\Api\UnitAndIntegration\UnitTestBase;

class SessionTest extends UnitTestBase
{
    /**
     * @test
     */
    public function testCreate(): void
    {
        $sessionDetails = SessionDetails::fromProperties(
            Id::createNew(),
            'test_username',
            'test_email',
            'test_hashed_password',
            'by_device_label',
            '127.0.0.1',
            'with_session_token'
        );
        $sessionIsSignedOut = SessionIsSignedOut::fromProperties(
            'with_session_token',
            '127.0.0.1'
        );

        $id = Id::createNew();
        $session = Session::fromProperties(
            $id,
            $sessionDetails,
            $sessionIsSignedOut
        );

        Assert::assertEquals($id, $session->id());
        Assert::assertEquals($sessionDetails, $session->sessionDetails());
        Assert::assertEquals($sessionIsSignedOut, $session->sessionIsSignedOut());
    }
}
