<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\FonnteService;

class TestWhatsApp extends Command
{
    protected $signature = 'test:whatsapp {phone?}';
    protected $description = 'Test WhatsApp notification';

    public function handle()
    {
        $phone = $this->argument('phone') ?: '6281279802064';
        $message = 'Test WhatsApp dari Smart Village - ' . now()->format('Y-m-d H:i:s');

        $this->info("Testing WhatsApp notification...");
        $this->info("Phone: $phone");
        $this->info("Message: $message");
        $this->newLine();

        $fonnte = app(FonnteService::class);
        $result = $fonnte->sendWithResponse($phone, $message);

        $this->info("Result:");
        $this->line(json_encode($result, JSON_PRETTY_PRINT));

        if ($result['ok']) {
            $this->info("✅ WhatsApp test berhasil!");
        } else {
            $this->error("❌ WhatsApp test gagal!");
            $this->error("Error: " . json_encode($result['response']));
        }
    }
}
