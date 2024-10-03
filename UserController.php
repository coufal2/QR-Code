class UserController {
    private $userService;

    public function __construct(UserService $userService) {
        $this->userService = $userService;
    }

    // Získání profilu uživatele
    public function handleGetProfile($userId) {
        try {
            $user = $this->userService->getUserProfile($userId);
            if ($user) {
                return [
                    'status' => 200,
                    'data' => [
                        'first_name' => $user->getFirstName(),
                        'last_name' => $user->getLastName(),
                        'profile_picture' => $user->getProfilePicture()
                    ]
                ];
            } else {
                return ['status' => 404, 'message' => 'User not found'];
            }
        } catch (Exception $e) {
            return ['status' => 500, 'message' => $e->getMessage()];
        }
    }

    // Aktualizace profilu uživatele
    public function handleUpdateProfile($userId, $authUserId, $firstName, $lastName, $profilePicture) {
        try {
            $this->userService->updateUserProfile($userId, $authUserId, $firstName, $lastName, $profilePicture);
            return ['status' => 200, 'message' => 'Profile updated successfully'];
        } catch (Exception $e) {
            return ['status' => 403, 'message' => $e->getMessage()];
        }
    }
}
