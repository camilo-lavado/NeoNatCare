<?php

namespace Tests\Feature;

use App\Models\MentalHealthLog;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MentalHealthLogTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page_requires_authentication(): void
    {
        $response = $this->get(route('mood-log.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_store_creates_log_for_authenticated_user(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('mood-log.store'), [
            'sleep_hours' => '4-6',
            'mood' => 'normal',
            'anxiety_level' => 55,
            'note' => 'Día tranquilo',
        ]);

        $response->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('mental_health_logs', [
            'user_id' => $user->id,
            'sleep_hours' => '4-6',
            'mood' => 'normal',
            'anxiety_level' => 55,
            'note' => 'Día tranquilo',
        ]);
    }

    public function test_store_rejects_a_mood_outside_the_allowed_set(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('mood-log.store'), [
            'sleep_hours' => '4-6',
            'mood' => 'furious',
            'anxiety_level' => 55,
        ]);

        $response->assertSessionHasErrors('mood');
        $this->assertDatabaseCount('mental_health_logs', 0);
    }

    public function test_index_shows_the_users_recent_logs(): void
    {
        $user = User::factory()->create();
        MentalHealthLog::factory()->for($user)->create(['mood' => 'good']);

        $response = $this->actingAs($user)->get(route('mood-log.index'));

        $response->assertOk();
        $response->assertSee('Bien');
    }

    public function test_destroy_removes_the_owners_log(): void
    {
        $user = User::factory()->create();
        $log = MentalHealthLog::factory()->for($user)->create();

        $response = $this->actingAs($user)->delete(route('mood-log.destroy', $log));

        $response->assertRedirect(route('mood-log.index'));
        $this->assertDatabaseMissing('mental_health_logs', ['id' => $log->id]);
    }

    public function test_destroy_forbids_deleting_another_users_log(): void
    {
        $owner = User::factory()->create();
        $intruder = User::factory()->create();
        $log = MentalHealthLog::factory()->for($owner)->create();

        $response = $this->actingAs($intruder)->delete(route('mood-log.destroy', $log));

        $response->assertForbidden();
        $this->assertDatabaseHas('mental_health_logs', ['id' => $log->id]);
    }
}
