<?php

namespace Tests\Feature\Partner;

use App\Partner;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Tests\TestCase;

class StorePartnerTest extends TestCase
{
    use RefreshDatabase;

    protected $uri;

    protected function setUp(): void
    {
        parent::setUp();

        $this->uri = route('partners.store');
    }


    /** @test */
    public function it_should_store_a_partner()
    {
        $partner = factory(Partner::class)->raw();

        $this->postJson($this->uri, $partner)
            ->assertSuccessful()
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonCount(1);

        $this->assertDatabaseHas('partners', $partner);
    }

    /** @test */
    public function it_should_require_name()
    {
        $partner = factory(Partner::class)->raw(['name' => '']);

        $this->postJson($this->uri, $partner)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('name');
    }

    /** @test */
    public function it_should_prevent_that_name_field_has_more_than_50_characters()
    {
        $partner = factory(Partner::class)->raw(['name' => Str::random(51)]);

        $this->postJson($this->uri, $partner)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('name');
    }

    /** @test */
    public function it_should_require_description()
    {
        $partner = factory(Partner::class)->raw(['description' => '']);

        $this->postJson($this->uri, $partner)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('description');
    }

    /** @test */
    public function it_should_prevent_that_description_field_has_more_than_150_characters()
    {
        $partner = factory(Partner::class)->raw(['description' => Str::random(151)]);

        $this->postJson($this->uri, $partner)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('description');
    }

    /** @test */
    public function it_should_require_type()
    {
        $partner = factory(Partner::class)->raw(['type' => '']);

        $this->postJson($this->uri, $partner)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('type');
    }

    /** @test */
    public function it_should_prevent_that_type_field_has_more_than_50_characters()
    {
        $partner = factory(Partner::class)->raw(['type' => Str::random(51)]);

        $this->postJson($this->uri, $partner)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('type');
    }

    /** @test */
    public function it_should_require_pic_name()
    {
        $partner = factory(Partner::class)->raw(['pic_name' => '']);

        $this->postJson($this->uri, $partner)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('pic_name');
    }

    /** @test */
    public function it_should_prevent_that_pic_name_field_has_more_than_50_characters()
    {
        $partner = factory(Partner::class)->raw(['pic_name' => Str::random(51)]);

        $this->postJson($this->uri, $partner)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('pic_name');
    }

    /** @test */
    public function it_should_require_pic_phone()
    {
        $partner = factory(Partner::class)->raw(['pic_phone' => '']);

        $this->postJson($this->uri, $partner)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('pic_phone');
    }

    /** @test */
    public function it_should_prevent_that_pic_phone_field_has_more_than_20_characters()
    {
        $partner = factory(Partner::class)->raw(['pic_phone' => Str::random(21)]);

        $this->postJson($this->uri, $partner)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('pic_phone');
    }

    /** @test */
    public function it_should_require_pic_email()
    {
        $partner = factory(Partner::class)->raw(['pic_email' => '']);

        $this->postJson($this->uri, $partner)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('pic_email');
    }

    /** @test */
    public function it_should_prevent_that_pic_email_field_has_more_than_50_characters()
    {
        $partner = factory(Partner::class)->raw(['pic_email' => Str::random(51)]);

        $this->postJson($this->uri, $partner)
            ->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJsonValidationErrors('pic_email');
    }
}
