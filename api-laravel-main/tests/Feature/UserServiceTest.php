<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $data = UserService::generateCredentials(1, 1);
        dump($data);
        $qrcode = UserService::generateQrCodeValue($data['email'],1);
        dump($qrcode);

        $this->assertLessThan(0, sizeof($data));
    }
}
