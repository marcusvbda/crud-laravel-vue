<?php

namespace Tests\Feature;

use Tests\TestCase;

class NewsCrudTest extends TestCase
{
    public function testCreateNews()
    {
        $title =  $this->getRandomText(50, 100);
        $description =  $this->getRandomText(100, 150);
        $content =  $this->getRandomText(200, 500);

        $newsData = [
            'title' => $title->text,
            'description' => $description->text,
            'content' => $content->text
        ];

        $response = $this->post('/news', $newsData);
        $this->assertDatabaseHas('news', $newsData);

        $response->assertRedirect('/news');
    }

    // public function testReadNews()
    // {
    //     // Crie uma notícia de exemplo no banco de dados
    //     $news = factory(News::class)->create();

    //     // Faça uma solicitação GET para a rota de visualização da notícia
    //     $response = $this->get("/news/{$news->id}");

    //     // Verifique se a resposta contém o título e o conteúdo da notícia
    //     $response->assertSee($news->title)
    //         ->assertSee($news->content);
    // }

    // public function testUpdateNews()
    // {
    //     // Crie uma notícia de exemplo no banco de dados
    //     $news = factory(News::class)->create();

    //     // Simule um usuário autenticado
    //     $user = factory(User::class)->create();
    //     $this->actingAs($user);

    //     // Novos dados para atualizar a notícia
    //     $newData = [
    //         'title' => 'Novo Título',
    //         'content' => 'Novo Conteúdo',
    //     ];

    //     // Faça uma solicitação PUT para a rota de atualização
    //     $response = $this->put("/news/{$news->id}", $newData);

    //     // Verifique se os dados da notícia foram atualizados no banco de dados
    //     $this->assertDatabaseHas('news', $newData);

    //     // Verifique se a resposta redireciona para a página correta após a atualização
    //     $response->assertRedirect("/news/{$news->id}");
    // }

    // public function testNewsListingWithPaginationAndFilters()
    // {
    //     // Crie algumas notícias no banco de dados
    //     $news1 = factory(News::class)->create(['title' => 'Notícia 1', 'published' => true]);
    //     $news2 = factory(News::class)->create(['title' => 'Notícia 2', 'published' => true]);
    //     $news3 = factory(News::class)->create(['title' => 'Notícia 3', 'published' => false]);

    //     // Faça uma solicitação GET para a rota de listagem com filtros e paginação
    //     $response = $this->get('/news', ['published' => true, 'page' => 2, 'perPage' => 1]);

    //     // Verifique se a resposta contém a notícia publicada, mas não a não publicada
    //     $response->assertSee($news1->title)
    //         ->assertSee($news2->title)
    //         ->assertDontSee($news3->title);

    //     // Verifique se a resposta contém apenas 1 notícia por página (devido à paginação)
    //     $response->assertDontSee($news1->title)
    //         ->assertSee($news2->title);

    //     // Verifique se a resposta contém links para a próxima página e a página anterior
    //     $response->assertSee('Página 1')
    //         ->assertSee('Página 3'); // Supondo que a segunda página tenha um link para a terceira página
    // }
}
