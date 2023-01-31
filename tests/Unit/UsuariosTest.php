<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UsuariosTest extends TestCase
{

    use RefreshDatabase;

    public function teste_create()
    {
        $data = [
            'nome' => 'Ramon Sousa',
            'email' => 'ramon.susa1997@outlook.com',
            'telefone' => '11994428533',
            'data_de_nascimento' => '1997-11-12',
            'cidade_onde_nasceu' => 'São Paulo',
        ];

        $this->post('/api/usuarios', $data);

        $this->assertDatabaseHas('usuarios', $data);
    }

    public function teste_read()
    {

        $response = $this->get('/api/usuarios');

        $response->assertStatus(200);
    }

    public function teste_update()
    {

        $data = [
            'nome' => 'Ramon Sousa',
            'email' => 'ramon.susa1997@outlook.com',
            'telefone' => '11994428533',
            'data_de_nascimento' => '1997-11-12',
            'cidade_onde_nasceu' => 'São Paulo',
        ];

        $model = $this->post('/api/usuarios', $data);
        $model = $model[0]['id'];

        $data = [
            'nome' => 'Ramon Sousa',
            'email' => 'ramon.susa1997@outlook.com',
            'telefone' => '11994428533',
            'data_de_nascimento' => '1997-11-12',
            'cidade_onde_nasceu' => 'São Paulo update',
        ];

        $route = "/api/usuarios/" . $model;

        $this->put($route, $data);

        $this->assertDatabaseHas('usuarios', $data);
    }

    public function teste_delete()
    {

        $data = [
            'nome' => 'Ramon Sousa',
            'email' => 'ramon.susa1997@outlook.com',
            'telefone' => '11994428533',
            'data_de_nascimento' => '1997-11-12',
            'cidade_onde_nasceu' => 'São Paulo',
        ];

        $model = $this->post('/api/usuarios', $data);
        $model = $model[0]['id'];

        $route = "/api/usuarios/" . $model;

        $response = $this->delete($route);

        $response->assertStatus(200);
    }
}
