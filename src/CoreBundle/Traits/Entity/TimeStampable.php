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

namespace SolidInvoice\CoreBundle\Traits\Entity;

use ApiPlatform\Core\Annotation\ApiProperty;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

trait TimeStampable
{
    /**
     * @var DateTime
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(name="created", type="datetime")
     * @ApiProperty(iri="https://schema.org/DateTime")
     */
    protected $created;

    /**
     * @var DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated", type="datetime")
     * @ApiProperty(iri="https://schema.org/DateTime")
     */
    protected $updated;

    /**
     * Returns created.
     *
     * @return DateTime
     */
    public function getCreated(): ?DateTime
    {
        return $this->created;
    }

    /**
     * Sets created.
     *
     * @return $this
     */
    public function setCreated(DateTime $created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Returns updated.
     *
     * @return DateTime
     */
    public function getUpdated(): ?DateTime
    {
        return $this->updated;
    }

    /**
     * Sets updated.
     *
     * @return $this
     */
    public function setUpdated(DateTime $updated)
    {
        $this->updated = $updated;

        return $this;
    }
}
