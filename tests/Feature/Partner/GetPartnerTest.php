<?php

namespace Tests\Feature\Partner;

use App\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GetPartnerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_retrieve_partners()
    {
        factory(Partner::class, 10)->create();

        $uri = route('partners.index');

        $this->getJson($uri)
            ->assertSuccessful()
            ->assertOk()
            ->assertJsonCount(10, 'data');
    }
}
