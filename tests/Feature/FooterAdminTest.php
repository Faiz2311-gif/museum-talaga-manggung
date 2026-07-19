<?php

namespace Tests\Feature;

use App\Models\HomeSection;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class FooterAdminTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_update_and_render_dynamic_footer_content(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/admin/footer/update', [
            'footer_col1_title' => 'Museum Uji',
            'footer_col1_text' => 'Deskripsi footer uji.',
            'footer_col1_copyright' => '© 2026 Uji Coba.',
            'footer_col2_title' => 'Akses Cepat',
            'footer_col2_links' => "Beranda|/\nBerita|/berita",
            'footer_col3_title' => 'Informasi',
            'footer_col3_links' => "Privasi|#\nKontak|#",
        ]);

        $response->assertRedirect(route('admin.footer.index'));
        $this->assertDatabaseHas('home_sections', [
            'slug' => 'footer_col1_title',
            'content' => 'Museum Uji',
        ]);
        $this->assertDatabaseHas('home_sections', [
            'slug' => 'footer_col2_links',
            'content' => "Beranda|/\nBerita|/berita",
        ]);

        $publicResponse = $this->get('/');
        $publicResponse->assertStatus(200);
        $publicResponse->assertSee('Museum Uji');
        $publicResponse->assertSee('Beranda');
        $publicResponse->assertSee('Privasi');
    }
}
