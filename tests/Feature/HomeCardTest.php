<?php

namespace Tests\Feature;

use App\Models\HomeCard;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomeCardTest extends TestCase
{
    use RefreshDatabase;

    public function test_welcome_page_displays_home_cards_with_correct_routes(): void
    {
        HomeCard::create([
            'judul' => 'Galeri Museum',
            'deskripsi' => 'Koleksi visual museum',
            'route_name' => 'galeri',
            'urutan' => 1,
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Galeri Museum');
        $response->assertSee('Koleksi visual museum');
        $response->assertSee(route('galeri'));
    }
}
