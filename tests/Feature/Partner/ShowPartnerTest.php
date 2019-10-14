<?php

namespace Tests\Feature\Partner;

use App\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowPartnerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_show_partner_informations()
    {
        $partner = factory(Partner::class)->create();
        $uri = route('partners.show', ['partner' => $partner->id]);

        $this->getJson($uri)
            ->assertSuccessful()
            ->assertOk()
            ->assertJsonCount(1);
    }
}
