<?php

namespace Tests\Feature;

use App\Models\Newborn;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class NewbornTest extends TestCase
{
    use RefreshDatabase;

    public function test_create_page_requires_authentication(): void
    {
        $response = $this->get(route('baby.create'));

        $response->assertRedirect(route('login'));
    }

    public function test_store_creates_newborn_for_authenticated_user(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('baby.store'), [
            'name' => 'Lucas',
            'birth_date' => '2026-06-24',
            'gestational_weeks' => 35,
            'apgar_minute_1' => 8,
            'apgar_minute_5' => 9,
        ]);

        $response->assertRedirect(route('dashboard'));

        $this->assertDatabaseHas('newborns', [
            'user_id' => $user->id,
            'name' => 'Lucas',
            'gestational_weeks' => 35,
        ]);
    }

    public function test_store_validates_gestational_weeks_range(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('baby.store'), [
            'name' => 'Lucas',
            'birth_date' => '2026-06-24',
            'gestational_weeks' => 50,
        ]);

        $response->assertSessionHasErrors('gestational_weeks');
        $this->assertDatabaseCount('newborns', 0);
    }

    public function test_edit_redirects_to_create_when_no_newborn_exists(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('baby.edit'));

        $response->assertRedirect(route('baby.create'));
    }

    public function test_edit_shows_existing_newborn(): void
    {
        $user = User::factory()->create();
        Newborn::factory()->for($user)->create(['name' => 'Valentina']);

        $response = $this->actingAs($user)->get(route('baby.edit'));

        $response->assertOk();
        $response->assertSee('Valentina');
    }

    public function test_update_modifies_the_users_newborn(): void
    {
        $user = User::factory()->create();
        $newborn = Newborn::factory()->for($user)->create(['name' => 'Lucas']);

        $response = $this->actingAs($user)->patch(route('baby.update'), [
            'name' => 'Lucas Ignacio',
            'birth_date' => $newborn->birth_date->format('Y-m-d'),
            'gestational_weeks' => $newborn->gestational_weeks,
        ]);

        $response->assertRedirect(route('profile.index'));

        $this->assertDatabaseHas('newborns', [
            'id' => $newborn->id,
            'name' => 'Lucas Ignacio',
        ]);
    }
}
