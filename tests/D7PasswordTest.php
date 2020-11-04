<?php declare(strict_types=1);

use PHPUnit\Framework\TestCase;

use Selfsimilar\D7Password\D7Password;

class D7PasswordTest extends TestCase
{

    protected $D7_password;
    protected $password_hash_mock;

    protected function setUp(): void
    {
        $this->password_hash_mock = Mockery::mock('Selfsimilar\D7PasswordHasher\Hasher');
        $this->D7_password = new D7Password($this->password_hash_mock);
    }

    protected function tearDown(): void
    {
        // Mockery::close();
    }

    public function test_service_implements_interface()
    {
        $this->assertInstanceOf('Selfsimilar\D7Password\Contracts\D7Password', $this->D7_password);
    }

    public function test_make_method_calls_HashPassword_and_returns_result()
    {
      $this->password_hash_mock
           ->shouldReceive('HashPassword')
            ->once()
            ->withArgs(array('foo'))
            ->andReturn('bar');

        $response = $this->D7_password->make('foo');

        $this->assertEquals('bar', $response);
    }

    public function test_make_method_trims_password_before_hashing()
    {
      $this->password_hash_mock
           ->shouldReceive('HashPassword')
            ->once()
            ->withArgs(array('foo'))
            ->andReturn('bar');

        $response = $this->D7_password->make('           foo     ');

        $this->assertEquals('bar', $response);
    }

    public function test_check_method_calls_CheckPassword_and_returns_result()
    {
      $this->password_hash_mock
           ->shouldReceive('CheckPassword')
            ->once()
            ->withArgs(array('plain-text-password', 'hashed-password-longer-than-32-chars'))
            ->andReturn('foo');

        $response = $this->D7_password->check('plain-text-password', 'hashed-password-longer-than-32-chars');

        $this->assertEquals('foo', $response);
    }


}
