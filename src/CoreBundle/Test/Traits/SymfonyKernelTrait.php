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

namespace SolidInvoice\CoreBundle\Test\Traits;

use SolidInvoice\Kernel;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\KernelInterface;

/**
 * @codeCoverageIgnore
 */
trait SymfonyKernelTrait
{
    /**
     * @var KernelInterface
     */
    protected $kernel;

    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @before
     */
    protected function setUpSymfonyKernel(): void
    {
        if (null === $this->kernel) {
            $this->kernel = $this->createKernel();
            $this->kernel->boot();
            $this->container = $this->kernel->getContainer();
        }
    }

    protected function createKernel(): KernelInterface
    {
        $class = $this->getKernelClass();
        $options = $this->getKernelOptions();

        return new $class(
            $options['environment'] ?? 'test',
            $options['debug'] ?? true
        );
    }

    protected function getKernelClass(): string
    {
        return Kernel::class;
    }

    protected function getKernelOptions(): array
    {
        return ['environment' => 'test', 'debug' => true];
    }

    /**
     * @after
     */
    protected function tearDownSymfonyKernel(): void
    {
        if (null !== $this->kernel) {
            $this->kernel->shutdown();
        }
    }
}
