class User {
    private $id;
    private $username;
    private $password;
    private $firstName;
    private $lastName;
    private $profilePicture;

    public function __construct($id, $username, $password, $firstName, $lastName, $profilePicture) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->profilePicture = $profilePicture;
    }

    // Getter
    public function getId() {
        return $this->id;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPassword() {
        return $this->password;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function getLastName() {
        return $this->lastName;
    }

    public function getProfilePicture() {
        return $this->profilePicture;
    }

    // Setter
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
    }

    public function setLastName($lastName) {
        $this->lastName = $lastName;
    }

    public function setProfilePicture($profilePicture) {
        $this->profilePicture = $profilePicture;
    }
}
