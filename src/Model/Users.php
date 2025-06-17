<?php

namespace Sfy\AplikasiDataKemenagPAI\Model;

use PDO;
use Sfy\AplikasiDataKemenagPAI\Core\Model;

class Users extends Model
{
    protected string $table = 'users';
    protected array $fillable = ['username', 'password', 'role'];
    protected array $hidden = ['password'];

    public function create(array $data): bool
    {
        // Validasi apakah username sudah ada
        $user = $this->getBy(['username' => $data["username"]]);
        if ($user) {
            throw new \Exception('Username Sudah terdaftar');
        }
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        return parent::create($data);
    }

    public function update(int $id, array $data): bool
    {
        $userByUsername = $this->getBy(['username' => $data["username"]]);
        // $userById = $this->getBy(['id' => $id]);
        if ($userByUsername) {
            if ($userByUsername['id'] !== $id) {
                // Jika username yang ada berbeda dengan yang ingin diupdate, berarti sudah ada yang menggunakan
                throw new \Exception('Username Sudah terdaftar');
            }
        }

        $oldPassword = $this->getBy(['id' => $id])['password'] ?? null;
        $newPassword = $data['password'] ?? null;

        if (password_verify($newPassword, $oldPassword) || $newPassword === '') {
            unset($data['password']); // Jangan update password jika tidak berubah
        }
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        return parent::update($id, $data);
    }

    public function getUserForLogin(string $username): ?array
    {
        // Mengambil user termasuk field password (ignore hidden di sini)
        $sql = "SELECT * FROM {$this->table} WHERE username = :username AND deleted_at IS NULL LIMIT 1";
        $stmt = $this->db->prepare($sql);
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user ?: null;
    }
}
