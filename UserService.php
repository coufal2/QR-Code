class UserService {
    private $userRepository;

    public function __construct(UserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    // Získání profilu uživatele
    public function getUserProfile($userId) {
        return $this->userRepository->getUserById($userId);
    }

    // Aktualizace profilu uživatele
    public function updateUserProfile($userId, $authUserId, $firstName, $lastName, $profilePicture) {
        if ($userId !== $authUserId) {
            throw new Exception("Unauthorized to edit this profile.");
        }

        // Aktualizace profilu
        return $this->userRepository->updateUserProfile($userId, $firstName, $lastName, $profilePicture);
    }
}
