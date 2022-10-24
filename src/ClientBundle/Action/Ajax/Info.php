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

namespace SolidInvoice\ClientBundle\Action\Ajax;

use Money\Currency;
use SolidInvoice\ClientBundle\Entity\Client;
use SolidInvoice\CoreBundle\Response\AjaxResponse;
use SolidInvoice\CoreBundle\Traits\JsonTrait;
use SolidInvoice\MoneyBundle\Formatter\MoneyFormatter;
use SolidInvoice\MoneyBundle\Formatter\MoneyFormatterInterface;
use Twig\Environment;

final class Info implements AjaxResponse
{
    use JsonTrait;

    /**
     * @var Environment
     */
    private $twig;

    /**
     * @var Currency
     */
    private $currency;

    /**
     * @var MoneyFormatter
     */
    private $formatter;

    public function __construct(Environment $twig, MoneyFormatterInterface $formatter, Currency $currency)
    {
        $this->twig = $twig;
        $this->currency = $currency;
        $this->formatter = $formatter;
    }

    public function __invoke(Client $client, string $type = 'quote')
    {
        $content = $this->twig->render(
            '@SolidInvoiceClient/Ajax/info.html.twig',
            [
                'client' => $client,
                'type' => $type,
            ]
        );

        $currency = $client->getCurrency() ?? $this->currency;

        return $this->json([
            'content' => $content,
            'currency' => $currency->getCode(),
            'currency_format' => $this->formatter->getCurrencySymbol($currency),
        ]);
    }
}
