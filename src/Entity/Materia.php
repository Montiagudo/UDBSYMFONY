<?php

namespace App\Entity;

use App\Repository\MateriaRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MateriaRepository::class)
 */
class Materia
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $nombreMateria;

    /**
     * @ORM\Column(type="string", length=8, nullable=false)
     */
    private $codMateria;

    /**
     * @ORM\OneToMany(targetEntity=Estudiante::class, mappedBy="idMateria")
     */
    private $listaEstudiantes;

    public function __construct()
    {
        $this->listaEstudiantes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNombreMateria(): ?string
    {
        return $this->nombreMateria;
    }

    public function setNombreMateria(?string $nombreMateria): self
    {
        $this->nombreMateria = $nombreMateria;

        return $this;
    }

    public function getCodMateria(): ?string
    {
        return $this->codMateria;
    }

    public function setCodMateria(?string $codMateria): self
    {
        $this->codMateria = $codMateria;

        return $this;
    }

    /**
     * @return Collection|Estudiante[]
     */
    public function getListaEstudiantes(): Collection
    {
        return $this->listaEstudiantes;
    }

    public function addListaEstudiante(Estudiante $listaEstudiante): self
    {
        if (!$this->listaEstudiantes->contains($listaEstudiante)) {
            $this->listaEstudiantes[] = $listaEstudiante;
            $listaEstudiante->setIdMateria($this);
        }

        return $this;
    }

    public function removeListaEstudiante(Estudiante $listaEstudiante): self
    {
        if ($this->listaEstudiantes->removeElement($listaEstudiante)) {
            // set the owning side to null (unless already changed)
            if ($listaEstudiante->getIdMateria() === $this) {
                $listaEstudiante->setIdMateria(null);
            }
        }

        return $this;
    }
}
