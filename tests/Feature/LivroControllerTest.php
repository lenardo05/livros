<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\Livro;

class LivroControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function test_criar_livro()
    {
        $dados_livro = [
            'titulo' => 'Novo Livro',
            'editora' => 'Editora ABC',
            'edicao' => 1,
            'ano_publicacao' => 2022,
        ];

        $response = $this->post('/livros/salvar', $dados_livro);

        $response->assertStatus(302);
        $this->assertDatabaseHas('livros', $dados_livro);
    }

    public function test_ler_livro()
    {
        $livro = Livro::factory()->create();

        $response = $this->get("/livros/{$livro->id}");

        $response->assertStatus(200);
    }

    public function test_atualizar_livro()
    {
        $livro = Livro::factory()->create();
        $novos_dados = [
            'titulo' => 'Livro Atualizado',
            'editora' => 'Nova Editora',
            'edicao' => 2,
            'ano_publicacao' => 2023,
        ];

        $response = $this->put("/livros/{$livro->id}/atualizar", $novos_dados);

        $response->assertStatus(302);
        $this->assertDatabaseHas('livros', $novos_dados);
    }

    public function test_excluir_livro()
    {
        $livro = Livro::factory()->create();

        $response = $this->delete("/livros/{$livro->id}");

        $response->assertStatus(302);
        $this->assertDatabaseHas('livros', ['id' => $livro->id]);
    }
}
