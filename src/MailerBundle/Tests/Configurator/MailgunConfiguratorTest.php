<?php

declare(strict_types=1);

/*
 * This file is part of SolidInvoice project.
 *
 * (c) Pierre du Plessis <open-source@solidworx.co>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace SolidInvoice\MailerBundle\Tests\Configurator;

use PHPUnit\Framework\TestCase;
use SolidInvoice\MailerBundle\Configurator\MailgunConfigurator;
use SolidInvoice\MailerBundle\Form\Type\TransportConfig\MailgunApiTransportConfigType;
use Symfony\Component\Mailer\Transport\Dsn;

class MailgunConfiguratorTest extends TestCase
{
    public function testName(): void
    {
        self::assertSame('Mailgun', (new MailgunConfigurator())->getName());
    }

    public function testForm(): void
    {
        self::assertSame(MailgunApiTransportConfigType::class, (new MailgunConfigurator())->getForm());
    }

    public function testConfigure(): void
    {
        self::assertEquals(Dsn::fromString('mailgun+api://foobar:baz@default'), (new MailgunConfigurator())->configure(['key' => 'foobar', 'domain' => 'baz']));
    }
}
