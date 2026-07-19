<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GosaliPageTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_create_and_public_page_can_render_gosali_content(): void
    {
        $user = User::factory()->create([
            'email_verified_at' => now(),
        ]);

        $response = $this->actingAs($user)->post(route('admin.gosali.store'), [
            'title' => 'Babak Gosali Ritual',
            'duration' => '08:45',
            'sort_order' => 1,
            'video_url' => 'https://www.youtube.com/watch?v=dQw4w9WgXcQ',
            'description' => 'Narasi gosali yang disimpan di database.',
        ]);

        $response->assertRedirect(route('admin.gosali.index'));
        $this->assertDatabaseHas('gosali_videos', [
            'title' => 'Babak Gosali Ritual',
        ]);

        $publicResponse = $this->get(route('gosali'));
        $publicResponse->assertStatus(200);
        $publicResponse->assertSee('Babak Gosali Ritual');
        $publicResponse->assertSee('Narasi gosali yang disimpan di database.');
    }
}
