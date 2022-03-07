<?php

namespace App\Entity;

use App\Repository\OrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: OrderRepository::class)]
#[ORM\Table(name: '`order`')]
class Order
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'float')]
    private $totalprice;

    #[ORM\Column(type: 'datetime', nullable: true)]
    private $date;

    #[ORM\OneToMany(mappedBy: 'orders', targetEntity: LineOrder::class)]
    private $lineorder;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'orders')]
    private $user;

    public function __construct()
    {
        $this->lineorder = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(?\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    /**
     * @return Collection|LineOrder[]
     */
    public function getLineorder(): Collection
    {
        return $this->lineorder;
    }

    public function addLineorder(LineOrder $lineorder): self
    {
        if (!$this->lineorder->contains($lineorder)) {
            $this->lineorder[] = $lineorder;
            $lineorder->setOrders($this);
        }

        return $this;
    }

    public function removeLineorder(LineOrder $lineorder): self
    {
        if ($this->lineorder->removeElement($lineorder)) {
            // set the owning side to null (unless already changed)
            if ($lineorder->getOrders() === $this) {
                $lineorder->setOrders(null);
            }
        }

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }
}
