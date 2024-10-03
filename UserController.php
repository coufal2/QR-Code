class UserController {
    private $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    public function handleGetProfile($userId) {
        return $this->userService->getUserProfile($userId);
    }

    public function handleUpdateProfile($userId, $authUserId, $firstName, $lastName, $profilePicture) {
        return $this->userService->updateUserProfile($userId, $authUserId, $firstName, $lastName, $profilePicture);
    }
}
