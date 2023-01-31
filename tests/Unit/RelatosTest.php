<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RelatosTest extends TestCase
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

        $usuarios_id = $this->post('/api/usuarios', $data);
        $usuarios_id = $usuarios_id[0]['id'];

        $data = [
            'relato' => 'Teste relato',
            'usuarios_id' => $usuarios_id,
        ];

        $this->post('/api/relatos', $data);

        $this->assertDatabaseHas('relatos', $data);
    }

    public function teste_read()
    {

        $response = $this->get('/api/relatos');

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

        $usuarios_id = $this->post('/api/usuarios', $data);
        $usuarios_id = $usuarios_id[0]['id'];

        $data = [
            'relato' => 'Teste relato',
            'usuarios_id' => $usuarios_id,
        ];

        $model = $this->post('/api/relatos', $data);
        $model = $model[0]['id'];

        $data = [
            'relato' => 'Teste relato update',
            'usuarios_id' => $usuarios_id,
        ];

        $route = "/api/relatos/" . $model;

        $this->put($route, $data);

        $this->assertDatabaseHas('relatos', $data);
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

        $usuarios_id = $this->post('/api/usuarios', $data);
        $usuarios_id = $usuarios_id[0]['id'];

        $data = [
            'relato' => 'Teste relato',
            'usuarios_id' => $usuarios_id,
        ];

        $model = $this->post('/api/relatos', $data);
        $model = $model[0]['id'];

        $route = "/api/relatos/" . $model;

        $response = $this->delete($route);

        $response->assertStatus(200);
    }
}
