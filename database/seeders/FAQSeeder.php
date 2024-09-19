<?php

namespace Database\Seeders;

use App\Models\FAQ;
use Illuminate\Database\Seeder;

class FAQSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        FAQ::create([
            'question' => 'How do I register for training courses?',
            'answer' => 'To register for any course, visit the desired course page and click “Register Now”. Follow the steps to confirm registration.'
        ]);

        FAQ::create([
            'question' => 'What payment options are available?',
            'answer' => 'We offer many payment options such as credit cards, cash on delivery, and e-wallets such as PayPal.'
        ]);
    }
}
