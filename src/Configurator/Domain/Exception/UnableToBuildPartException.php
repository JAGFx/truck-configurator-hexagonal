<?php

namespace Configurator\Domain\Exception;

    use Configurator\Domain\FactoryExceptionInterface;

    class UnableToBuildPartException extends \Exception implements FactoryExceptionInterface
    {
        public const MESSAGE = 'The data provided do not permit to build this part';

        public function __construct(
            private string $partName,
            private string $description,
            private array $data
        ) {
            parent::__construct(self::MESSAGE.': '.$description);
        }

        public function getPartName(): string
        {
            return $this->partName;
        }

        public function getDescription(): string
        {
            return $this->description;
        }

        public function getData(): array
        {
            return $this->data;
        }
    }
