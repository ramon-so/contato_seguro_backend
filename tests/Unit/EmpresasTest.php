<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmpresasTest extends TestCase
{
    use RefreshDatabase;

    public function teste_create()
    {
        $data = [
            'nome' => 'Ramon Sousa',
            'cnpj' => '98106462000192',
            'endereco' => 'Rua Lindolfo Monte Verde, São José Operário',
        ];

        $this->post('/api/empresas', $data);

        $this->assertDatabaseHas('empresas', $data);
    }

    public function teste_read()
    {

        $response = $this->get('/api/empresas');

        $response->assertStatus(200);
    }

    public function teste_update()
    {

        $data = [
            'nome' => 'Ramon Sousa',
            'cnpj' => '98106462000192',
            'endereco' => 'Rua Lindolfo Monte Verde, São José Operário',
        ];

        $model = $this->post('/api/empresas', $data);
        $model = $model[0]['id'];

        $data = [
            'nome' => 'Ramon Sousa',
            'cnpj' => '98106462000192',
            'endereco' => 'Avenida Rio Grande do Norte, Estados',
        ];

        $route = "/api/empresas/" . $model;

        $this->put($route, $data);

        $this->assertDatabaseHas('empresas', $data);
    }

    public function teste_delete()
    {

        $data = [
            'nome' => 'Ramon Sousa',
            'cnpj' => '98106462000192',
            'endereco' => 'Rua Lindolfo Monte Verde, São José Operário',
        ];

        $model = $this->post('/api/empresas', $data);
        $model = $model[0]['id'];

        $route = "/api/empresas/" . $model;

        $response = $this->delete($route);

        $response->assertStatus(200);
    }
}
