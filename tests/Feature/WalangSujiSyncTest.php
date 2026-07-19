<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\WalangSujiVideo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class WalangSujiSyncTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_create_is_rendered_on_public_page(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $response = $this->actingAs($user)->post(route('admin.walangsuji.store'), [
            'title' => 'Babak Ritual Adat',
            'duration' => '12:04',
            'sort_order' => 1,
            'video_url' => 'https://example.com/video.mp4',
            'description' => 'Narasi ritual adat yang disimpan di database.',
        ]);

        $response->assertRedirect(route('admin.walangsuji.index'));
        $this->assertDatabaseHas('walang_suji_videos', [
            'title' => 'Babak Ritual Adat',
        ]);

        $publicResponse = $this->get(route('walangsuji'));
        $publicResponse->assertStatus(200);
        $publicResponse->assertSee('Babak Ritual Adat');
        $publicResponse->assertSee('Narasi ritual adat yang disimpan di database.');
    }

    public function test_youtube_url_is_rendered_with_embed_player(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $response = $this->actingAs($user)->post(route('admin.walangsuji.store'), [
            'title' => 'Babak YouTube',
            'duration' => '03:12',
            'sort_order' => 2,
            'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'description' => 'Konten dari YouTube.',
        ]);

        $response->assertRedirect(route('admin.walangsuji.index'));

        $publicResponse = $this->get(route('walangsuji'));
        $publicResponse->assertStatus(200);
        $publicResponse->assertSee('https://www.youtube.com/embed/dQw4w9WgXcQ');
    }
}
