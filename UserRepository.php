class UserRepository {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Získání uživatele podle ID
    public function getUserById($userId) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE id = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch();
        if ($user) {
            return new User($user['id'], $user['username'], $user['password'], $user['first_name'], $user['last_name'], $user['profile_picture']);
        }
        return null;
    }

    // Aktualizace profilu uživatele
    public function updateUserProfile($userId, $firstName, $lastName, $profilePicture) {
        $stmt = $this->db->prepare("UPDATE users SET first_name = ?, last_name = ?, profile_picture = ? WHERE id = ?");
        return $stmt->execute([$firstName, $lastName, $profilePicture, $userId]);
    }
}
