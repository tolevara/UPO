<?php

namespace App\Entity;

use App\Repository\ProfesoresRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProfesoresRepository::class)]
class Profesores
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(nullable: true)]
    private ?bool $genero = null;

    #[ORM\Column(length: 9)]
    private ?string $nif = null;

    #[ORM\Column(length: 50)]
    private ?string $nombre = null;

    

    /**
     * @var Collection<int, Asignaturas>
     */
    #[ORM\OneToMany(targetEntity: Asignaturas::class, mappedBy: 'Profesores')]
    private Collection $asignaturas;

    public function __construct()
    {
        $this->asignaturas = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNif(): ?string
    {
        return $this->nif;
    }

    public function setNif(string $nif): static
    {
        $this->nif = $nif;

        return $this;
    }

    public function getNombre(): ?string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): static
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function isGenero(): ?bool
    {
        return $this->genero;
    }

    public function setGenero(?bool $genero): static
    {
        $this->genero = $genero;

        return $this;
    }

    /**
     * @return Collection<int, Asignaturas>
     */
    public function getAsignaturas(): Collection
    {
        return $this->asignaturas;
    }

    public function addAsignatura(Asignaturas $asignatura): static
    {
        if (!$this->asignaturas->contains($asignatura)) {
            $this->asignaturas->add($asignatura);
            $asignatura->setProfesores($this);
        }

        return $this;
    }

    public function removeAsignatura(Asignaturas $asignatura): static
    {
        if ($this->asignaturas->removeElement($asignatura)) {
            // set the owning side to null (unless already changed)
            if ($asignatura->getProfesores() === $this) {
                $asignatura->setProfesores(null);
            }
        }

        return $this;
    }
}
