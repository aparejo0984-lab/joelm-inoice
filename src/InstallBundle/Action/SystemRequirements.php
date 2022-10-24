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

namespace SolidInvoice\InstallBundle\Action;

use SolidInvoice\AppRequirements;
use SolidInvoice\CoreBundle\Templating\Template;

final class SystemRequirements
{
    public function __invoke(): Template
    {
        return new Template(
            '@SolidInvoiceInstall/system_check.html.twig',
            [
                'requirements' => new AppRequirements(),
            ]
        );
    }
}
