<?php

namespace Tests\Feature;

use App\Models\HomeSection;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageSectionTest extends TestCase
{
    use RefreshDatabase;

    public function test_welcome_page_uses_admin_editable_sections(): void
    {
        HomeSection::create([
            'slug' => 'cards_section_title',
            'content' => 'Koleksi Pilihan Admin',
        ]);
        HomeSection::create([
            'slug' => 'cards_section_description',
            'content' => 'Deskripsi yang bisa diubah dari admin',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Koleksi Pilihan Admin');
        $response->assertSee('Deskripsi yang bisa diubah dari admin');
    }
}
