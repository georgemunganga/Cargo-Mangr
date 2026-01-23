<?php

use Spatie\LaravelSettings\Exceptions\SettingAlreadyExists;
use Spatie\LaravelSettings\Migrations\SettingsMigration;

class AddRefundSettings extends SettingsMigration
{
    public function up(): void
    {
        $this->addSettingIfMissing('general.enable_refund_payments', true);
        $this->addSettingIfMissing('general.allow_client_refunds', false);
    }

    private function addSettingIfMissing(string $property, $value): void
    {
        try {
            $this->migrator->add($property, $value);
        } catch (SettingAlreadyExists $e) {
            // Ignore existing settings to keep migrations idempotent.
        }
    }
}
