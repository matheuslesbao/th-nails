<?php
namespace app\domain\entity;

class Customer
{
  private $id;
  private $userId;
  private $nome;
  private $telefone;
  private $createdAt;
  private $address;

  public function getId(): ?int
  {
      return $this->id;
  }
  public function setId(int $id){
    $this->id = $id;
  }
  public function getUserID(): int {
    return $this->userId;
  }
  public function setNumber(string $telefone): void {
    $this->telefone = $telefone;
}

public function setUserId(int $userId): void {
    $this->userId = $userId;
}
  public function getName(): string
  {
      return $this->nome;
  }
  public function setName(string $nome): void {
    $this->nome = $nome;
  }

  public function getNumber(): string
  {
      return $this->telefone;
  }

  public function getCreatedAt(): string
  {
      return $this->createdAt;
  }

  public function setCreatedAt(string $createdAt):void {
    $this->createdAt = $createdAt;
  }
  public function getAddress(): ?string
  {
      return $this->address;
  }

  public function setAddress(string $address):void {
    $this->address = $address;
  }

}