<?php

namespace Tests\Feature\Partner;

use App\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DestroyPartnerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_should_destroy_a_partner()
    {
        $partner = factory(Partner::class)->create();
        $uri = route('partners.destroy', ['partner' => $partner->id]);

        $this->deleteJson($uri)
            ->assertSuccessful()
            ->assertOk()
            ->assertJsonCount(1);
    }
}
