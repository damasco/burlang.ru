<?php

namespace app\components\DeviceDetect;

interface DeviceDetectInterface
{
    public function isMobile(): bool;

    public function isTablet(): bool;

    public function isDesktop(): bool;
}
