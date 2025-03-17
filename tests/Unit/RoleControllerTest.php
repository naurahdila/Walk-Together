<?php

namespace Tests\Feature;

use App\Models\Role;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class RoleControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_returns_roles_view()
    {
        Role::create(['name' => 'Admin']);

        $response = $this->get(route('admin.roles.index'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.roles.index');
        $response->assertViewHas('roles');
    }

    public function test_store_creates_new_role()
    {
        $data = ['name' => 'Editor'];

        $response = $this->post(route('admin.roles.store'), $data);

        $response->assertRedirect(route('admin.roles.index'));
        $response->assertSessionHas('success', 'Role created successfully!');
        $this->assertDatabaseHas('roles', ['name' => 'Editor']);
    }

    public function test_update_role()
    {
        $role = Role::create(['name' => 'User']);

        $data = ['name' => 'Updated User'];

        $response = $this->put(route('admin.roles.update', $role->id), $data);

        $response->assertRedirect(route('admin.roles.index'));
        $response->assertSessionHas('success', 'Role updated successfully!');
        $this->assertDatabaseHas('roles', ['name' => 'Updated User']);
    }

    public function test_destroy_deletes_role()
    {
        $role = Role::create(['name' => 'Guest']);

        $response = $this->delete(route('admin.roles.destroy', $role->id));

        $response->assertRedirect(route('admin.roles.index'));
        $response->assertSessionHas('success', 'Role deleted successfully!');
        $this->assertDatabaseMissing('roles', ['id' => $role->id]);
    }
}
