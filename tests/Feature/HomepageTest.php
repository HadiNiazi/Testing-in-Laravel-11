<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class HomepageTest extends TestCase
{

    use RefreshDatabase;

    public function test_homepage_is_loading()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_homepage_contains_laravel_text()
    {
        $response = $this->get('/');

        $response->assertSee('Laravel');
    }

    public function test_user_is_saved_in_database()
    {
        $user = User::create([
            'name' => 'Hadayat Niazi',
            'email' => 'hadiniazi801@gmail.com',
            'password' => bcrypt(12345678)
        ]);

        $this->assertNotNull($user);
        $this->assertEquals('Hadayat Niazi', $user->name);
    }


}
