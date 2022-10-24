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

namespace SolidInvoice\InvoiceBundle\Action;

use SolidInvoice\CoreBundle\Templating\Template;
use SolidInvoice\InvoiceBundle\Entity\RecurringInvoice;

final class ViewRecurring
{
    public function __invoke(RecurringInvoice $invoice): Template
    {
        return new Template('@SolidInvoiceInvoice/Default/view_recurring.html.twig', ['invoice' => $invoice]);
    }
}
