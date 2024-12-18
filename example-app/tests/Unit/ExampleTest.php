<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\MediaType;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MediaTypeManagementTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function an_admin_can_view_a_list_of_media_types()
    {
        // Arrange: Create an admin user and some media types
        $admin = User::factory()->create(['role' => 'admin']);
        MediaType::factory()->count(5)->create();

        // Act: Log in as the admin and visit the media types page
        $response = $this->actingAs($admin)->get('/admin/media-types');

        // Assert: Check if the media types are displayed
        $response->assertStatus(200);
        $response->assertSee('Media Types');
    }

    /** @test */
    public function an_admin_can_update_a_media_type()
    {
        // Arrange: Create an admin user and a media type
        $admin = User::factory()->create(['role' => 'admin']);
        $mediaType = MediaType::factory()->create(['name' => 'Book']);

        // Act: Log in as the admin and update the media type
        $response = $this->actingAs($admin)->put("/admin/media-types/{$mediaType->id}", [
            'name' => 'Updated Book'
        ]);

        // Assert: Check if the media type is updated
        $response->assertStatus(200);
        $this->assertDatabaseHas('media_types', ['name' => 'Updated Book']);
    }

    /** @test */
    public function an_error_is_shown_if_invalid_data_is_provided()
    {
        // Arrange: Create an admin user and a media type
        $admin = User::factory()->create(['role' => 'admin']);
        $mediaType = MediaType::factory()->create(['name' => 'Book']);

        // Act: Attempt to update the media type with invalid data
        $response = $this->actingAs($admin)->put("/admin/media-types/{$mediaType->id}", [
            'name' => '' // Invalid name
        ]);

        // Assert: Check if an error is returned
        $response->assertSessionHasErrors('name');
    }
}
