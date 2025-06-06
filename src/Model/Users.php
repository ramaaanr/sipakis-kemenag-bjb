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
        if (isset($data['password'])) {
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        }
        return parent::create($data);
    }

    public function update(int $id, array $data): bool
    {
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