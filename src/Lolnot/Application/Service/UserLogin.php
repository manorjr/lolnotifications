<?php

namespace EG\Application\Service;

use EG\Application\Service;
use EG\Model\User\User;
use EG\Model\User\UserCredentialsException;
use EG\Model\User\UserDoesNotExistException;
use EG\Model\User\UserFactory;
use EG\Model\User\UserRepository;

class UserLogin implements Service
{
    /**
     * @var UserFactory
     */
    protected $userFactory;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @param UserFactory    $userFactory
     * @param UserRepository $userRepository
     */
    public function __construct(UserFactory $userFactory, UserRepository $userRepository)
    {
        $this->userFactory = $userFactory;
        $this->userRepository = $userRepository;
    }

    /**
     * Implements Service interface method.
     *
     * @throws UserCredentialsException
     * @throws UserDoesNotExistException
     *
     * @param null $request
     * @return User
     */
    public function execute($request = null)
    {
        $email = $request->getEmail();
        $password = $request->getPassword();

        $user = $this->userRepository->getByEmail($email);

        if ($user === null) {
            throw new UserDoesNotExistException("With the email: {$email}");
        }

        if ($user->password() !== $password) {
            throw new UserCredentialsException();
        }

        return $user;
    }
}
