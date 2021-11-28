<?php

namespace app\components\DeviceDetect;

class DeviceDetect implements DeviceDetectInterface
{
    private bool $isMobile;
    private bool $isTablet;

    public function __construct(bool $isMobile, bool $isTablet)
    {
        $this->isMobile = $isMobile;
        $this->isTablet = $isTablet;
    }

    public function isMobile(): bool
    {
        return $this->isMobile;
    }

    public function isTablet(): bool
    {
        return $this->isTablet;
    }

    public function isDesktop(): bool
    {
        return !$this->isMobile;
    }
}
