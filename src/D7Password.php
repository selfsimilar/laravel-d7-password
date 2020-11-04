<?php

namespace Selfsimilar\D7Password;

use Selfsimilar\D7Password\Contracts\D7Password as D7PasswordContract;
use Selfsimilar\D7PasswordHasher\Hasher as Hasher;

class D7Password implements D7PasswordContract
{

    /**
     * @var \Selfsimilar\D7Password\Hasher
     */
    protected $D7_hasher;

    /**
     * @param \Selfsimilar\D7Password\Hasher $D7_hasher
     */
    function __construct(Hasher $D7_hasher = null)
    {
        $this->D7_hasher = $D7_hasher ?? new Hasher();
    }

    /**
     * Create a hash (encrypt) of a plain text password.
     *
     * For integration with other applications, this function can be overwritten to
     * instead use the other package password checking algorithm.
     *
     * @uses Hasher->HashPassword
     *
     * @param string $password Plain text user password to hash
     *
     * @return string The hash string of the password
     */
    public function make($password)
    {
        return $this->D7_hasher->HashPassword(trim($password));
    }

    /**
     * Checks the plaintext password against the encrypted Password.
     *
     * Maintains compatibility between old version and the new cookie authentication
     * protocol using PHPass library. The $hash parameter is the encrypted password
     * and the function compares the plain text password when encrypted similarly
     * against the already encrypted password to see if they match.
     *
     * @uses Hasher->CheckPassword
     *
     * @param string $password Plaintext user's password
     * @param string $hash     Hash of the user's password to check against.
     *
     * @return bool False, if the $password does not match the hashed password
     */
    public function check($password, $hash)
    {
      return $this->
        D7_hasher->
        CheckPassword($password, $hash);
    }
}