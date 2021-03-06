<?php

/**
 * @author:    Emmanuel SMITH <hey@emmanuel-smith.me>
 * project:    truck-catalog-hexagonal
 * file:    Gearbox.php
 * Date:    19/03/2022
 * Time:    20:23
 */

namespace Configurator\Domain\Model\Parts\Gearbox;

    use Configurator\Domain\Model\Parts\Part;

    final class Gearbox extends Part
    {
        public const GEARS_MINIMAL = 6;
        public const GEARS_MAXIMAL = 16;

        public const TORQUE_MINIMAL = 500;

        public function __construct(
            private string $id,
            private GearboxType $type,
            private int $torque,
            private int $gears,
            private ?int $crawler
        ) {
        }

        public function getId(): string
        {
            return $this->id;
        }

        public function getType(): GearboxType
        {
            return $this->type;
        }

        public function isAutomatic(): bool
        {
            return $this->getType() === GearboxType::Automatic;
        }

        public function isManual(): bool
        {
            return $this->getType() === GearboxType::Manual;
        }

        public function getTorque(): int
        {
            return $this->torque;
        }

        public function getGears(): int
        {
            return $this->gears;
        }

        public function getCrawler(): ?int
        {
            return $this->crawler;
        }

        public function hasCrawlerAvailable(): bool
        {
            return !is_null($this->getCrawler());
        }
    }
