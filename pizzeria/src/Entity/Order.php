<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OrderRepository::class)
 * @ORM\Table(name="`order`")
 */
class Order
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    
    /**
     * @ORM\ManyToMany(targetEntity=product::class)
     */
    private $produtcs;

    /**
     * @ORM\Column(type="float")
     */
    private $totalprice;

    /**
     * @ORM\Column(type="boolean")
     */
    private $delivery;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $client;

    public function __construct()
    {
        $this->produtcs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    

    /**
     * @return Collection|product[]
     */
    public function getProdutcs(): Collection
    {
        return $this->produtcs;
    }

    public function addProduct(product $product): self
    {
        if (!$this->produtcs->contains($product)) {
            $this->produtcs[] = $product;
        }

        return $this;
    }

    public function removeProduct(product $product): self
    {
        $this->produtcs->removeElement($product);

        return $this;
    }

    public function getTotalprice(): ?float
    {
        return $this->totalprice;
    }

    public function setTotalprice(float $totalprice): self
    {
        $this->totalprice = $totalprice;

        return $this;
    }

    public function getDelivery(): ?bool
    {
        return $this->delivery;
    }

    public function setDelivery(bool $delivery): self
    {
        $this->delivery = $delivery;

        return $this;
    }

    public function getClient(): ?User
    {
        return $this->client;
    }

    public function setClient(?User $client): self
    {
        $this->client = $client;

        return $this;
    }
}
