<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Group;
use App\Models\Applicant;
use App\Models\ApplicantQuestionResponse;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\PartialApplicant;
use App\Models\Question;
use App\Models\Stage;
use Illuminate\Mail\Events\MessageSent;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            HomesofHopeSeeder::class,
            ConversationSeeder::class,
            GroupSeeder::class,
            ApplicantSeeder::class,
            MessageSeeder::class,
        ]);
    }
}
