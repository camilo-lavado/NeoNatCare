<?php

namespace Tests\Feature;

use App\Models\Screening;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ScreeningTest extends TestCase
{
    use RefreshDatabase;

    public function test_screening_page_requires_authentication(): void
    {
        $response = $this->get(route('screening.index'));

        $response->assertRedirect(route('login'));
    }

    public function test_low_score_redirects_to_result(): void
    {
        $user = User::factory()->create();

        // 10 respuestas en 0 (incluida la pregunta 10) -> puntaje bajo, sin alerta.
        $response = $this
            ->actingAs($user)
            ->post(route('screening.store'), [
                'answers' => array_fill(0, 10, 0),
            ]);

        $response->assertRedirect(route('screening.result'));

        $this->assertDatabaseHas('screenings', [
            'user_id' => $user->id,
            'total_score' => 0,
            'level' => 'Leve',
            'item10_alert' => false,
        ]);
    }

    public function test_item_10_alert_redirects_to_urgent_caregiver_regardless_of_total(): void
    {
        $user = User::factory()->create();

        // Puntaje total bajo en las primeras 9 preguntas, pero pregunta 10 (índice 9) > 0.
        $answers = array_fill(0, 9, 0);
        $answers[9] = 1;

        $response = $this
            ->actingAs($user)
            ->post(route('screening.store'), [
                'answers' => $answers,
            ]);

        $response->assertRedirect(route('urgent.caregiver'));

        $this->assertDatabaseHas('screenings', [
            'user_id' => $user->id,
            'total_score' => 1,
            'item10_alert' => true,
        ]);
    }

    public function test_high_score_is_classified_as_alto(): void
    {
        $user = User::factory()->create();

        // 9 preguntas en 2 (18 puntos) + pregunta 10 en 0 -> total 18, sin alerta de autolesión.
        $answers = array_fill(0, 9, 2);
        $answers[9] = 0;

        $this->actingAs($user)->post(route('screening.store'), [
            'answers' => $answers,
        ]);

        $this->assertDatabaseHas('screenings', [
            'user_id' => $user->id,
            'total_score' => 18,
            'level' => 'Alto',
            'item10_alert' => false,
        ]);
    }

    public function test_result_page_redirects_when_no_screening_exists(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get(route('screening.result'));

        $response->assertRedirect(route('screening.index'));
    }

    public function test_result_page_shows_latest_screening(): void
    {
        $user = User::factory()->create();
        Screening::factory()->for($user)->create(['level' => 'Leve-moderado', 'total_score' => 11]);

        $response = $this->actingAs($user)->get(route('screening.result'));

        $response->assertOk();
        $response->assertSee('Leve-moderado');
    }

    public function test_answers_outside_valid_range_are_rejected(): void
    {
        $user = User::factory()->create();

        $answers = array_fill(0, 10, 0);
        $answers[0] = 4; // fuera de rango (0-3)

        $response = $this->actingAs($user)->post(route('screening.store'), [
            'answers' => $answers,
        ]);

        $response->assertSessionHasErrors('answers.0');
        $this->assertDatabaseCount('screenings', 0);
    }
}
