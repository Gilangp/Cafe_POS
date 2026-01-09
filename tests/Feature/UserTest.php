<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function admin_can_view_users_list()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);

        $response = $this->get('/admin/users');
        $response->assertStatus(200);
        $response->assertViewIs('admin.users.index');
    }

    #[Test]
    public function kasir_cannot_access_users_list()
    {
        $kasir = User::factory()->create(['role' => 'kasir']);
        $this->actingAs($kasir);

        $response = $this->get('/admin/users');
        $response->assertStatus(403);
    }

    #[Test]
    public function admin_can_view_create_user_form()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);

        $response = $this->get('/admin/users/create');
        $response->assertStatus(200);
        $response->assertViewIs('admin.users.create');
    }

    #[Test]
    public function admin_can_create_user()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($admin);

        $response = $this->post('/admin/users', [
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'kasir',
            'status' => 'active',
        ]);

        $response->assertRedirect('/admin/users');
        $this->assertDatabaseHas('users', ['email' => 'john@example.com']);
    }

    #[Test]
    public function email_must_be_unique()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        User::factory()->create(['email' => 'existing@example.com']);
        $this->actingAs($admin);

        $response = $this->post('/admin/users', [
            'name' => 'John Doe',
            'email' => 'existing@example.com',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'role' => 'kasir',
            'status' => 'active',
        ]);

        $response->assertSessionHasErrors(['email']);
    }

    #[Test]
    public function admin_can_edit_user()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create(['name' => 'Old Name']);
        $this->actingAs($admin);

        $response = $this->put("/admin/users/{$user->id}", [
            'name' => 'New Name',
            'email' => $user->email,
            'role' => 'kasir',
            'status' => 'active',
        ]);

        $response->assertRedirect('/admin/users');
        $this->assertDatabaseHas('users', ['id' => $user->id, 'name' => 'New Name']);
    }

    #[Test]
    public function admin_can_delete_user()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create();
        $this->actingAs($admin);

        $response = $this->delete("/admin/users/{$user->id}");

        $response->assertRedirect('/admin/users');
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    #[Test]
    public function admin_can_toggle_user_status()
    {
        $admin = User::factory()->create(['role' => 'admin']);
        $user = User::factory()->create(['status' => 'active']);
        $this->actingAs($admin);

        $response = $this->patch("/admin/users/{$user->id}/toggle-status");

        $response->assertRedirect('/admin/users');
        $user->refresh();
        $this->assertEquals('inactive', $user->status);
    }
}
