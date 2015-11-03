<?php

namespace EG\Application\Service;

use EG\Application\Service;
use EG\Model\User\User;
use EG\Model\User\UserAlreadyExistException;
use EG\Model\User\UserFactory;
use EG\Model\User\UserRepository;

class UserSignIn implements Service
{
    /**
     * @var UserFactory
     */
    protected $userFactory;

    /**
     * @var UserRepository
     */
    protected $userRepository;

    public function __construct(UserFactory $userFactory, UserRepository $userRepository)
    {
        $this->userFactory = $userFactory;
        $this->userRepository = $userRepository;
    }

    /**
     * @param UserSignInRequest $request
     *
     * @throws UserAlreadyExistException
     *
     * @return User
     */
    public function execute($request)
    {
        $existentUser = $this->userRepository->getByEmail($request->email());

        if ($existentUser !== null) {
            throw new UserAlreadyExistException("User {$request->email()} already exist");
        }

        $newUser = $this->userFactory->createNewAdministratorUser(
            $this->userRepository->getNextIdentifier(),
            $request->email(),
            $request->firstName()
        )->setPassword($request->password());

        return $this->userRepository->persist($newUser);
    }
}
