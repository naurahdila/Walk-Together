<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:fresh --seed');
    }

    /** @test */
    public function admin_dapat_melihat_halaman_daftar_user()
    {
        User::factory()->count(3)->create(); 
        $response = $this->get(route('admin.users.index'));
        $response->assertStatus(200);
        $response->assertSee('User Management');
    }

    /** @test */
    public function admin_dapat_membuat_user_baru()
    {
        $admin = User::factory()->create(['role_id' => Role::where('name', 'admin')->first()->id]);
        $role = Role::where('name', 'user')->first(); // Ambil role user

        $response = $this->actingAs($admin)->post(route('admin.users.store'), [
            'name' => 'testing',
            'email' => 'testppl@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'role_id' => $role->id,
        ]);

        $response->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseHas('users', ['email' => 'test@gmail.com']);
    }

    /** @test */
    public function admin_dapat_melihat_halaman_edit_user()
    {
        $admin = User::factory()->create(['role_id' => Role::where('name', 'admin')->first()->id]);
        $user = User::factory()->create();

        $response = $this->actingAs($admin)->get(route('admin.users.edit', $user->id));

        $response->assertStatus(200);
        $response->assertSee($user->name); 
    }

    /** @test */
    public function admin_dapat_memperbarui_data_user()
    {
        $admin = User::factory()->create(['role_id' => Role::where('name', 'admin')->first()->id]);
        $user = User::factory()->create();
        $newRole = Role::where('name', 'user')->first();

        $response = $this->actingAs($admin)->put(route('admin.users.update', $user->id), [
            'name' => 'Updated Name',
            'email' => $user->email,
            'role_id' => $newRole->id,
        ]);

        $response->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseHas('users', ['name' => 'Updated Name']);
    }

    /** @test */
    public function admin_dapat_menghapus_user()
    {
        $admin = User::factory()->create(['role_id' => Role::where('name', 'admin')->first()->id]);
        $user = User::factory()->create();

        $response = $this->actingAs($admin)->delete(route('admin.users.destroy', $user->id));

        $response->assertRedirect(route('admin.users.index'));
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }
}
