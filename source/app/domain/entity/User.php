<?php
namespace app\domain\entity;

class User
{
  private $id;
  private $name;
  private $username;
  private $password;
  private $email;
  private $created_at;

  public function getId(): int
  {
      return $this->id;
  }

  public function getName(): string
  {
      return $this->name;
  }

  public function getUsername(): string
  {
      return $this->username;
  }

  public function getPassword(): string
  {
      return $this->password;
  }

  public function getEmail(): string
  {
      return $this->email;
  }

  public function getCreatedAt(): string
  {
      return $this->created_at;
  }

  public function setCreatedAt(string $created_at):void {
    $this->created_at = $created_at;
  }

}