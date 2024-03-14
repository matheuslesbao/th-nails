<?php
namespace app\domain\entity;

class Customer
{
  private $id;
  private $user_id;
  private $nome;
  private $email;
  private $telefone;
  private $created_at;
  private $address;

  public function getId(): ?int
  {
      return $this->id;
  }
  public function setId(int $id){
    $this->id = $id;
  }
  public function getUserID(): int {
    return $this->user_id;
  }
  public function setNumber(string $telefone): void {
    $this->telefone = $telefone;
}

public function setUserId(int $user_id): void {
    $this->user_id = $user_id;
}
  public function getName(): string
  {
      return $this->nome;
  }
  public function setName(string $nome): void {
    $this->nome = $nome;
  }
  public function getEmail(): string {
    return $this->email;
  }

  public function getNumber(): string
  {
      return $this->telefone;
  }

  public function getCreatedAt(): string
  {
      return $this->created_at;
  }

  public function setCreatedAt(string $created_at):void {
    $this->created_at = $created_at;
  }
  public function getAddress(): ?string
  {
      return $this->address;
  }

  public function setAddress(string $address):void {
    $this->address = $address;
  }

}