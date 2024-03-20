<?php

namespace app\domain\entity;

class User
{
  private $user_id;
  private $name;
  private $username;
  private $password;
  private $email;
  private $created_at;

  public function getId(): int
  {
      return $this->user_id;
  }

  public function getName(): string
  {
      return $this->name;
  }

  public function setName(string $name): void
  {
      $this->name = $name;
  }

  public function getUsername(): string
  {
      return $this->username;
  }
  public function setUsername(string $username): void {
    $this->username = $username;
  }

  public function getPassword(): string
  {
      return $this->password;
  }
  public function setPassword(string $password): void {
    $this->password = $password;
  }

  public function getEmail(): string
  {
      return $this->email;
  }
  public function setEmail(string $email): void{
      $this->email = $email;
  }

  public function getCreatedAt(): string
  {
      return $this->created_at;
  }

  public function setCreatedAt(string $created_at):void {
    $this->created_at = $created_at;
  }

}
