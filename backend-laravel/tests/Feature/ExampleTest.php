<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_the_application_returns_a_successful_response()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_get_all_interpretes()
    {
        $response = $this->get('/api/interpretes');

        $response->assertStatus(200)
                ->assertJsonStructure([
                    '*' => [
                        'id',
                        'nombre',
                        'nacimiento',
                        'numGoya'
                    ]
                ]);
    }

    public function test_interpretes_response_contains_penelope_cruz()
    {
        $response = $this->get('/api/interpretes');

        $response->assertStatus(200)
            ->assertJsonFragment(['id' => 1,'nombre' => 'Penélope Cruz', "nacimiento" => "1974-04-28", "numGoya" => 3]);        
    }
}
